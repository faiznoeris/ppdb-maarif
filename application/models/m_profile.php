<?php
class m_profile extends CI_Model{
	function savechanges($uname,$email,$pin,$pwd,$hash){

		$query_chkexist = "SELECT username FROM users WHERE username = '" . $uname . "' LIMIT 1";

		$res_chkexist = $this->db->query($query_chkexist);

		if($res_chkexist->num_rows() == 1){
			$this->session->set_userdata('error','User dengan username '.$uname.' sudah ada!');	
			return false;
		}else{
			if($uname != ""){
				$this->db->set('username', $uname);
			}
			if($email != ""){
				$this->db->set('email', $email);
			}
			if($pin != ""){
				$this->db->set('pin', $pin);
			}
			if($pwd != ""){
				$this->db->set('password', $hash);
			}
			$this->db->where('id_user', $this->session->userdata('id_user'));
			$this->db->update('users');
			$this->session->set_userdata('username', $uname);
		}
		return true;
	}

	function getdatauser($id_user) {
		$query = $this->db->query("SELECT username, email, pin FROM users WHERE id_user = ".$id_user);
		return $query->row();
	}

	function updateavapath($avapath){
		$this->db->set('ava_path', $avapath);
		$this->db->where('id_user', $this->session->userdata('id_user'));
		if($this->db->update('users')){
			$this->session->set_userdata('ava_path', $avapath);
			return true;
		}else{
			return false;
		}
	}
}
?>