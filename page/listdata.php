<?php
 
namespace xepan\listing;

class page_listdata extends \xepan\base\Page {
	public $title='List Data';

	function init(){
		parent::init();

		$list_id =  $this->app->stickyGET('listid');		
		$m = $this->add('xepan\listing\Model_ListData',['listing'=>$list_id]);
		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($m);
	}
}

