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

		if ($this->Error->hasNotification()) {
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
					$this->session->set_flashdata('Notification', 'Data have been saved successfully.');
					$this->Error->setErrorMessage('success','Done',$this->session->flashdata('Notification'));
				}else{
					$this->session->set_flashdata('Notification', 'Some problems occured, please try again.');
					$this->Error->setErrorMessage('warning','Wargin',$this->session->flashdata('Notification'));
				}
			}
		}

		if ($this->Error->hasNotification()) {
			$this->Error->getErrorMessage();
		}

		$this->load->view('Medicines/Create',$data);
	}

	public function Edit($EntityNo)
	{
		$data['title'] = 'Edit Medicine';
		$data['Medicine'] = $this->Medicine->GetById(array('EntityNo' => $EntityNo));
		$data['Manufacturer'] = $this->Medicine->Get_Manufacturer_List();
		$data['Manufacturer'] = array(' ' => '-- Select Manufacturer --') + $data['Manufacturer'];
		$data['Category'] = $this->Medicine->Get_Category_List();
		$data['Category'] = array(' ' => '-- Select Category --') + $data['Category'];
		$this->load->view('Medicines/Edit',$data);
	}

	public function test(){
		echo $this->uniquekey->GUID();
	}


	
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
