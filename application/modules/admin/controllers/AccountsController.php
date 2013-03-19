<?php
class Admin_AccountsController extends Zend_Controller_Action {
	const ITEMS_PER_PAGE = 10;
	
	public function init(){
 		if (!Jameen_Auth::isLoggedIn()){
            $this->_redirect('/admin/login');
        }
		$this->view->user= $this->user = Jameen_Auth::getIdentity();
	}
	
	public function indexAction(){
		$this->view->internalMessages = Jameen_Alerts_Internal::getMessages($this->getRequest());
		$page = $this->_getParam('page', 1);
		$this->view->searchText = $this->_getParam('q');
		$this->view->paramSort = (int) $this->_getParam('sort');
		$this->view->paramSequence = $this->_getParam('seq');
		$seq = $this->view->paramSequence == 'desc' ? ' desc' : '';
		$this->view->paramQuery = $this->_getParam('q');
		$this->view->dataFields = array('primary_phone','cell_phone', 'fax','company','address','address2','city','state','zip','email','modified' );
		$db = Zend_Db_Table::getDefaultAdapter();
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$select = $db->select();
		$select->from(array('accounts'), array('*'));
		$select->order(array_key_exists($this->view->paramSort, $this->view->dataFields) ? $this->view->dataFields[$this->view->paramSort] . "$seq" : $this->view->dataFields[0]);
		$paginator = Zend_Paginator::factory($select);
		$paginator->setItemCountPerPage(self::ITEMS_PER_PAGE);
		$paginator->setCurrentPageNumber($page);
		$this->view->paginator = $paginator;
		$this->view->numCount = $paginator->getTotalItemCount();
		}


	public function addAction(){
		$form = new Jameen_Admin_Forms_Accounts();
		$accounts = new Jameen_Accounts($this->getRequest()->getParam('id'));
		$form->addElement('hidden', 'id', array('value' => $accounts->id)) ;
		if($accounts->id){
			$form->reply_to->setValue($accounts->reply_to);
			$form->html_signature->setValue($accounts->html_signature);
			$form->primary_phone->setValue($accounts->primary_phone);
			$form->cell_phone->setValue($accounts->cell_phone);
			$form->fax->setValue($accounts->fax);
			$form->company->setValue($accounts->company);
			$form->address->setValue($accounts->address);
			$form->address2->setValue($accounts->address2);
			$form->city->setValue($accounts->city);
			$form->state->setValue($accounts->state);
			$form->zip->setValue($accounts->zip);
			$form->email->setValue($accounts->email);
			$form->report_template_id->setValue($accounts->report_template_id);
			$form->followup_template_id->setValue($accounts->followup_template_id);
			$form->followup_enabled->setValue($accounts->followup_enabled);
			$form->sms_enabled->setValue($accounts->sms_enabled);

		}
		
		if ($this->_request->isPost()) {
			$formData = $this->_request->getPost();
			//print_r($formData); die;
			if ($form->isValid($formData)) {
				//write code to save into databse
				$accounts->reply_to =  $formData['reply_to'];
				$accounts->html_signature =  $formData['html_signature'];
				$accounts->primary_phone = $formData['primary_phone'];
				$accounts->cell_phone =  $formData['cell_phone'];
				$accounts->fax =  $formData['fax'];
				$accounts->company =  $formData['company'];
				$accounts->address =  $formData['address'];
				$accounts->address2 =  $formData['address2'];
				$accounts->city =  $formData['city'];
				$accounts->state =  $formData['state'];
				$accounts->zip  =  $formData['zip'];
				$accounts->email =  $formData['email'];
				$accounts->report_template_id  =  $formData['report_template_id'];
				$accounts->followup_template_id  =  $formData['followup_template_id'];
				$accounts->form_template_id  =  $formData['form_template_id'];
				$accounts->followup_enabled  =  $formData['followup_enabled'];
				$accounts->sms_enabled =  $formData['sms_enabled'];
				//print_r($formData); die;
				$id=$accounts->save();
				$message = new Jameen_Alerts_Internal('Accounts saved successfully', 'success', 'accounts', 'index', 'admin');
				$this->_redirect("/admin/accounts"); 
			} 
			else {
				
				$form->populate($formData);
			}
		}
		$this->view->errors = array();
		foreach ($form->getMessages() as $field => $msgs) {
			foreach($msgs as $msg){
				$this->view->errors[$field] = $msg;
				break;
			}
		}
		$this->view->form = $form;

    }
	
	public function userAction(){
		$id =  $this->getRequest()->getParam('id');
		$this->view->internalMessages = Jameen_Alerts_Internal::getMessages($this->getRequest());
		$this->view->searchText = $this->_getParam('q');
		$this->view->paramSort = (int) $this->_getParam('sort');
		$this->view->paramSequence = $this->_getParam('seq');
		$seq = $this->view->paramSequence == 'desc' ? ' desc' : '';
		$this->view->paramQuery = $this->_getParam('q');
		$this->view->dataFields = array('account_id','email', 'user_name','fname','lname','password','phone','gender','active','image' );
		$db = Zend_Db_Table::getDefaultAdapter();
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$select = $db->select();
		$select->from(array('users'), array('*'))
			   ->where('account_id = ?', $id);
		$select->order(array_key_exists($this->view->paramSort, $this->view->dataFields) ? $this->view->dataFields[$this->view->paramSort] . "$seq" : $this->view->dataFields[0]);
		$paginator = Zend_Paginator::factory($select);
		$paginator->setItemCountPerPage(self::ITEMS_PER_PAGE);
		$paginator->setCurrentPageNumber($page);
		$this->view->paginator = $paginator;
		$this->view->numCount = $paginator->getTotalItemCount();
    }
	
	
	public function contactsAction(){
		$id =  $this->getRequest()->getParam('id');
		$this->view->internalMessages = Jameen_Alerts_Internal::getMessages($this->getRequest());
		$this->view->searchText = $this->_getParam('q');
		$this->view->paramSort = (int) $this->_getParam('sort');
		$this->view->paramSequence = $this->_getParam('seq');
		$seq = $this->view->paramSequence == 'desc' ? ' desc' : '';
		$this->view->paramQuery = $this->_getParam('q');
		$this->view->dataFields = array('account_id','site_id', 'group_id','lead_quality','last_login','email','status','first_name','last_name','company','home_phone','work_phone','cell_phone','work_address','work_city','work_state','work_zip','website',  'property_type','min_listing_price','modified');
		$db = Zend_Db_Table::getDefaultAdapter();
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$select = $db->select();
		$select->from(array('contacts'), array('*'))
			   ->where('account_id = ?', $id);
		$select->order(array_key_exists($this->view->paramSort, $this->view->dataFields) ? $this->view->dataFields[$this->view->paramSort] . "$seq" : $this->view->dataFields[0]);
		$paginator = Zend_Paginator::factory($select);
		$paginator->setItemCountPerPage(self::ITEMS_PER_PAGE);
		$paginator->setCurrentPageNumber($page);
		$this->view->paginator = $paginator;
		$this->view->numCount = $paginator->getTotalItemCount();
	}
	   
	   
	    public function adduserAction(){
			$form = new Jameen_Admin_Forms_User();
			$user = new Jameen_User($this->getRequest()->getParam('id'));
			$form->addElement('hidden', 'id', array('value' => $user->id)) ;
			if($user->id){
				$form->account_id->setValue($user->account_id);
				$form->email->setValue($user->email);
				$form->user_name->setValue($user->user_name);
				$form->fname->setValue($user->fname);
				$form->lname->setValue($user->lname);
				$form->password->setValue($user->password);
				$form->role->setValue($user->role);
				$form->phone->setValue($user->phone);
				$form->gender->setValue($user->gender);
				$form->active->setValue($user->active);
				$form->image->setValue($user->image);
				$form->updated->setValue($user->updated);
			}
			
			if ($this->_request->isPost()) {
				$formData = $this->_request->getPost();
				//print_r($formData); die;
				if ($form->isValid($formData)) {
					//write code to save into databse
					$user->account_id =  $formData['account_id'];
					$user->email =  $formData['email'];
					$user->user_name =  $formData['user_name'];
					$user->fname =  $formData['fname'];
					$user->lname = $formData['lname'];
					$user->password =  $formData['password'];
					$user->role =  $formData['role'];
					$user->phone =  $formData['phone'];
					$user->gender =  $formData['gender'];
					$user->active =  $formData['active'];
					$user->image =  $formData['image'];
					$user->updated =  $formData['updated'];
					//print_r($formData); die;
					$id=$user->save();
					$message = new Jameen_Alerts_Internal('User saved successfully', 'success', 'accounts','user', 'admin');
					$this->_redirect("/admin/accounts/user/id/$user->id"); 
				} 
				else {
					
					$form->populate($formData);
				}
			}
			$this->view->errors = array();
			foreach ($form->getMessages() as $field => $msgs) {
				foreach($msgs as $msg){
					$this->view->errors[$field] = $msg;
					break;
				}
			}
			$this->view->form = $form;
    }
	
		public function addcontactsAction(){
		$form = new Jameen_Admin_Forms_Contacts();
		$contacts = new Jameen_Contacts($this->getRequest()->getParam('id'));
		$form->addElement('hidden', 'id', array('value' => $contacts->id)) ;
		if($contacts->id){
				$form->account_id->setValue($contacts->account_id);
				$form->site_id->setValue($contacts->site_id);
				$form->group_id->setValue($contacts->group_id);
				$form->lead_quality->setValue($contacts->lead_quality);
				$form->last_login->setValue($contacts->last_login);
				$form->email->setValue($contacts->email);
				$form->password->setValue($contacts->password);
				$form->status->setValue($contacts->status);
				$form->salutation->setValue($contacts->salutation);
				$form->first_name->setValue($contacts->first_name);
				$form->mi->setValue($contacts->mi);
				$form->last_name->setValue($contacts->last_name);
				$form->company->setValue($contacts->company);
				$form->home_phone->setValue($contacts->home_phone);
				$form->work_phone->setValue($contacts->work_phone);
				$form->cell_phone->setValue($contacts->cell_phone);
				$form->fax->setValue($contacts->fax);
				$form->work_address->setValue($contacts->work_address);
				$form->work_city->setValue($contacts->work_city);
				$form->work_state->setValue($contacts->work_state);
				$form->work_zip->setValue($contacts->work_zip);
				$form->work_county->setValue($contacts->work_county);
				$form->home_address->setValue($contacts->home_address);
				$form->home_city->setValue($contacts->home_city);
				$form->home_state->setValue($contacts->home_state);
				$form->home_zip->setValue($contacts->home_zip);
				$form->home_county->setValue($contacts->home_county);
				$form->send_email_camp->setValue($contacts->send_email_camp);
				$form->website->setValue($contacts->website);
				$form->birthday->setValue($contacts->birthday);
				$form->anniversary->setValue($contacts->anniversary);
				$form->comments->setValue($contacts->comments);
				$form->moving_on->setValue($contacts->moving_on);
				$form->moving_on_date->setValue($contacts->moving_on_date);
				$form->property_type->setValue($contacts->property_type);
				$form->min_listing_price->setValue($contacts->min_listing_price);
				$form->max_listing_price->setValue($contacts->max_listing_price);
				$form->minnum_bed_rooms->setValue($contacts->minnum_bed_rooms);
				$form->minnum_bath_rooms->setValue($contacts->minnum_bath_rooms);
				$form->min_sq_ft->setValue($contacts->min_sq_ft);
				$form->is_manual->setValue($contacts->is_manual);
				$form->came_from->setValue($contacts->came_from);
				$form->modified->setValue($contacts->modified);

		}
		
		if ($this->_request->isPost()) {
			$formData = $this->_request->getPost();
			//print_r($formData); die;
			if ($form->isValid($formData)) {
				//write code to save into databse
					$contacts->account_id =  $formData['account_id'];
					$contacts->site_id =     $formData['site_id'];
					$contacts->group_id =    $formData['group_id'];
					$contacts->lead_quality =  $formData['lead_quality'];
					$contacts->last_login =  $formData['last_login'];
					$contacts->email =       $formData['email'];
					$contacts->password =  $formData['password'];
					$contacts->status =  $formData['status'];
					$contacts->salutation =  $formData['salutation'];
					$contacts->first_name =  $formData['first_name'];
					$contacts->mi =  $formData['mi'];
					$contacts->last_name =  $formData['last_name'];
					$contacts->company =  $formData['company'];
					$contacts->home_phone =  $formData['home_phone'];
					$contacts->work_phone =  $formData['work_phone'];
					$contacts->cell_phone =  $formData['cell_phone'];
					$contacts->fax = $formData['fax'];
					$contacts->work_address =  $formData['work_address'];
					$contacts->work_city =  $formData['work_city'];
					$contacts->work_state =  $formData['work_state'];
					$contacts->work_zip =  $formData['work_zip'];
					$contacts->work_county =  $formData['work_county'];
					$contacts->home_address =  $formData['home_address'];
					$contacts->home_city =  $formData['home_city'];
					$contacts->home_state =  $formData['home_state'];
					$contacts->home_zip =  $formData['home_zip'];
					$contacts->home_county =  $formData['home_county'];
					$contacts->send_email_camp =  $formData['send_email_camp'];
					$contacts->website = $formData['website'];
					$contacts->birthday =  $formData['birthday'];
					$contacts->anniversary =  $formData['anniversary'];
					$contacts->comments =  $formData['comments'];
					$contacts->moving_on =  $formData['moving_on'];
					$contacts->moving_on_date =  $formData['moving_on_date'];
					$contacts->property_type =  $formData['property_type'];
					$contacts->min_listing_price =  $formData['min_listing_price'];
					$contacts->max_listing_price =  $formData['max_listing_price'];
					$contacts->minnum_bed_rooms = $formData['minnum_bed_rooms'];
					$contacts->minnum_bath_rooms =  $formData['minnum_bath_rooms'];
					$contacts->min_sq_ft =  $formData['min_sq_ft'];
					$contacts->is_manual =  $formData['is_manual'];
					$contacts->came_from =  $formData['came_from'];
					$contacts->modified =  $formData['modified'];
				//print_r($formData); die;
				$id=$contacts->save();
				$message = new Jameen_Alerts_Internal('Contacts saved successfully', 'success', 'accounts', 'contacts', 'admin');
				$this->_redirect("/admin/accounts/contacts/id/$contacts->id"); 
			} 
			else {
				
				$form->populate($formData);
			}
		}
		$this->view->errors = array();
		foreach ($form->getMessages() as $field => $msgs) {
			foreach($msgs as $msg){
				$this->view->errors[$field] = $msg;
				break;
			}
		}
		$this->view->form = $form;
			
		}
	
	public function deleteAction(){
	
		  $id=$this->getRequest()->getParam('id'); 
		  if(isset($id))
		  {
			$this->view->user=new Jameen_Accounts($id); 
			$this->view->user->deleteaccounts($id);
			$message = new Jameen_Alerts_Internal('Accounts Deleted successfully', 'success', 'accounts', 'index', 'admin');
			$this->_redirect("/admin/accounts"); 
		}
		else{
			$form->populate($formData);

			}
	}



}
?>