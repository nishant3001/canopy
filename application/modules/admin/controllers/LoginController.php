<?php
class Admin_LoginController extends Zend_Controller_Action {
	
	public function init(){
		//$this->_helper->disableLayout();
		
	}
	
	public function indexAction(){
		$this->_helper->layout->disableLayout();    
 		if (Jameen_Auth::isLoggedIn()){
            $this->_redirect('/admin');
        }
        if ($this->getRequest()->isPost())  {
			if($this->getRequest()->getParam('email') && $this->getRequest()->getParam('password')){
				if(Jameen_Auth::identify($this->getRequest()->getParam('email'), $this->getRequest()->getParam('password')))        		{
					try{
						$user = new Jameen_User($this->getRequest()->getParam('email'));
						if($user->role != 'ADMINISTRATOR'){
							$this->view->error = 'invalidLogin';
							$this->view->email = $this->getRequest()->getParam('email');
							$this->view->password = $this->getRequest()->getParam('password');
							return;
						}
						Jameen_Auth::login($user);
					}
					catch (Exception $e){
						die($e->getMessage());
					}
	
					if ($this->getRequest()->getParam('arememberme') == '1') {
						setcookie('aremembermea', Jameen_Lib::encrypt($user->id), time() + 60 * 60 * 24 * 21, '/', '.' . $_SERVER['HTTP_HOST'] );
						setcookie('arememberchecka', Jameen_Lib::encrypt($user->id), time() + 60 * 60 * 24 * 21, '/', '.' . $_SERVER['HTTP_HOST'] );
					}
					else{
						setcookie("arememberchecka", "", time() - 3600, '/', '.' . $_SERVER['HTTP_HOST']);
					}
					$this->_redirect('/admin');
				}
				else{
					$this->view->error = Zend_Registry::get('Translate')->translate('invalidLogin');
					$this->view->email = $this->getRequest()->getParam('email');
					$this->view->password = $this->getRequest()->getParam('password');
				}
			}
			else{
				$this->view->error = Zend_Registry::get('Translate')->translate('invalidLogin');
				$this->view->email = $this->getRequest()->getParam('email');
				$this->view->password = $this->getRequest()->getParam('password');
			}
        }
	}
	
	public function asAction(){
 		if (!Jameen_Auth::isLoggedIn()){
            $this->_redirect('/admin/login');
        }
		$userId = $this->_request->getParam('id');
		$loginUser = Jameen_Auth::loginAsUser($userId);
		$this->_redirect('/workshop');
	}
	
    public function dontAction() {
		Jameen_Auth::logout();
    	$this->_redirect('/admin/login');
    }
}
?>