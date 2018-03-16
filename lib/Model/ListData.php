<?php

namespace xepan\listing;

class Model_ListData extends \xepan\base\Model_Table{
	public $listing;
	public $acl_type = "listing\listdata";

	public $validation_array=[];
	
	public $public_fields = [];
	public $private_fields = [];
	public $premium_fields = [];
	public $filterable_fields = [];
	public $changable_fields = [];
	public $moderate_fields = [];
	public $actions = [];
	public $status = [];

	public $predefined_fields = [
			'created_by_id'=>'created_by_id',
			'created_by'=>'created_by',
			'created_at'=>'created_at',
			'updated_at'=>'updated_at',
			'status'=>'status'
		];
	function init(){

		if(is_numeric($this->listing)){
			$this->listing = $this->add('xepan\listing\Model_List')->load($this->listing);
		}elseif(is_string($this->listing)){
			$this->listing = $this->add('xepan\listing\Model_List')->loadBy('name',$this->listing);
		}else{
			// throw new \Exception("list must defined");
		}

		$this->acl_type = $this->table = $this->listing->getTableName();

		$this->status = $status = explode(",",$this->listing['list_data_status']);
		// actions
		foreach ($status as $key => $value) {
			$this->actions[$value] = ['view','change_status','execute_action','edit','delete'];
		}
		
		parent::init();

		$validation_array = [];

		foreach ($this->listing->fields() as $field) {
				
			if($field['field_type'] == "Captcha") continue;

			$field_db_column_name = $field->dbColumnName();

			if($field['field_type'] == "Upload"){
				$f = $this->add('xepan\filestore\Field_File',$field_db_column_name);
			}elseif($field['field_type'] == "Expression"){
				$f= $this->addExpression($field_db_column_name)->set($field['default_value']);
			}else{
				$f = $this->addField($field_db_column_name);
				$f->type($field->modelFieldType());
			}

			$f->caption($field['name']);
			$f->hint($field['hint']);

			if(in_array($field['field_type'], ['DropDown','radio']) && $values = $field['default_value']){
				$f->enum(explode(",", $values));
			}

			if($field['is_mandatory']){
				$validation_array[] = [$field_db_column_name."|required"];
			}

			if($field['is_public']) {
				$this->public_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->public_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
			if($field['is_private']) {
				$this->private_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->private_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
			if($field['is_premium']) {
				$this->premium_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->premium_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}	
			}
			if($field['is_filterable']) {
				$this->filterable_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->filterable_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
			if($field['is_changable']) {
				$this->changable_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->changable_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
			if($field['is_moderate']) {
				$this->moderate_fields[$field_db_column_name] = $field['name'];
				if(strpos($field_db_column_name, "_id") !==false){
					$this->moderate_fields[str_replace("_id", '', $field_db_column_name)] = $field['name'];
				}
			}
		}

		// predefined fields
		$this->hasOne('xepan\base\Contact','created_by_id');
		$this->addField('created_at')->type('datetime')->defaultValue($this->app->now);
		$this->addField('updated_at')->type('datetime')->defaultValue($this->app->now);
		$this->addField('status');

		// setting up status dropdown to status field
		$ts = explode(",",$this->listing['list_data_status']);
		$this->getElement('status')->enum(array_combine($ts,$ts))->defaultValue($ts[0]);
		
		$this->addHook('beforeSave',[$this,"executeStatusActivity"]);
	}

	function executeStatusActivity(){
		if($this->isDirty('status'))
			$this->shootStatusAction($this['status']);
	}

	function page_change_status($page){
		$ts = explode(",",$this->listing['list_data_status']);

		$form = $page->add('Form');
		$form->addField('DropDown','status')
			->setValueList(array_combine($ts,$ts))
			->set($this['status']);

		$form->addSubmit('Update');
		if($form->isSubmitted()){
			$this['status'] = $form['status'];
			$this->save();
			return true;
		}

	}

	// ACL will call it and listing must be passed again to be exact same newInsatnce of current model
	function newInstance($properties = null)
    {
        return $this->owner->add(get_class($this), ['listing'=>$this->listing]);
    }

    function getAssociatedCategories(){
    	
    	$asso = $this->add('xepan\listing\Model_Association_ListDataCategory');
		$asso->addCondition('list_id',$this->listing->id);
		$asso->addCondition('list_data_id',$this->id);
		$x= array_column($asso->getRows(),'list_category_id');
		if($x[0]===null) unset($x[0]);
		return $x;
    }

	function associateWithCategories($category_ids,$remove_all_first=true){
		if($remove_all_first){
			$asso = $this->add('xepan\listing\Model_Association_ListDataCategory');
			$asso->addCondition('list_id',$this->listing->id);
			$asso->addCondition('list_data_id',$this->id);
			$asso->deleteAll();
		}

		foreach ($category_ids as $cat_id) {
			$asso = $this->add('xepan\listing\Model_Association_ListDataCategory');
			$asso['list_id'] = $this->listing->id;
			$asso['list_data_id'] = $this->id;
			$asso['list_category_id'] = $cat_id;
			$asso->save();
		}
	}

	function page_execute_action($page){
		$ts = explode(",",$this->listing['list_data_status']);

		$form = $page->add('Form');
		$form->addField('DropDown','status')
			->setValueList(array_combine($ts,$ts))
			->set($this['status']);

		$form->addSubmit('Update');
		if($form->isSubmitted()){
			$this->shootStatusAction($form['status']);
			return true;
		}
	}

	function shootStatusAction($status=null){
		if(!$status) $status=$this['status'];
		$actions  = $this->add('xepan\listing\Model_ListingStatusActivity');
		$actions->addCondition('list_id',$this->listing->id);
		$actions->addCondition('on_status',$status);
		$actions->addCondition('status','Active');

		foreach ($actions as $act) {
			$creator = $this->ref('created_by_id');
			$email_array = [];
			$phone_array = [];
			if($act['email_send_to_creator'] && $creator->loaded()) $email_array = array_merge($email_array,explode("<br/>", $creator['emails_str']));
			if($act['sms_send_to_creator'] && $creator->loaded()) $phone_array = array_merge($phone_array,explode("<br/>", $creator['contacts_str']));

			foreach (explode(",", $act['email_send_to_list_data_fields']) as $f) {
				if(filter_var($this[$f], FILTER_VALIDATE_EMAIL)) $email_array[] = $this[$f];
			}

			foreach (explode(",", $act['sms_send_to_list_data_fields']) as $f) {
				$phone_array[] = $this[$f];
			}

			$email_array = array_merge($email_array,explode(",", $act['email_send_to_custom_email_ids']));
			$phone_array = array_merge($phone_array,explode(",", $act['sms_send_to_custom_phone_numbers']));

			$data_array = [];

			if($creator->loaded()){
				foreach ($creator->getActualFields() as $f) {
					$data_array['creator_'.$f]=$creator[$f];
				}
			}

			$data_array = array_merge($data_array,$this->data);

			if(count($email_array)){

				$email_settings = $this->add('xepan\communication\Model_Communication_DefaultEmailSetting')->tryLoadAny();
				$mail = $this->add('xepan\communication\Model_Communication_Email');

				$email_subject = $act['email_subject'];
				$email_body = $act['email_body'];
				
				$temp = $this->add('GiTemplate');
				$temp->loadTemplateFromString($email_body);

				$subject_temp = $this->add('GiTemplate');
				$subject_temp->loadTemplateFromString($email_subject);
				$subject_v=$this->add('View',null,null,$subject_temp);
				$subject_v->template->trySet($data_array);

				$temp = $this->add('GiTemplate');
				$temp->loadTemplateFromString($email_body);
				$body_v=$this->add('View',null,null,$temp);
				$body_v->template->trySet($data_array);					

				$mail->setfrom($email_settings['from_email'],$email_settings['from_name']);

				foreach ($email_array as $email_id) {
					$mail->addTo($email_id);
				}
				$mail->setSubject($subject_v->getHtml());
				$mail->setBody($body_v->getHtml());
				$mail->send($email_settings);
			}

			if(count($phone_array) && trim($act['sms_content'])){
				$temp = $this->add('GiTemplate');
				$temp->loadTemplateFromString(trim($act['sms_content']));
				$msg = $this->add('View',null,null,$temp);
				$msg->template->trySet($data_array);
				foreach ($phone_array as $number) {
					$this->add('xepan\communication\Controller_Sms')->sendMessage($number,$msg->getHtml());
				}
			}
		}
	}

	function listModel(){
		return $this->listing;
	}


	function generatePDF($action = "return",$layout=null){

		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('xEpan ERP');
		$pdf->SetTitle($this->listing['name']."_".$this['id']);
		$pdf->SetSubject($this->listing['name']."_".$this['id']);
		$pdf->SetKeywords($this->listing['name']."_".$this['id']);

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		// set font
		$pdf->SetFont('dejavusans', '', 10);
		//remove header or footer hr lines
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		// add a page
		$pdf->AddPage();

		$template = $this->add('GiTemplate');
		$template->loadTemplateFromString($layout);
		
		$view = $this->add('View',null,null,$template);
		$view->template->trySet($this->data);
		$html = $view->getHTML();
		$pdf->writeHTML($html, false, false, true, false, '');
		// set default form properties
		$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
		// reset pointer to the last page
		$pdf->lastPage();
		//Close and output PDF document
		switch ($action) {
			case 'return':
				return $pdf->Output(null, 'S');
				break;
			case 'dump':
				return $pdf->Output(null, 'I');
				exit;
			break;
		}
	}

	function isPermitted(){
		$contact = $this->add('xepan\listing\Model_Contact');
		if(!$contact->loadLoggedIn()) throw new \Exception("Contact not found");

		$asso = $this->add('xepan\listing\Model_ContactPlanAssociation');
		$asso->addCondition('contact_id',$contact->id);
		$asso->addCondition('list_id',$this->listing->id);
		$asso->addCondition('plan_status','Active');
		$asso->addCondition('start_date','<=',$this->app->now);
		$asso->addCondition('end_date','>',$this->app->nextDate($this->app->now));
		$asso->tryLoadAny();
		
		if(!$asso->loaded()) return false;
		
		if($asso['number_of_list_detail_allowed'] === null) return true;

		// if already list data viwed then return true
		$mylist = $this->add('xepan\listing\Model_MyList');
		$mylist->addCondition('contact_id',$contact->id);
		$mylist->addCondition('list_id',$this->listing->id);
		$mylist->addCondition('created_at','>=',$asso['start_date']);
		$mylist->addCondition('created_at','<',$this->app->nextDate($asso['end_date']));
		$mylist->addCondition('list_data_id',$this->id);
		$mylist->tryLoadAny();
		if($mylist->loaded()) return true;

		$mylist = $this->add('xepan\listing\Model_MyList');
		$mylist->addCondition('contact_id',$contact->id);
		$mylist->addCondition('list_id',$this->listing->id);
		$mylist->addCondition('created_at','>=',$asso['start_date']);
		$mylist->addCondition('created_at','<',$this->app->nextDate($asso['end_date']));

		if($asso['number_of_list_detail_allowed'] > $mylist->count()->getOne()){
			$mylist['list_data_id'] = $this->id;
			$mylist->save();
			return true;
		}

		return false;
	}

}