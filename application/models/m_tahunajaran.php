<?php
class m_tahunajaran extends CI_Model{
	public $lastIDTahun = "";

	function setLastIDTahun($id){
		$this->lastIDTahun = $id;
	}
	function getLastIDTahun(){
		return $this->lastIDTahun;
	}



	//
	//	UPDATE
	//



	function update_status($year,$status){
		$this->db->set('status',$status);
		$this->db->where('tahun', $year);

		if($this->db->update('tahun_ajaran')){
			return true;
		}

		return false;
	}

	function update_thajaran($data,$id){
		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$this->db->set($key, $value);
			}
		}

		$this->db->where('id_tahun', $id);
		if($this->db->update('tahun_ajaran')){
			return true;
		}

		return false;
	}



	//
	//	INSERT
	//



	function insert_thajaran($data){
		$this->db->insert('tahun_ajaran', $data);

		$this->setLastIDTahun($this->db->insert_id());
	}



	//
	//	GET / SELECT
	//



	function get_thajaran($operasi,$id){
		if($operasi == "all"){
			return $this->db->query("SELECT * ,DATE_FORMAT(tgl_pendaftaran, '%d - %M - %Y') as tanggal_mulai, DATE_FORMAT(tgl_terakhir, '%d - %M- %Y') as tanggal_terakhir FROM tahun_ajaran")->result();
		}else if($operasi == "one"){
			return $this->db->query("SELECT * ,DATE_FORMAT(tgl_pendaftaran, '%d - %M - %Y') as tanggal_mulai, DATE_FORMAT(tgl_terakhir, '%d - %M- %Y') as tanggal_terakhir FROM tahun_ajaran WHERE id_tahun = ".$id)->row();
		}
	}

	function get_status($year){
		$this->db->select('status');
		$this->db->where('tahun', $year);
		$this->db->from('tahun_ajaran');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->row()->status;
		}else{
			return "";
		}
	}

	function get_idtahun($tahun){
		$a = $this->db->get_where("tahun_ajaran",array('tahun' => $tahun));
		if(!empty($a->row()->id_tahun)){
			return $a->row()->id_tahun;
		}else{
			return 0;
		}
	}

	function get_tahun($th){
		return $this->db->get_where("tahun_ajaran",array('tahun' => $th))->num_rows();
	}

	function get_waktudaftar($year){
		$this->db->select('waktu_pendaftaran');
		$this->db->where('tahun', $year);
		$this->db->from('tahun_ajaran');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->row()->waktu_pendaftaran;
		}else{
			return "";
		}
	}

	function get_tanggaldaftar($year){
		$this->db->select("DATE_FORMAT(tgl_pendaftaran, '%d - %M - %Y') as tanggal_mulai, DATE_FORMAT(tgl_terakhir, '%d - %M- %Y') as tanggal_terakhir");
		$this->db->where('tahun', $year);
		$this->db->from('tahun_ajaran');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query;
		}else{
			return "";
		}
	}
}
?>