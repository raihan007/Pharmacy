<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorHandler {

	private $CI;

	private $type = '';
	private $title = '';
	private $body = '';
	private $hasNotification = false;

	function __construct() {
		$this->CI =& get_instance();
	}

	public function setErrorMessage($type='',$title='',$body='')
    {
    	$this->type = $type;
		$this->title = $title;
		$this->body = $body;
    }

    public function getErrorMessage()
    {
    	echo "<script>
				var notification = {
				type: '".$this->type."', 
				title: '".$this->title."', 
				body: '".$this->body."'
				}
		</script>";
    }

    public function hasNotification()
    {
    	if($this->type !== ''){
    		$this->hasNotification = true;
    	}

    	return $this->hasNotification;
    }

    public function test(){
    	return array(
    		'hasNotification' => $this->hasNotification,
    		'type' => $this->type,
    		'title' => $this->title,
    		'body' => $this->body, 
    	);
    }
}