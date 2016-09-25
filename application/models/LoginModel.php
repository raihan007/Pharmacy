<?php

class LoginModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}


	function Login_Access($username, $password)
	{
		$key = $this->config->item('encryption_key');
    	$salt1 = hash('sha512', $key . $password);
    	$salt2 = hash('sha512', $password . $key);
    	$hashed_password = hash('sha512', $salt1 . $password . $salt2);
		$UserId = 0;
	    $query = $this->db
	    				->where('Email', $username)
						->or_where('Username', $username)
						->where('Password', $hashed_password)
        				->limit(1)
	    				->get('users_info_view');
	    if ($query->num_rows() > 0)
	    {
	        $user_row = $query->row();

			return $user_row->UserId;
	    }
	    
	    return $UserId;
	}

	function validate_login($username,$password)
	{
		$password = $this->bcrypt->hash($password);
		$query = $this->db->where($array)
							->get('users_info_view');
		
		if($query->num_rows() > 0)
		{
			return $query->row()->emp_id;
		}
		else 
		{
			return false;
		}
	}

	public function getTotalBatchesCount()
	{
		$query = $this->db->query('SELECT * FROM Batches');
		
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

	public function getBatchById($EntityNo)
	{
		$this->load->database();
		$this->db->where('BatchId',$EntityNo);
		$query = $this->db->get('Batch');
		
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
        $this->tableName = 'Batches';
        $this->primaryKey = 'BatchId';
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

	function _deleteRowWhere($table, $ProgramId) {
	    return $this->db
	    		->where('BatchId',$ProgramId)
				->delete($table);
	}

	public function Change_Password($UserId,$confirmPassword){
		$key = $this->config->item('encryption_key');
    	$salt1 = hash('sha512', $key . $confirmPassword);
    	$salt2 = hash('sha512', $confirmPassword . $key);
    	$hashed_password = hash('sha512', $salt1 . $confirmPassword . $salt2);
    	$table = 'user_access';
    	$data=array('Password'=>$hashed_password);
		return $this->db
	    		->where('UserId',$UserId)
				->update($table, $data);
	}

	public function getUserEmail($Key){

		$query = $this->db
	    				->where('Email', $Key)
						->or_where('Username', $Key)
        				->limit(1)
	    				->get('users_info_view');
	    if ($query->num_rows() > 0)
	    {

			return $query->row();
	    }
	    else{
	    	return NULL;
	    }
	}

}