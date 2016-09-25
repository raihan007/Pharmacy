<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealers extends CI_Controller {

	function __construct() {
		
		parent::__construct();
		$this->load->model('DealersModel','Dealer');
	}

	public function Index(){
		$data['title'] = 'Dealers Info.';
		if($this->input->post()){
			$this->load->library('form_validation');
			//$this->form_validation->set_rules('DealerEmail', 'Email', 'callback_check_user_email');
			if($this->form_validation->run('DealerForm')){
				if(is_null($_POST['EntityNo']) || $_POST['EntityNo'] =="" )
				{
					$insertData = array(
						'DealerId' => $this->GUID(),
						'DealerTitle' => $this->input->post('DealerTitle'),
						'DealerAddress' => $this->input->post('DealerAddress'),
						'City' => $this->input->post('DealerCity'),
						'Country' => $this->input->post('DealerCountry'),
						'Phone' => $this->input->post('DealerPhone'),
						'Email' => $this->input->post('DealerEmail'),
						'Fax' => $this->input->post('DealerFax'),
						'Remarks' => $this->input->post('DealerRemarks'),
					);

					$insertStatus = $this->Dealer->_Insert($insertData);
					if( $insertStatus != 0){
						$this->session->set_flashdata('success', 'Dealer data have been saved successfully.');
						echo "<script>
								var notification = {
									type: 'success', 
									title: 'Done', 
									body: '".$this->session->flashdata('success')."'
								}
							 </script>";
					}else{
						$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}
				}else{
					$where = array(
						'EntityNo' => $this->input->post('EntityNo'),
						'DealerId' => $this->Dealer->_GetDealerId($this->input->post('EntityNo'))
					);
					
					$updateDate = array(
						'DealerTitle' => $this->input->post('DealerTitle'),
						'DealerAddress' => $this->input->post('DealerAddress'),
						'City' => $this->input->post('DealerCity'),
						'Country' => $this->input->post('DealerCountry'),
						'Phone' => $this->input->post('DealerPhone'),
						'Email' => $this->input->post('DealerEmail'),
						'Fax' => $this->input->post('DealerFax'),
						'Remarks' => $this->input->post('DealerRemarks'),
					);

					$updateStatus = $this->Dealer->_Update('dealers_info',$where,$updateDate);

					if( $updateStatus != 0){
						$this->session->set_flashdata('success', 'Dealer data have been updated successfully.');
						echo "<script>
								var notification = {
									type: 'success', 
									title: 'Done', 
									body: '<strong>".$this->session->flashdata('success')."</strong>'
								}
							 </script>";
					}else{
						$this->session->set_flashdata('error', 'Some problems occured, please try again.');
					}
				}
			}
			$this->load->view('Common/Dealers',$data);
		}else{
			$this->load->view('Common/Dealers',$data);
		}
	}

	//validation extended methods
	function check_user_email($email) 
	{        
    	if($this->input->post('EntityNo'))
    	{
        	$EntityNo = $this->input->post('EntityNo');
    	}
    	else
    	{
        	$EntityNo = '';
    	}
    	$result = $this->Dealer->check_unique_user_email($EntityNo, $email);
    	if($result == 0)
    	{
        	$response = true;
    	}
    	else 
    	{
       		$this->form_validation->set_message('check_user_email', 'Email must be unique');
        	$response = false;
    	}
    	return $response;
	}

	public function Delete($EntityNo)
	{	
		$DealerId = $this->Dealer->_GetDealerId($EntityNo);

		//Pass user data to model
		$deleteStatus = $this->Dealer->_Delete('dealers_info',$DealerId);		
		echo $DealerId;
		//Storing insertion status message.
		if($deleteStatus){
		    $this->session->set_flashdata('success', 'Dealer data have been deleted successfully.');
		}else{
		    $this->session->set_flashdata('error', 'Some problems occured, please try again.');
		}

		//return redirect(base_url('Dealers'));
	}

	//validation extended methods
	function check_dealer_title($DealerTitle) 
	{        
    	if($this->input->post('EntityNo'))
    	{
        	$EntityNo = $this->input->post('EntityNo');
    	}
    	else
    	{
        	$EntityNo = '';
    	}
    	$result = $this->Dealer->check_unique_dealer_title($EntityNo, $DealerTitle);
    	if($result == 0)
    	{
        	$response = true;
    	}
    	else 
    	{
       		$this->form_validation->set_message('check_dealer_title', 'Title must be unique');
        	$response = false;
    	}
    	return $response;
	}

	//Json Data Return
	public function DealersInfo_json()
	{
		$TotalDealers = $this->Dealer->getTotalDealers();
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
		
		$data['rows'] = $this->Dealer->_Get($type,$search,$sort,$order,$limit, $offset);
		$data['total'] = $TotalDealers;
		echo json_encode($data);
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
