<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicines extends CI_Controller {

	function __construct() {
		
		parent::__construct();
		$this->load->model('MedicineModel','Medicine');
	}

	public function AllMedicines()
	{
		$data['title'] = 'Medicines';
		$this->load->view('Medicines/AllMedicines',$data);
	}

	public function Create()
	{
		$data['title'] = 'Add Medicine';
		$data['Manufacturer'] = $this->Medicine->Get_Manufacturer_List();
		$data['Manufacturer'] = array('0' => '-- Select Manufacturer --') + $data['Manufacturer'];
		$data['Category'] = $this->Medicine->Get_Category_List();
		$data['Category'] = array('0' => '-- Select Category --') + $data['Category'];
		$this->load->view('Medicines/Create',$data);
	}

	public function Edit($EntityNo)
	{
		$data['title'] = 'Edit Medicine';
		$data['Medicine'] = $this->Medicine->getMedicineById($EntityNo);
		$data['Manufacturer'] = $this->Medicine->Get_Manufacturer_List();
		$data['Manufacturer'] = array('0' => '-- Select Manufacturer --') + $data['Manufacturer'];
		$data['Category'] = $this->Medicine->Get_Category_List();
		$data['Category'] = array('0' => '-- Select Category --') + $data['Category'];
		$this->load->view('Medicines/Edit',$data);
	}
}
