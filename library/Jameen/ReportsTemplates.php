<?php
class Jameen_ReportsTemplates extends Jameen_Model
{
	protected static $instance;

	protected $id;
	protected $category_name;
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
			$sql = 'select *  from report_templates where id = '.$id;
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
		$this->id 				= $row->id;
		$this->category_name	= $row->category_name;
    	$this->is_active	    = $row->is_active;
		$this->created 			= $row->created;
		$this->modified 		= $row->modified;


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
    		'category_name'         			 => $this->category_name,
    		'is_active'       			 => $this->is_active,
		'created' 				 => $this->created,
		'modified' 			       	 => date('Y-m-d H:i:s'),
             ); 
        if ($this->id) { 

			return Zend_Db_Table::getDefaultAdapter()->update('report_templates', $params, 'id = '.$this->id);
			//print_r();die;
        }
        else {
            $params['created'] = date('Y-m-d H:i:s');
            $res = Zend_Db_Table::getDefaultAdapter()->insert('report_templates', $params);
            $this->id = Zend_Db_Table::getDefaultAdapter()->lastInsertId();
            return $this->id; 
        }
    }

	public static function deletereport_templates($id){
		if(is_numeric($id)){
        	Zend_Db_Table::getDefaultAdapter()->exec("delete from report_templates where id=$id");
			return true;
		}
		return false;
	}

	public static function getname($id){
		$sql = 'select *  from report_templates where id = '.$id;
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
    
    	$sql = 'select * from report_templates order by category_name';
    	$res = Zend_Registry::get('Zend_Db')->fetchAll($sql);
    	if (is_array($res)){
    		foreach ($res as $r){
    			$ret[] = array('key' => $r->id, 'value' => $r->category_name);
    		}
    	}
    	return $ret;
    }

}
