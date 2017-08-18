<?php
class m_calonsiswa extends CI_Model{
	public $lastID = "";
	
	function delete($id){
		$this->db->delete('calonsiswa', array('id_pendaftar' => $id)); 
		return true;
	}

	function getsiswa($id){
		return $this->db->get_where('calonsiswa', array('id_pendaftar' => $id));
	}

	function savechanges($data,$id){
		foreach ($data as $key => $value) {
			if($value != ""){
				$this->db->set($key, $value);
			}
		}
		//$this->db->set($data);
		$this->db->where('id_pendaftar', $id);
		$this->db->update('calonsiswa');
		return true;
	}



	
	function tampil_data($jurusan){

		if($jurusan == "with_prestasi"){
			//$this->db->select('calonsiswa.*, prestasi.nilai_prestasi, prestasi.nilai_sertifikat');
			//$this->db->from('calonsiswa');
			//$this->db->join('prestasi', 'prestasi.id_pendaftar = calonsiswa.id_pendaftar');

			return $this->db->query("SELECT calonsiswa.*, prestasi.nilai_prestasi, prestasi.nilai_sertifikat
				FROM calonsiswa
				INNER JOIN prestasi ON calonsiswa.id_pendaftar=prestasi.id_pendaftar");	
		}else if($jurusan != ""){
			return $this->db->get_where('calonsiswa',array('id_jurusan' => $jurusan));
		}else{
			return $this->db->get_where('calonsiswa');
		}
		
	}

	function get_data(){
		return $this->db->query("SELECT * FROM calonsiswa");
	}

	function remove_data($id){
		$this->db->query("DELETE FROM calonsiswa WHERE id_pendaftar = ".$id);
		return true;
	}

	function input($data,$data_prestasi){
		$this->db->insert('calonsiswa', $data);
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



	function getSizeCalonSiswa($idjurusan){
		$query = $this->db->get_where('calonsiswa', array('id_jurusan' => $idjurusan));
		if($query){
			return $query->num_rows();
		}else{
			return "0";
		}
	}

	function updatefotopath($path,$id){
		$this->db->set('foto_path', $path);
		$this->db->where('id_pendaftar', $id);
		if($this->db->update('calonsiswa')){
			return true;
		}else{
			return false;
		}
	}
}
?>