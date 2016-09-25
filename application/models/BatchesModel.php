<?php

class BatchesModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function getBatchesList($limit, $offset)
	{
		$query = $this->db
					->select('BatchId, BatchName, Shift, ProgramName')
					->from('Batches')
					->join('educational_programs', 'educational_programs.ProgramId = Batches.ProgramId')
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