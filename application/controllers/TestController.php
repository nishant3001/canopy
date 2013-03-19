<?php
	class TestController extends Zend_Controller_Action {
		
		public function init(){
			
			
		}
		
		public function indexAction()
		{   
		    echo '<h1> accounts </h1>'; 
			echo '<a href="/admin/accounts/add">add account</a></br>' ;
			echo '<a href="/admin/accounts/addcontacts">add contacts</a></br>' ;
			echo '<a href="/admin/accounts/adduser">add </a></br>' ;
			
			echo '<h1> followupemail </h1>';
			echo '<a href="/admin/followup/add">add account</a></br>' ;


			die;
		}
		
		
		public static function jsonEcho($data){
			header("content-type:text/json");
			echo json_encode($data);
			exit;
		}
	}
?>