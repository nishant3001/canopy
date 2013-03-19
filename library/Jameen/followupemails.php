<?php
class Jameen_Followupemails extends Jameen_Model
{
	protected static $instance;
	
	protected $id;
	protected $day;
	protected $contact_group_id;
	protected $subject;
	protected $email_body_html;
	
	
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
			$sql = 'select *  from followupemails where id = '.$id;
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
            		$this->day 		= $row->day;
			$this->contact_group_id = $row->contact_group_id;
            		$this->subject 		= $row->subject;
            		$this->email_body_html  = $row->email_body_html;
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
			'day'        		=> $this->day,
			'contact_group_id'  => $this->contact_group_id,
			'subject'    		=> $this->subject,
			'email_body_html'   => $this->email_body_html,
        ); 
        if ($this->id) { 
	
			Zend_Registry::get('Zend_Db')->update('followupemails', $params, 'id = '.$this->id);
        }
        else {
            $res = Zend_Db_Table::getDefaultAdapter()->insert('followupemails', $params);
            $this->id = Zend_Registry::get('Zend_Db')->lastInsertId();
            return $this->id; 
          }
       }
	
	
	public static function deletecontacts($id){
		if(is_numeric($id)){
        	Zend_Registry::get('Zend_Db')->exec("delete from followupemails where id=$id");
			return true;
		}
		return false;
	}
	
	
   public static function getContactgroup($order, $contact_group = null){
			$db = Zend_Db_Table::getDefaultAdapter();
			$db->setFetchMode(Zend_Db::FETCH_OBJ);
			$select = $db->select();
			$select->from(array('f'=>'followupemails'),array('*'))
			       ->join(array('cg'=>'contact_groups'),'cg.id=f.contact_group_id',array('group_name'))
				   ->order($order);

			if($contact_group){ 		
				 $select->where('f.contact_group_id=?', $contact_group);
			 }
			else{
				return $select;
			}

			return  $db->fetchAll($select);
		}

}

