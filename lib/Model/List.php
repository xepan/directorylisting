<?php

namespace xepan\listing;

class Model_List extends \xepan\base\Model_Table{
	public $table='list';
	public $status = ['Published','UnPublished'];
	public $actions = [
					'Active'=>['view','fields','data','manage_layouts','category_association','edit','delete','deactivate'],
					'Inactive'=>['view','fields','data','category_association','edit','delete','activate']
					];

	public $acl_type = "Listing\List";
	function init(){
		parent::init();

		$this->addField('name');
		$this->addField('status')->enum(['Active','InActive'])->defaultValue('Active');
		
		$this->is(['name|to_trim|required']);
		$this->add('dynamic_model\Controller_AutoCreator');	

		$this->hasMany('xepan/listing/List','category_id');

		$this->addHook('beforeSave',$this);
		$this->addHook('beforeDelete',$this);
	}

	function beforeSave(){
		if($this->checkDuplicate()){
			throw $this->exception('name is already taken','ValidityCheck')->setField('name');						
		}
		
		// if has id and is dirty
			// update table name 
		// if not id
			// create table
		if($this->loaded() && $this->isDirty('name')){
			$this->updateDB($dirty=true);
		}else{
			$this->updateDB();
		}
	}

	function beforeDelete(){
		$this->deleteTable();

	}

	function deleteTable(){
		$query = 'DROP TABLE IF EXISTS '.$this->getTableName().";";
		$this->app->db->dsql()->expr($query)->execute();
	}

	function checkDuplicate(){
		$list = $this->add('xepan\listing\Model_List');
		$list->addCondition('name',$this['name']);
		$list->addCondition('id','<>',$this->id);
		return $list->count()->getOne();
	}

	function updateDB($is_dirty=false){

		$table_name = $this->getTableName();
		// creating new table
		$query = 'CREATE TABLE `'.$table_name.'` ( `id` int(11) NOT NULL AUTO_INCREMENT, `created_at` datetime, `updated_at` datetime, `created_by_id` int,`status` varchar(255) ,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
		// update query
		if($is_dirty){
			$old_model = $this->add('xepan\listing\Model_List')->load($this->id);
			$old_table_name = 'xepan_listing_'.$this->app->normalizeName(strtolower($old_model['name']));
			$query = 'RENAME TABLE '.$old_table_name.' TO '.$table_name.';';
		}

		$this->app->db->dsql()->expr($query)->execute();
	}

	function getTableName(){
		return $table_name = 'xepan_listing_'.$this->app->normalizeName(strtolower($this['name']));
	}

	function page_category_association($page){
		$page->add('view')->set('Hello');
	}

	function category_association(){

	}

	function deactivate(){
		$this['status'] = 'Inactive';
		$this->save();
	}

	function activate(){
		$this['status'] = 'Active';
		$this->save();
	}

	function page_fields($page){
		$model = $this->add('xepan\listing\Model_Fields');
		$model->addCondition('list_id',$this->id);
		$crud = $page->add('xepan\hr\CRUD');
		$form = $crud->form;
        $form->add('xepan\base\Controller_FLC')
        ->showLables(true)
        ->addContentSpot()
        // ->makePanelsCoppalsible(true)
        ->layout([
                'name'=>'Field Details~c1~6',
                'field_type'=>'c2~6',
                'default_value'=>'c11~6',
                'placeholder'=>'c21~6',
                'hint'=>'c12~6',
                'status'=>'c22~6',
                'is_mandatory'=>'c13~6',
                'is_moderate'=>'c23~6',
                'is_changable'=>'c13~6',
                'is_filterable'=>'c24~6',
                

            ]);
		$crud->setModel($model);

	}

	function data(){
		$this->app->redirect($this->app->url('xepan_listing_listdata',['listid'=>$this->id]));
	}

	function fields(){
		return $this->add('xepan\listing\Model_Fields')->addCondition('list_id',$this->id);
	}

	function getDataModel(){
		return $this->add('xepan\listing\Model_ListData',['listing'=>$this]);
	}

	function page_manage_layouts($page){
		$m = $this->add('xepan\listing\Model_ListDataFormLayout');
		$m->addCondition('list_id',$this->id);
		$crud = $page->add('xepan\base\CRUD');
		$crud->setModel($m);

		$crud->form->add('View')->set(implode(", ",$this->getDataModel()->getActualFields()));
	}
	
}