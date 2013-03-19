<?php
class Jameen_Response
{
	
	protected static $instance;
	
	public $meta;
	public $notifications;
	public $response;

	
	
	public static function factory($id){
		if (isset($instance)){
			return $instance;
		}
		else{
			$className = __CLASS__;
            self::$instance = new $className($id);
            return self::$instance;
		}
	}
	
	public  function __construct($data = null, $notification=null){
		$this->meta = new stdClass();
		$this->notifications = new stdClass();
		$this->response = new stdClass();
		$this->meta->code = 200;
		
		$this->meta->error_type = 0;
		$this->meta->error_detail = '';
		
		$this->notifications->notification = $notification;
		
		$this->response->data = $data;
	}
	
	public function assignError($errorType, $errorDetail, $code=200){
		$this->meta->code = $code;
		$this->meta->error_type = $errorType;
		$this->meta->error_detail = $errorDetail;
		
	}
	
	public function assignNotification($notification){
		$this->notifications->notification = $notification;
	}
	
	public function assignData($data){
		$this->response->data = $data;
	}
		
	
}

