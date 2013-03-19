<?php
class Admin_ReportsController extends Zend_Controller_Action {
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
		    $this->view->reports_type = $this->_getParam('t'); 
			$this->view->dataFields = array('type','title', 'seo_title','preview_html','full_html','is_active','show_form','success_url' );
			$order=array_key_exists($this->view->paramSort, $this->view->dataFields) ? $this->view->dataFields[$this->view->paramSort] . "$seq" : $this->view->dataFields[0];
			$paginator = Zend_Paginator::factory(Jameen_Reports::getReports_type($order, $this->view->reports_type));
			$paginator->setItemCountPerPage(self::ITEMS_PER_PAGE);
			$paginator->setCurrentPageNumber($page);
			$this->view->paginator = $paginator;
			$this->view->numCount = $paginator->getTotalItemCount();

    }
	public function addAction(){

		$form = new Jameen_Admin_Forms_Reports();
		$reports = new Jameen_Reports($this->getRequest()->getParam('id'));
		$form->addElement('hidden', 'id', array('value' => $reports->id)) ;
		if($reports->id){
			$form->type->setValue($reports->type);
			$form->title->setValue($reports->title);
			$form->seo_title->setValue($reports->seo_title);
			$form->preview_html->setValue($reports->preview_html);
			$form->full_html->setValue($reports->full_html);
			$form->is_active->setValue($reports->is_active);
			$form->show_form->setValue($reports->show_form);
			$form->success_url->setValue($reports->success_url);

		}
		
		if ($this->_request->isPost()) {
			$formData = $this->_request->getPost();
			if ($form->isValid($formData)) {
				//write code to save into databse
				$reports->type =  $formData['type'];
				$reports->title =  $formData['title'];
				$reports->seo_title = $formData['seo_title'];
				$reports->preview_html =  $formData['preview_html'];
				$reports->full_html =  $formData['full_html'];
				$reports->is_active =  $formData['is_active'];
				$reports->show_form =  $formData['show_form'];
				$reports->success_url =  $formData['success_url'];
				$id=$reports->save();
				$message = new Jameen_Alerts_Internal('Reports saved successfully', 'success', 'reports', 'index', 'admin');
				$this->_redirect("/admin/reports"); 
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
			$this->view->user=new Jameen_Reports($id); 
			$this->view->user->deletereports($id);
			$message = new Jameen_Alerts_Internal('ID Deleted successfully', 'success', 'reports', 'index', 'admin');
			$this->_redirect("/admin/reports"); 
		}
		else{
			$form->populate($formData);

			}
	}


	

}
?>