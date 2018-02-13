<?php

namespace xepan\listing;

class Tool_ListDetail extends \xepan\cms\View_Tool{
	public $options = [
					'show_public_fields'=>true,
					'show_private_fields'=>true,
					'show_protected_fields'=>true,
					'allow_private_message'=>true,
					'allow_review'=>true,
					'rating'=>true,
					'Social_share'=>fase,
				];
	
	function init(){
		parent::init();

		$this->add('View')->set('list detail tool');
	}

}