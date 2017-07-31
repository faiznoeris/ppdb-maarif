<?php
class m_daftar extends CI_Model{
	function tampil_data(){
		return $this->db->get('data_calonsiswa');
	}

	function post($data){
		$this->db->insert('data_calonsiswa', $data);
		return true;
	}
}
?>