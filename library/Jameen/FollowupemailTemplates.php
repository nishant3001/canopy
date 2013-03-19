<?php
class Jameen_FollowupemailTemplates extends Jameen_Model
{
	protected static $instance;
	
	protected $id;
	protected $template_name;
	protected $is_active;
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
			$sql = 'select *  from followupemail_templates where id = '.$id;
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
			$this->template_name	 		= $row->template_name;
	    		$this->is_active 			= $row->is_active;
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
			'template_name'         	=>$this->template_name,
			'is_active'      	=>$this->is_active,
			'created' 		=>$this->created,
			'modified' 		=>date('Y-m-d H:i:s'),
             ); 
        if ($this->id) { 
	
			return Zend_Db_Table::getDefaultAdapter()->update('followupemail_templates', $params, 'id = '.$this->id);
			//print_r();die;
        }
        else {
            $params['created'] = date('Y-m-d H:i:s');
            $res = Zend_Db_Table::getDefaultAdapter()->insert('followupemail_templates', $params);
            $this->id = Zend_Db_Table::getDefaultAdapter()->lastInsertId();
            return $this->id; 
        }
    }
	
	

	public static function deletefollowupemail_templates($id){
		if(is_numeric($id)){
        	Zend_Db_Table::getDefaultAdapter()->exec("delete from followupemail_templates where id=$id");
			return true;
		}
		return false;
	}
	
	public static function getname($id){
		$sql = 'select *  from followupemail_templates where id = '.$id;
			//echo $sql;
			//die;
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
						return $row;
						//var_dump ($row);
		}
		
  public static function getMultiList(){
    	$ret = array();
    
    	$sql = 'select * from followupemail_templates order by template_name';
    	$res = Zend_Registry::get('Zend_Db')->fetchAll($sql);
    	if (is_array($res)){
    		foreach ($res as $r){
    			$ret[] = array('key' => $r->id, 'value' => $r->template_name);
    		}
    	}
    	return $ret;
    }
		
}

