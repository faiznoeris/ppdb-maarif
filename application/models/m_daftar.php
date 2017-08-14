<?php
class m_daftar extends CI_Model{
	public $lastID = "";
	public $kabJustInsertedID = "";
	public $kecJustInsertedID = "";

	function tampil_data($jurusan){

		if($jurusan == "with_prestasi"){
			//$this->db->select('data_calonsiswa.*, prestasi.nilai_prestasi, prestasi.nilai_sertifikat');
			//$this->db->from('data_calonsiswa');
			//$this->db->join('prestasi', 'prestasi.id_pendaftar = data_calonsiswa.id_pendaftar');

			return $this->db->query("SELECT data_calonsiswa.*, prestasi.nilai_prestasi, prestasi.nilai_sertifikat
				FROM data_calonsiswa
				INNER JOIN prestasi ON data_calonsiswa.id_pendaftar=prestasi.id_pendaftar");	
		}else if($jurusan != ""){
			return $this->db->get_where('data_calonsiswa',array('id_jurusan' => $jurusan));
		}else{
			return $this->db->get_where('data_calonsiswa');
		}
		
	}

	function get_data(){
		return $this->db->query("SELECT * FROM data_calonsiswa");
	}

	function remove_data($id){
		$this->db->query("DELETE FROM data_calonsiswa WHERE id_pendaftar = ".$id);
		return true;
	}

	function input($data,$data_prestasi){
		$this->db->insert('data_calonsiswa', $data);
		$insert_id = $this->db->insert_id();
		$this->session->set_tempdata('ID_Pendaftar', $insert_id, 120);


		$data_prestasi['ID_Pendaftar'] = $insert_id;
		$this->db->insert('prestasi', $data_prestasi);
		$this->setLastID($insert_id);
		//$this->updatefotopath($insert_id);
		return true;
	}

	function setLastID($id){
		$this->lastID = $id;
	}

	function getLastID(){
		return $this->lastID;
	}



	function setKabLastID($id){
		$this->kabJustInsertedID = $id;
	}

	function getKabLastID(){
		return $this->kabJustInsertedID;
	}

	function setKecLastID($id){
		$this->kecJustInsertedID = $id;
	}

	function getKecLastID(){
		return $this->kecJustInsertedID;
	}



	function is_blacklist($name){
		if(!empty($this->db->query("SELECT nama_pendaftar FROM blacklist_temp WHERE nama_pendaftar LIKE '%".$name."%'")->row()->nama_pendaftar)){
			return true;
		}
		return false;
	}

	function getKuota(){
		$yearprevious				=	date("Y", strtotime("-1 year"));
		$yearnow		 			=	date("Y");
		$tahunajaran 				= 	$yearprevious . "/" . $yearnow;

		return $this->db->get_where('status_pendaftaran', array('tahun_ajaran' =>  $tahunajaran));
	}

	function getSizeCalonSiswa($idjurusan){
		return $this->db->get_where('data_calonsiswa', array('id_jurusan' => $idjurusan))->num_rows();
	}

	function updatefotopath($path,$id){
		$this->db->set('foto_path', $path);
		$this->db->where('id_pendaftar', $id);
		if($this->db->update('data_calonsiswa')){
			return true;
		}else{
			return false;
		}
	}

	function ins_kabupaten($name){
		$this->db->insert('kabupaten', $data);
		$insert_id = $this->db->insert_id();
		$this->setKabLastID($insert_id);
		return true;
	}

	function ins_kecamatan($name){
		$this->db->insert('kecamatan', $data);
		$insert_id = $this->db->insert_id();
		$this->setKecLastID($insert_id);
		return true;
	}

	function ins_desa($name){
		$this->db->insert('desa', $data);
		return true;
	}

	function getID_kabupaten($name){
		return $this->db->query('SELECT id_kabupaten FROM kabupaten WHERE nm_kabupaten LIKE "%'.$name.'%"')->row()->id_kabupaten;
	}

	function getID_kecamatan($name){
		return $this->db->query('SELECT id_kecamatan FROM kecamatan WHERE nm_kecamatan LIKE "%'.$name.'%"')->row()->id_kecamatan;
	}

	function kab_exist($name){
		if(!empty($this->db->query("SELECT nm_kabupaten FROM kabupaten WHERE nm_kabupaten LIKE '%".$name."%'")->row()->nm_kabupaten)){
			return true;
		}else{
			return false;
		}
	}

	function kec_exist($name){
		if(!empty($this->db->query("SELECT nm_kecamatan FROM kecamatan WHERE nm_kecamatan LIKE '%".$name."%'")->row()->nm_kecamatan)){
			return true;
		}else{
			return false;
		}
	}

	function desa_exist($name){
		if(!empty($this->db->query("SELECT nm_desa FROM desa WHERE nm_desa LIKE '%".$name."%'")->row()->nm_desa)){
			return true;
		}else{
			return false;
		}
	}

	function get_desaname($id){
		return $this->db->get_where('desa',array('id_desa' => $id));
	}

	function get_kecamatanname($id){
		return $this->db->get_where('kecamatan',array('id_kecamatan' => $id));
	}

	function get_kabupatenname($id){
		return $this->db->get_where('kabupaten',array('id_kabupaten' => $id));
	}

	function get_desa($id){
		$this->db->distinct();
		$this->db->order_by('nm_desa', 'ASC');
		return $this->db->get_where('desa',array('id_kecamatan' => $id));
	}

	function get_kecamatan($id){
		$this->db->distinct();
		$this->db->order_by('nm_kecamatan', 'ASC');
		return $this->db->get_where('kecamatan',array('id_kabupaten' => $id));
	}

	function get_kabupaten(){
		$this->db->distinct();
		$this->db->order_by('nm_kabupaten', 'ASC');
		return $this->db->get('kabupaten');
	}
}
?>