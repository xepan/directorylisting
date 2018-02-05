<?php
 
namespace xepan\listing;

class page_category extends \xepan\base\Page {
	public $title='Listing List Categories';

	function init(){
		parent::init();

		$listing_category_model = $this->add('xepan\listing\Model_ListCategory');

		$crud = $this->add('xepan\hr\CRUD');
		$crud->setModel($listing_category_model);
		$crud->grid->addQuickSearch(['name']);
		// $crud->grid->addPaginator(10);
		
		// $listing_category_model->add('xepan\listing\Controller_SideBarStatusFilter');
	}
}

