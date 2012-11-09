<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public function _initAutoload(){
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace('Project_');
	}
	

	
	protected function setconstants($constants){
        foreach ($constants as $key=>$value){
            if(!defined($key)){
                define($key, $value);
				
            }
        }
	}
 
	
	public function run(){
        $frontController = Zend_Controller_Front::getInstance();
        $frontController->dispatch();
    }


}

