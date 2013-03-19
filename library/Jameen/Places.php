<?php
class Jameen_Places extends Jameen_Model
{
	protected static $instance;

	protected $id;
	protected $parent_id;
	protected $type_id;
	protected $description;
	protected $loves;
	protected $title;
	protected $code;
	protected $phone;
	protected $map;
	protected $listings;
	protected $partners;
	protected $identifier;
	protected $lat;
	protected $lng;
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
		$this->id 		= $row->id;
		$this->parent_id	= $row->parent_id;
    		$this->type_id	        = $row->type_id;
		$this->description 	= $row->description;
		$this->loves		= $row->loves;
		$this->title 		= $row->title;
		$this->code 		= $row->code;
    		$this->phone 	        = $row->phone;
		$this->map 		= $row->map;
		$this->listings		= $row->listings;
		$this->partners 	= $row->partners;
		$this->identifier 	= $row->identifier;
		$this->lat 		= $row->lat;
		$this->lng 		= $row->lng;
		$this->created 		= $row->created;
		$this->modified 	= $row->modified;


			//echo $row->bath_rooms;
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
    		'parent_id'      => $this->parent_id,
    		'type_id'        => $this->type_id,
		'description'    => $this->description,
		'loves' 	 => $this->loves,
		'title'          => $this->title,
    		'code'     	 => $this->code,
    		'phone'     	 => $this->phone,
	    	'map' 		 => $this->map,
		'listings' 	 => $this->listings,
		'partners'       => $this->partners,
		'identifier' 	 => $this->identifier,
		'lat' 		 => $this->lat,
		'lng' 		 => $this->lng,
		'created' 	 => $this->created,
		'modified' 	 => date('Y-m-d H:i:s'),
             ); 
        if ($this->id) { 

			return Zend_Db_Table::getDefaultAdapter()->update('accounts', $params, 'id = '.$this->id);
			//print_r();die;
        }
        else {
            $params['created'] = date('Y-m-d H:i:s');
            $res = Zend_Db_Table::getDefaultAdapter()->insert('accounts', $params);
            $this->id = Zend_Db_Table::getDefaultAdapter()->lastInsertId();
            return $this->id; 
        }
    }



	public static function deleteaccounts($id){
		if(is_numeric($id)){
        	Zend_Db_Table::getDefaultAdapter()->exec("delete from accounts where id=$id");
			return true;
		}
		return false;
	}

	public static function getname($id){
		$sql = 'select *  from accounts where id = '.$id;
			//echo $sql;
			//die;
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
						return $row;
						//var_dump ($row);
		}
}
