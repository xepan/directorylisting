<?php

namespace xepan\listing;

class Form_ManageListData extends \Form {
	public $options = [];
	public $list_model;
	public $list_data_model;
	public $listing_layout_model;

	function init(){
		parent::init();	

		$this->setListModel();
		$this->setListLayout();

		$this->list_data_model = $this->list_model->getDataModel();
		if($this->options['list_data_record_id']) $this->list_data_model->load($this->options['list_data_record_id']);

		$fields_in_layout=[];
		if($this->listing_layout_model->loaded()){
			$fields_in_layout = $this->listing_layout_model->getFields();
			$this->add('xepan\base\Controller_FLC')
				->addContentSpot()
				->layout($this->listing_layout_model->getLayoutArray());
		}


		foreach ($this->list_model->fields() as $field) {
			if($this->listing_layout_model->loaded() && !in_array($field->dbColumnName(), $fields_in_layout)){
				continue;
			} 
			
			if($field['field_type'] == "Expression") continue;
			elseif($field['field_type'] == "email") $field['field_type'] = "Line";

			$field_name = $field->dbColumnName();
			
			if($field['field_type'] == "Upload"){
				// $f = $this->addField('xepan\filestore\Field_File',$field_name,$field['name']);
			}else{
				$f = $this->addField($field['field_type'],$field_name,$field['name']);
			}
			$f->setFieldHint($field['hint']);

			if(in_array($field['field_type'], ['DropDown','radio']) && $values = $field['default_value']){
				$t = explode(",", $values);
				$f->setValueList(array_combine($t, $t));
			}

			if($field['is_mandatory']){
				$f->validate('required');
			}

			$f->set($this->list_data_model[$field_name]);
		}
		// print_r($fields_in_layout);

		$this->addSubmit($this->options['save_button_caption'])->addClass($this->options['save_button_class']);
		if($this->isSubmitted()){
			foreach ($this->list_model->fields() as $field) {
				if($this->listing_layout_model->loaded() && !in_array($field->dbColumnName(), $fields_in_layout)){
					continue;
				} 
				
				$field_name = $field->dbColumnName();
				$this->list_data_model[$field_name] = $this[$field_name];
			}

			$this->list_data_model->save();
			$this->js(null,$this->js()->univ()->successMessage('DONE'))->reload()->execute();
		}
	}


	function setListLayout(){
		return $this->listing_layout_model = $this->add('xepan\listing\Model_ListDataFormLayout')
			// ->tryLoadAny();
			->tryLoad($this->options['listing_layout_id']);
	}

	function setListModel(){
		$this->list_model = $this->add('xepan\listing\Model_List');
		$this->list_model->Load($this->options['listing_id']);
		return $this->list_model;
	}

}