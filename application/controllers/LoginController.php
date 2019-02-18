<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpAes\Aes;

class LoginController extends CI_Controller {

	private $aesCode;
	private $user;

	function __construct() {
        parent::__construct();
        $this->aesCode = new Aes('abcdefgh01234567', 'CBC', '1234567890abcdef');
        $this->load->model('Users');
        // $this->updatelangfile('VI','language');
        // $this->updatelangfile('EN','language');
        $this->load->library('form_validation');
        $this->load->helper(array('url','file'));
    }

	public function index()
	{
		// $this->session->set_userdata('site_lang',$this->input->post('language'));
		// $this->updatelangfile('VI','language');
  //       $this->updatelangfile('EN','language');
        $user = $this->session->userdata('user');
  		if(!is_string(($user))){
		  	redirect('home');
		  	exit();
  		}
		if($this->input->post('submit') === "login"){
			$this->form_validation->set_rules('username_login', 'Username login', 'callback_username_login');
			if ($this->form_validation->run() == false)
	        {
	        	$this->load->view('template_login');
	        }
	        else
	        {
		        $this->session->set_userdata('user',$this->user);
		  		$this->load->view('home');
	        }
		}else{
			
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[50]|callback_username_check',array('required'=>$this->lang->line('ERROR_REQUIRED'), 'min_length'=>$this->lang->line('ERROR_MIN_LENGTH'),'max_length'=>$this->lang->line('ERROR_MAX_LENGTH')));

			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[50]',array('required'=>$this->lang->line('ERROR_REQUIRED'), 'min_length'=>$this->lang->line('ERROR_MIN_LENGTH'),'max_length'=>$this->lang->line('ERROR_MAX_LENGTH')));


			if ($this->form_validation->run() == false)
	        {
	        	$this->load->view('template_login');
	        }
	        else
	        {
		        // $result = $this->Users->insertUser($data);
		        // var_dump($data);
		  		die();
	        }
		}
		
		
	}


	//End
	private function EncodeAESPassword($password){
		$result = base64_encode($this->aesCode->encrypt($password));
		return $result;
	}

	private function DecodeAESPassword($encodePassword){
		$result = base64_decode($this->aesCode->decrypt($encodePassword));
		return $result;
	}

	public function username_check($str){
		$data = array('username' => $this->input->post('username'), 'password' => $this->input->post('password'));
		$result = $this->Users->checkUser($data);
		if(count($result) > 0){
			$this->form_validation->set_message('username', $this->lang->line('ERROR_USER_NOT_EXIT'));
            return false;
		}else{
			return true;
		}
	}

	public function username_login($str){
		$data = array('username' => $this->input->post('username_login'), 'password' => $this->EncodeAESPassword($this->input->post('password_login')));
		$result = $this->Users->checkUserPass($data);
		if(is_object($result)){
			$this->user = $result;
			return true;
		}else{
			$this->form_validation->set_message('username_login', $result);
			return false;	
		}
	}


	private function updatelangfile($my_lang,$name_file){
        $arrayLanguages = $this->db->select("*")->get("languages")->result_array();


        $langstr="<?php  \nif ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n*\n* Created:  2019-15-02 by Nguyen quoc thang\n*\n* Description:  ".$my_lang." language file for general views\n*\n*/"."\n\n\n";
       	
		foreach ($arrayLanguages as $key => $value) {
			$langstr.= "\$lang['".$value['KEY']."'] = \"".$value[$my_lang]."\";"."\n";
		}
        write_file('./application/language/'.$my_lang.'/'.$name_file.'_lang.php', $langstr);
    }
}