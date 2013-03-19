<?php 
class Jameen_Admin_Forms_PropertyAminities extends Zend_Form{
    public function init()
    {
         
		$name = new Zend_Form_Element_MultiCheckbox('name');
        $name ->setLabel('Aminities Name')
        	  ->setRequired(true)
       		  ->setMultiOptions(Jameen_Listings::getMultiList());

		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');

 
        $this->addElements(array(
			$name,
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