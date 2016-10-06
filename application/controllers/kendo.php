<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendo extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function Index()
	{
		$data['title'] = 'Kendo UI';
		$this->load->view('kendo/Index',$data);
	}
}