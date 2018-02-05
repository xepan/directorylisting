<?php

namespace xepan\listing;

class Model_Association_ListCategory extends \xepan\base\Model_Table{
	
	public $table='listing_category_list_association';
	public $acl=false;
	
	function init(){
		parent::init();

		$this->hasOne('xepan\listing\ListCategory','list_category_id');
		$this->hasOne('xepan\listing\List','list_id');

	}
}