<?php

namespace xepan\listing;

class Tool_Category extends \xepan\cms\View_Tool{
	public $options = [
					];

	function init(){
		parent::init();

		$this->add('View')->set('category tool');
	}

}