<?php

namespace xepan\listing;

class Initiator extends \Controller_Addon {
	
	public $addon_name = 'xepan_listing';

	function setup_admin(){

		$this->routePages('xepan_listing');
		$this->addLocation(array('template'=>'templates','js'=>'templates/js'))
			->setBaseURL('../vendor/xepan/listing/');

		$this->app->listing_menu = $this->app->top_menu->addMenu('Listing');
		$this->app->listing_menu->addItem(['Listing Category','icon'=>' fa fa-sitemap'],'xepan_listing_category');//->setAttr(['title'=>'Blogs']);
		$this->app->listing_menu->addItem(['Listing List','icon'=>' fa fa-file-text-o'],'xepan_listing_list');//->setAttr(['title'=>'Blogs']);
		$this->app->listing_menu->addItem(['Listing Fields','icon'=>' fa fa-file-text-o'],'xepan_listing_field');//->setAttr(['title'=>'Blogs']);
		
		return $this;

	}

	function setup_pre_frontend(){

	}

	function setup_frontend(){
		$this->routePages('xepan_listing');
		$this->addLocation(array('template'=>'templates','js'=>'templates/js','css'=>'templates/css'))
		->setBaseURL('./vendor/xepan/listing/');

		 $this->app->exportFrontEndTool('xepan\listing\Tool_Category','Listing');
		 $this->app->exportFrontEndTool('xepan\listing\Tool_List','Listing');
		 $this->app->exportFrontEndTool('xepan\listing\Tool_Filter','Listing');
		 $this->app->exportFrontEndTool('xepan\listing\Tool_ListDetail','Listing');
		 $this->app->exportFrontEndTool('xepan\listing\Tool_ListImage','Listing');
		 $this->app->exportFrontEndTool('xepan\listing\Tool_ManageListData','Listing');

		return $this;
	}

}
