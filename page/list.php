<?php
 
namespace xepan\listing;

class page_list extends \xepan\base\Page {
	public $title='Listing List';

	function init(){
		parent::init();

		$listing_list_model = $this->add('xepan\listing\Model_List');
		// $listing_list_model->add('xepan\listing\Controller_SideBarStatusFilter');

		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($listing_list_model);
		$crud->grid->addQuickSearch(['name']);
		// $crud->grid->addPaginator(10);
	}
}

