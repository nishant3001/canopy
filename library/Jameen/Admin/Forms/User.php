<?php 
class Jameen_Admin_Forms_User extends Zend_Form{
    public function init()
    {
		 
		 $account_id = new Zend_Form_Element_Text('account_id');
		 $account_id ->setLabel('Account Id')
						->setAttribs(array('style' => 'width:50px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
						
		 $email = new Zend_Form_Element_Text('email');
		 $email ->setLabel('Email')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('EmailAddress',  TRUE);
						
		 $user_name = new Zend_Form_Element_Text('user_name');
		 $user_name ->setLabel('User Name')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');

          
		 $fname = new Zend_Form_Element_Text('fname');
         $fname->setLabel('First Name')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');

		 $lname = new Zend_Form_Element_Text('lname');
         $lname ->setLabel('Last Name')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$password = new Zend_Form_Element_Text('password');
        $password->setLabel('Password')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$role = new Zend_Form_Element_Text('role');
        $role->setLabel('Role')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$phone = new Zend_Form_Element_Text('phone');
        $phone->setLabel('Phone')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$gender = new Zend_Form_Element_Text('gender');
        $gender->setLabel('Gender')
						->setAttribs(array('style' => 'width:250px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$active = new Zend_Form_Element_Select('active');
        $active->setLabel('Active')
		           ->setMultiOptions(array('0'=>'no', '1'=>'yes'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);
				  
		$image = new Zend_Form_Element_Text('image');
        $image->setLabel('Image ')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');
				  
		$updated = new Zend_Form_Element_Text('updated');
        $updated->setLabel('Updated')
						->setAttribs(array('style' => 'width:350px !important;'))
						->setRequired(true)
						->addValidator('NotEmpty');

		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');
	  
				  

 
        $this->addElements(array(
			$account_id,
			$email,
			$user_name,
			$fname,
			$lname,
			$password,
			$role,
			$phone,
			$gender,
			$active,
			$image,
			$updated,
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