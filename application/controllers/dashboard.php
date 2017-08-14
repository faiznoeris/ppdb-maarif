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
		$year1 						= $this->uri->segment(3);
		$year2 						= $this->uri->segment(4);
		$year 						= $year1."/".$year2;

		if($this->m_dashboard->set_status_pendaftaran($year, 'aktif')){
			redirect("dashboard");
		}else{
			redirect("dashboard");
		}
	}

	function hentikanpendaftaran(){
		$year1 						= $this->uri->segment(3);
		$year2 						= $this->uri->segment(4);
		$year 						= $year1."/".$year2;

		if($this->m_dashboard->set_status_pendaftaran($year, 'nonaktif')){
			redirect("dashboard");
		}else{
			redirect("dashboard");
		}
	}
}
?>