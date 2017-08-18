<?php
class dashboard extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array("m_tahunajaran")); 
	}

	function add_user(){
		$this->load->model("m_user"); 

		if($this->isLoggedin() == false){
			echo "string";
		}else{
			if(isset($_POST['add'])){
				$uname 					= 	$this->input->post('username');
				$email					= 	$this->input->post('email');
				$pin					= 	$this->input->post('pin');
				$pwd					= 	$this->input->post('password');
				$hash 					= 	$this->encryptPassword($pwd);

				if($this->m_user->insert_user($uname,$email,$pin,$pwd,$hash)){
					$this->session->set_flashdata('uname', $uname);
					$this->session->set_flashdata('email', $email);
					$this->session->set_flashdata('pin', $pin);
					redirect("dashboard/adduser/sukses");
				}else{
					redirect("dashboard/adduser/gagal");
				}			
			}else{
				redirect("dashboard/adduser");
			}
		}
	}

	function del_user(){
		$this->load->model("m_user"); 

		$id = $this->uri->segment(3);

		if($this->isLoggedin() == false){
			echo "string";
		}else{
			if($this->m_user->delete_user($id)){
			//add notif to tell sucessfully delete
				redirect("dashboard/daftaruser");
			}else{
			//add notif to tell gagal delete
				redirect("dashboard/daftaruser");
			}			
		}

	}

	function aktifkanpendaftaran(){
		$year1 						= $this->uri->segment(3);
		$year2 						= $this->uri->segment(4);
		$year 						= $year1."/".$year2;

		if($this->isLoggedin() == false){
			echo "string";
		}else{
			if($this->m_tahunajaran->update_status($year, 'aktif')){
				redirect("dashboard");
			}else{
				redirect("dashboard");
			}
		}
	}

	function hentikanpendaftaran(){
		$year1 						= $this->uri->segment(3);
		$year2 						= $this->uri->segment(4);
		$year 						= $year1."/".$year2;

		if($this->isLoggedin() == false){
			echo "string";
		}else{
			if($this->m_tahunajaran->update_status($year, 'nonaktif')){
				redirect("dashboard");
			}else{
				redirect("dashboard");
			}
		}
	}
}
?>