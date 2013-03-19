<?php
	class Admin_ListingsController extends Zend_Controller_Action {
		const ITEMS_PER_PAGE = 10;
	
		public function init(){
			
			if (!Jameen_Auth::isLoggedIn()){
				$this->_redirect('/admin/login');
			}
			$this->view->user= $this->user = Jameen_Auth::getIdentity();
		}
		
	public function indexAction(){
		    $this->view->internalMessages = Jameen_Alerts_Internal::getMessages($this->getRequest());
			$page = $this->_getParam('page', 1);
			$this->view->searchText = $this->_getParam('q');
			$this->view->paramSort = (int) $this->_getParam('sort');
			$this->view->paramSequence = $this->_getParam('seq');
			$seq = $this->view->paramSequence == 'desc' ? ' desc' : '';
			$this->view->paramQuery = $this->_getParam('q');
			$this->view->dataFields = array('listing_type_id','house_style','list_price','city_id', 'zip_code','status','modified');
			$db = Zend_Db_Table::getDefaultAdapter();
			$db->setFetchMode(Zend_Db::FETCH_OBJ);
			$select = $db->select();
			$select->from(array('listings'), array('*'));
			$select->order(array_key_exists($this->view->paramSort, $this->view->dataFields) ? $this->view->dataFields[$this->view->paramSort] . "$seq" : $this->view->dataFields[0]);
			$paginator = Zend_Paginator::factory($select);
			$paginator->setItemCountPerPage(self::ITEMS_PER_PAGE);
			$paginator->setCurrentPageNumber($page);
			$this->view->paginator = $paginator;
			$this->view->numCount = $paginator->getTotalItemCount();
    }
		
		
	public function addAction(){
		$form = new Jameen_Admin_Forms_PropertyGeneral();
		$general = new Jameen_Listings($this->getRequest()->getParam('id'));
		$form->addElement('hidden', 'id', array('value' => $general->id)) ;
		if($general->id){
			$form->listing_type_id->setValue($general->listing_type_id);
			$form->status->setValue($general->status);
			$form->house_style->setValue($general->house_style);
			$form->list_price->setValue($general->list_price);
			$form->listing_date->setValue($general->listing_date);
			$form->city_id->setValue($general->city_id);
			$form->area_id->setValue($general->area_id);
			$form->zip_code->setValue($general->zip_code);
			$form->disp_address->setValue($general->disp_address);
			$form->description->setValue($general->description);
			$form->basement->setValue($general->basement);
			$form->garage->setValue($general->garage);
			$form->year_built->setValue($general->year_built);
			$form->lot_size->setValue($general->lot_size);
			$form->lot_size_type->setValue($general->lot_size_type);
			$form->sqft_area->setValue($general->sqft_area);
			$form->bed_rooms->setValue($general->bed_rooms);
			$form->bath_rooms->setValue($general->bath_rooms);
			$form->tubs->setValue($general->tubs);
			$form->stalls->setValue($general->stalls);
			$form->roof_type->setValue($general->roof_type);
			$form->exterior->setValue($general->exterior);
			$form->interior->setValue($general->interior);
			$form->stories->setValue($general->stories);
			$form->kitchen->setValue($general->kitchen);
			$form->room_other->setValue($general->room_other);
			$form->construction->setValue($general->construction);
			$form->floor->setValue($general->floor);
			$form->total_floor->setValue($general->total_floor);
			$form->facing->setValue($general->facing);
			$form->heat_system->setValue($general->heat_system);
			$form->furnished->setValue($general->furnished);
			$form->ownership_type->setValue($general->ownership_type);
			$form->latitude->setValue($general->latitude);
			$form->longitude->setValue($general->longitude);

		}
		
		if ($this->_request->isPost()) {
			$formData = $this->_request->getPost();
			//print_r($formData);
			//die;
			if ($form->isValid($formData)) {
				//write code to save into databse
				$general->listing_type_id =  $formData['listing_type_id'];
				$general->status =  $formData['status'];
				$general->house_style = $formData['house_style'];
				$general->list_price =  $formData['list_price'];
				$general->listing_date =  $formData['listing_date'];
				$general->city_id =  $formData['city_id'];
				$general->area_id =  $formData['area_id'];
				$general->zip_code =  $formData['zip_code'];
				$general->disp_address =  $formData['disp_address'];
				$general->description = $formData['description'];
				$general->basement =  $formData['basement'];
				$general->garage =  $formData['garage'];
				$general->year_built =  $formData['year_built'];
				$general->lot_size =  $formData['lot_size'];
				$general->lot_size_type =  $formData['lot_size_type'];
				$general->sqft_area =  $formData['sqft_area'];
				$general->bed_rooms = $formData['bed_rooms'];
				$general->bath_rooms =  $formData['bath_rooms'];
				$general->tubs =  $formData['tubs'];
				$general->stalls =  $formData['stalls'];
				$general->roof_type =  $formData['roof_type'];
				$general->exterior =  $formData['exterior'];
				$general->interior =  $formData['interior'];
				$general->stories = $formData['stories'];
				$general->kitchen =  $formData['kitchen'];
				$general->room_other =  $formData['room_other'];
				$general->construction =  $formData['construction'];
				$general->floor =  $formData['floor'];
				$general->total_floor =  $formData['total_floor'];
				$general->facing =  $formData['facing'];
				$general->heat_system = $formData['heat_system'];
				$general->furnished =  $formData['furnished'];
				$general->ownership_type =  $formData['ownership_type'];
				$general->latitude =  $formData['latitude'];
				$general->longitude =  $formData['longitude'];
				$id=$general->save();
				$message = new Jameen_Alerts_Internal('Listings saved successfully', 'success', 'listings', 'index', 'admin');
				$this->_redirect("/admin/listings"); 
			} 
			else {
				
				$form->populate($formData);
			}
		}
		
		$this->view->errors = array();
		foreach ($form->getMessages() as $field => $msgs) {
			foreach($msgs as $msg){
				$this->view->errors[$field] = $msg;
				break;
			}
		}
		
		$this->view->form = $form;
	}
	
	
	
   public function aminitiesAction(){
	   	$form = new Jameen_Admin_Forms_PropertyAminities();
		$aminities = new Jameen_Aminities($this->getRequest()->getParam('id'));
		$form->addElement('hidden', 'id', array('value' => $aminities->id)) ;
		$go = $this->getRequest()->getParam('id');
		if($aminities->id){
			$this->getRequest()->getParam('id')->setValue($aminities->listing_id);
			$form->amenitie_id->setValue($aminities->amenitie_id);
		}
		
		if ($this->_request->isPost()) {
			$formData = $this->_request->getPost();
			print_r($go);
			//die;
			if ($form->isValid($formData)) {
				//write code to save into databse
				$go =  $formData['listing_id'];
				$aminities->amenitie_id =  $formData['amenitie_id'];
				$id=$aminities->save();
				$message = new Jameen_Alerts_Internal('Aminities saved successfully', 'success', 'listings', 'index', 'admin');
				$this->_redirect("/admin/listings"); 
			} 
			else {
				echo 'go' ;
				$form->populate($formData);
			}
		}
		
		$this->view->errors = array();
		foreach ($form->getMessages() as $field => $msgs) {
			foreach($msgs as $msg){
				$this->view->errors[$field] = $msg;
				break;
			}
		}
		
		$this->view->form = $form;
   }
   
   
	public function photoAction(){
			$request = $this->getRequest();
			if ($request->isPost()) {
				$uploaddir =  $_SERVER['DOCUMENT_ROOT'] .'/img/media/';   
				$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
				if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {   
				} 
				else {  
				echo "error";  
				}  
			}
	}
	
	
	public function uploadAction(){
	}
		
	//delete listing action
	public function deleteAction(){
		  $id=$this->getRequest()->getParam('id'); 
		  if(isset($id)){
			$this->view->user=new Jameen_Listings($id); 
			$this->view->user->deletelistings($id);
			$message = new Jameen_Alerts_Internal('Listings Deleted successfully', 'success', 'listings', 'index', 'admin');
			$this->_redirect("/admin/listings"); 
		  }
		else{
			$form->populate($formData);
			}
	}
	
	public static function jsonEcho($data){
			header("content-type:text/json");
			echo json_encode($data);
			exit;
	}
	
}
	?>
