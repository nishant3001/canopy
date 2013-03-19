<?php 
class Jameen_Admin_Forms_Contacts extends Zend_Form{
    public function init()
    {
		 
		 $account_id = new Zend_Form_Element_Text('account_id');
		 $account_id ->setLabel('Account Id')
						->setAttribs(array('style' => 'width:70px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
						
		 $site_id = new Zend_Form_Element_Text('site_id');
		 $site_id ->setLabel('Site Id')
						->setAttribs(array('style' => 'width:70px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
						
		 $group_id = new Zend_Form_Element_Text('group_id');
		 $group_id ->setLabel('Group Id')
						->setAttribs(array('style' => 'width:70px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');

          
		 $lead_quality = new Zend_Form_Element_Select('lead_quality');
         $lead_quality->setLabel('Lead Quality')
		           ->setMultiOptions(array('0'=>'no', '1'=>'yes'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);

		 $last_login = new Zend_Form_Element_Text('last_login');
         $last_login ->setLabel('Last Login')
		 			->setAttribs(array('style' => 'width:350px !important;'))
                    ->setRequired(true)
                    ->addValidator('NotEmpty');
				  
		$email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('EmailAddress',  TRUE);
				  
		$password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
								  ->setRequired(true)
								  ->setAttribs(array('style' => 'width:350px !important;'))
								  ->addValidator('NotEmpty');
				  
		$status = new Zend_Form_Element_Select('status');
        $status->setLabel('Status')
		           ->setMultiOptions(array('0'=>'no', '1'=>'yes'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);
				  
		$salutation = new Zend_Form_Element_Text('salutation');
        $salutation->setLabel('Salutation')
									  ->setRequired(true)
									  ->setAttribs(array('style' => 'width:50px !important;'))
									  ->addValidator('NotEmpty');
				  
		$first_name = new Zend_Form_Element_Text('first_name');
        $first_name->setLabel('First Name')
							  ->setRequired(true)
							  ->setAttribs(array('style' => 'width:350px !important;'))
							  ->addValidator('NotEmpty');
				  
		$mi = new Zend_Form_Element_Text('mi');
        $mi->setLabel('Mi')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$last_name = new Zend_Form_Element_Text('last_name');
        $last_name->setLabel('Last Name')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$company = new Zend_Form_Element_Text('company');
        $company->setLabel('Company')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$home_phone = new Zend_Form_Element_Text('home_phone');
        $home_phone->setLabel('Home Phone')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$work_phone = new Zend_Form_Element_Text('work_phone');
        $work_phone->setLabel('Work Phone')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$cell_phone = new Zend_Form_Element_Text('cell_phone');
        $cell_phone->setLabel('Cell Phone')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$fax = new Zend_Form_Element_Text('fax');
        $fax->setLabel('Fax')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$work_address = new Zend_Form_Element_Text('work_address');
        $work_address->setLabel('Work Address')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;'))
                  ->addValidator('NotEmpty');
		$work_city = new Zend_Form_Element_Text('work_city');
        $work_city->setLabel('Work_City')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$work_state = new Zend_Form_Element_Text('work_state');
        $work_state->setLabel('Work State')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
		$work_zip = new Zend_Form_Element_Text('work_zip');
        $work_zip->setLabel('Work Zip')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:150px !important;'))
				  ->addValidator( new Zend_Validate_Digits(isValid("1234567890")));

						 
		$work_county = new Zend_Form_Element_Text('work_county');
        $work_county->setLabel('Work County')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:150px !important;'))
                  ->addValidator('NotEmpty');
		$home_address = new Zend_Form_Element_Text('home_address');
        $home_address->setLabel('Home Address')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;'))
                  ->addValidator('NotEmpty');
		$home_city = new Zend_Form_Element_Text('home_city');
        $home_city->setLabel('Home City')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:150px !important;'))
                  ->addValidator('NotEmpty');
          
		 $home_state = new Zend_Form_Element_Select('home_state');
         $home_state->setLabel('Home State')
		           ->setMultiOptions(array('0'=>'no', '1'=>'yes'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);

		 $home_zip = new Zend_Form_Element_Text('home_zip');
         $home_zip ->setLabel('Home Zip')
		 			->setAttribs(array('style' => 'width:150px !important;'))
                    ->setRequired(true)
				    ->addValidator( new Zend_Validate_Digits(isValid("1234567890")));
    				  
		$home_county = new Zend_Form_Element_Text('home_county');
        $home_county->setLabel('Home County')
					  ->setRequired(true)
					  ->setAttribs(array('style' => 'width:250px !important; '))
					  ->addValidator('NotEmpty');
				  
		$send_email_camp = new Zend_Form_Element_Text('send_email_camp');
        $send_email_camp->setLabel('Send Email Camp')
								  ->setRequired(true)
								  ->setAttribs(array('style' => 'width:350px !important;'))
								  ->addValidator('NotEmpty');
				  
		$website = new Zend_Form_Element_Text('website');
        $website->setLabel('Website')
								  ->setRequired(true)
								  ->setAttribs(array('style' => 'width:550px !important;'))
								  ->addValidator('NotEmpty');
				  
		$birthday = new Zend_Form_Element_Text('birthday');
        $birthday->setLabel('Birthday')
									  ->setRequired(true)
									  ->setAttribs(array('style' => 'width:150px !important;'))
									  ->addValidator('NotEmpty');
				  
		$anniversary = new Zend_Form_Element_Text('anniversary');
        $anniversary->setLabel('Anniversary')
							  ->setRequired(true)
							  ->setAttribs(array('style' => 'width:150px !important;'))
							  ->addValidator('NotEmpty');
				  
		$comments = new Zend_Form_Element_Text('comments');
        $comments->setLabel('Comments')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$moving_on = new Zend_Form_Element_Text('moving_on');
        $moving_on->setLabel('Moving On')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$moving_on_date = new Zend_Form_Element_Text('moving_on_date');
        $moving_on_date->setLabel('Moving On Date')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$property_type = new Zend_Form_Element_Text('property_type');
        $property_type->setLabel('Property Type')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:350px !important;'))
                  ->addValidator('NotEmpty');
				  
		$min_listing_price = new Zend_Form_Element_Text('min_listing_price');
        $min_listing_price->setLabel('Min Listing Price')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:250px !important;'))
                  ->addValidator('NotEmpty');
				  
		$max_listing_price = new Zend_Form_Element_Text('max_listing_price');
        $max_listing_price->setLabel('Max Listing Price')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:250px !important;'))
                  ->addValidator('NotEmpty');
				  
		$minnum_bed_rooms = new Zend_Form_Element_Text('minnum_bed_rooms');
        $minnum_bed_rooms->setLabel('Minnum Bed Rooms')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:50px !important;'))
                  ->addValidator('NotEmpty');
		$minnum_bath_rooms = new Zend_Form_Element_Text('minnum_bath_rooms');
        $minnum_bath_rooms->setLabel('Minnum Bath Rooms')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:50px !important;'))
                  ->addValidator('NotEmpty');
		$min_sq_ft = new Zend_Form_Element_Text('min_sq_ft');
        $min_sq_ft->setLabel('Min Sq ft')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:150px !important;'))
                  ->addValidator('NotEmpty');
		$is_manual = new Zend_Form_Element_Text('is_manual');
        $is_manual->setLabel('Is Manual')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:150px !important;'))
                  ->addValidator('NotEmpty');
		$came_from = new Zend_Form_Element_Text('came_from');
        $came_from->setLabel('Came From')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:250px !important;'))
                  ->addValidator('NotEmpty');
		$modified = new Zend_Form_Element_Text('modified');
        $modified->setLabel('Modified')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:250px !important;'))
                  ->addValidator('NotEmpty');

		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');
	  
				  

 
        $this->addElements(array(
			$account_id,
			$site_id,
			$group_id,
			$lead_quality,
			$last_login,
			$email,
			$password,
			$status,
			$salutation,
			$first_name,
			$mi,
			$last_name,
			$company,
			$home_phone,
			$work_phone,
			$cell_phone,
			$fax,
			$work_address,
			$work_city,
			$work_state,
			$work_zip,
			$work_county,
			$home_address,
			$home_city,
			$home_state,
			$home_zip,
			$home_county,
			$send_email_camp,
			$website,
			$birthday,
			$anniversary,
			$comments,
			$moving_on,
			$moving_on_date,
			$property_type,
			$min_listing_price,
			$max_listing_price,
			$minnum_bed_rooms,
			$minnum_bath_rooms,
			$min_sq_ft,
			$is_manual,
			$came_from,
			$modified
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