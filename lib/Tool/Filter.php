<?php

namespace xepan\listing;

class Tool_Filter extends \xepan\cms\View_Tool{
	public $options = [
					'template'=>'tree',
					'show_image'=>true
				];
	
	function init(){
		parent::init();

		$this->add('View')->set('filter tool');
	}

}