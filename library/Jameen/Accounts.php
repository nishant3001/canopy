<?php
class Jameen_Accounts extends Jameen_Model
{
	protected static $instance;
	protected $id;
	protected $enabled;
	protected $reply_to;
	protected $html_signature;
	protected $primary_phone;
	protected $cell_phone;
	protected $fax;
	protected $company;
	protected $address;
	protected $address2;
	protected $city;
	protected $state;
	protected $email;
	protected $zip;
	protected $report_template_id;
	protected $followup_template_id;
	protected $form_template_id;
	protected $followup_enabled;
	protected $sms_enabled;
	protected $created;
	protected $modified;

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

	public  function __construct($id = null)
	{
        $row = false;

		if (is_numeric($id))
		{
			$sql = 'select *  from accounts where id = '.$id;
			$row = Zend_Registry::get('Zend_Db')
						->query($sql)
						->fetchObject();
        }
		elseif(is_object($id))
		{
			$row = $id;	
		}
        
        
        if (is_object($row)) 
		{
		$this->id 			 = $row->id;
		$this->enabled			 = $row->enabled;
    	$this->reply_to			 = $row->reply_to;
		$this->html_signature 		 = $row->html_signature;
		$this->primary_phone		 = $row->primary_phone;
		$this->cell_phone 		 = $row->cell_phone;
		$this->fax 			 = $row->fax;
    	$this->company 	        	 = $row->company;
		$this->address 			 = $row->address;
		$this->address2			 = $row->address2;
		$this->city 			 = $row->city;
		$this->state 			 = $row->state;
		$this->email 			 = $row->email;
		$this->zip 			 = $row->zip;
		$this->report_template_id 	 = $row->report_template_id;
		$this->followup_template_id 	 = $row->followup_template_id;
		$this->form_template_id 	 = $row->form_template_id;
		$this->followup_enabled 	 = $row->followup_enabled;
		$this->sms_enabled 		 = $row->sms_enabled;
		$this->created 			 = $row->created;
		$this->modified 		 = $row->modified;
        }
		else
		   {
			if($id){
				throw new Exception("Unable to load event :");
			}
		}
	}

    public function save() 
	 {

        $params = array(
		'enabled'         	  => $this->enabled,
		'reply_to'       	  => $this->reply_to,
		'html_signature'      => $this->html_signature,
		'primary_phone' 	  => $this->primary_phone,
		'cell_phone'     	  => $this->cell_phone,
		'fax'     		  	  => $this->fax,
		'company'     	 	  => $this->company,
		'address' 		      => $this->address,
		'address2' 	 	      => $this->address2,
		'city' 			      => $this->city,
		'state' 		  => $this->state,
		'email' 	          => $this->email,
		'zip' 			  => $this->zip,
		'report_template_id' 	  => $this->report_template_id,
		'followup_template_id' 	  => $this->followup_template_id,
		'form_template_id' 	  => $this->form_template_id,
		'followup_enabled' 	  => $this->followup_enabled,
		'sms_enabled' 		  => $this->sms_enabled,
		'created' 		  => $this->created,
		'modified' 	          => date('Y-m-d H:i:s'),
             ); 
        if ($this->id) { 
			return Zend_Registry::get('Zend_Db')->update('accounts', $params, 'id = '.$this->id);
			
        }
        else {
		    $res = Zend_Db_Table::getDefaultAdapter()->insert('accounts', $params);
            $this->id = Zend_Registry::get('Zend_Db')->lastInsertId();
            return $this->id; 
        }
    }


	public static function deleteaccounts($id){
		if(is_numeric($id)){
        	Zend_Registry::get('Zend_Db')->exec("delete from accounts where id=$id");
			return true;
		}
		return false;
	}

}
