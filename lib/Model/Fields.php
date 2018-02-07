<?php

namespace xepan\listing;

class Model_Fields extends \xepan\base\Model_Table{
	public $table='list_fields';
	public $status = ['Active','Inactive'];
	public $actions = [
					'Active'=>['view','edit','delete','deactivate'],
					'Inactive'=>['view','edit','delete','activate']
					];

	public $acl_type = "Listing\Fields";

	function init(){
		parent::init();

		$this->addField('name');
		$this->addField('type');
		$this->addField('status')->enum(['Active','Inactive'])->defaultValue('Active');
		$this->addField('value');
		$this->addField('is_mandatory')->type('boolean')->defaultValue(false);
		$this->addField('placeholder');
		$this->addField('is_moderate')->type('boolean');
		$this->addField('is_changable')->type('boolean')->defaultValue(false);
		$this->addField('is_filterable')->type('boolean')->defaultValue(true);

		
		$this->is(['name|to_trim|required']);
		$this->add('dynamic_model\Controller_AutoCreator');		

	}

	function deactivate(){
		$this['status'] = 'Inactive';
		$this->save();
	}

	function activate(){
		$this['status'] = 'Active';
		$this->save();
	}

}