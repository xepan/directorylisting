<?php
 
namespace xepan\listing;

class page_listdatadownload extends \Page {

	function init(){
		parent::init();

		$listing_id = $this->app->stickyGET('listing_id');
		$list_data_id = $this->app->stickyGET('list_data_id');

		// for print document
		$include_related_contact = $this->app->stickyGET('related_contact')?:0;
		$action = $this->app->stickyGET('action');
		$related_list_data_print_layout = null;

		$list_model = $this->add('xepan\listing\Model_List')->load($listing_id);
		$layout = $list_model['list_data_download_layout'];

		if(isset($action) AND $action == "print"){
			$layout = $list_model['list_data_print_layout'];
			
			if($include_related_contact)
				$related_list_data_print_layout = $list_model['related_list_data_print_layout'];
		}

		$pdf_action = "dump";

		$data_model = $list_model->getDataModel()->load($list_data_id);
		$pdf = $data_model->generatePDF($pdf_action,$layout,$include_related_contact,$related_list_data_print_layout);

		header("Content-type: application/pdf");
		header("Content-disposition: attachment ; filename=\"" .'Data_Record_of_'.$list_data_id. ".pdf\"");
		header("Content-Length: " . strlen($pdf));
        // print $pdf;
        exit;
	}
}

