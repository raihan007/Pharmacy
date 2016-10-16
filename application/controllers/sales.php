<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('CommonModel','Common');
		$this->load->library('ErrorHandler',null,'Error');
	}

	public function Sell(){
		$data['title'] = 'Medicine Sell';
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->load->library('form_validation');

			if($this->form_validation->run('CategoryForm')){
				if(is_null($_POST['EntityNo']) || $_POST['EntityNo'] =="" )
				{
					$insertData = array(
						'Title' => $this->input->post('Title'),
						'Remarks' => $this->input->post('Remarks'),
					);

					$insertStatus = $this->Common->_Insert('Categories',$insertData);
					if( $insertStatus != 0){
						$this->session->set_flashdata('Notification', 'Data have been saved successfully.');
						$this->Error->setErrorMessage('success','Updated',$this->session->flashdata('Notification'));
					}else{
						$this->session->set_flashdata('Notification', 'Some problems occured, please try again.');
						$this->Error->setErrorMessage('warning','Wargin',$this->session->flashdata('Notification'));
					}
				}
				else{
					$where = array(
						'EntityNo' => $this->input->post('EntityNo'),
					);
					
					$updateDate = array(
						'Title' => $this->input->post('Title'),
						'Remarks' => $this->input->post('Remarks'),
					);

					$updateStatus = $this->Common->_Update('Categories',$where,$updateDate);

					if( $updateStatus != 0){
						$this->session->set_flashdata('Notification', 'Data have been updated successfully.');
						$this->Error->setErrorMessage('info','Updated',$this->session->flashdata('Notification'));
					}else{
						$this->session->set_flashdata('Notification', 'Some problems occured, please try again.');
						$this->Error->setErrorMessage('warning','Wargin',$this->session->flashdata('Notification'));
					}
				}
			}
		}

		if ($this->Error->hasNotification()) {
			$this->Error->getErrorMessage();
		}

		$this->load->view('Sales/Sell',$data);
	}

	public function DeleteCategory()
	{
		$formData = $this->input->post('formData');
		$EntityNo = $formData['EntityNo'];

		//Pass user data to model
		$deleteStatus = $this->Common->_Delete('Categories',$EntityNo);		

		//Storing insertion status message.
		if($deleteStatus){
		   $data['status'] = true;
		}else{
		    $data['status'] = false;
		}

		echo json_encode($data);
	}



	//validation extended methods
	function check_category_title($Title) 
	{        
    	if($this->input->post('EntityNo'))
    	{
        	$EntityNo = $this->input->post('EntityNo');
    	}
    	else
    	{
        	$EntityNo = '';
    	}
    	$result = $this->Common->check_unique_category_title($EntityNo, $Title);
    	if($result == 0)
    	{
        	$response = true;
    	}
    	else 
    	{
       		$this->form_validation->set_message('check_category_title', 'Title must be unique');
        	$response = false;
    	}
    	return $response;
	}

	//Json Data Return
	public function Categories_json()
	{
		$TotalCategories = $this->Common->getTotalCategories();
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
		
		$data['rows'] = $this->Common->_Get($type,$search,$sort,$order,$limit, $offset);
		$data['total'] = $TotalCategories;
		echo json_encode($data);
	}

	public function test()
	{
		//take=5&skip=0&page=1&pageSize=5&SearchKey=gfgfdgdf&SearchType=EntityNo
		$TotalCategories = $this->Common->getTotalCategories();
		if(isset($_REQUEST['SearchKey']) && isset($_REQUEST['SearchType'])){
        	$search = $_REQUEST['SearchKey'];
        	$type = $_REQUEST['SearchType'];
    	}else{
        	$search = '';
        	$type = '';
    	}

		$offset = $_REQUEST['skip'];
		$limit = $_REQUEST['pageSize'];
		
		$data['rows'] = $this->Common->_Get1($type,$search,$limit,$offset);
		$data['total'] = $TotalCategories;
		echo json_encode($data);
	}
}
