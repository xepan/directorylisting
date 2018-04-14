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
		// for all data layout 
		$all_record = $this->app->stickyGET('all_record');

		$related_list_data_print_layout = null;

		$list_model = $this->add('xepan\listing\Model_List')->load($listing_id);
		$layout = $list_model['list_data_download_layout'];

		if(isset($action) AND $action == "print"){
			$layout = $list_model['list_data_print_layout'];
			
			if($include_related_contact)
				$related_list_data_print_layout = $list_model['related_list_data_print_layout'];
		}

		$pdf_action = "dump";


		$data_model = $list_model->getDataModel();
		if(!$all_record AND $list_data_id){
			$data_model->load($list_data_id);
		}

		if($all_record){
			// $data_model->addCondition('id',$data_model->getElement('created_by_id'));
			$html = "";
			foreach ($data_model as $data_model) {
				$html .= $data_model->generatePDF($pdf_action,$layout,$include_related_contact,$related_list_data_print_layout,$return_html_only=true);
			}
			echo $html;
		}else{
			$pdf = $data_model->generatePDF($pdf_action,$layout,$include_related_contact,$related_list_data_print_layout);
			header("Content-type: application/pdf");
			header("Content-disposition: attachment ; filename=\"" .'Data_Record_of_'.$list_data_id. ".pdf\"");
			header("Content-Length: " . strlen($pdf));
        	// print $pdf;
		}
		

        exit;
	}
}

