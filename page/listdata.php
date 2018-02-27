<?php
 
namespace xepan\listing;

class page_listdata extends \xepan\base\Page {
	public $title='List Data';

	function init(){
		parent::init();

		$list_id =  $this->app->stickyGET('listid');		
		$m = $this->add('xepan\listing\Model_ListData',['listing'=>$list_id]);

		$crud = $this->add('xepan\hr\CRUD');
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
		}
	}
}

