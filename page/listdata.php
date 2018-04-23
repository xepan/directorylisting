<?php
 
namespace xepan\listing;

class page_listdata extends \xepan\base\Page {
	public $title='List Data';

	public $list_id; // list id 
	public $list_data_model; // list data model

	function init(){
		parent::init();
		
		$this->list_id = $list_id =  $this->app->stickyGET('listid');
		$this->list_data_model = $m = $this->add('xepan\listing\Model_ListData',['listing'=>$list_id]);

		$crud = $this->add('xepan\hr\CRUD',['grid_options'=>['fixed_header'=>false]]);
		if($crud->isEditing()){
			$f = $crud->form->addField('DropDown','categories');
			$f->setModel($m->listModel()->ref('xepan\listing\Category'));
			$f->setAttr('multiple');
			$crud->addHook('formSubmit',function($c,$cf){
				$cf->model->set($cf->getAllFields());
				$cf->model->save();
				$cf->model->associateWithCategories(explode(",", $cf['categories']));
				return true; // do not proceed with default crud form submit behaviour
			});
		}
		
		$crud->setModel($m);

		if($crud->isEditing('edit')){
			$crud->form->getElement('categories')->set($crud->form->model->getAssociatedCategories());
		}else{
			// crud is editing is not 
			if($crud->grid->template)
				$crud->grid->template->trySet('grid_table_class','table-responsive overflow-auto');
		}

		// if($crud->grid->template)

		$order = $crud->grid->addOrder();
		$order->move('action','first');
		$order->now();

		$print_btn = $crud->grid->addButton('Print All Record')->addClass('btn btn-warning');
		$print_btn->add('VirtualPage')
		->bindEvent('Print all Record','click')
		->set(function($page){

			$data_set_model = $this->add('xepan\listing\Model_ListDataSet');
			$data_set_model->addCondition('list_id',$this->list_id);

			$form = $page->add('Form');
			$data_set_field = $form->addField('DropDown','data_set_condition');
			$data_set_field->setModel($data_set_model);
			$data_set_field->setEmptyText('Please Select Data Set Condition');
			$form->addField('checkbox','include_related_contact');

			$form->addSubmit('Go');

			if($form->isSubmitted()){
				$this->app->js(true)->univ()
					->newWindow(
					$this->app->url('xepan_listing_listdatadownload',
									[
										'listing_id'=>$this->list_id,
										'related_contact'=>$form['include_related_contact'],
										'action'=>'html',
										'all_record'=>1,
										'data_set_id'=>$form['data_set_condition']
									]),
					'PrintAllListData'
				)->execute();
			}
		});


		// apply filter data
		$filter_form = $crud->grid->addQuickSearch(['radius_username','plan']);
		$filter_form->getElement('q')->setAttr('style','display:none;');

		$filter_form->addClass('atk-form atk-form-stacked atk-form-compact atk-move-right');
        if($filter_form->template){
	        $filter_form->template->trySet('fieldset', 'atk-row');
	        $filter_form->template->tryDel('button_row');
        }

		$data_set_model = $this->add('xepan\listing\Model_ListDataSet');
		$data_set_model->addCondition('list_id',$this->list_id);

		$condition_filter_field = $filter_form->addField('DropDown','data_set_condition');
		$condition_filter_field->setModel($data_set_model);
		$condition_filter_field->setEmptyText('Select Filter');

		$filter_form->addHook('applyFilter',function($f,$m){
			if($f['data_set_condition']){
				$conditions = $this->add('xepan\listing\Model_ListDataSetCondition')
						->addCondition('list_data_set_id',$f['data_set_condition']);

				foreach ($conditions as $condition) {
					$field_db_name = $condition->ref('filter_effected_field_id')
										->dbColumnName();

					$value = $condition['value'];
					if($condition['operator'] == "in"){
						$value = explode(",", $value);
					}

					$operator = $condition['operator'];
					if($condition['operator'] == "contains"){
						$value = "%$value%";
						$operator = "like";
					}
					$m->addCondition($field_db_name,$operator,$value);
				}
			}
		});

		$condition_filter_field->js('change',$filter_form->js()->submit());
	}
}

