<?php
class Dys_Plugin_Login extends Zend_Controller_Plugin_Abstract {
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request){
        if (Dys_Auth::isLoggedIn('wildcard')){
			return;	
		}
		
		if (!array_key_exists('rememberme', $_COOKIE)) {
			return;	
		}
		
		try {
			$user = new Dys_Users(Dys_Lib::decrypt($_COOKIE['rememberme']));
			if($user instanceof Dys_User){
				Dys_Auth::loginAsUser($user->id);
			}
		}
		catch (Exception $e) {	/* do nothing*/  }

	}
}