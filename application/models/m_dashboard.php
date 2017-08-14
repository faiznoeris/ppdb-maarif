<?php
class m_dashboard extends CI_Model{
	public $lastIDTahun = "";

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

		return true;
	}

	/*
	*
	*
	*		PENGATURAN
	*
	*
	*/



	function status_pendaftaran($year){
		$this->db->select('status');
		$this->db->where('tahun', $year);
		$this->db->from('tahun_ajaran');
		$query = $this->db->get()->row()->status;

		if(!empty($query)){
			return $query;
		}else{
			return "";
		}
	}

	function set_status_pendaftaran($year,$status){
		$this->db->set('status',$status);
		$this->db->where('tahun', $year);
		$this->db->update('tahun_ajaran');
		return true;
	}





	function get_timedaftar($year){
		$this->db->select('waktu_pendaftaran');
		$this->db->where('tahun', $year);
		$this->db->from('tahun_ajaran');
		return $this->db->get()->row()->waktu_pendaftaran;
	}

	function get_jadwaldaftar($year){
		$this->db->select("DATE_FORMAT(tgl_pendaftaran, '%d - %M - %Y') as tanggal_mulai, DATE_FORMAT(tgl_terakhir, '%d - %M- %Y') as tanggal_terakhir");
		$this->db->where('tahun', $year);
		$this->db->from('tahun_ajaran');
		return $this->db->get();
	}





	function get_datathajaran($operasi,$id){
		if($operasi == "all"){
			return $this->db->query("SELECT * ,DATE_FORMAT(tgl_pendaftaran, '%d - %M - %Y') as tanggal_mulai, DATE_FORMAT(tgl_terakhir, '%d - %M- %Y') as tanggal_terakhir FROM tahun_ajaran")->result();
		}else if($operasi == "one"){
			return $this->db->query("SELECT * ,DATE_FORMAT(tgl_pendaftaran, '%d - %M - %Y') as tanggal_mulai, DATE_FORMAT(tgl_terakhir, '%d - %M- %Y') as tanggal_terakhir FROM tahun_ajaran WHERE id_tahun = ".$id)->row();
		}
	}

	function update_thajaran($data,$id){

		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$this->db->set($key, $value);
			}
		}

		$this->db->where('id_tahun', $id);
		$this->db->update('tahun_ajaran');
		
		return true;
	}


	function get_datakuota($operasi, $id){
		if($operasi == "withyear"){
			$this->db->select("kuota.*, tahun_ajaran.tahun");
			$this->db->from("kuota");
			$this->db->join("tahun_ajaran","kuota.id_tahun = tahun_ajaran.id_tahun");
			$this->db->where('kuota.id_tahun', $id);
			return $this->db->get();
		}else{
			$this->db->select("kuota.*, tahun_ajaran.tahun");
			$this->db->from("kuota");
			$this->db->join("tahun_ajaran","kuota.id_tahun = tahun_ajaran.id_tahun");
			$this->db->where('kuota.id_kuota', $id);
			return $this->db->get()->row();
		}
	}

	function update_kuota($data,$id){

		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$this->db->set($key, $value);
			}
		}

		$this->db->where('id_kuota', $id);
		$this->db->update('kuota');
		
		return true;
	}


	function get_bobotnilai(){
		return $this->db->get_where("bobot_nilai",array('id' => '0'));
	}

	function update_bobot($data){

		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$this->db->set($key, $value);
			}
		}

		$this->db->where('id', '0');
		$this->db->update('bobot_nilai');
		
		return true;
	}


	function get_tahunID($tahun){
		$a = $this->db->get_where("tahun_ajaran",array('tahun' => $tahun));
		if(!empty($a->row()->id_tahun)){
			return $a->row()->id_tahun;
		}else{
			return 0;
		}
	}

	function check_th($th){
		return $this->db->get_where("tahun_ajaran",array('tahun' => $th))->num_rows();
	}

	function post_thajaran($data){
		$this->db->insert('tahun_ajaran', $data);
		$insert_id = $this->db->insert_id();
		$this->setLastIDTahun($insert_id);
	}

	function setLastIDTahun($id){
		$this->lastIDTahun = $id;
	}
	function getLastIDTahun(){
		return $this->lastIDTahun;
	}

	function input_kuota($id){
		$this->db->query("INSERT INTO `kuota`(`id_tahun`, `kuota_tav`, `kuota_tkr`, `kuota_tkj`, `kuota_tab`) VALUES (".$id.",0,0,0,0)");
	}
}
?>