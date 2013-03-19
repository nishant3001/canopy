<?php
class Jameen_Contacts extends Jameen_Model
{
	protected static $instance;
	
	protected $id;
	protected $account_id;
	protected $site_id;
	protected $group_id;
	protected $lead_quality;
	protected $last_login;
	protected $email;
	protected $password;
	protected $status;
	protected $salutation;
	protected $first_name;
	protected $mi;
	protected $last_name;
	protected $company ;
	protected $home_phone;
	protected $work_phone;
	protected $cell_phone;
	protected $fax;
	protected $work_address;
	protected $work_city;
	protected $work_state;
	protected $work_zip;
	protected $work_county;
	protected $home_address;
	protected $home_city;
	protected $home_state;
	protected $home_zip; 
	protected $home_county;
	protected $send_email_camp;
	protected $website;
	protected $birthday;
	protected $anniversary;
	protected $comments;
	protected $moving_on;
	protected $moving_on_date;
	protected $property_type ;
	protected $min_listing_price;
	protected $max_listing_price;
	protected $minnum_bed_rooms;
	protected $minnum_bath_rooms;
	protected $min_sq_ft;
	protected $is_manual;
	protected $came_from;
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
			$sql = 'select *  from contacts where id = '.$id;
			 //echo $sql;
			 //die;
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
						//print_r($row);
						//die;
						
        }
		elseif(is_object($id))
		{
			$row = $id;	
		}
        
		
        
        if (is_object($row)) 
		{
			$this->id			 	= $row->id;
			$this->account_id	 		= $row->account_id;
	    		$this->site_id 				= $row->site_id;
			$this->group_id 			= $row->group_id;
			$this->lead_quality		    	= $row->lead_quality;
			$this->last_login 			= $row->last_login;
			$this->email		    	= $row->email;
	    		$this->password			    	= $row->password;
	    		$this->status			    	= $row->status;
			$this->salutation         		= $row->salutation;
			$this->first_name         		= $row->first_name;
			$this->mi           			= $row->mi;
			$this->last_name		    	= $row->last_name;
			$this->company			    	= $row->company;
			$this->home_phone 			= $row->home_phone;
			$this->work_phone 			= $row->work_phone;
			$this->cell_phone 			= $row->cell_phone;
			$this->fax 				= $row->fax;
			$this->work_address 			= $row->work_address;
			$this->work_city 			= $row->work_city;
			$this->work_state	    		= $row->work_state;
			$this->work_zip		    		= $row->work_zip;
			$this->work_county 			= $row->work_county;
			$this->home_address 			= $row->home_address;
			$this->home_city 			= $row->home_city;
			$this->home_state 			= $row->home_state;
			$this->home_zip 			= $row->home_zip;
			$this->home_county 			= $row->home_county;
			$this->send_email_camp 		= $row->send_email_camp;
			$this->website 				= $row->website;
			$this->birthday 			= $row->birthday;
			$this->anniversary 			= $row->anniversary;
			$this->comments 			= $row->comments;
			$this->moving_on			= $row->moving_on;
			$this->moving_on_date 			= $row->moving_on_date;
			$this->property_type			= $row->property_type;
			$this->min_listing_price 	        = $row->min_listing_price;
			$this->max_listing_price 	        = $row->max_listing_price;
			$this->minnum_bed_rooms 		= $row->minnum_bed_rooms;
			$this->minnum_bath_rooms	        = $row->minnum_bath_rooms;
			$this->min_sq_ft    		        = $row->min_sq_ft;
			$this->is_manual                	= $row->is_manual;
			$this->came_from           		= $row->came_from;
			$this->created              		= $row->created;
			$this->modified             		= $row->modified;
			
			//echo $row->home_address;
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
			'account_id'         	=>$this->account_id,
			'site_id'      		=>$this->site_id,
			'group_id'     		=>$this->group_id,
			'lead_quality'     	=>$this->lead_quality,
			'last_login'     	=>$this->last_login,
			'email'     	=>$this->email,
			'password'     		=>$this->password,
			'status'                =>$this->status,
			'salutation'            =>$this->salutation,
			'first_name'          	=>$this->first_name,
			'mi' 			=>$this->mi,
			'last_name' 		=>$this->last_name,
			'company' 		=>$this->company,
			'home_phone' 		=>$this->home_phone,
			'work_phone' 		=>$this->work_phone,
			'cell_phone'		=>$this->cell_phone,
			'fax' 			=>$this->fax,
			'work_address' 		=>$this->work_address,
			'work_city' 	        =>$this->work_city,
			'work_state' 		=>$this->work_state,
			'work_zip' 		=>$this->work_zip,
			'work_county' 		=>$this->work_county,
			'home_address' 		=>$this->home_address,
			'home_city' 		=>$this->home_city,
			'home_state' 		=>$this->home_state,
			'home_zip'	        =>$this->home_zip,
			'home_county' 		=>$this->home_county,
			'send_email_camp' 	=>$this->send_email_camp,
			'website' 		=>$this->website,
			'birthday' 		=>$this->birthday,
			'anniversary' 		=>$this->anniversary,
			'comments' 		=>$this->comments,
			'moving_on' 		=>$this->moving_on,
			'moving_on_date' 	=>$this->moving_on_date,
			'property_type' 	=>$this->property_type,
			'min_listing_price' 	=>$this->min_listing_price,
			'max_listing_price' 	=>$this->max_listing_price,
			'minnum_bed_rooms' 	=>$this->minnum_bed_rooms,
			'minnum_bath_rooms' 	=>$this->minnum_bath_rooms,
			'min_sq_ft' 	        =>$this->min_sq_ft,
			'is_manual' 		=>$this->is_manual,
			'came_from' 	        =>$this->came_from,
			'created' 		=>$this->created,
			'modified' 		=>date('Y-m-d H:i:s'),
             ); 
        if ($this->id) { 

			return Zend_Registry::get('Zend_Db')->update('contacts', $params, 'id = '.$this->id);
        }
        else {
		    $res = Zend_Db_Table::getDefaultAdapter()->insert('contacts', $params);
            $this->id = Zend_Registry::get('Zend_Db')->lastInsertId();
            return $this->id; 
        }
    }



	public static function deletecontacts($id){
		if(is_numeric($id)){
        	Zend_Registry::get('Zend_Db')->exec("delete from contacts where id=$id");
			return true;
		}
		return false;
	}
	

	
}

