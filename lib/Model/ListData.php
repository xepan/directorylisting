<?php

namespace xepan\listing;

class Model_ListData extends \xepan\base\Model_Table{
	public $listing;
	public $acl_type = "listing\listdata";

	public $validation_array=[];
	
	public $public_fields = [];
	public $private_fields = [];
	public $premium_fields = [];
	public $filterable_fields = [];
	public $changable_fields = [];
	public $moderate_fields = [];
	public $actions = [];
	public $status = [];

	public $predefined_fields = [
			'created_by_id'=>'created_by_id',
			'created_by'=>'created_by',
			'created_at'=>'created_at',
			'updated_at'=>'updated_at',
			'status'=>'status'
		];
	function init(){

		if(is_numeric($this->listing)){
			$this->listing = $this->add('xepan\listing\Model_List')->load($this->listing);
		}elseif(is_string($this->listing)){
			$this->listing = $this->add('xepan\listing\Model_List')->loadBy('name',$this->listing);
		}else{
			// throw new \Exception("list must defined");
		}

		$this->acl_type = $this->table = $this->listing->getTableName();

		$this->status = $status = explode(",",$this->listing['list_data_status']);
		// actions
		foreach ($status as $key => $value) {
			$this->actions[$value] = ['view','change_status','edit','delete'];
		}
		
		parent::init();

		$validation_array = [];

		foreach ($this->listing->fields() as $field) {
				
			if($field['field_type'] == "Captcha") continue;

			$field_db_column_name = $field->dbColumnName();

			if($field['field_type'] == "Upload"){
				$f = $this->add('xepan\filestore\Field_File',$field_db_column_name);
			}elseif($field['field_type'] == "Expression"){
				$f= $this->addExpression($field_db_column_name)->set($field['default_value']);
			}else{
				$f = $this->addField($field_db_column_name);
				$f->type($field->modelFieldType());
			}

			$f->caption($field['name']);
			$f->hint($field['hint']);

			if(in_array($field['field_type'], ['DropDown','radio']) && $values = $field['default_value']){
				$f->enum(explode(",", $values));
			}

			if($field['is_mandatory']){
				$validation_array[] = [$field_db_column_name."|required"];
			}

			if($field['is_public']) {
				$this->public_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->public_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
			if($field['is_private']) {
				$this->private_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->private_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
			if($field['is_premium']) {
				$this->premium_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->premium_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}	
			}
			if($field['is_filterable']) {
				$this->filterable_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->filterable_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
			if($field['is_changable']) {
				$this->changable_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->changable_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
			if($field['is_moderate']) {
				$this->moderate_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->moderate_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
		}

		// predefined fields
		$this->hasOne('xepan\base\Contact','created_by_id');
		$this->addField('created_at')->type('datetime');
		$this->addField('updated_at')->type('datetime');
		$this->addField('status');

		// setting up status dropdown to status field
		$ts = explode(",",$this->listing['list_data_status']);
		$this->getElement('status')->enum(array_combine($ts,$ts))->defaultValue($ts[0]);
	}

	function page_change_status($page){
		$ts = explode(",",$this->listing['list_data_status']);

		$form = $page->add('Form');
		$form->addField('DropDown','status')
			->setValueList(array_combine($ts,$ts))
			->set($this['status']);

		$form->addSubmit('Update');
		if($form->isSubmitted()){
			$this['status'] = $form['status'];
			$this->save();
			return true;
		}

	}

	// ACL will call it and listing must be passed again to be exact same newInsatnce of current model
	function newInstance($properties = null)
    {
        return $this->owner->add(get_class($this), ['listing'=>$this->listing]);
    }

    function getAssociatedCategories(){
    	
    	$asso = $this->add('xepan\listing\Model_Association_ListDataCategory');
		$asso->addCondition('list_id',$this->listing->id);
		$asso->addCondition('list_data_id',$this->id);
		return array_column($asso->getRows(),'list_category_id');
    }

	function associateWithCategories($category_ids,$remove_all_first=true){
		if($remove_all_first){
			$asso = $this->add('xepan\listing\Model_Association_ListDataCategory');
			$asso->addCondition('list_id',$this->listing->id);
			$asso->addCondition('list_data_id',$this->id);
			$asso->deleteAll();
		}

		foreach ($category_ids as $cat_id) {
			$asso = $this->add('xepan\listing\Model_Association_ListDataCategory');
			$asso['list_id'] = $this->listing->id;
			$asso['list_data_id'] = $this->id;
			$asso['list_category_id'] = $cat_id;
			$asso->save();
		}
	}

	function listModel(){
		return $this->listing;
	}

}