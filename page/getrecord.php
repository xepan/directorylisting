<?php
 
namespace xepan\listing;

class page_getrecord extends \Page {

	function page_list(){

		$lists = $this->add('xepan\listing\Model_List')
				->addCondition('status','Active');
		
		$option = "<option value='0'>Please Select </option>";
		foreach ($lists as $list) {
			$option .= "<option value='".$list['id']."'>".$list['name']."</option>";
		}
		echo $option;
		exit;
	}

	function page_listlayout(){

		$lists = $this->add('xepan\listing\Model_ListDataFormLayout')
				->addCondition('list_id',$_GET['list_id']);
		
		$option = "<option value='0'>Please Select </option>";
		foreach ($lists as $list) {
			$option .= "<option value='".$list['id']."'>".$list['name']."</option>";
		}
		echo $option;
		exit;
	}
}

