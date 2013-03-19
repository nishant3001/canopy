<?php
class Jameen_Sites extends Jameen_Model
{
	protected static $instance;

	protected $id;
	protected $is_active;
	protected $account_id;
	protected $template_id;
	protected $domain;
	protected $template_html;
	protected $body_html;
	protected $property_listings_top_html;
	protected $property_listings_html;
	protected $property_listings_bottom_html;
	protected $property_detail_html;
	protected $css;
	protected $buyer_html;
	protected $seller_html;
	protected $splash_html;
	protected $login_html;
	protected $send_to_friend_html;
	protected $form_short;
	protected $form_long;
	protected $form_buyer;
	protected $form_seller;
	protected $form_contact;
	protected $form_custom1;
	protected $form_custom2;
	protected $form_custom3;
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
			$sql = 'select *  from sites where id = '.$id;
			$row = Zend_Registry::get('Zend_Db')
						->query($sql)
						->fetchObject();
        }
		elseif(is_object($id))
		{
			$row = $id;	
		}
        
        
        if (is_object($row)) 
		{
		$this->id 					= $row->id;
		$this->account_id				= $row->account_id;
		$this->template_id				= $row->template_id;
		$this->domain				= $row->domain;
    	$this->is_active			        = $row->is_active;
		$this->template_html 				= $row->template_html;
		$this->body_html 				    = $row->body_html;
    	$this->property_listings_top_html 	    = $row->property_listings_top_html;
		$this->property_listings_html 			= $row->property_listings_html;
		$this->property_listings_bottom_html	= $row->property_site_templates_bottom_html;
		$this->property_detail_html 			= $row->property_detail_html;
		$this->css 					= $row->css;
		$this->buyer_html 				= $row->buyer_html;
		$this->seller_html 				= $row->seller_html;
		$this->splash_html 				= $row->splash_html;
		$this->login_html 				= $row->login_html;
		$this->send_to_friend_html 			= $row->send_to_friend_html;
		$this->form_short 				= $row->form_short;
		$this->form_long 				= $row->form_long;
		$this->form_buyer 				= $row->form_buyer;
		$this->form_seller 				= $row->form_seller;
		$this->form_contact 				= $row->form_contact;
		$this->form_custom1 				= $row->form_custom1;
		$this->form_custom2 				= $row->form_custom2;
		$this->form_custom3 				= $row->form_custom3;
		$this->created 				= $row->created;
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
		'account_id'         			 => $this->account_id,
		'template_id'         			 => $this->template_id,
		'domain'         			 => $this->domain,
		'is_active'       			 => $this->is_active,
		'template_html'     			 => $this->template_html,
		'body_html'     			     => $this->body_html,
		'property_listings_top_html'     => $this->property_listings_top_html,
		'property_listings_html' 		 => $this->property_listings_html,
		'property_listings_bottom_html' 	 => $this->property_listings_bottom_html,
		'property_detail_html' 			 => $this->property_detail_html,
		'css' 				         => $this->css,
		'buyer_html' 				 => $this->buyer_html,
		'seller_html' 				 => $this->seller_html,
		'splash_html' 				 => $this->splash_html,
		'login_html' 				 => $this->login_html,
		'send_to_friend_html' 			 => $this->send_to_friend_html,
		'form_short' 				 => $this->form_short,
		'form_long' 				 => $this->form_long,
		'form_buyer' 				 => $this->form_buyer,
		'form_seller' 				 => $this->form_seller,
		'form_contact' 				 => $this->form_contact,
		'form_custom1' 				 => $this->form_custom1,
		'form_custom2' 				 => $this->form_custom2,
		'form_custom3' 				 => $this->form_custom3,
		'created' 				 => $this->created,
		'modified' 			       	 => date('Y-m-d H:i:s'),
             ); 
        if ($this->id) { 

			return Zend_Registry::get('Zend_Db')->update('sites', $params, 'id = '.$this->id);
        }
        else {
		    $res = Zend_Db_Table::getDefaultAdapter()->insert('sites', $params);
            $this->id = Zend_Registry::get('Zend_Db')->lastInsertId();
            return $this->id; 
        }
    }



	public static function deletesites($id){
		if(is_numeric($id)){
        	Zend_Registry::get('Zend_Db')->exec("delete from sites where id=$id");
			return true;
		}
		return false;
	}

}
