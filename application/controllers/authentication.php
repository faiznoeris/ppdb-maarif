<?php
class authentication extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array("m_auth"));
	}

	function login() {
		$uname 						= 	$this->input->post('username');
		$pwd						= 	$this->input->post('password');
		$pwd_hash 					= 	$this->m_auth->encryptpwd($pwd);

		if ($this->m_auth->login($uname,$pwd_hash)){
			redirect("/dashboard"); //login sukses
		}else{	
			redirect("/login/gagal");
		}
	}	

	function logout() {
		$array_items = array('id_user','email','user_lvl','username','date_joined','loggedin');
		
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		
		redirect("");
	}

	function forgotpassword() {
		$email						= 	$this->input->post('email');
		$pin						= 	$this->input->post('pin');

		if ($this->m_auth->forgotpassword($email, $pin)){
			redirect("/login/forgotpassword/sukses"); 
		}else{	
			redirect("/login/forgotpassword/gagal");
		}
	}	
}
?>