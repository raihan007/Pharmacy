<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicines extends CI_Controller {

	function __construct() {
		
		parent::__construct();
		$this->load->model('MedicineModel','Medicine');
		$this->load->library('ErrorHandler',null,'Error');
		$this->load->library('UniqueKey');
	}

	public function AllMedicines()
	{
		$data['title'] = 'Medicines';

		if ($this->session->flashdata('Notification')) {
			$Notification = (object) $this->session->flashdata('Notification');
			$this->Error->setErrorMessage($Notification->type,$Notification->title,$Notification->body);
			$this->Error->getErrorMessage();
		}

		$this->load->view('Medicines/AllMedicines',$data);
	}

	public function Create()
	{
		$data['title'] = 'Add Medicine';
		$data['Manufacturer'] = $this->Medicine->Get_Manufacturer_List();
		$data['Manufacturer'] = array(' ' => '-- Select Manufacturer --') + $data['Manufacturer'];
		$data['Category'] = $this->Medicine->Get_Category_List();
		$data['Category'] = array(' ' => '-- Select Category --') + $data['Category'];

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->load->library('form_validation');

			if($this->form_validation->run('NewMedicineForm')){
				
				$insertData = $this->input->post();
				$insertData['MedicineId'] = $this->uniquekey->GUID();
				
				$insertStatus = $this->Medicine->Insert($insertData);
				if( $insertStatus != 0){
					$notification  = array(
					 	'type' => 'success',
					 	'title' => 'Done',
					 	'body' => 'Data have been saved successfully!',
					);
				}else{
					$notification  = array(
					 	'type' => 'warning',
					 	'title' => 'Wargin',
					 	'body' => 'Some problems occured, please try again!',
					);
				}
				$this->session->set_flashdata('Notification', $notification);
				redirect('Medicines/AllMedicines','refreash');
			}
		}

		$this->load->view('Medicines/Create',$data);
	}

	public function Edit($EntityNo)
	{
		$data['title'] = 'Edit Medicine';
		$data['Medicine'] = $this->Medicine->GetWhere(false,array('EntityNo' => $EntityNo));
		$data['Manufacturer'] = $this->Medicine->Get_Manufacturer_List();
		$data['Manufacturer'] = array(' ' => '-- Select Manufacturer --') + $data['Manufacturer'];
		$data['Category'] = $this->Medicine->Get_Category_List();
		$data['Category'] = array(' ' => '-- Select Category --') + $data['Category'];

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->load->library('form_validation');

			if($this->form_validation->run('NewMedicineForm')){
				$Where = (array)$data['Medicine'];
				$UpdateData = $this->input->post();

				unset($UpdateData['EntityNo'],$UpdateData['MedicineId']);

				$UpdateStatus = $this->Medicine->Update($Where,$UpdateData);
				
				if( $UpdateStatus != 0){
					$notification  = array(
					 	'type' => 'info',
					 	'title' => 'Done',
					 	'body' => 'Data have been updated successfully!',
					);
				}else{
					$notification  = array(
					 	'type' => 'warning',
					 	'title' => 'Wargin',
					 	'body' => 'Some problems occured, please try again!',
					);
				}

				$this->session->set_flashdata('Notification', $notification);
				redirect('Medicines/AllMedicines','refreash');
			}
		}
		
		$this->load->view('Medicines/Edit',$data);
	}

	public function Remove($EntityNo)
	{
		$data['title'] = "Delete Medicine";
		
		$data['Medicine'] = $this->Medicine->GetWhere(true,array('EntityNo' => $EntityNo));
			
		$this->load->view('Medicines/Delete',$data);
	}

	public function Details($EntityNo)
	{
		$data['title'] = "Details Medicine";
		
		$data['Medicine'] = $this->Medicine->GetWhere(true,array('EntityNo' => $EntityNo));
			
		$this->load->view('Medicines/Details',$data);
	}

	public function Delete(){

		$EntityNo = $this->input->post('EntityNo');
		$Medicine = $this->Medicine->GetWhere(false,array('EntityNo' => $EntityNo));
		$Medicine =  (array) $Medicine;

		//Pass user data to model
		//$deleteStatus = $this->Medicine->Delete($Medicine);		
		$deleteStatus = true;
		//Storing insertion status message.
		if($deleteStatus){
			$notification  = array(
			 	'type' => 'success',
			 	'title' => 'Done',
			 	'body' => 'Data have been deleted successfully!',
			);
		    
		}else{
		    $notification  = array(
			 	'type' => 'error',
			 	'title' => 'Wrong',
			 	'body' => 'Please try again!',
			);
		}
		$this->session->set_flashdata('Notification', $notification);
		redirect('Medicines/AllMedicines','refreash');
	}


	//Start Json Data Return Methods
	public function MedicinesInfo_json()
	{
		$Total = $this->Medicine->GetTotalCount();
		if(isset($_REQUEST['search']) && isset($_REQUEST['type'])){
        	$search = $_REQUEST['search'];
        	$type = $_REQUEST['type'];
    	}else{
        	$search = '';
        	$type = '';
    	}
		$sort =$_REQUEST['sort'];
		$order = $_REQUEST['order'];
		$offset = $_REQUEST['offset'];
		$limit = $_REQUEST['limit'];
		
		$data['rows'] = $this->Medicine->Get(true,$type,$search,$sort,$order,$limit,$offset);
		$data['total'] = $Total;
		echo json_encode($data);
	}
	//End Json Data Return Methods


	
	//Start of validation extended methods
	function Check_Is_Float($value) 
	{        
    	$result = preg_match('/^-?(?:\d+|\d*\.\d+)$/', $value);

    	if($result == 0)
    	{
        	$this->form_validation->set_message('Check_Is_Float', 'Please enter valid number');
        	$response = false;
    	}
    	else 
    	{
        	$response = true;
    	}
    	return $response;
	}

	public function test(){
		/*$empInfo =  array(
			'canGet' => 1000,
			'canCreate' => 1001,
			'canEdit' => 1002,
			'canDelete' => 1003 
		);


		$key = array_search (1001, $empInfo);

		echo $key;*/

		if($this->Medicine->PermissionStatus('25025E-8C57-48C7-BB68-187A52F26926')){
			$notification  = array(
			 	'type' => 'success',
			 	'title' => 'Done',
			 	'body' => 'Data have been deleted successfully!',
			);
		}
		else{
			$notification  = array(
			 	'type' => 'error',
			 	'title' => 'Opss!',
			 	'body' => 'Sorry you have no permission for this action!',
			);
		}
		$this->session->set_flashdata('Notification', $notification);
		redirect('Medicines/AllMedicines','refreash');
	}


	//validation extended methods
	function Check_Is_Unique($Value) 
	{        
    	if($this->input->post('EntityNo'))
    	{
        	$EntityNo = $this->input->post('EntityNo');
    	}
    	else
    	{
        	$EntityNo = '';
    	}

    	$result = $this->Medicine->IsUnique(array('Name' => $Value),array('EntityNo' => $EntityNo));

    	if($result == 0)
    	{
        	$response = true;
    	}
    	else 
    	{
       		$this->form_validation->set_message('Check_Is_Unique', 'Please provide unique %s');
        	$response = false;
    	}
    	return $response;
	}

	//End of validation extented methods
}
