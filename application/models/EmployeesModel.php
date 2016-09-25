<?php

class EmployeesModel extends CI_Model {
	
	function __construct() {
		
		parent::__construct();
		$this->viewName = "users_info_view";
		$this->tableName = "users_info";
	}

	public function getEmployeesList($limit, $offset)
	{
		$query = $this->db
					->select("EntityNo,CONCAT('FirstName',(' '),'LastName') as 'FullName',Gender,Photo,PhoneNo,Email,NationalIdNo,JoinDate")
					->from($this->viewName)
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

	public function getTotalEmployeesCount()
	{
		$query = $this->db->get($this->viewName);
		
		return $query->num_rows();
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

	public function saveEmployee($data = array()){
        if(!array_key_exists("created",$data)){
            $data['CreatedTime'] = date("Y-m-d H:i:s");
        }
        $this->load->database();
        $this->tableName = 'users_info';
        $this->primaryKey = 'UserId';
        $insert = $this->db->insert($this->tableName,$data);
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

	function _deleteRowWhere($table, $EntityNo) {
	    return $this->db
	    		->where('EntityNo',$EntityNo)
				->delete($table);
	}

	public function checkExistsEmail($Key){

		$query = $this->db
				->where('Email',$Key)
				->or_where('Username', $Key)
				->get('users_info_view');
		
		if($query->num_rows() > 0)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

}