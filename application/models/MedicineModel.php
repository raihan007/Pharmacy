<?php

class MedicineModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function getCoursesList($limit, $offset)
	{
		$query = $this->db
					->from('Courses')
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

	public function getTotalCoursesCount()
	{
		$query = $this->db->query('SELECT * FROM Courses');
		
		return $query->num_rows();
	}


	public function Get_Manufacturer_List()
	{
		$this->db->from('dealers_info');
		$this->db->order_by('DealerId');
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['DealerId']] = $row['DealerTitle'];
			}
		}
        return $return;
	}

	public function Get_Category_List()
	{
		$this->db->from('categories');
		$this->db->order_by('EntityNo');
		$result = $this->db->get();
		$return = array();
		if($result->num_rows() > 0) {
			foreach($result->result_array() as $row) {
				$return[$row['EntityNo']] = $row['Title'];
			}
		}
        return $return;
	}

	public function getMedicineById($EntityNo)
	{
		$this->load->database();
		$this->db->where('EntityNo',$EntityNo);
		$query = $this->db->get('medicines_info');
		
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
        $this->tableName = 'Courses';
        $this->primaryKey = 'CourseId';
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
	    		->where('CourseId',$ProgramId)
				->delete($table);
	}

	public function checkExistsBatchName($BatchName){
		$this->load->database();
		$this->db->where('BatchName',$BatchName);
		$query = $this->db->get('Batches');
		
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