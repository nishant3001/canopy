<?php
class Admin_SitesController extends Zend_Controller_Action {
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
			$this->view->dataFields = array('account_id','template_id','is_active','domain', 'modified');
			$db = Zend_Db_Table::getDefaultAdapter();
			$db->setFetchMode(Zend_Db::FETCH_OBJ);
			$select = $db->select();
			$select->from(array('sites'), array('*'));
			$select->order(array_key_exists($this->view->paramSort, $this->view->dataFields) ? $this->view->dataFields[$this->view->paramSort] . "$seq" : $this->view->dataFields[0]);
			$paginator = Zend_Paginator::factory($select);
			$paginator->setItemCountPerPage(self::ITEMS_PER_PAGE);
			$paginator->setCurrentPageNumber($page);
			$this->view->paginator = $paginator;
			$this->view->numCount = $paginator->getTotalItemCount();
		
    }
		
	public function addAction(){
		$form = new Jameen_Admin_Forms_Sites();
		$templates = new Jameen_Sites($this->getRequest()->getParam('id'));
		$form->addElement('hidden', 'id', array('value' => $templates->id)) ;
		if($templates->id){
			$form->account_id->setValue($templates->account_id);
			$form->template_id->setValue($templates->template_id);
			$form->domain->setValue($templates->domain);
			$form->is_active->setValue($templates->is_active);
			$form->template_html->setValue($templates->template_html);
			$form->body_html->setValue($templates->body_html);
			$form->property_listings_top_html->setValue($templates->property_listings_top_html);
			$form->property_listings_html->setValue($templates->property_listings_html);
			$form->property_listings_bottom_html->setValue($templates->property_listings_bottom_html);
			$form->property_detail_html->setValue($templates->property_detail_html);
			$form->css->setValue($templates->css);
			$form->buyer_html->setValue($templates->buyer_html);
			$form->seller_html->setValue($templates->seller_html);
			$form->splash_html->setValue($templates->splash_html);
			$form->login_html->setValue($templates->login_html);
			$form->send_to_friend_html->setValue($templates->send_to_friend_html);
			$form->form_short->setValue($templates->form_short);
			$form->form_long->setValue($templates->form_long);
			$form->form_buyer->setValue($templates->form_buyer);
			$form->form_seller->setValue($templates->form_seller);
			$form->form_contact->setValue($templates->form_contact);
			$form->form_custom1->setValue($templates->form_custom1);
			$form->form_custom2->setValue($templates->form_custom2);
			$form->form_custom3->setValue($templates->form_custom3);

		}
		
		if ($this->_request->isPost()) {
			$formData = $this->_request->getPost();
			//print_r($formData); die;
			if ($form->isValid($formData)) {
				//write code to save into databse
				$templates->account_id =  $formData['account_id'];
				$templates->template_id =  $formData['template_id'];
				$templates->domain =  $formData['domain'];
				$templates->is_active =  $formData['is_active'];
				$templates->template_html = $formData['template_html'];
				$templates->body_html =  $formData['body_html'];
				$templates->property_listings_top_html =  $formData['property_listings_top_html'];
				$templates->property_listings_html =  $formData['property_listings_html'];
				$templates->property_listings_bottom_html =  $formData['property_listings_bottom_html'];
				$templates->property_detail_html =  $formData['property_detail_html'];
				$templates->css =  $formData['css'];
				$templates->buyer_html =  $formData['buyer_html'];
				$templates->seller_html =  $formData['seller_html'];
				$templates->splash_html =  $formData['splash_html'];
				$templates->login_html =  $formData['login_html'];
				$templates->send_to_friend_html =  $formData['send_to_friend_html'];
				$templates->form_short =  $formData['form_short'];
				$templates->form_long =  $formData['form_long'];
				$templates->form_buyer =  $formData['form_buyer'];
				$templates->form_seller =  $formData['form_seller'];
				$templates->form_contact =  $formData['form_contact'];
				$templates->form_custom1 =  $formData['form_custom1'];
				$templates->form_custom2 =  $formData['form_custom2'];
				$templates->form_custom3 =  $formData['form_custom3'];
				//print_r($formData); die;
				$id=$templates->save();
				$message = new Jameen_Alerts_Internal('Sites saved successfully', 'success', 'sites', 'index', 'admin');
				$this->_redirect("/admin/sites"); 
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
			$this->view->user=new Jameen_Sites($id); 
			$this->view->user->deletesites($id);
			$message = new Jameen_Alerts_Internal('Sites Deleted successfully', 'success', 'sites', 'index', 'admin');
			$this->_redirect("/admin/sites"); 
		}
		else{
			$form->populate($formData);

			}
	}

}
?>