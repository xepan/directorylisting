<?php

namespace xepan\listing;

class Model_List extends \xepan\base\Model_Table{
	public $table='list';
	public $status = ['Published','UnPublished'];
	public $actions = [
					'Active'=>['view','edit','delete','deactivate'],
					'Inactive'=>['view','edit','delete','activate']
					];

	public $acl_type = "Listing\List";
	function init(){
		parent::init();

		$this->addField('name');
		$this->addField('type');
		$this->addField('status')->enum(['Active','InActive'])->defaultValue('Active');
		
		$this->is(['name|to_trim|required']);
		$this->add('dynamic_model\Controller_AutoCreator');		

	}

}