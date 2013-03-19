<?php
class Admin_StatsController extends Zend_Controller_Action {
		const ITEMS_PER_PAGE = 10;
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