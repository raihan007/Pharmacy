<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ProgramsModel','Programs');
	}

	public function AllPrograms()
	{
		$data['title'] = "Educational Programs";

		$totalPrograms = $this->Programs->getTotalProgramsCount();

		$data['batch'] = $this->Programs->get_dropdown_list();

		$data['batch'] = array('0' => '-- Select Supervisor --') + $data['batch'];

		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('Programs/AllPrograms'),
			'per_page' => 5,
			'total_rows' => $totalPrograms,
		];

		//config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
			
		$data['programsList'] = $this->Programs->getProgramsList($config['per_page'],$this->uri->segment(3));
		$data['totalPrograms'] = $totalPrograms;
		$this->load->view('Programs/Index',$data);
	}

	public function AddProgram(){
		$post = $this->input->post();
		unset($post['ProgramId']);
		//Pass user data to model
		$insertStatus = $this->Programs->Save($post);
		            
		//Storing insertion status message.
		if($insertStatus){
			$this->session->set_flashdata('success', 'Program data have been added successfully.');
		}else{
			$this->session->set_flashdata('error', 'Some problems occured, please try again.');
		}

		return redirect(base_url('Programs/AllPrograms'));
	}

	public function Update($ProgramId){
		$post = $this->input->post();
		unset($post['ProgramId']);
		$table = "educational_programs";
		$where = array(
			'ProgramId' => $ProgramId,
		);

		//Pass user data to model
		$updateStatus = $this->Programs->_updateRowWhere($table,$where,$post);
		            
		//Storing insertion status message.
		if($updateStatus){
			$this->session->set_flashdata('success', 'Program data have been updated successfully.');
		}else{
			$this->session->set_flashdata('error', 'Some problems occured, please try again.');
		}

		return redirect(base_url('Programs/AllPrograms'));
	}

	public function Delete($ProgramId)
	{
		
		$table = "educational_programs";

		//Pass user data to model
		$daleteEmpData = $this->Programs->_deleteRowWhere($table,$ProgramId);		
			
		//Storing insertion status message.
		if($daleteEmpData){
		    $this->session->set_flashdata('success', 'Program data have been deleted successfully.');
		}else{
		    $this->session->set_flashdata('error', 'Some problems occured, please try again.');
		}

		return redirect(base_url('Programs/AllPrograms'));
	}


	public function CheckProgramName(){
		$ProgramName = $this->input->post('ProgramName');
		$data = array('STATUS' => $this->Programs->checkExistsProgramName($ProgramName));
		echo json_encode($data);
	}

	public function Type(){
		$data['Type'] = $this->Programs->Type();
		echo json_encode($data);
	}
}