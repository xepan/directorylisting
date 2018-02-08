<?php

namespace xepan\listing;

class Tool_ListDetail extends \xepan\cms\View_Tool{
	public $options = [
					'template'=>'tree',
					'show_image'=>true
				];
	
	function init(){
		parent::init();

		$this->add('View')->set('list detail tool');
	}

}