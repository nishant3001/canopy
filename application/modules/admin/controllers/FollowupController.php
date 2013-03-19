<?php
class Admin_FollowupController extends Zend_Controller_Action {
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
		    $this->view->contact_group =$this->_getParam('f'); 
			$this->view->dataFields = array('day','group_name','subject','email_body_html');
			$order=array_key_exists($this->view->paramSort, $this->view->dataFields) ? $this->view->dataFields[$this->view->paramSort] . "$seq" : $this->view->dataFields[0];
			$paginator = Zend_Paginator::factory(Jameen_Followupemails::getContactgroup($order, $this->view->contact_group));
			$paginator->setItemCountPerPage(self::ITEMS_PER_PAGE);
			$paginator->setCurrentPageNumber($page);
			$this->view->paginator = $paginator;
			$this->view->numCount = $paginator->getTotalItemCount();
			
    }
	public function addAction(){

		$form = new Jameen_Admin_Forms_Followup();
		$followup = new Jameen_Followupemails($this->getRequest()->getParam('id'));
		$form->addElement('hidden', 'id', array('value' => $followup->id)) ;
		
		if($followup->id){
			$form->contact_group_id->setValue($followup->contact_group_id);
			$form->day->setValue($followup->day);
			$form->subject->setValue($followup->subject);
			$form->email_body_html->setValue($followup->email_body_html);
		}
		
		if ($this->_request->isPost()) {
			$formData = $this->_request->getPost();
			
			if ($form->isValid($formData)) {
				//write code to save into databse
				$followup->contact_group_id =  $formData['contact_group_id'];
				$followup->day =  $formData['day'];
				$followup->subject = $formData['subject'];
				$followup->email_body_html =  $formData['email_body_html'];
				
				$id=$followup->save();
				$message = new Jameen_Alerts_Internal('Folloup saved successfully', 'success', 'followup', 'index', 'admin');
				$this->_redirect("/admin/followup"); 
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
	
	

}

?>