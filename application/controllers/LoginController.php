<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	private $data;

	function __construct() {
        // Gọi đến hàm khởi tạo của cha
        parent::__construct();
        // $this->updatelangfile('EN');
        $this->load->library('session');
        $this->load->model('Users');
        $this->load->library('form_validation');
        $this->lang->load('error','EN');
        $this->load->helper(array('url','file','language','cookie'));
    }

	public function index()
	{
		$this->session->set_userdata('language',$this->input->post('language'));
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[50]|is_unique[users.username]|callback_username_check',array('required'=>$this->lang->line('ERROR_REQUIRED'), 'min_length'=>$this->lang->line('ERROR_MIN_LENGTH'),'max_length'=>$this->lang->line('ERROR_MAX_LENGTH')));

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

	private function updatelangfile($my_lang){
        $arrayLanguages = $this->db->select("*")->get("languages")->result_array();


        $langstr="<?php  \nif ( ! defined('BASEPATH')) exit('No direct script access allowed');\n/**\n*\n* Created:  2019-15-02 by Nguyen quoc thang\n*\n* Description:  ".$my_lang." language file for general views\n*\n*/"."\n\n\n";
       	
		foreach ($arrayLanguages as $key => $value) {
			$langstr.= "\$lang['".$value['KEY']."'] = \"".$value[$my_lang]."\";"."\n";
		}
        write_file('./application/language/'.$my_lang.'/error_lang.php', $langstr);
    }
}