<?php 
class Jameen_Admin_Forms_Accounts extends Zend_Form{
   
    public function init()
    {
		 $reply_to = new Zend_Form_Element_Text('reply_to');
		 $reply_to ->setLabel('Reply To')
						->setAttribs(array('style' => 'width:550px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
          
		 $html_signature = new Zend_Form_Element_Text('html_signature');
         $html_signature->setLabel('Html Signature')
						->setAttribs(array('style' => 'width:550px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');

		 $primary_phone = new Zend_Form_Element_Text('primary_phone');
         $primary_phone ->setLabel('Primary Phone')
		 			->setAttribs(array('style' => 'width:250px !important;'))
                    ->setRequired(true)
                    ->addValidator(new Zend_Validate_Digits(isValid("+1234567890")));
				  
		$cell_phone = new Zend_Form_Element_Text('cell_phone');
        $cell_phone->setLabel('Cell Phone')
						->setAttribs(array('style' => 'width:250px !important;'))
						->setRequired(true)
						->addValidator( new Zend_Validate_Digits(isValid("+1234567890")));
				  
		$fax = new Zend_Form_Element_Text('fax');
		$fax->setLabel('Fax')
						->setAttribs(array('style' => 'width:250px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$company = new Zend_Form_Element_Text('company');
        $company->setLabel('Company')
						->setAttribs(array('style' => 'width:550px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$address = new Zend_Form_Element_Text('address');
        $address->setLabel('Address')
						->setAttribs(array('style' => 'width:550px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$address2 = new Zend_Form_Element_Text('address2');
        $address2->setLabel('Address2')
						->setAttribs(array('style' => 'width:550px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
				  
		$city = new Zend_Form_Element_Text('city');
        $city->setLabel('City')
						->setAttribs(array('style' => 'width:250px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$state = new Zend_Form_Element_Text('state');
        $state->setLabel('State')
						->setAttribs(array('style' => 'width:250px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$zip = new Zend_Form_Element_Text('zip');
        $zip->setLabel('Zip')
						->setAttribs(array('style' => 'width:150px !important;'))
						->setRequired(true)
						->addValidator(
						 new Zend_Validate_Digits(isValid("1234567890"))
 
						);
				  
		$email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('EmailAddress',  TRUE);
										  
		$report_template_id = new Zend_Form_Element_Select('report_template_id');
        $report_template_id ->setLabel('Report Template')
        	->setRequired(true)
       		->setMultiOptions(Jameen_ReportsTemplates::getMultiList());
		
		$followup_template_id = new Zend_Form_Element_Select('followup_template_id');
        $followup_template_id ->setLabel('Followup Template')
        	->setRequired(true)
       		->setMultiOptions(Jameen_FollowupemailTemplates::getMultiList());
		
			
		$followup_enabled = new Zend_Form_Element_MultiCheckbox('followup_enabled');
		$followup_enabled->setLabel('Followup Enabled')
			   ->setRequired(true)
			    ->setAttribs(array('style' => 'width:53px !important;'))
			   ->addMultiOptions(array('checkedValue'   => false
             ));
			   
		$sms_enabled = new Zend_Form_Element_MultiCheckbox('sms_enabled');
		$sms_enabled->setLabel('Sms Enabled')
			   ->setRequired(true)
			   ->setAttribs(array('style' => 'width:53px !important;'))
			   ->addMultiOptions(array('checkedValue'   => false
             ));
			   
						
		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');
	  
        $this->addElements(array(
			$reply_to,
			$html_signature,
			$primary_phone,
			$cell_phone,
			$fax,
			$company,
			$address,
			$address2,
			$city,
			$state,
			$zip,
			$email,
			$report_template_id,
			$followup_template_id,
			$followup_enabled,
			$sms_enabled,
			
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