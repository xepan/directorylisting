<?php

namespace xepan\listing;

class Model_ListingStatusActivity extends \xepan\base\Model_Table{

	public $table='listing_status_activity';
	public $status = ['All'];
	public $actions = [
					'All'=>['view','edit','delete'],
				];
	public $acl_type = "Listing\ListingStatusActivity";

	function init(){
		parent::init();

		$this->hasOne('xepan\listing\Model_List','list_id');
		$this->addField('on_status')->type();
		$this->addField('email_subject');
		$this->addField('email_body')->type('text')->display(array('form'=>'xepan\base\RichText'));
		$this->addField('sms_content')->type('text');

		$this->addField('email_send_to_creator')->type('boolean');
		$this->addField('email_send_to_list_data_fields')->enum([]);
		$this->addField('email_send_to_custom_email_ids')->type('text');

		$this->addField('sms_send_to_creator')->type('boolean');
		$this->addField('sms_send_to_list_data_fields')->enum([]);
		$this->addField('sms_send_to_custom_phone_numbers')->type('text');

		$this->add('dynamic_model\Controller_AutoCreator');
	}
}