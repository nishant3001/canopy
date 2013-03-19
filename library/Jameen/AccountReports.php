<?php
class Jameen_AccountsReports extends Jameen_Model
{
	protected static $instance;

	protected $id;
	protected $report_id;
	protected $type;
	protected $account_id;
	protected $title;
	protected $seo_title;
	protected $preview_html;
	protected $full_html;
	protected $is_active;
	protected $show_form;
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
		$this->id 					= $row->id;
		$this->report_id				= $row->report_id;
    		$this->type			       		= $row->type;
		$this->account_id 				= $row->account_id;
		$this->title					= $row->title;
		$this->seo_title 				= $row->seo_title;
		$this->preview_html 				= $row->preview_html;
    		$this->full_html 	        		= $row->full_html;
		$this->is_active 				= $row->is_active;
		$this->show_form				= $row->show_form;
		$this->created 					= $row->created;
		$this->modified 				= $row->modified;


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
			'report_id'         	 => $this->report_id,
			'type'       		 => $this->type,
			'account_id'     	 => $this->account_id,
			'title' 	         => $this->title,
			'seo_title'     	 => $this->seo_title,
			'preview_html'     	 => $this->preview_html,
			'full_html'     	 => $this->full_html,
			'is_active' 		 => $this->is_active,
			'show_form' 	         => $this->show_form,
			'created' 	         => $this->created,
			'modified' 	         => date('Y-m-d H:i:s'),
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
