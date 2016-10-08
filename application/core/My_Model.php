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
 
	public function Get($details=false,$type='',$search='',$sort='',$order='',$limit='',$offset=''){
		if($details === true) {
            $this->tableName = $this->tableName.'_view';
        }
		$query = $this->db
					->from($this->tableName)
					->order_by($sort, $order)
					->limit($limit, $offset);
		if($type && $search) {
            $this->db->where($type,$search);
        }

		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else 
		{
			return array();
		}
	}

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

    public function GetWhere($details=false,$where = array()){
    	if($details === true) {
            $this->tableName = $this->tableName.'_view';
        }
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

        if(! empty($WhereNot)) {
        	foreach ($WhereNot as $key => $value) {
        		$this->db->where_not_in($key,$value);
        	}
        }
        return $this->db->get($this->tableName)->num_rows();
        //print_r($this->db->queries); 
        //exit;
    }

    public function GetTotalCount()
	{
		$query = $this->db
					->from($this->tableName)
					->get();
		
		return $query->num_rows();
	}
 
	public function get_total_count_where($where) {}
 
	public function PermissionStatus($UserId = ''){
		$query = $this->db
					->select('PermissionNo')
					->from('dt_user_permission')
					->where('UserId',$UserId)
					->get();

		$PermissionNo = (int) $query->row('PermissionNo');

		return ($PermissionNo === 0 ? false : true);
	}
 
}