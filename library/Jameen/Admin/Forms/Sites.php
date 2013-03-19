<?php 
class Jameen_Admin_Forms_Sites extends Zend_Form{
    public function init()
    {
		 
		 $account_id = new Zend_Form_Element_Text('account_id');
		 $account_id ->setLabel('Account Id')
						->setAttribs(array('style' => 'width:70px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
		 $template_id = new Zend_Form_Element_Text('template_id');
		 $template_id ->setLabel('Template Id')
						->setAttribs(array('style' => 'width:70px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
		 $domain = new Zend_Form_Element_Text('domain');
		 $domain ->setLabel('Domain')
						->setAttribs(array('style' => 'width:550px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');

          
		 $is_active = new Zend_Form_Element_Select('is_active');
         $is_active->setLabel('Active')
		           ->setMultiOptions(array('0'=>'no', '1'=>'yes'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);

		 $template_html = new Zend_Form_Element_Text('template_html');
         $template_html ->setLabel('Template Html')
		 			->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                    ->setRequired(true)
                    ->addValidator('NotEmpty');
				  
		$body_html = new Zend_Form_Element_Text('body_html');
        $body_html->setLabel('Body Html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important; height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$property_listings_top_html = new Zend_Form_Element_Text('property_listings_top_html');
        $property_listings_top_html->setLabel('Property Listings Top Html')
								  ->setRequired(true)
								  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
								  ->addValidator('NotEmpty');
				  
		$property_listings_html = new Zend_Form_Element_Text('property_listings_html');
        $property_listings_html->setLabel('Property Listings Html')
								  ->setRequired(true)
								  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
								  ->addValidator('NotEmpty');
				  
		$property_listings_bottom_html = new Zend_Form_Element_Text('property_listings_bottom_html');
        $property_listings_bottom_html->setLabel('Property Listings Bottom Html')
									  ->setRequired(true)
									  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
									  ->addValidator('NotEmpty');
				  
		$property_detail_html = new Zend_Form_Element_Text('property_detail_html');
        $property_detail_html->setLabel('Property Detail Html')
							  ->setRequired(true)
							  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
							  ->addValidator('NotEmpty');
				  
		$css = new Zend_Form_Element_Text('css');
        $css->setLabel('Css')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$buyer_html = new Zend_Form_Element_Text('buyer_html');
        $buyer_html->setLabel('Buyer Html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$seller_html = new Zend_Form_Element_Text('seller_html');
        $seller_html->setLabel('Seller Html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$splash_html = new Zend_Form_Element_Text('splash_html');
        $splash_html->setLabel('Splash Html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$login_html = new Zend_Form_Element_Text('login_html');
        $login_html->setLabel('Login Html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$send_to_friend_html = new Zend_Form_Element_Text('send_to_friend_html');
        $send_to_friend_html->setLabel('Send To Friend Html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$form_short = new Zend_Form_Element_Text('form_short');
        $form_short->setLabel('Form Short')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
		$form_long = new Zend_Form_Element_Text('form_long');
        $form_long->setLabel('Form Long')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
		$form_buyer = new Zend_Form_Element_Text('form_buyer');
        $form_buyer->setLabel('Form Buyer')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
		$form_seller = new Zend_Form_Element_Text('form_seller');
        $form_seller->setLabel('form_seller')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
		$form_contact = new Zend_Form_Element_Text('form_contact');
        $form_contact->setLabel('Form Contact')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
		$form_custom1 = new Zend_Form_Element_Text('form_custom1');
        $form_custom1->setLabel('form_custom1')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
		$form_custom2 = new Zend_Form_Element_Text('form_custom2');
        $form_custom2->setLabel('Form Custom2')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
		$form_custom3 = new Zend_Form_Element_Text('form_custom3');
        $form_custom3->setLabel('Form Custom3')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');

		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');
	  
				  

 
        $this->addElements(array(
			$account_id,
			$template_id,
			$domain,
			$is_active,
			$template_html,
			$body_html,
			$property_listings_top_html,
			$property_listings_html,
			$property_listings_bottom_html,
			$property_detail_html,
			$css,
			$buyer_html,
			$seller_html,
			$splash_html,
			$login_html,
			$send_to_friend_html,
			$form_short,
			$form_long,
			$form_buyer,
			$form_seller,
			$form_contact,
			$form_custom1,
			$form_custom2,
			$form_custom3
			
			
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