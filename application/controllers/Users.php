<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include("Entities/permission.php");
class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('UsersModel','Users');
	}


	public function Permission(){
		$permission = new permission();
		$data['empPermission'] = $permission->get_empPermission();
		$data['medPermission'] = $permission->get_medPermission();

		$data['title'] = "Permission";

		$TotalActivities = $this->Users->getTotalUsers();

		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('Users/LogActivity'),
			'per_page' => 5,
			'total_rows' => $TotalActivities,
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
			
		$data['ActivitiesList'] = $this->Users->getUsersFullname($config['per_page'],$this->uri->segment(3));
		$data['totalActivities'] = $TotalActivities;

		$this->load->view('Admin/Permission',$data);
	}

	public function LogActivity()
	{
		$data['title'] = "Log Activity";

		$TotalActivities = $this->Users->getTotalActivitiesCount();

		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('Users/LogActivity'),
			'per_page' => 5,
			'total_rows' => $TotalActivities,
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
			
		$data['ActivitiesList'] = $this->Users->getLogActivityList("EntityNo","asc",$config['per_page'],$this->uri->segment(3));
		$data['totalActivities'] = $TotalActivities;
		$this->load->view('Users/Index',$data);
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

	public function ChangeUsername(){
		$where = array('UserId' => '5925025E-8C57-48C7-BB68-187A52F26926','Username' => $this->input->post('oldUsername'));
		$data = array('Username' => $this->input->post('newUsername'));
		$table = 'user_access';
		//Pass user data to model
		$status = $this->Users->_updateRowWhere($table,$where,$data);

		print_r($where);
		print_r($data);
		print_r($this->input->post());       
		//Storing insertion status message.
		/*if($status){
			$this->session->set_flashdata('error', 'Username was changed successfully.');
			return redirect(base_url('Login/Logout'));
		}else{
			echo "<script type='text/javascript'>
				    alert('Username Not Changed!');
				</script>";
			return redirect(base_url('Admin'));
		}*/
	}

	public function SetUserPermissions(){
		$formData = $this->input->post('formData');
		$Userid = $formData['UserId'];
		$UserPermission = $formData['Permission'];
		$data = array();
		$Permissions = $this->Users->CheckUserPermissionNo($Userid);

		foreach ($Permissions as $key => $value) {
			if (in_array($value, $UserPermission)){
				$data[$key] = "fsfdf";
			}else{
				$post = array('UserId' => $Userid,'PermissionNo' => $value,);
				$insertStatus = $this->Users->_deletePermission('dt_user_permission',$post);
		            
				//Storing insertion status message.
				if($insertStatus){
					$data['Status'] = true;
				}else{
					$data['Status'] = false;
				}
			}
		}

		foreach ($UserPermission as $key => $value) {
			if (in_array($value, $Permissions)){
				$data[$key] = "fsfdf";
			}else{
				$post = array('UserId' => $Userid,'PermissionNo' => $value,);
				$insertStatus = $this->Users->_Insert('dt_user_permission',$post);
		            
				//Storing insertion status message.
				if($insertStatus){
					$data['Status'] = true;
				}else{
					$data['Status'] = false;
				}
			}
		}
		
		echo json_encode($data);
	}

	//json return 
	public function UserPermissions(){
		$userid = $this->input->post('userid');
		$data['UserId'] = $userid;
		$data['Permission'] = $this->Users->GetUserPermissions($userid);

		echo json_encode($data);
	}

	public function getFunction(){

	if ( !isset($_GET['term']) )
	    exit;
	    $term = $_REQUEST['term'];
	        $data = array();
	        $rows = $this->Users->getData($term); // Model called here
	            foreach( $rows as $row )
	            {
	                $data[] = array(
	                    'label' => $row->FullName,
	                    'value' => $row->UserId);   // here i am taking name as value so it will display name in text field, you can change it as per your choice.
	            }
	        echo json_encode($data);
	        flush();

	}

	public function getFunction1(){

	if ( !isset($_GET['term']) )
	    exit;
	    $term = $_REQUEST['term'];
	        $data = array();
	        $rows = $this->Users->getData($term); // Model called here
	            foreach( $rows as $row )
	            {
	                $data[] = array(
	                    'name' => $row->FullName,
	                    'id' => $row->UserId);   // here i am taking name as value so it will display name in text field, you can change it as per your choice.
	            }
	        echo json_encode($data);
	        flush();

	}

	public function LogActivity1()
	{
		$TotalActivities = $this->Users->getTotalActivitiesCount();
		$sort =$_REQUEST['sort'];
		$order = $_REQUEST['order'];
		$offset = $_REQUEST['offset'];
		$limit = $_REQUEST['limit'];
		
		$data['rows'] = $this->Users->getLogActivityList($sort,$order,$limit, $offset);
		$data['total'] = $TotalActivities;
		echo json_encode($data);
	}

	public function UsersInfo_json()
	{
		$TotalUsers = $this->Users->getTotalUsers();
		$sort =$_REQUEST['sort'];
		$order = $_REQUEST['order'];
		$offset = $_REQUEST['offset'];
		$limit = $_REQUEST['limit'];
		
		$data['rows'] = $this->Users->getUsersDetails_Full($sort,$order,$limit, $offset);
		$data['total'] = $TotalUsers;
		echo json_encode($data);
	}
}