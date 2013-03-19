<?php
class Jameen_Reports extends Jameen_Model
{
	protected static $instance;
	
	protected $id;
	protected $type;
	protected $title;
	protected $seo_title;
	protected $preview_html;
	protected $full_html;
	protected $is_active;
	protected $show_form;
	protected $success_url;
	protected $dateCreated;
	protected $dateModified;


	
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
			$sql = 'select *  from reports where id = '.$id;
			$row = Zend_Registry::get('Zend_Db')
						->query($sql)
						->fetchObject();

        }
		elseif(is_object($id)){
			$row = $id;	
		}
        
        if (is_object($row)){
			$this->id 		= $row->id;
			$this->type		= $row->type;
                        $this->title		= $row->title;
			$this->seo_title 	= $row->seo_title;
			$this->preview_html	= $row->preview_html;
			$this->full_html 	= $row->full_html;
			$this->is_active 	= $row->is_active;
                        $this->show_form 	= $row->show_form;
			$this->success_url 	= $row->success_url;
			$this->dateCreated 	= $row->dateCreated;
			$this->dateModified     = $row->dateModified;
        }
		else
		   {
			if($id){
				throw new Exception("Unable to load event :");
			}
		}
	}

    public function save(){
        $params = array(
                       'type'         	=> $this->type,
                       'title'       	=> $this->title,
		       'seo_title'      => $this->seo_title,
		       'preview_html'   => $this->preview_html,
		       'full_html'      => $this->full_html,
            	       'is_active'      => $this->is_active,
                       'show_form'      => $this->show_form,
		       'success_url' 	=> $this->success_url,
		       'dateCreated' 	=> $this->dateCreated,
		       'dateModified' 	=> date('Y-m-d H:i:s'),
             ); 
        if ($this->id) { 

			Zend_Registry::get('Zend_Db')->update('reports', $params, 'id = '.$this->id);
        }
        else {
		    $res = Zend_Db_Table::getDefaultAdapter()->insert('reports', $params);
            $this->id = Zend_Registry::get('Zend_Db')->lastInsertId();
            return $this->id; 

        }
    }

	public static function deletereports($id){
		if(is_numeric($id)){
        	Zend_Registry::get('Zend_Db')->exec("delete from reports where id=$id");
			return true;
		}
		return false;
	}
	
  public static function getReports_type($order, $reports_type = null){
			$db = Zend_Db_Table::getDefaultAdapter();
			$db->setFetchMode(Zend_Db::FETCH_OBJ);
			$select = $db->select();
			$select->from(array('t'=>'reports'),array('*'))
				   ->order($order);

			if($reports_type){ 		
				 $select->where('t.type=?', $reports_type);
			 }
			else{
				return $select;
			}
			return  $db->fetchAll($select);
		}

}
