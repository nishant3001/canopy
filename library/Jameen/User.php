<?php
class Jameen_User extends Jameen_Model
{
	protected static $instance;
	
	protected $id;
	protected $account_id;
	protected $email;
	protected $user_name;
	protected $fname;
	protected $lname;
	protected $password;
	protected $role;
	protected $phone;
	protected $gender;
	protected $active;
	protected $image;
	protected $created;
	protected $updated;
	
	
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

		if (is_numeric($id)){
			$sql = 'select *  from users where id = '.$id;
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
        }
        elseif(is_string($id) && strpos($id, '@') !== false) {		// load by email
			$sql = 'select * from users where email = \''.$id.'\'';
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
        }
        elseif(is_string($id)) {					// load by user name
			$sql = 'select * from users where user_name = \''.$id.'\'';
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
        }
		elseif(is_object($id)){
			$row = $id;
		}
		
        
        if (is_object($row)) {
			$this->id = $row->id;
            $this->account_id = $row->account_id;
			$this->email = $row->email;
            $this->user_name = $row->user_name;
            $this->fname = $row->fname;
            $this->lname = $row->lname;
			$this->password = $row->password;
            $this->role = $row->role ;
            $this->phone = $row->phone ;
            $this->gender = $row->gender ;
			$this->active = $row->active ;
			$this->image = $row->image ;
			$this->created = $row->created;
			$this->updated = $row->updated;
        }
		else{
			if($id){
				throw new Exception("Unable to load user : " . var_export($id, true));
			}
		}
	}
	
    public function save()  {
        $params = array(
            'account_id'        => $this->account_id,
			'email'    			=> $this->email,
			'user_name'    			=> $this->user_name,
			'fname'         	=> $this->fname,
            'lname'         	=> $this->lname,
            'password'			=> $this->password,
			'role'      		=> $this->role,
			'phone'    			=> $this->phone,
			'gender'    			=> $this->gender,
			'active'        	=> $this->active,
			'image'         	=> $this->image,
			'updated'			=> date('Y-m-d H:i:s')
        ); 
        if ($this->id) { 

			return Zend_Registry::get('Zend_Db')->update('users', $params, 'id = '.$this->id);
        }
        else {
		    $res = Zend_Db_Table::getDefaultAdapter()->insert('users', $params);
            $this->id = Zend_Registry::get('Zend_Db')->lastInsertId();
            return $this->id; 
        }
    }
	
	public function getName(){
		if($this->fname){
			return $this->fname ;	
		}
		else {
			return $this->user_name;
		}
	}
	
	

	public function isAdministrator(){
		if(!$this->id){
			throw new Exception("User object not loaded");
		}
		
		return $this->role_id == 'ADMINISTRATOR';
			
	}

	public function isPrimaryUser(){
		if(!$this->id){
			throw new Exception("User object not loaded");
		}
		
		return $this->role_id == 'PRIMARY';
			
	}
	
	  public static function getUserdata($order, $userdata = null){
			$db = Zend_Db_Table::getDefaultAdapter();
			$db->setFetchMode(Zend_Db::FETCH_OBJ);
			$select = $db->select();
			$select->from(array('u'=>'users'),array('*'))
				   ->order($order);

			if($userdata){ 		
				 $select->where('u.account_id=?', $userdata);
			 }
			else{
				return $select;
			}
			return  $db->fetchAll($select);
		}

	
}

