<?php

namespace xepan\listing;

class Tool_Filter extends \xepan\cms\View_Tool{
	public $options = [
			'listing_id'=>null,
			'reload_class'=>null,
			'result_page'=>null,
		];
	
	function init(){
		parent::init();

		if($this->owner instanceof \AbstractController) return;

		if(!$this->options['listing_id']){
			$this->add('View_Warning')->addClass('alert alert-warning')->set("Please Select Listing Id");
			return;
		}

		$this->listing_model = $this->add('xepan\listing\Model_List');
		$this->listing_model->load($this->options['listing_id']);

		$this->field_model = $field_model = $this->listing_model->fields()
					->addCondition('is_filterable',true)
					->addCondition('status',"Active")
					;

		$form = $this->add('Form');
		$form->setModel($field_model);
	}
}