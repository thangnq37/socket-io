<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function index()
	{
		$this->load->view('template_login');
	}

	public function CreateUserLogin(){
		$data = array('username' => $this->input->post('username'), 'password' => $this->input->post('password'));
  		$this->load->model('Users');
        $result = $this->Users->insertUser($data);
        var_dump($data);
  		die();
	}
}