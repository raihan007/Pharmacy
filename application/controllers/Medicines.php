<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicines extends CI_Controller {

	public function AllMedicines()
	{
		$data['title'] = 'Medicines';
		$this->load->view('Medicines/AllMedicines',$data);
	}

	public function Create()
	{
		$data['title'] = 'Add Medicine';
		$this->load->view('Medicines/Create',$data);
	}
}
