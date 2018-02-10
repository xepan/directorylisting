<?php
 
namespace xepan\listing;

class page_category extends \xepan\base\Page {
	public $title='Listing List Categories';

	function init(){
		parent::init();

		$listing_category_model = $this->add('xepan\listing\Model_Category');

		$crud = $this->add('xepan\hr\CRUD');
		$form = $crud->form;
        $form->add('xepan\base\Controller_FLC')
        ->showLables(true)
        ->addContentSpot()
        // ->makePanelsCoppalsible(true)
        ->layout([
                'parent_category_id~Parent Category'=>'Category Details~c1~6',
                'list_id~List'=>'c2~6',
                'name'=>'c3~6',
                'display_sequence'=>'c4~6',
                'description'=>'c5~12',
                'custom_link'=>'c6~6',
                'meta_title'=>'c7~6',
                'meta_description'=>'c8~6',
                'slug_url'=>'c9~6',
                'image'=>'c10~6',
                'status'=>'c11~6',


            ]);
		$crud->setModel($listing_category_model);
		$crud->grid->addQuickSearch(['name']);
		// $crud->grid->addPaginator(10);
		
		// $listing_category_model->add('xepan\listing\Controller_SideBarStatusFilter');
	}
}

