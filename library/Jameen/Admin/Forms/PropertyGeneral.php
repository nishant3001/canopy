<?php 
class Jameen_Admin_Forms_PropertyGeneral extends Zend_Form{
    public function init()
    {
		 
		 $listing_type_id = new Zend_Form_Element_Select('listing_type_id');
		 $listing_type_id ->setLabel('Listing Type')
		           ->setMultiOptions(array('0'=>'Residential Plot', '1'=>'Residential house' , '2'=>'Service apartment','3'=>'Villa / Independent house','4'=>'Apartment'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);
          
		 $status = new Zend_Form_Element_Select('status');
         $status->setLabel('status')
		           ->setMultiOptions(array('0'=>'Active', '1'=>'sold'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);

		 $house_style = new Zend_Form_Element_Text('house_style');
         $house_style ->setLabel('House Style')
		 			->setAttribs(array('style' => 'width:350px !important;'))
                    ->setRequired(true)
                    ->addValidator('NotEmpty');
				  
		$list_price = new Zend_Form_Element_Text('list_price');
		$list_price->setLabel('List Price')
				  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
				  ->addValidator('NotEmpty');
				  
		$listing_date = new Zend_Form_Element_Text('listing_date');
        $listing_date->setLabel('Listing Date')
								  ->setRequired(true)
								  ->setAttribs(array('style' => 'width:150px !important;'))
								  ->addValidator('NotEmpty');
				  
		$city_id = new Zend_Form_Element_Text('city_id');
        $city_id->setLabel('City')
								  ->setRequired(true)
								  ->setAttribs(array('style' => 'width:150px !important;'))
								  ->addValidator('NotEmpty');
				  
		$area_id = new Zend_Form_Element_Text('area_id');
        $area_id->setLabel('Area')
								  ->setRequired(true)
								  ->setAttribs(array('style' => 'width:150px !important;'))
								  ->addValidator('NotEmpty');
				  
		$zip_code = new Zend_Form_Element_Text('zip_code');
        $zip_code->setLabel('Zip')
							  ->setRequired(true)
							  ->setAttribs(array('style' => 'width:150px !important;'))
                    		  ->addValidator(new Zend_Validate_Digits(isValid("1234567890")));
				  
		$disp_address = new Zend_Form_Element_Select('disp_address');
        $disp_address->setLabel('Display Address')
		           ->setMultiOptions(array('0'=>'yes', '1'=>'no'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);
				  
		$description = new Zend_Form_Element_Text('description');
        $description->setLabel('Description')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$basement = new Zend_Form_Element_Checkbox('basement');
        $basement->setLabel('basement')
                  ->setRequired(true);
		
		$garage = new Zend_Form_Element_Checkbox('garage');
        $garage->setLabel('Garage')
                  ->setRequired(true);
				  
		$year_built = new Zend_Form_Element_Text('year_built');
        $year_built->setLabel('Year Built')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:150px !important;'))
                  ->addValidator('NotEmpty');
				  
		$lot_size = new Zend_Form_Element_Text('lot_size');
        $lot_size->setLabel('Lot Size')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:150px !important;'))
                  ->addValidator('NotEmpty');
				  
		$lot_size_type = new Zend_Form_Element_Text('lot_size_type');
        $lot_size_type->setLabel('Lot Size Type')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$sqft_area = new Zend_Form_Element_Text('sqft_area');
        $sqft_area->setLabel('Sqft Area')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:150px !important;'))
                  ->addValidator('NotEmpty');
		$bed_rooms = new Zend_Form_Element_Text('bed_rooms');
        $bed_rooms->setLabel('Bed Rooms')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:70px !important;'))
                  ->addValidator('NotEmpty');
		$bath_rooms = new Zend_Form_Element_Text('bath_rooms');
        $bath_rooms->setLabel('Bath Rooms')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:70px !important;'))
                  ->addValidator('NotEmpty');
		$tubs = new Zend_Form_Element_Text('tubs');
        $tubs->setLabel('Tubs')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:70px !important;'))
                  ->addValidator('NotEmpty');
		$stalls = new Zend_Form_Element_Text('stalls');
        $stalls->setLabel('Form Contact')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:250px !important;'))
                  ->addValidator('NotEmpty');
		$roof_type = new Zend_Form_Element_Text('roof_type');
        $roof_type->setLabel('Roof Type')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:70px !important;'))
                  ->addValidator('NotEmpty');
		$exterior = new Zend_Form_Element_Text('exterior');
        $exterior->setLabel('Exterior')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$interior = new Zend_Form_Element_Text('interior');
        $interior->setLabel('Interior')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$stories = new Zend_Form_Element_Text('stories');
        $stories->setLabel('Stories')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$kitchen = new Zend_Form_Element_Text('kitchen');
        $kitchen->setLabel('Kitchen')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$room_other = new Zend_Form_Element_Text('room_other');
        $room_other->setLabel('Room Other')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$construction = new Zend_Form_Element_Text('construction');
        $construction->setLabel('Construction')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$floor = new Zend_Form_Element_Text('floor');
        $floor->setLabel('Floor')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:70px !important;'))
                  ->addValidator('NotEmpty');
		$total_floor = new Zend_Form_Element_Text('total_floor');
        $total_floor->setLabel('Total Floor')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:70px !important;'))
                  ->addValidator('NotEmpty');
		$facing = new Zend_Form_Element_Text('facing');
        $facing->setLabel('Facing')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$heat_system = new Zend_Form_Element_Text('heat_system');
        $heat_system->setLabel('Heat_System')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$furnished = new Zend_Form_Element_Text('furnished');
        $furnished->setLabel('Furnished')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$ownership_type = new Zend_Form_Element_Text('ownership_type');
        $ownership_type->setLabel('Ownership Type')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$latitude = new Zend_Form_Element_Text('latitude');
        $latitude->setLabel('Latitude')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$longitude = new Zend_Form_Element_Text('longitude');
        $longitude->setLabel('Longitude')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');

		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');
	  
				  

 
        $this->addElements(array(
			$listing_type_id,
			$status,
			$house_style,
			$list_price,
			$listing_date,
			$city_id,
			$area_id,
			$zip_code,
			$disp_address,
			$mls_number,
			$list_status,
			$featured,
			$show_on_site,
			$send_to_friend_html,
			$description,
			$basement,
			$garage,
			$year_built,
			$lot_size,
			$lot_size_type,
			$sqft_area,
			$bed_rooms,
			$bath_rooms,
			$tubs,
			$stalls,
			$roof_type,
			$exterior,
			$interior,
			$stories,
			$kitchen,
			$room_other,
			$construction,
			$floor,
			$total_floor,
			$facing,
			$heat_system,
			$furnished,
			$ownership_type,
			$latitude,
			$longitude
			
			
        ));
 
		/*
		$this->setElementDecorators(array(
		   	array('ViewHelper'),
			array('Label'),
			array('Errors', array('class'=>'error')),
		)); 
		*/
		
		$this->setElementDecorators( array(
			'ViewHelper',
			array( array( 'wrapperField' => 'HtmlTag' ), array( 'tag' => 'div', 'class' => 'controls cont' ) ),
			array( 'Label', array( 'placement' => 'prepend', 'class'=>'control-label' ) ),
		) );
		$this->setAttribs(array('action'=>''));
	}
}

?>