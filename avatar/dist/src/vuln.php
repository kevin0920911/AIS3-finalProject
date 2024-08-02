<?php
class Hi_Callmepls {
	public $data = null;
	public function __construct($data) {
		$this->data = $data;
	}
	
	function __destruct() {
		system($this->data);
	}
}