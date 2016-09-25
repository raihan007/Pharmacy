<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('CoursesModel','Courses');
	}

	public function AllCourses()
	{
		$data['title'] = "Courses";

		$totalCourses = $this->Courses->getTotalCoursesCount();

		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('Courses/AllCourses'),
			'per_page' => 5,
			'total_rows' => $totalCourses,
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
			
		$data['CoursesList'] = $this->Courses->getCoursesList($config['per_page'],$this->uri->segment(3));
		$data['TotalCourses'] = $totalCourses;
		$this->load->view('Courses/Index',$data);
	}

	public function Create(){
		$data['title'] = "Courses";
		$data['Program'] = $this->Courses->get_dropdown_list();

		if($this->input->post('submit')){
			print_r($this->input->post());
		}
		else{
   			$this->load->view('Courses/Create',$data);
   		}
	}

	public function Update($BatchId){
		$post = $this->input->post();
		unset($post['BatchId']);
		$table = "Batches";
		$where = array(
			'BatchId' => $BatchId,
		);

		//Pass user data to model
		$updateStatus = $this->Batches->_updateRowWhere($table,$where,$post);
		            
		//Storing insertion status message.
		if($updateStatus){
			$this->session->set_flashdata('success', 'Batch data have been updated successfully.');
		}else{
			$this->session->set_flashdata('error', 'Some problems occured, please try again.');
		}

		return redirect(base_url('Batches/AllBatches'));
	}

	public function Delete($BatchId)
	{
		
		$table = "Batches";

		//Pass user data to model
		$daleteEmpData = $this->Batches->_deleteRowWhere($table,$BatchId);		
			
		//Storing insertion status message.
		if($daleteEmpData){
		    $this->session->set_flashdata('success', 'Batch data have been deleted successfully.');
		}else{
		    $this->session->set_flashdata('error', 'Some problems occured, please try again.');
		}

		return redirect(base_url('Batches/AllBatches'));
	}


	public function CheckBatchName(){
		$BatchName = $this->input->post('BatchName');
		$data = array('STATUS' => $this->Batches->checkExistsBatchName($BatchName));
		echo json_encode($data);
	}
}