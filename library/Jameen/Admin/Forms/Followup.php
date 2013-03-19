<?php 
class Jameen_Admin_Forms_Followup extends Zend_Form{
    public function init()
    {
         
		$contact_group_id = new Zend_Form_Element_Select('contact_group_id');
        $contact_group_id ->setLabel('Contact Group')
        	->setRequired(true)
       		->setMultiOptions(Jameen_ContactGroups::getMultiList());

		 
		 $day = new Zend_Form_Element_Text('day');
         $day->setLabel('Day')
                  ->setRequired(true)
                  ->addValidator('NotEmpty');
				 
		$subject = new Zend_Form_Element_Text('subject');
        $subject->setLabel('Subject')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;'))
                  ->addValidator('NotEmpty');

        $email_body_html = new Zend_Form_Element_Textarea('email_body_html');
        $email_body_html->setLabel('Email body html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important; height:180px !important'))
                  ->addValidator('NotEmpty');

		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');

 
        $this->addElements(array(
			$contact_group_id,
        	$day,
        	$subject,
            $email_body_html,
            $submit
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