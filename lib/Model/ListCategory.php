<?php

namespace xepan\listing;

class Model_ListCategory extends \xepan\base\Model_Table{
	public $table='list_category';
	public $status = ['Published','UnPublished'];
	public $actions = [
					'Active'=>['view','edit','delete','deactivate'],
					'Inactive'=>['view','edit','delete','activate']
					];

	public $acl_type = "Listing\Category";
	function init(){
		parent::init();

		$this->addField('name');
		$this->addField('display_sequence');
		$this->addField('status')->enum(['Active','InActive'])->defaultValue('Active');
		$this->addField('description')->type('text')->display(array('form'=>'xepan\base\RichText'));
		$this->addField('custom_link');
		$this->addField('meta_title');
		$this->addField('meta_description');
		$this->addField('is_website_display')->type('boolean')->defaultValue(true);
		$this->addField('slug_url');
		$this->addField('image')->display(['form'=>'xepan\base\ElImage']);


		// $this->addField('type')->defaultValue('');

		$this->hasMany('xepan\listing\Category','list_id');


		$this->is(['name|to_trim|required']);
		$this->add('dynamic_model\Controller_AutoCreator');		

	}

}