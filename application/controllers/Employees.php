<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

	function __construct() {
		
		parent::__construct();
		$this->load->model('EmployeesModel','Employee');
	}

	public function AllEmployees()
	{
		$data['title'] = "Employees Informations";
		$data['class'] = "Staff";

		$TotalEmployees = $this->Employee->getTotalEmployeesCount();

		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('Employees/AllEmployees'),
			'per_page' => 5,
			'total_rows' => $TotalEmployees,
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
			
		$data['EmployeesList'] = $this->Employee->getEmployeesList($config['per_page'],$this->uri->segment(3));
		$data['totalEmployees'] = $TotalEmployees;
		//print_r($data['EmployeesList']);
		$this->load->view('Employees/AllEmployees',$data);
	}


	public function Index()
	{
		$data['title'] = 'Employees Informations';
		/*if(! $this->session->userdata('user_id')){
			return redirect('Login');
		}else{
			$data['admin'] = $this->admin->getAdminInfo();
			$this->load->view('Admin/Index',$data);
		}*/
		$this->load->view('Admin/Index',$data);
	}
	public function CheckEmail()
	{
		$Key = $this->input->post('key');
		$this->load->model('EmployeesModel','Employee');
		$data = array('STATUS' => $this->Employee->checkExistsEmail($Key));
		echo json_encode($data);
	}

	public function Create()
	{
		$data['title'] = "Create";
		$data['class'] = "Staff";

		if($this->input->post('submit')){

			$this->load->library('form_validation');
			//$this->form_validation->set_rules('username', 'Username', 'required|trim');
			//$this->form_validation->set_rules('password', 'Password', 'required|trim');

			$this->form_validation->set_error_delimiters("<div class='text-danger error_text'>","</div>");

			if($this->form_validation->run('NewEmployeeForm'))
			{
				$UserId = $this->GUID();
				$FirstName = $this->input->post('FirstName');
				$Email = $this->input->post('Email');

				$config = array(
					'upload_path' => "uploads/",
					'allowed_types' => "gif|jpg|png|jpeg",
					'overwrite' => TRUE,
					'max_size' => "2048000",
					'max_height' => "1000",
					'max_width' => "1600",
					'file_name' => $UserId.'.jpg'
				);
				
				$this->load->library('upload');

				$this->upload->initialize($config);
				if($this->upload->do_upload('Photo')){
					$uploadData = $this->upload->data();
					//Prepare array of user data
		            $empData = array(
		                'UserId' => $UserId,
		                'FirstName' => $this->input->post('FirstName'),
		                'LastName' => $this->input->post('LastName'),
		                'Gender' => $this->input->post('Gender'),
		                'Email' => $this->input->post('Email'),
		                'Photo' => $uploadData['file_name'],
		                'PermanentAddress' => $this->input->post('PermanentAddress'),
		                'PresentAddress' => $this->input->post('PresentAddress'),
		                'PhoneNo' => $this->input->post('PhoneNo'),
		                'Birthdate' => $this->input->post('Birthdate'),
		                'BloodGroup' => $this->input->post('BloodGroup'),
		                'NationalIdNo' => $this->input->post('NationalIdNo'),
		                'Role' => $this->input->post('Role'),
		            );

		            $this->load->model('EmployeesModel','admin');

		            //Pass user data to model
		            $insertEmpData = $this->admin->saveEmployee($empData);
		            
		            //Storing insertion status message.
		            if($insertEmpData){
				    	$this->session->set_flashdata('success', 'Employee data have been added successfully.');
				    }else{
				    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
				    }

				    return redirect(base_url('Admin/Employees'));
				}
				else{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('Employees/Create', $error);
				}
			}
			else
			{
				$this->load->view('Employees/Create',$data);
			}
   		}
   		else
   		{
   			$this->load->view('Employees/Create',$data);
   		}
	}

	public function EditEmployee()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters("<div class='text-danger error_text'>","</div>");

		if($this->form_validation->run('NewEmployeeForm'))
		{
			$this->load->model('EmployeesModel','admin');

			$EntityNo = $this->input->post('EntityNo');
			
			$date['employee'] = $this->admin->getEmpById($EntityNo);

			$UserId = $date['employee']->UserId;
			
			//Check whether user upload picture
            if(!empty($_FILES['Photo']['name'])){
            	$config = array(
					'upload_path' => "uploads/",
					'allowed_types' => "gif|jpg|png|jpeg",
					'overwrite' => TRUE,
					'max_size' => "2048000",
					'max_height' => "1000",
					'max_width' => "1600",
					'file_name' => $UserId.'.jpg'
				);

				$this->load->library('upload');

				$this->upload->initialize($config);

				if($this->upload->do_upload('Photo')){
					$uploadData = $this->upload->data();

					$where = array(
			            'EntityNo' => $EntityNo,
			            'UserId' => $UserId,
			        );

					//Prepare array of user data
			        $empData = array(
				       	'FirstName' => $this->input->post('FirstName'),
				       	'LastName' => $this->input->post('LastName'),
				       	'Gender' => $this->input->post('Gender'),
				       	'Email' => $this->input->post('Email'),
				       	'Photo' => $uploadData['file_name'],
				       	'PermanentAddress' => $this->input->post('PermanentAddress'),
				       	'PresentAddress' => $this->input->post('PresentAddress'),
				       	'PhoneNo' => $this->input->post('PhoneNo'),
				       	'Birthdate' => $this->input->post('Birthdate'),
				       	'BloodGroup' => $this->input->post('BloodGroup'),
				       	'NationalIdNo' => $this->input->post('NationalIdNo'),
				       	'Role' => $this->input->post('Role'),
			        );
				}
            }
            else{
            	$where = array(
		           	'EntityNo' => $EntityNo,
		           	'UserId' => $UserId,
		        );
            	//Prepare array of user data
		        $empData = array(
		        	'FirstName' => $this->input->post('FirstName'),
		        	'LastName' => $this->input->post('LastName'),
		        	'Gender' => $this->input->post('Gender'),
		           	'Email' => $this->input->post('Email'),
		          	'PermanentAddress' => $this->input->post('PermanentAddress'),
		          	'PresentAddress' => $this->input->post('PresentAddress'),
		           	'PhoneNo' => $this->input->post('PhoneNo'),
		           	'Birthdate' => $this->input->post('Birthdate'),
		          	'BloodGroup' => $this->input->post('BloodGroup'),
		           	'NationalIdNo' => $this->input->post('NationalIdNo'),
		          	'Role' => $this->input->post('Role'),
		        );
            }

			$this->load->model('EmployeesModel','admin');	
			$table = "users_info";
			//Pass user data to model
		    $updateEmpData = $this->admin->_updateRowWhere($table,$where,$empData);		
			
			//Storing insertion status message.
		    if($updateEmpData){
		    	$this->session->set_flashdata('success', 'Employee data have been updated successfully.');
		    }else{
		    	$this->session->set_flashdata('error', 'Some problems occured, please try again.');
		    }

		    return redirect(base_url('Admin/Employees'));
		}
		else{
			$this->load->view('Admin/EditEmployee');
		}
	}

	public function Edit($EntityNo)
	{
		$data['title'] = "Edit Employee";
		$data['class'] = "Staff";
		
		$data['employee'] = $this->Employee->getEmpById($EntityNo);
			
		$this->load->view('Employees/Edit',$data);
	}

	public function Delete($EntityNo)
	{
		$data['title'] = "Delete Employee";
		$data['class'] = "Staff";
		
		$data['employee'] = $this->Employee->getEmpById($EntityNo);
			
		$this->load->view('Employees/Delete',$data);
	}

	public function Details($EntityNo)
	{
		$data['title'] = "Details of Employee Informations";
		$data['class'] = "Staff";
		
		$data['employee'] = $this->Employee->getEmpById($EntityNo);
			
		$this->load->view('Employees/Details',$data);
	}

	public function DeleteEmployee()
	{
		$EntityNo = $this->input->post('EntityNo');

		$this->load->model('EmployeesModel','admin');
		
		$table = "users_info";

		//Pass user data to model
		$daleteEmpData = $this->admin->_deleteRowWhere($table,$EntityNo);		
			
		//Storing insertion status message.
		if($daleteEmpData){
		    $this->session->set_flashdata('success', 'Employee data have been deleted successfully.');
		}else{
		    $this->session->set_flashdata('error', 'Some problems occured, please try again.');
		}

		return redirect(base_url('Admin/Employees'));
	}

	public function GUID()
	{
	    if (function_exists('com_create_guid') === true)
	    {
	        return trim(com_create_guid(), '{}');
	    }

	    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
}
?>