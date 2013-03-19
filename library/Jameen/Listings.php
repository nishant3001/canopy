<?php
class Jameen_Listings extends Jameen_Model
{
	protected static $instance;
	protected $id;
	protected $account_id;
	protected $listing_type_id;
	protected $status;
	protected $house_style;
	protected $list_price;
	protected $listing_date;
	protected $city_id;
	protected $area_id;
	protected $zip_code;
	protected $disp_address;
	protected $mls_number;
	protected $list_status;
	protected $featured ;
	protected $show_on_site;
	protected $description;
	protected $basement;
	protected $garage;
	protected $year_built;
	protected $lot_size;
	protected $lot_size_type;
	protected $sqft_area;
	protected $bed_rooms;
	protected $bath_rooms;
	protected $tubs;
	protected $stalls;
	protected $roof_type; 
	protected $exterior;
	protected $interior;
	protected $stories;
	protected $kitchen;
	protected $room_other;
	protected $construction;
	protected $floor;
	protected $total_floor;
	protected $facing ;
	protected $heat_system;
	protected $furnished;
	protected $ownership_type;
	protected $features;
	protected $virtual_tour_link;
	protected $email;
	protected $first_name;
	protected $last_name;
	protected $home_phone;
	protected $work_phone;
	protected $fsbo_mode;
	protected $to_let;
	protected $tolet_monthly_rent;
	protected $tolet_advance_amount;
	protected $tolet_ledge_required;
	protected $tolet_other_detail;
	protected $photo_thumb_url;
	protected $photo_large_url;
	protected $latitude;
	protected $longitude;
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
			$sql = 'select *  from listings where id = '.$id;
			 //echo $sql;
			 //die;
			$row = Zend_Db_Table::getDefaultAdapter()
						->query($sql)
						->fetchObject();
        }
		elseif(is_object($id))
		{
			$row = $id;	
		}
        
		
        
        if (is_object($row)) 
		{
			$this->id			 	= $row->id;
			$this->account_id	 		= $row->account_id;
	    		$this->listing_type_id 			= $row->listing_type_id;
			$this->status 				= $row->status;
			$this->house_style		    	= $row->house_style;
			$this->list_price 			= $row->list_price;
			$this->listing_date		    	= $row->listing_date;
	    		$this->city_id			    	= $row->city_id;
	    		$this->area_id			    	= $row->area_id;
			$this->disp_address         		= $row->disp_address;
			$this->mls_number           		= $row->mls_number;
			$this->list_status		    	= $row->list_status;
			$this->featured			    	= $row->featured;
			$this->show_on_site 			= $row->show_on_site;
			$this->description 			= $row->description;
			$this->basement 			= $row->basement;
			$this->garage 				= $row->garage;
			$this->year_built 			= $row->year_built;
			$this->lot_size 			= $row->lot_size;
			$this->lot_size_type	    		= $row->lot_size_type;
			$this->sqft_area		    	= $row->sqft_area;
			$this->bed_rooms 			= $row->bed_rooms;
			$this->bath_rooms 			= $row->bath_rooms;
			$this->tubs 				= $row->tubs;
			$this->stalls 				= $row->stalls;
			$this->roof_type 			= $row->roof_type;
			$this->exterior 			= $row->exterior;
			$this->interior 			= $row->interior;
			$this->stories 				= $row->stories;
			$this->kitchen 				= $row->kitchen;
			$this->room_other 			= $row->room_other;
			$this->construction 			= $row->construction;
			$this->floor			    	= $row->floor;
			$this->total_floor 			= $row->total_floor;
			$this->facing			    	= $row->facing;
			$this->heat_system 			= $row->heat_system;
			$this->furnished 			= $row->furnished;
			$this->ownership_type 			= $row->ownership_type;
			$this->features			    	= $row->features;
			$this->virtual_tour_link    		= $row->virtual_tour_link;
			$this->email                		= $row->email;
			$this->first_name           		= $row->first_name;
			$this->last_name            		= $row->last_name;
			$this->home_phone           		= $row->home_phone;
			$this->work_phone           		= $row->work_phone;
			$this->fsbo_mode            		= $row->fsbo_mode;
			$this->to_let               		= $row->to_let;
			$this->tolet_monthly_rent   		= $row->tolet_monthly_rent;
			$this->tolet_advance_amount 		= $row->tolet_advance_amount;
			$this->tolet_ledge_required 		= $row->tolet_ledge_required;
			$this->tolet_other_detail   		= $row->tolet_other_detail;
			$this->photo_thumb_url      		= $row->photo_thumb_url;
			$this->photo_large_url      		= $row->photo_large_url;
			$this->latitude             		= $row->latitude;
			$this->longitude            		= $row->longitude;
			$this->created              		= $row->created;
			$this->modified             		= $row->modified;
			
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
			'account_id'         	=>$this->account_id,
			'listing_type_id'      	=>$this->listing_type_id,
			'status'     		=>$this->status,
			'house_style'     	=>$this->house_style,
			'list_price'     	=>$this->list_price,
			'listing_date'     	=>$this->listing_date,
			'city_id'     		=>$this->city_id,
			'area_id'               =>$this->area_id,
			'zip_code'              =>$this->zip_code,
			'disp_address'          =>$this->disp_address,
			'mls_number' 		=>$this->mls_number,
			'list_status' 		=>$this->list_status,
			'featured' 		=>$this->featured,
			'show_on_site' 		=>$this->show_on_site,
			'description' 		=>$this->description,
			'basement'		=>$this->basement,
			'garage' 		=>$this->garage,
			'year_built' 		=>$this->year_built,
			'lot_size' 	        =>$this->lot_size,
			'lot_size_type' 	=>$this->lot_size_type,
			'sqft_area' 		=>$this->sqft_area,
			'bed_rooms' 		=>$this->bed_rooms,
			'bath_rooms' 		=>$this->bath_rooms,
			'tubs' 			=>$this->tubs,
			'stalls' 		=>$this->stalls,
			'roof_type'	        =>$this->roof_type,
			'exterior' 		=>$this->exterior,
			'interior' 		=>$this->interior,
			'stories' 		=>$this->stories,
			'kitchen' 		=>$this->kitchen,
			'room_other' 		=>$this->room_other,
			'construction' 		=>$this->construction,
			'floor' 		=>$this->floor,
			'total_floor' 		=>$this->total_floor,
			'facing' 		=>$this->facing,
			'heat_system' 		=>$this->heat_system,
			'furnished' 		=>$this->furnished,
			'ownership_type' 	=>$this->ownership_type,
			'features' 		=>$this->features,
			'virtual_tour_link' 	=>$this->virtual_tour_link,
			'email' 		=>$this->email,
			'first_name' 	        =>$this->first_name,
			'last_name' 		=>$this->last_name,
			'home_phone' 		=>$this->home_phone,
			'work_phone'        	=>$this->work_phone,
			'fsbo_mode' 		=>$this->fsbo_mode,
			'to_let' 		=>$this->to_let,
			'tolet_monthly_rent' 	=>$this->tolet_monthly_rent,
			'tolet_advance_amount'  =>$this->tolet_advance_amount,
			'tolet_ledge_required'  =>$this->tolet_ledge_required,
			'tolet_other_detail' 	=>$this->tolet_other_detail,
			'photo_thumb_url'       =>$this->photo_thumb_url,
			'photo_large_url'       =>$this->photo_large_url,
			'latitude' 		=>$this->latitude,
			'longitude' 		=>$this->longitude,
			'created' 		=>$this->created,
			'modified' 		=>date('Y-m-d H:i:s'),
             ); 
        if ($this->id) { 
	
			Zend_Registry::get('Zend_Db')->update('listings', $params, 'id = '.$this->id);
        }
        else {
            $res = Zend_Db_Table::getDefaultAdapter()->insert('listings', $params);
            $this->id = Zend_Registry::get('Zend_Db')->lastInsertId();
            return $this->id; 
          }
       }
    
		public static function getMultiList(){
    	$ret = array();
    	$sql = 'select * from amenities order by name';
    	$res = Zend_Registry::get('Zend_Db')->fetchAll($sql);
    	if (is_array($res)){
    		foreach ($res as $r){
    			$ret[] = array('key' => $r->id, 'value' => $r->name);
    		}
    	}
    	return $ret;
       }


      

		
	

	public static function deletelistings($id){
		if(is_numeric($id)){
        	Zend_Registry::get('Zend_Db')->exec("delete from listings where id=$id");
			return true;
		}
		return false;
	}
	
}

