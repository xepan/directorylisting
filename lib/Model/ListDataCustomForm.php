<?php

namespace xepan\listing;

class Model_ListDataCustomForm extends \xepan\base\Model_Table{
	
	public $table = 'xepan_listing_list_data_custom_form';

	public $status = ['Active','InActive'];
	public $actions = [
					'Active'=>['view','edit','delete','deactive'],
					'InActive'=>['view','edit','delete','active']
				];
	public $acl_type = "xepan_listing_list_data_custom_form";

	function init(){
		parent::init();

		$this->hasOne('xepan\listing\List','list_id');
		$this->hasOne('xepan\cms\Custom_Form','custom_form_id');
		$this->hasOne('xepan\listing\ListDataSet','list_data_set_id');

		$this->addField('name');
		$this->addField('status')->enum($this->status)->defaultValue('Active');
		
		$this->is([
			'name|to_trim|required',
			'list_id|to_trim|required',
			'custom_form_id|to_trim|required'
		]);

		$this->add('dynamic_model\Controller_AutoCreator');
	}

	function deactive(){
		$this['status'] = "InActive";
		$this->save();
	}

	function active(){
		$this['status'] = "Active";
		$this->save();
	}
	
}