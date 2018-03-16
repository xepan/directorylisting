<?php

namespace xepan\listing;

class Model_Contact extends \xepan\base\Model_Contact{
	var $table_alias = "listingContact";


	function createContact($app,$contact_detail=[],$user){
		$this->addCondition('user_id',$user['id']);
		$this->tryLoadAny();

		$this['first_name'] = $contact_detail['first_name'];
		$this['last_name'] = $contact_detail['last_name'];
		$this->save();

		if(filter_var($user['username'], FILTER_VALIDATE_EMAIL)){
			$email = $this->add('xepan\base\Model_Contact_Email');
			$email->addCondition('contact_id',$this->id);
			$email->addCondition('value',$user['username']);
			$email->tryLoadAny();
			
			$email['head'] = 'Official';
			$email->save();
		}
		
		if(isset($contact_detail['mobile_no']) && $contact_detail['mobile_no']){
			$phone = $this->add('xepan\base\Model_Contact_Phone');
			$phone->addCondition('contact_id',$this->id);
			$phone->addCondition('value',$contact_detail['mobile_no']);
			$phone->tryLoadAny();
			
			$phone['head'] = 'Official';
			$phone->save();
		}
	}
}