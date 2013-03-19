<?php
class Jameen_ListingsPhotos extends Jameen_Model
{
	protected static $instance;
	
	protected $id;
	protected $listing_id;
	protected $order;
	protected $description;
	protected $photo_url;
	
	
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
        elseif(is_string($id) && strpos($id, '@') !== false) {		// load by order
			$sql = 'select * from users where order = \''.$id.'\'';
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
        }
        elseif(is_string($id)) {					// load by user name
			$sql = 'select * from users where description = \''.$id.'\'';
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
        }
		elseif(is_object($id)){
			$row = $id;
		}
		
        
        if (is_object($row)) {
			$this->id 		= $row->id;
            		$this->listing_id 	= $row->listing_id;
			$this->order 		= $row->order;
            		$this->description 	= $row->description;
            		$this->photo_url 	= $row->photo_url;
        }
		else{
			if($id){
				throw new Exception("Unable to load user : " . var_export($id, true));
			}
		}
	}
	
    public function save()  {
        $params = array(
            		'listing_id'        	=> $this->listing_id,
			'order'    		=> $this->order,
			'description'    	=> $this->description,
			'photo_url'         	=> $this->photo_url,
        ); 
        if ($this->id) { 
			return Zend_Db_Table::getDefaultAdapter()->update('users', $params, 'id = '.$this->id);
        }
        else {
            $params['created'] = date('Y-m-d H:i:s');
            $res = Zend_Db_Table::getDefaultAdapter()->insert('users', $params);
            $this->id = Zend_Db_Table::getDefaultAdapter()->lastInsertId();
            return $this->id; 
        }
    }
	
	public static function deleteListings($id){
		if(is_numeric($id)){
        	Zend_Db_Table::getDefaultAdapter()->exec("delete from listings where id=$id");
			return true;
		}
		return false;
	}
	
	public static function getname($id){
		$sql = 'select *  from listings where id = '.$id;
			//echo $sql;
			//die;
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
						return $row;
						//var_dump ($row);
		}
}

