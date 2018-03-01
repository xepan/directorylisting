<?php

namespace xepan\listing;

class Tool_List extends \xepan\cms\View_Tool{
	public $options = [
				'listing_id'=>0,
				'list_data_set_id'=>null,
				'show_data_list'=>'all', //all, new, mostviewed,featured
				'show_add_button'=>true, // true, false
				'show_edit_button'=>true, // true, false
				'show_delete_button'=>true, // true, false
				'show_quick_search'=>true,
				'show_public_fields'=>true, // true, false
				'show_private_fields'=>'onLogin', //0,always,onLogin
				'show_premium_fields'=>'onPremiumUser', //0,always,onLogin, onPremiumUser
				'show_mark_favourite_button'=>true, // true, false
				'show_list_data_created_by_login_user'=>false,
				'status_to_show'=>null, //comma seperated multiple values
				'is_filter_affected'=>true, // true, false
				'list_of_categories'=>null, // comma seperated multiple values
				'display_sequence'=>'lifo', //either fifo, alphabetasc, alphabetdesc
				'show_detail_button'=>true, // true, false
				'custom_template'=>'', // define your custom templates
				'listing_add_edit_form_layout'=>0,
				'listing_add_allow_category_selection'=>false,
				'download_button_selector'=>'.do-action-download',
				'list_detail_page'=>null,
				'show_detail_if_permitted'=>false
			];
	
	function init(){
		parent::init();

		if($this->owner instanceof \AbstractController) return;

		$this->js('reload')->reload();

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

		if($this->options['is_filter_affected']){
			$this->applyFilters();
		}
		
		if($this->options['list_data_set_id']){
			$this->applyListDataSetCondition();
		}

		if($this->options['show_list_data_created_by_login_user']){
			$contact = $this->add('xepan\base\Model_Contact')
						->addCondition('user_id',$this->app->auth->model->id)
						->tryLoadAny();
			$listdata_model->addCondition('created_by_id',$contact->id);
		}
		
		if($crud->isEditing() AND $this->options['listing_add_edit_form_layout']){
			$crud->form->add('xepan\base\Controller_FLC')
				->addContentSpot()
				->layout($this->listing_model->getLayoutArray($this->options['listing_add_edit_form_layout']));
		}

		// category condition
		if($this->options['list_of_categories']){
			$cat_j = $this->listdata_model->leftJoin('listing_category_list_data_association.list_data_id');
			$cat_j->addField('list_id');
			$cat_j->addField('list_category_id');

			$this->listdata_model->addCondition('list_category_id',explode(",", $this->options['list_of_categories']));
			$this->listdata_model->addCondition('list_id',$this->listing_model->id);
		}

		if($crud->isEditing() && $this->options['listing_add_allow_category_selection']){
			$f = $crud->form->addField('DropDown','categories');
			$f->setModel($this->listing_model->ref('xepan\listing\Category'));
			$f->setAttr('multiple');
			$crud->addHook('formSubmit',function($c,$cf){
				$cf->model->set($cf->getAllFields());
				$cf->model->save();

				$cf->model->associateWithCategories(explode(",", $cf['categories']));
				return true; // do not proceed with default crud form submit behaviour
			});
		}

		if($this->options['display_sequence']){
			$order = 'desc';
			if($this->options['display_sequence'] == 'fifo')
				$order = "asc";

			$listdata_model->setOrder('id',$order);
		}

		$crud->setModel($listdata_model,array_keys($fields));

		if($crud->isEditing('edit')){
			$crud->form->getElement('categories')->set($crud->form->model->getAssociatedCategories());
		}

		// add download button
		if($this->options['custom_template'] AND $selector = trim($this->options['download_button_selector'])){
			$this->on('click',$selector,function($js,$data){
				$id = $data['list-data-id'];
				if($this->options['show_detail_if_permitted']){
					$data_model = $this->listing_model->getDataModel()->load($id);
					if(!$data_model->isPermitted())
						$this->app->js(true)->univ()->errorMessage('you are not permitted to view this record')->execute();
				}

				$this->app->js(true)->univ()->newWindow($this->app->url('xepan_listing_listdatadownload',['listing_id'=>$this->options['listing_id'],'list_data_id'=>$id]),'DownloadListData')->execute();
			});
		}elseif(!$this->options['custom_template'] AND trim($this->options['download_button_selector'])){
			$download_btn = $crud->grid->addColumn('Button','download');
			if($id = $_GET['download']){
				if($this->options['show_detail_if_permitted']){
					$data_model = $this->listing_model->getDataModel()->load($id);
					if(!$data_model->isPermitted())
						$this->app->js(true)->univ()->errorMessage('you are not permitted to view this record')->execute();
				}
				$this->app->js(true)->univ()->newWindow($this->app->url('xepan_listing_listdatadownload',['listing_id'=>$this->options['listing_id'],'list_data_id'=>$id]),'DownloadListData')->execute();
			}
		}

		// detail page
		if($detail_page = $this->options['list_detail_page'] AND !trim($this->options['custom_template'])){
			$crud->grid->addColumn('Button','detail');
			if($id = $_GET['detail']){
				if($this->options['show_detail_if_permitted']){
					$data_model = $this->listing_model->getDataModel()->load($id);
					if(!$data_model->isPermitted())
						$this->app->js(true)->univ()->errorMessage('you are not permitted to view this record')->execute();
				}
				$this->app->js(true)->univ()->redirect($this->app->url($detail_page,['list_data_id'=>$id]))->execute();
			}	
		}

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
		if($this->lister->isEditing()){
			return;
		}
		if($value){			
			$this->lister->grid->addQuickSearch($this->listdata_model->filterable_fields);
		}else{
			$this->lister->grid->template->tryDel('quick_search_wrapper');
		}
	}

	function addToolCondition_row_list_detail_page($value, $l){
		// $config = $this->add('xepan\base\Model_ConfigJsonModel',
		  //           [
		  //               'fields'=>[
		  //                           'enable_sef'=>'checkbox'
		  //                       ],
		  //                   'config_key'=>'SEF_Enable',
		  //                   'application'=>'cms'
		  //       ]);
		  //       $config->tryLoadAny();
		$l->current_row['list_detail_page_url'] = $this->app->url($this->options['list_detail_page'],['list_data_id'=>$l->model->id]);
		
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

	function applyFilters(){
		$existing_filter_data = $this->app->recall('listing_fiter_data',[]);
		if(isset($existing_filter_data[$this->listing_model->id])){
			$my_existing_data = $existing_filter_data[$this->listing_model->id];
			foreach ($my_existing_data as $condition) {
				$value = $condition['value'];
				if($condition['operator'] == "in"){
					$value = explode(",", $value);
				}

				$operator = $condition['operator'];
				if($condition['operator'] == "contains"){
					$value = "%$value%";
					$operator = "like";
				}

				$this->listdata_model->addCondition($condition['filter_effected_field'],$operator,$value);
			}
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
	// function getTemplate(){
	// 	return $this->lister->template;
	// }

	function getTemplateFile(){
		return $this->lister->template->origin_filename;
	}

}