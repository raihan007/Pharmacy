<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermissionHandler {

	private $CI;
	private $Permissions = array();
	private $ActiveUserId = '';
	private $ActiveUserRole = '';
	private $HasPermissions = false;

	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->model('UsersModel','Users');
	}

	public function HasPermission($UserId = ''){
		$this->CI->Users->PermissionStatus($UserId);
	}
}