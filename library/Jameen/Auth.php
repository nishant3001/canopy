<?php
class Jameen_Auth
{
	public  static function identify($email, $password){
        $adapter = new Zend_Auth_Adapter_DbTable(
                        Zend_Db_Table::getDefaultAdapter(),
                        'users',
                        'user_name',
                        'password',
                        'SHA1(?)');
        $adapter->setIdentity($email);
        $adapter->setCredential($password);
        $authResult = $adapter->authenticate();
        return $authResult->getCode() == 1;
    }
    
    public static function login(Jameen_User $user) {
        $session = new Zend_Session_Namespace(self::getSessionNamespace());
        $session->user = $user;
    }
    
    public static function loginAsUser($userId) {
		$user = new Jameen_User($userId);
		$session = new Zend_Session_Namespace(self::getSessionNamespace());
		$session->user = $user;
		return $user;
    }
	
	
    public static function isLoggedIn($userType = 'user'){
		$session = new Zend_Session_Namespace(self::getSessionNamespace());
 		return $session->user instanceof Jameen_User;
    }
    
    public static function logout() {
    	$session = new Zend_Session_Namespace(self::getSessionNamespace());
    	unset($session->user);
		setcookie("rememberme", "", time() - 3600, '/', '.' . $_SERVER['HTTP_HOST']);
    }
	
	private static function getSessionNamespace(){
		return Zend_Controller_Front::getInstance()->getRequest()->getModuleName() . '_login';	
	}
	
   	public static function getIdentity(){
		$session = new Zend_Session_Namespace(self::getSessionNamespace());
        if ($session->user instanceof Jameen_User){
            return $session->user;
        }
        else{
            return false;
        }
    }
	
}