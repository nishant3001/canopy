<?php 
class Jameen_Admin_Forms_Reports extends Zend_Form{
    public function init()
    {
		 
		 $type = new Zend_Form_Element_Select('type');
		 $type ->setLabel('Type')
               ->setMultiOptions(array('0'=>'select','1'=>'Buyer', '2'=>'Seller','3'=>'Neutral'))
               ->setRequired(true)->addValidator('NotEmpty', true);
          
		 $title = new Zend_Form_Element_Text('title');
         $title ->setLabel('Title')
		 	    ->setAttribs(array('style' => 'width:550px !important;'))
                ->setRequired(true)
                ->addValidator('NotEmpty');

		 $seo_title = new Zend_Form_Element_Text('seo_title');
         $seo_title ->setLabel('Seo Title')
		 			->setAttribs(array('style' => 'width:550px !important;'))
                    ->setRequired(true)
                    ->addValidator('NotEmpty');
				  
		$preview_html = new Zend_Form_Element_Text('preview_html');
        $preview_html->setLabel('Preview Html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important; height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		$full_html = new Zend_Form_Element_Text('full_html');
        $full_html->setLabel('Full Html')
                  ->setRequired(true)
				  ->setAttribs(array('style' => 'width:550px !important;height:100px !important;'))
                  ->addValidator('NotEmpty');
				  
		 $is_active = new Zend_Form_Element_Select('is_active');
         $is_active->setLabel('Active')
		           ->setMultiOptions(array('0'=>'no', '1'=>'yes'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);
				  
		 $show_form = new Zend_Form_Element_Select('show_form');
         $show_form->setLabel('Show Form')
		           ->setMultiOptions(array('0'=>'select','1'=>'always','2'=>'once', '3'=>'ignore' ,'4' => 'never'))
               	   ->setRequired(true)->addValidator('NotEmpty', true);
				  
		 $success_url = new Zend_Form_Element_Text('success_url');
         $success_url->setLabel('Success URL')
		          	 ->setAttribs(array('style' => 'width:550px !important;'))
					 ->setRequired(true)
					 ->addValidator('NotEmpty');
					 
		$submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');


 
        $this->addElements(array(
			$type,
			$title,
			$seo_title,
			$preview_html,
			$full_html,
			$is_active,
			$show_form,
			$success_url
			
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