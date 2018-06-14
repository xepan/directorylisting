<?php
 
namespace xepan\listing;

class page_listdatadownload extends \Page {

	function init(){
		parent::init();

		ini_set("memory_limit", "-1");
   		set_time_limit(0);

		$listing_id = $this->app->stickyGET('listing_id');
		$list_data_id = $this->app->stickyGET('list_data_id');
		// for print document
		$include_related_contact = $this->app->stickyGET('related_contact')?:0;
		$action = $this->app->stickyGET('action');
		// for all data layout 
		$all_record = $this->app->stickyGET('all_record');
		// apply data set condtion to all record
		$data_set_id = $this->app->stickyGET('data_set_id');
		

		$related_list_data_print_layout = null;

		$list_model = $this->add('xepan\listing\Model_List')->load($listing_id);
		$layout = $list_model['list_data_download_layout'];

		if(isset($action) AND ($action == "print" || $action== "html")){
			$layout = $list_model['list_data_print_layout'];
			
			if($include_related_contact)
				$related_list_data_print_layout = $list_model['related_list_data_print_layout'];
		}

		$pdf_action = "dump";

		$data_model = $list_model->getDataModel();

		// apply data set condition
		if($data_set_id){
			$conditions = $this->add('xepan\listing\Model_ListDataSetCondition')
						->addCondition('list_data_set_id',$data_set_id);
			foreach ($conditions as $condition) {
				$field_db_name = $condition->ref('filter_effected_field_id')
									->dbColumnName();

				$value = $condition['value'];
				if($condition['operator'] == "in"){
					$value = explode(",", $value);
				}

				$operator = $condition['operator'];
				if($condition['operator'] == "contains"){
					$value = "%$value%";
					$operator = "like";
				}
				
				$data_model->addCondition($field_db_name,$operator,$value);
			}
		}

		if(!$all_record AND $list_data_id){
			$data_model->load($list_data_id);
		}
		
		if($all_record){
			$html = "";
			foreach ($data_model as $data) {
				$html .= $data->generatePDF($pdf_action,$layout,$include_related_contact,$related_list_data_print_layout,$return_html_only=true);
			}
		}else{

			$pdf = $data_model->generatePDF($pdf_action,$layout,$include_related_contact,$related_list_data_print_layout);
			header("Content-type: application/pdf");
			header("Content-disposition: attachment ; filename=\"" .'Data_Record_of_'.$list_data_id. ".pdf\"");
			header("Content-Length: " . strlen($pdf));
        	// print $pdf;
		}
		
		echo $html;
        exit;
	}
}

