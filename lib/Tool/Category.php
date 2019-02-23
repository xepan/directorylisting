<?php

namespace xepan\listing;

class Tool_Category extends \xepan\cms\View_Tool{
	public $options = [
					'template'=>'grid',
					'show_image'=>true,
					'sorting_order'=>'desc',
					'submenu_class'=>'submenu',
					'submenu_icon_class'=>'fa fa-chevron-down',
					'detail_page'=>''
				];
	
	function init(){
		parent::init();

		if($this->owner instanceof \AbstractController) return;		
		
		$this->cl = $cl = $this->add('xepan\listing\View_CategoryLister',['options'=>$this->options]);
	}

	function getTemplate(){

		return $this->cl->template;
	}
}