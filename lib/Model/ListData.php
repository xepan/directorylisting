<?php

namespace xepan\listing;

class Model_ListData extends \xepan\base\Model_Table{
	public $listing;
	public $acl_type = "listdata";

	public $validation_array=[];

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

			if($field['field_type'] == "Upload"){
				$f = $this->add('xepan\filestore\Field_File',$field->dbColumnName());
			}else{
				$f = $this->addField($field->dbColumnName());
				$f->type($field->modelFieldType());
			}

			$f->caption($field['name']);
			$f->hint($field['hint']);

			if(in_array($field['field_type'], ['DropDown','radio']) && $values = $field['default_value']){
				$f->enum(explode(",", $values));
			}

			if($field['is_mandatory']){
				$validation_array[] = [$field->dbColumnName()."|required"];
			}
		}


		// predefined fields
		$this->addField('created_at')->type('datetime');
		$this->addField('updated_at')->type('datetime');
		$this->hasOne('xepan\base\Contact','created_by_id');
		$this->addField('status');

	}
}