<?php

namespace xepan\listing;

class Model_ListData extends \xepan\base\Model_Table{
	public $listing;
	public $acl_type = "listdata";

	public $validation_array=[];
	
	public $public_fields = [];
	public $private_fields = [];
	public $premium_fields = [];
	public $filterable_fields = [];
	public $changable_fields = [];
	public $moderate_fields = [];

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
		}

		$this->acl_type = $this->table = $this->listing->getTableName();
		
		parent::init();

		$validation_array = [];

		foreach ($this->listing->fields() as $field) {
				
			if($field['field_type'] == "Captcha") continue;

			$field_db_column_name = $field->dbColumnName();
			if($field['field_type'] == "Upload"){
				$f = $this->add('xepan\filestore\Field_File',$field_db_column_name);
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

			if($field['is_public']) $this->public_fields[$field_db_column_name] = $field['name'];
			if($field['is_private']) $this->private_fields[$field_db_column_name] = $field['name'];
			if($field['is_premium']) $this->premium_fields[$field_db_column_name] = $field['name'];
			if($field['is_filterable']) $this->filterable_fields[$field_db_column_name] = $field['name'];
			if($field['is_changable']) $this->changable_fields[$field_db_column_name] = $field['name'];
			if($field['is_moderate']) $this->moderate_fields[$field_db_column_name] = $field['name'];
		}

		// predefined fields
		$this->hasOne('xepan\base\Contact','created_by_id');
		$this->addField('created_at')->type('datetime');
		$this->addField('updated_at')->type('datetime');
		$this->addField('status');

		// setting up status dropdown to status field
		$this->getElement('status')->enum(explode(",",$this->listing['list_data_status']));
	}
}