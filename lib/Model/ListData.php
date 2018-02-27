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
			$this->actions[$value] = ['view','change_status','category_association','edit','delete'];
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
		$this->getElement('status')->enum(explode(",",$this->listing['list_data_status']));
	}

	function page_change_status($page){
		$form = $page->add('Form');
		// $form->addField('DropDown','status')->setListValue(['']);

	}

	// ACL will call it and listing must be passed again to be exact same newInsatnce of current model
	function newInstance($properties = null)
    {
        return $this->owner->add(get_class($this), ['listing'=>$this->listing]);
    }

}