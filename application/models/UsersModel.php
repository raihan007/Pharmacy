<?php

class UsersModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->tableName = 'access_history_view';
	}

	public function getLogActivityList($sort,$order,$limit, $offset)
	{
		$query = $this->db
					->from($this->tableName)
					->order_by($sort, $order)
					->limit($limit, $offset)
					->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else 
		{
			return NULL;
		}
	}

	public function getUsersDetails_Full($sort,$order,$limit, $offset)
	{
		$query = $this->db
					->select("EntityNo,CONCAT(FirstName,(' '),LastName) as 'FullName',UserId,Photo")
					->from('users_info_view')
					->order_by($sort, $order)
					->limit($limit, $offset)
					->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else 
		{
			return NULL;
		}
	}

	public function getUsersFullname($limit, $offset)
	{
		$query = $this->db
					->select("EntityNo,CONCAT(FirstName,(' '),LastName) as 'FullName',UserId")
					->from('users_info_view')
					->limit($limit, $offset)
					->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else 
		{
			return NULL;
		}
	}


	function getData($term) // function called in controller
    { 
        $query = $this->db
					->select("EntityNo,CONCAT(FirstName,(' '),LastName) as 'FullName',UserId")
					->from('users_info_view')
					->get();

  		return $query ->result();
    }

	public function getTotalUsers()
	{
		$query = $this->db->query('SELECT * FROM users_info_view');
		
		return $query->num_rows();
	}

	public function getTotalActivitiesCount()
	{
		$query = $this->db->query('SELECT * FROM access_history_view');
		
		return $query->num_rows();
	}


	public function get_dropdown_list()
	{
		$this->db->from('educational_programs');
		$this->db->order_by('ProgramId');
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['ProgramId']] = $row['ProgramName'];
			}
		}
        return $return;
	}

	public function Type()
	{
		$this->db->from('educational_programs');
		$this->db->order_by('ProgramId');
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['ProgramId']] = $row['ProgramName'];
			}
		}
        return $return;
	}

	public function getEmpById($EntityNo)
	{
		$this->load->database();
		$this->db->where('EntityNo',$EntityNo);
		$query = $this->db->get('users_info');
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else 
		{
			return NULL;
		}
	}

	public function Save($data = array()){
        if(!array_key_exists("CreatedAt",$data)){
            $data['CreatedAt'] = date("Y-m-d H:i:s");
        }
        $this->load->database();
        $this->tableName = 'educational_programs';
        $this->primaryKey = 'ProgramId';
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

    public function _Insert($table, $data = array()){
        if(!array_key_exists("LastChanged",$data)){
            $data['LastChanged'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("LastChangedBy",$data)){
            $data['LastChangedBy'] = '5925025E-8C57-48C7-BB68-187A52F26926';
        }
       
        $this->tableName = 'dt_user_permission';
        $this->primaryKey = 'EntityNo';
        $insert = $this->db->insert($table,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

    function _updateRowWhere($table, $where = array(), $data = array()) {
	    return $this->db
	    		->where($where)
				->update($table, $data);
	}

	function _deleteRowWhere($table, $ProgramId) {
	    return $this->db
	    		->where('ProgramId',$ProgramId)
				->delete($table);
	}

	function _deletePermission($table, $where = array()) {
	    return $this->db
	    		->where($where)
				->delete($table);
	}

	public function checkExistsProgramName($ProgramName){
		$this->load->database();
		$this->db->where('ProgramName',$ProgramName);
		$query = $this->db->get('educational_programs');
		
		if($query->num_rows() > 0)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

	public function GetUserPermissions($userid){
		$query = $this->db
					->select('PermissionNo')
					->from('dt_user_permission')
					->where('UserId',$userid)
					->order_by('EntityNo')
					->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else 
		{
			return NULL;
		}
	}

	public function CheckUserPermissionNo($Userid){
		
		$query = $this->db
					->select('PermissionNo')
					->from('dt_user_permission')
					->where('UserId',$Userid)
					->order_by('EntityNo')
					->get();
		
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
		    {
		        $array[] = $row['PermissionNo']; // add each user id to the array
		    }

		    return $array;
		}
		else 
		{
			return NULL;
		}
	}

}