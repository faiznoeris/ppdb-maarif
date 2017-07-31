<?php
class m_dashboard extends CI_Model{
	/*
	*
	*
	*		ADD USER
	*
	*
	*/


	function adduser($uname,$email,$pin,$pwd,$userlvl,$hash) {
		$eUsername = $this->db->escape_str($uname);

		$query = "SELECT username FROM users WHERE username LIKE '%" . $eUsername . "%' LIMIT 1";
		$query_chkemail = "SELECT email FROM users WHERE email LIKE '%" . $email . "%' LIMIT 1";

		$res = $this->db->query($query);
		$res_chkemail = $this->db->query($query_chkemail);

		if ($res->num_rows() == 1){
			$this->session->set_flashdata('error','Username sudah terdaftar!');
			return false;
		}	

		if ($res_chkemail->num_rows() == 1){
			$this->session->set_flashdata('error','Email sudah terdaftar!');
			return false;
		}			

		$date = date('Y-m-d');
		$lastlogin = date('Y-m-d H:i:s');

		$query = "INSERT INTO users (user_lvl, username, email, password, pin, date_joined, last_login) VALUES (
		". $userlvl .",
		'" . $uname . "',
		'". $email ."',
		'" . $hash . "', 
		".$pin.", 
		'". $date ."',
		'". $lastlogin ."')";

		$res = $this->db->query($query);

		if($userlvl == 1){
			$ulvl = "Pendaftaran";
		}else{
			$ulvl = "Interviewer";
		}

		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'action' => 'Menambahkan user ' . $uname . ' dengan status sebagai ' . $ulvl . '.',
			'date' => $date
			);

		$this->db->insert('action_timeline', $data);
		return true;
	}


	/*
	*
	*
	*		TIMELINE
	*
	*
	*/

	function timeline_rows() {
		$this->db->from('action_timeline');
		return $this->db->count_all_results();
	}

	function fetch_timeline($limit, $start) {
		$this->db->select('action_timeline.*, users.username, users.ava_path');
		$this->db->from('action_timeline');
		$this->db->join('users', 'users.id_user = action_timeline.id_user');

		$this->db->limit($limit, $start);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function getalltimeline(){
		$this->db->select('action_timeline.*, users.username, users.ava_path');
		$this->db->from('action_timeline');
		$this->db->join('users', 'users.id_user = action_timeline.id_user');
		$this->db->order_by('action_timeline.date', 'desc');

		return $this->db->get();
	}


	/*
	*
	*
	*		SESI PENDAFTARAN
	*
	*
	*/


	function status_pendaftaran($year){
		$this->db->select('status');
		$this->db->where('tahun_ajaran', $year);
		$this->db->from('status_pendaftaran');

		$query = $this->db->get();
		$row = $query->row();

		return $row->status;
	}

	function set_status_pendaftaran($year,$status){
		$this->db->set('status',$status);
		$this->db->where('tahun_ajaran', $year);
		$this->db->update('status_pendaftaran');

		if($status == '1'){
			$status_text = "Mengaktifkan ";
		}else{
			$status_text = "Menonaktifkan ";
		}

		$date = date('Y-m-d');

		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'action' => $status_text . ' status pendaftaran',
			'date' => $date
			);

		$this->db->insert('action_timeline', $data);
	
		return true;
	}


}
?>