<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
	public function _initAutoload(){
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace('Jameen_');
	}
	
	
	public function _initDb(){
		$dbconf = new Zend_Config_Ini(APPLICATION_PATH.'/configs/application.ini', APPLICATION_ENV);
		Zend_Registry::set('Zend_Db', Zend_Db::factory($dbconf->resources->db));
		Zend_Registry::get('Zend_Db')->setFetchMode(Zend_Db::FETCH_OBJ);
		Zend_Db_Table::setDefaultAdapter(Zend_Registry::get('Zend_Db'));
	}

	
	protected function _initPlugins(){
        // Access plugin
		
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Jameen_Plugin_View());
		$front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array('controller' => 'error', 'action' => 'error')));
    }

	
	protected function setconstants($constants){
        foreach ($constants as $key=>$value){
            if(!defined($key)){
                define($key, $value);
            }
        }
	}

	public function _initTranslate() { 
		$locale = new Zend_Locale(Zend_Locale::BROWSER); 
		$translate = new Zend_Translate(
			array(
				'adapter' => 'csv',
				'content' => APPLICATION_PATH . '/configs/languages/lang.en',
				'locale'  => 'en'
			)
		);
		
		$translate->addTranslation(
			array(
				'content' => APPLICATION_PATH . '/configs/languages/lang.hi',
				'locale' => 'hi'
			)
		);

		if ($translate->isAvailable($locale->getLanguage())) { 
			$translate->setLocale($locale); 
		} else { 
			$translate->setLocale('en'); 
		} 
		Zend_Registry::set('Translate', $translate); 
	} 
 
	
	public function run(){
        $frontController = Zend_Controller_Front::getInstance();
        $frontController->dispatch();
    }
	
function __autoload($class)
{
    require_once '/Zend/Loader.php';
    Zend_Loader::loadClass($class);
}

	
	
	
	
	


}

