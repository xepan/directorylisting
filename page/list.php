<?php
 
namespace xepan\listing;

class page_list extends \xepan\base\Page {
	public $title='Listing List';

	function init(){
		parent::init();

		$listing_list_model = $this->add('xepan\listing\Model_List');
		// $listing_list_model->add('xepan\listing\Controller_SideBarStatusFilter');

		$crud = $this->add('xepan\hr\CRUD');
		$form = $crud->form;
        $form->add('xepan\base\Controller_FLC')
        ->showLables(true)
        ->addContentSpot()
        // ->makePanelsCoppalsible(true)
        ->layout([
                'name'=>'List Details~c1~6',
                'status'=>'c2~6',

            ]);

		$crud->setModel($listing_list_model,['name','list_data_status','status']);
		$crud->grid->addQuickSearch(['name']);
		// $crud->grid->addPaginator(10);

		
	}
}

