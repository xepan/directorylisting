<?php

namespace xepan\listing;

class Tool_List extends \xepan\cms\View_Tool{
	public $options = [
				'listing_id'=>0,
				'show_data_list'=>'all', //all, new, mostviewed,featured
				'show_add_button'=>true, // true, false
				'show_edit_button'=>true, // true, false
				'show_delete_button'=>true, // true, false
				'show_quick_search'=>true,
				'show_public_fields'=>true, // true, false
				'show_private_fields'=>'onLogin', //0,always,onLogin
				'show_premium_fields'=>'onPremiumUser', //0,always,onLogin, onPremiumUser
				'show_mark_favourite_button'=>true, // true, false
				'status_to_show'=>null, //comma seperated multiple values
				'is_filter_affected'=>true, // true, false
				'list_of_categories'=>null, // comma seperated multiple values
				'display_sequence'=>'desc', //either desc or asc
				'show_detail_button'=>true, // true, false
				'custom_template'=>'', // define your custom templates
				// 'field_redirect_to_list_detail'=>null, //comma seperated multiple fields
			];
	
	function init(){
		parent::init();

		if($this->owner instanceof \AbstractController) return;

		if($message = $this->requiredOptionMessage()){
			$this->add('View_Warning')->addClass('alert alert-warning')->set($message);
			return;
		}

		$this->listing_model = $this->add('xepan\listing\Model_List');
		$this->listing_model->load($this->options['listing_id']);
		
		$this->listdata_model = $listdata_model = $this->add('xepan\listing\Model_ListData',['listing'=>$this->options['listing_id']]);

		$fields = $this->getDisplayFields();

		if($template = $this->getCustomTemplatePath()){
			$this->lister = $crud = $this->add('xepan\base\CRUD',['allow_add'=>$this->options['show_add_button'],'allow_edit'=>$this->options['show_edit_button'],'allow_del'=>$this->options['show_delete_button'],'grid_options'=>['add_sno'=>false]],null,['view/tool/listing/'.$this->options['custom_template']]);
		}else{
			if($this->options['custom_template'])
				$this->add('View')->set('List Template not found at : '.$this->getTemplateBasePath())->addClass('alert alert-info');
			$this->lister = $crud = $this->add('xepan\base\CRUD',['allow_add'=>$this->options['show_add_button'],'allow_edit'=>$this->options['show_edit_button'],'allow_del'=>$this->options['show_delete_button'],'grid_options'=>['add_sno'=>false]]);
		}
		
		$crud->setModel($listdata_model,array_keys($fields));

		$crud->add('xepan\cms\Controller_Tool_Optionhelper',['options'=>$this->options,'model'=>$listdata_model]);
	}

	function getTemplate(){
		return $this->lister->grid->template;
	}

	function getTemplateBasePath(){
		return $path = getcwd()."/websites/".$this->app->current_website_name."/www/view/tool/listing/".$this->options['custom_template'].".html";
	}

	function getCustomTemplatePath(){
		if($this->options['custom_template']){
			$path = getcwd()."/websites/".$this->app->current_website_name."/www/view/tool/listing/".$this->options['custom_template'].".html";
			if(file_exists($path)){
				return $path;
			}
			return 0;
		}
	}

	function getDisplayFields(){
		$fields = $this->listdata_model->predefined_fields;

		// get public fields
		$public_fields = [];
		if($this->options['show_public_fields']){
			$public_fields = $this->listdata_model->public_fields;
		}
		$fields = array_merge($fields,$public_fields);

		// get private fields
		$private_fields = [];
		if($this->options['show_private_fields']){
			$private_fields = $this->listdata_model->private_fields;
			
			if($this->options['show_private_fields'] == "onLogin" && !$this->app->auth->model->loaded())
				$private_fields = [];
		}
		$fields = array_merge($fields,$private_fields);

		// get premium fields
		$premium_fields = [];
		if($value = $this->options['show_premium_fields']){
			$premium_fields = $this->listdata_model->premium_fields;

			if($value == "onLogin" && !$this->app->auth->model->loaded())
				$premium_fields = [];
			if($value == "onPremiumUser"){
				if(!$this->add('xepan\listing\Model_Customer')->isPremiumUser())
					$premium_fields = [];
			}
		}
		$fields = array_merge($fields,$premium_fields);
		return $fields;
	}

	function addToolCondition_show_quick_search($value,$model){
		if($value){			
			$this->lister->grid->addQuickSearch($this->listdata_model->filterable_fields);
		}else{
			$this->lister->grid->template->tryDel('quick_search_wrapper');
		}
	}

	function addToolCondition_show_data_list($value,$model){		
		// switch ($value) {
		// 	case 'new':
		// 		$model->addCondition('is_new',true);
		// 		break;
		// 	case 'mostviewed':
		// 		$model->addCondition('is_mostviewed',true);
		// 		break;
		// 	case 'featured':
		// 		$model->addCondition('is_feature',true);
		// 		break;
		// }
	}

	function addToolCondition_show_public_fields($value,$model){
		$this->lister->allow_add = false;
	}

	function addToolCondition_show_mark_favourite_button($value,$model){
		if(!$value) return;

		$btn = $this->lister->grid->addColumn('Button','favourite');
		// $btn->js('click')->univ()->alert('TODO');
	}

	function addToolCondition_status_to_show($value,$model){
		if(!$value) return;
		
		$model->addCondition('status',explode(",", $value));
	}

	function requiredOptionMessage(){
		if(!$this->options['listing_id']) return "please select listing ...";
		
		return false;		
	}

	// function getTemplate(){
	// 	return $this->lister->template;
	// }

	function getTemplateFile(){
		return $this->lister->template->origin_filename;
	}

}