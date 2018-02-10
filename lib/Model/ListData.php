<?php

namespace xepan\listing;

class Model_ListData extends \xepan\base\Model_Table{
	public $listing;
	public $acl_type="listdata";
	function init(){

		if(is_numeric($this->listing)){
			$this->listing = $this->add('xepan\listing\Model_List')->load($this->listing);
		}elseif(is_string($this->listing)){
			$this->listing = $this->add('xepan\listing\Model_List')->loadBy('name',$this->listing);
		}

		$this->table= $this->listing->getTableName();

		parent::init();

		foreach ($this->listing->fields() as $field) {
			$f = $this->addField($field->dbColumnName())->caption($field['name']);
			$f->type($field->modelFieldType());
			$f->hint($field['hint']);
		}

		// predefined fields
		$this->addField('created_at')->type('datetime');
		$this->addField('updated_at')->type('datetime');
		$this->hasOne('xepan\base\Contact','created_by_id');
		$this->addField('status');

	}
}