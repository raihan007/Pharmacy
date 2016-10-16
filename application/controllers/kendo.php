<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendo extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('CommonModel','Common');
		$this->load->library('ErrorHandler',null,'Error');
	}

	public function Category()
	{
		$data['title'] = 'Medicine Category';
		
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

		$this->load->view('kendo/Index',$data);
	}
}