<?php

Class Users extends CI_Model { 
	
  	function __construct() { 
        parent::__construct(); 
    } 

  	public function insertUser($data){
  		if ($this->db->insert("users", $data)) { 
        return true; 
      }else{
        return false;
      } 
  	}

  	public function checkUser($data){
  		$value = $this->db->select("*")->where("USERNAME",$data["username"])->get('users')->result_array();
  		return $value;
  	}

    public function checkUserPass($data){
      $value = $this->db->select("*")->where("username",$data["username"])->get('users')->result_array();
      if(count($value) <= 0){
        return $this->lang->line("ERROR_USER_NOT_ISSET");
      }else{
        $user = json_decode(json_encode($value[0]));
        if($user->PASSWORD === $data["password"]){
          return $user;
        }else{
          return $this->lang->line("ERROR_USER_PASS_INCORRECT");
        } 
      }
    }

    public function checkEmail($data){
      $value = $this->db->select("*")->where("email",$data["email"])->get('users')->result_array();
      if(count($value) <= 0){
        return true;
      }else{
          return $this->lang->line("ERROR_EMAIL_ISSET");
      }
    }
} 