<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	public function Dealers()
	{
		$data['title'] = 'Dealers';
		$this->load->view('Common/Dealers',$data);
	}
}
