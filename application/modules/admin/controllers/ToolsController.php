<?php
class Admin_ToolsController extends Zend_Controller_Action {
	
	public function init(){
 		if (!Jameen_Auth::isLoggedIn()){
            $this->_redirect('/admin/login');
        }
		$this->view->user= $this->user = Jameen_Auth::getIdentity();


	}
	
	public function indexAction(){
		
    }
	

}
?>