<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct() {
        // Gọi đến hàm khởi tạo của cha
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Users');
        $this->load->library('form_validation');
        $this->load->helper(array('url'));
    }

	public function index()
	{
		$this->load->view('template_login');
	}

	public function CreateUserLogin(){


		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_rules('username', 'lang:username_exit', 'callback_username_check');

		if ($this->form_validation->run() == false)
        {
	        redirect(base_url());
        }
        else
        {
            
	  		
	        // $result = $this->Users->insertUser($data);
	        // var_dump($data);
	  		die();
        }


		
	}

	public function username_check($str){
		$data = array('username' => $this->input->post('username'), 'password' => $this->input->post('password'));
		$result = $this->Users->checkUser($data);
		die();
		if(count($result) > 0){
			// $this->session->set_flashdata("username", "Người dùng này đã có người đăng ký !!!");
			$this->form_validation->set_message('username', 'The {field} field can not be the word "test"');
            return false;
		}else{
			return true;
		}
	}
}