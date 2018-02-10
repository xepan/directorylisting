<?php

namespace xepan\listing;

class Tool_ManageListData extends \xepan\cms\View_Tool{
	public $options = [
		'listing_id'=>0,
		'listing_layout_id'=>0,
		'save_button_caption'=>'Save'
	];
	
	function init(){
		parent::init();

		if(!$this->options['listing_id']){
			$this->add('View')->addClass('alert alert-warning')->set('Please Select List From Option Panel');
			return;
		}

		// try{
			$this->add('xepan\listing\Form_ManageListData',['options'=>$this->options]);
		// }catch(\Exception $e){
		// 	$this->add('View')->addClass('alert alert-warning')->set($e->getMessage());
		// 	return;	
		// }
	}
}