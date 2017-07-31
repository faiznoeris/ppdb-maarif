<?php
class dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array("m_dashboard")); 
	}

	function adduser(){
		$this->load->model("m_auth"); 

		if(isset($_POST['action'])){
			$uname 					= 	$this->input->post('username');
			$email					= 	$this->input->post('email');
			$pin					= 	$this->input->post('pin');
			$pwd					= 	$this->input->post('password');
			$userlvl 				= 	$this->input->post('user_lvl') + 1;
			$hash 					= 	$this->m_auth->encryptpwd($pwd);

			if($userlvl == 1){
				$ulvl = "Pendaftaran";
			}else{
				$ulvl = "Interviewer";
			}

			$this->session->set_flashdata('uname', $uname);
			$this->session->set_flashdata('email', $email);
			$this->session->set_flashdata('pin', $pin);
			$this->session->set_flashdata('ulvl', $ulvl);

			if($this->m_dashboard->adduser($uname,$email,$pin,$pwd,$userlvl,$hash)){
				redirect("dashboard/adduser/sukses");
			}else{
				redirect("dashboard/adduser/gagal");
			}			
		}else{
			redirect("dashboard/adduser");
		}
	}

	function aktifkanpendaftaran(){
		$yearprevious				=	date("Y", strtotime("-1 year"));
		$yearnow		 			=	date("Y");
		$tahunajaran 				= 	$yearprevious . "/" . $yearnow;
		$data["tahunajaran"]		= 	$tahunajaran;

		if($this->m_dashboard->set_status_pendaftaran($tahunajaran, '1')){
			redirect("dashboard");
		}else{
			redirect("dashboard");
		}
	}

	function hentikanpendaftaran(){
		$yearprevious				=	date("Y", strtotime("-1 year"));
		$yearnow		 			=	date("Y");
		$tahunajaran 				= 	$yearprevious . "/" . $yearnow;
		$data["tahunajaran"]		= 	$tahunajaran;

		if($this->m_dashboard->set_status_pendaftaran($tahunajaran, '0')){
			redirect("dashboard");
		}else{
			redirect("dashboard");
		}
	}
}
?>