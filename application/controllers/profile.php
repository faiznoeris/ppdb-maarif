<?php
class profile extends MY_Controller{
	function updateprofile(){
		$this->load->model(array("m_user"));

		$uname 					= 	$this->input->post('username');
		$email					= 	$this->input->post('email');
		$pin					= 	$this->input->post('pin');
		$pwd					= 	$this->input->post('password');
		$hash 					= 	$this->encryptPassword($pwd);

		if(($uname == "" && $email == "" && $pin == "" && $pwd == "") || $this->m_user->update_user($uname,$email,$pin,$pwd,$hash)){
			if($this->uploadavatar()){
				$this->session->set_tempdata('toast', true, 3);
				redirect("/dashboard");
			}
			else{
				$this->session->set_tempdata('error', $this->upload->display_errors(), 15);
				redirect("dashboard/editprofile");
			}
		}else{	
			$this->session->set_tempdata('error', $this->session->userdata('error'), 15);
			redirect("dashboard/editprofile");
		}
	}

	function uploadavatar(){
		$config = array(
			'upload_path' => "./asset/images/user_avatar/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "1024000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "184",
			'max_width' => "184",
			'file_name' => "avatar". $this->session->userdata('id_user') . "-" . rand(0,1000)
		);

		$this->upload->initialize($config);
		
		if($_FILES['avatar']['size'] == 0){
			return true;
		}else if($this->upload->do_upload('avatar')){
			$avapath 				= 	$this->upload->data();
			$avapath 				= 	$avapath["full_path"];
			$avapath 				= 	substr($avapath, 32);

			unlink('.'.$this->session->userdata('ava_path'));

			if($this->m_user->update_avapath($avapath)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
?>