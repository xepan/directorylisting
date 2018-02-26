<?php
 
namespace xepan\listing;

class page_filter extends \xepan\base\Page {
	public $title='Listing Filters';

	function init(){
		parent::init();

		$list_id = $this->app->stickyGET('list_id');

		$model = $this->add('xepan\listing\Model_Filter');
		$model->addCondition('list_id',$list_id);
		
		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($model);
		$crud->grid->addPaginator(10);
	}
}

