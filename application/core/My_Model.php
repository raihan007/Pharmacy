<?php

class MY_Model extends CI_Model {
 
	// will hold the table name of the current instance
	var $tableName = "";
 
	// this constructor will help us initialize our child classes
	public function __construct($tableName = '')
	{
		$this->tableName = $tableName;
		parent::__construct();
	}
 
	public function get_all($limit = -1, $offset = 0, $orderby = '') {}

	public function Insert($data = array()){
        if(!array_key_exists("LastChanged",$data)){
            $data['LastChanged'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("LastChangedBy",$data)){
            $data['LastChangedBy'] = '5925025E-8C57-48C7-BB68-187A52F26926';
        }
       
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

    public function GetById($where = array()){
		$query = $this->db
					->select()
					->from($this->tableName)
					->where($where)
					->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else 
		{
			return NULL;
		}
	}

	function Update($where = array(), $data = array()) {
	    return $this->db
	    		->where($where)
				->update($this->tableName, $data);
	}

	function Delete($where = array()){
	    return $this->db
	    		->where($where)
				->delete($this->tableName);
	}

    function IsUnique($Where = array(), $WhereNot = array()) {
        $this->db->where($Where);
        if(!empty($whereNot)) {
            $this->db->where_not_in($WhereNot);
        }
        return $this->db->get($this->tableName)->num_rows();
    }

    public function GetTotalCount()
	{
		$query = $this->db
					->from($this->tableName)
					->get();
		
		return $query->num_rows();
	}
 
	public function get_total_count_where($where) {}
 
	public function get_where($where = array(), $limit = 10, $offset = 0, $orderby = '') {}
 
}