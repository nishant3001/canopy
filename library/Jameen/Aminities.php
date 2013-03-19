<?php
class Jameen_Aminities extends Jameen_Model
{
	protected static $instance;
	
	protected $id;
	protected $listing_id;
	protected $amenitie_id;
	
	
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
			$sql = 'select *  from listing_amenities where id = '.$id;
			$row = Zend_Registry::get('Zend_Db')
						->query($sql)
						->fetchObject();
        }
		elseif(is_object($id))
		{
			$row = $id;	
		}
        
        
        if (is_object($row)) {
			$this->id 		= $row->id;
            		$this->listing_id 		= $row->listing_id;
			$this->amenitie_id = $row->amenitie_id;
        }
		else
		   {
			if($id){
				throw new Exception("Unable to load event :");
			}
		}
	}
	
    public function save()  {
        $params = array(
			'listing_id'   => $this->listing_id,
			'amenitie_id'  => $this->amenitie_id,
        ); 
        if ($this->id) { 
	
			Zend_Registry::get('Zend_Db')->update('listing_amenities', $params, 'id = '.$this->id);
        }
        else {
            $res = Zend_Db_Table::getDefaultAdapter()->insert('listing_amenities', $params);
            $this->id = Zend_Registry::get('Zend_Db')->lastInsertId();
            return $this->id; 
          }
       }
	
	

}

