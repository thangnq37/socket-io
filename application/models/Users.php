<?php

Class Users extends CI_Model { 
	
  	function __construct() { 
        parent::__construct(); 
    } 

  	public function insertUser($data){
  		if ($this->db->insert("users", $data)) { 
            return true; 
        } 
  	}

  	public function checkUser($data){
  		$value = $this->db->where('username',$data['username']);
  		return $value;
  	}
} 