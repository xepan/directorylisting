<?php

namespace xepan\listing;

class Model_List extends \xepan\base\Model_Table{
	public $table='list';
	public $status = ['Published','UnPublished'];
	public $actions = [
					'Active'=>['view','fields','category_association','edit','delete','deactivate'],
					'Inactive'=>['view','fields','category_association','edit','delete','activate']
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

	function page_category_association($page){
		$page->add('view')->set('Hello');
	}

	function category_association(){

	}

	function deactivate(){
		$this['status'] = 'Inactive';
		$this->save();
	}

	function activate(){
		$this['status'] = 'Active';
		$this->save();
	}

	function fields(){

	}

}