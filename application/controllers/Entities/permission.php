<?php
class permission {

	var $empInfo =  array(
		'canGet' => 1000,
		'canCreate' => 1001,
		'canEdit' => 1002,
		'canDelete' => 1003 
	);

	var $medInfo =  array(
		'canGet' => 2000,
		'canCreate' => 2001,
		'canEdit' => 2002,
		'canDelete' => 2003 
	);

	public function get_empPermission() {
		
		return $this->empInfo;
	}

	public function get_medPermission() {
		
		return $this->medInfo;
	}
} 
?>