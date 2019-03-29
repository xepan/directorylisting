<?php

namespace xepan\listing;

class Tool_DataCount extends \xepan\cms\View_Tool{

	public $options = [
		'listing_id'=>0,
		'list_data_set_id'=>null,
		'show_active_user_count'=>false
	];
	
	function init(){
		parent::init();

		if($this->owner instanceof \AbstractController){
			$this->add('View_Warning')->set('Please Select It\'s Options First, by double clicking on it');
			return;
		}

		if(!$this->options['listing_id']){
			$this->add('View')->addClass('alert alert-warning')->set('Please Select List From Option Panel');
			return;
		}

		if($this->options['show_active_user_count']){
			$contact_model = $this->add('xepan\listing\Model_Contact');
			$this->add('View')->set($contact_model->count()->getOne());
		}else{
			$this->listing_model = $this->add('xepan\listing\Model_List');
			$this->listing_model->load($this->options['listing_id']);

			$this->listdata_model = $listdata_model = $this->add('xepan\listing\Model_ListData',['listing'=>$this->options['listing_id']]);
			$this->applyListDataSetCondition();

			$this->add('View')->set($listdata_model->count()->getOne());
		}

	}

	function applyListDataSetCondition(){
		$conditions = $this->add('xepan\listing\Model_ListDataSetCondition')
			->addCondition('list_data_set_id',$this->options['list_data_set_id']);

		foreach ($conditions as $condition) {
			$field_db_name = $condition->ref('filter_effected_field_id')->dbColumnName();

			$value = $condition['value'];
			if($condition['operator'] == "in"){
				$value = explode(",", $value);
			}
			$operator = $condition['operator'];
			if($condition['operator'] == "contains"){
				$value = "%$value%";
				$operator = "like";
			}		
			$this->listdata_model->addCondition($field_db_name,$operator,$value);
		}
	}
}