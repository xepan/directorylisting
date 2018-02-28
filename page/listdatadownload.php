<?php
 
namespace xepan\listing;

class page_listdatadownload extends \Page {

	function init(){
		parent::init();

		$listing_id = $this->app->stickyGET('listing_id');
		$list_data_id = $this->app->stickyGET('list_data_id');

		$list_model = $this->add('xepan\listing\Model_List')->load($listing_id);
		$layout = $list_model['list_data_download_layout'];
		$data_model = $list_model->getDataModel()->load($list_data_id);

		$pdf = $data_model->generatePDF('dump',$layout);
        header("Content-type: application/pdf");
        header("Content-disposition: attachment ; filename=\"" .'Data_Record_of_'.$list_data_id. ".pdf\"");
        header("Content-Length: " . strlen($pdf));
        
        print $pdf;
        exit;
	}
}

