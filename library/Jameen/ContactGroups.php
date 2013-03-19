<?php
class Jameen_ContactGroups extends Jameen_Model
{
	protected static $instance;

	protected $id;
	protected $group_name;
	protected $group_type;
	protected $active;
	protected $sequence;




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
			$sql = 'select *  from contact_groups where id = '.$id;
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
		$this->id 					= $row->id;
		$this->group_name				= $row->group_name;
    		$this->group_type			        = $row->group_type;
		$this->active 				= $row->active;
		$this->sequence					= $row->sequence;


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
    	'group_name'         			 => $this->group_name,
    	'group_type'       			 => $this->group_type,
		'active'     			 => $this->active,
		'sequence' 				 => $this->sequence,
		'seo_sequence'     			 => $this->seo_sequence,
             ); 
        if ($this->id) { 

			return Zend_Registry::get('Zend_Db')->update('contact_groups', $params, 'id = '.$this->id);
			//print_r();die;
        }
        else {
            $params['created'] = date('Y-m-d H:i:s');
            $res = Zend_Registry::get('Zend_Db')->insert('contact_groups', $params);
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
	
	
	public static function getMultiList(){
    	$ret = array();
    
    	$sql = 'select * from contact_groups order by group_name';
    	$res = Zend_Registry::get('Zend_Db')->fetchAll($sql);
    	if (is_array($res)){
    		foreach ($res as $r){
    			$ret[] = array('key' => $r->id, 'value' => $r->group_name);
    		}
    	}
    	return $ret;
    }


}
