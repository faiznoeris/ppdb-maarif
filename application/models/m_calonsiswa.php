<?php
class m_calonsiswa extends CI_Model{
	function delete($id){
		$this->db->delete('data_calonsiswa', array('id_pendaftar' => $id)); 
		return true;
	}

	function getsiswa($id){
		return $this->db->get_where('data_calonsiswa', array('id_pendaftar' => $id));
	}

	function savechanges($data,$id){
		foreach ($data as $key => $value) {
			if($value != ""){
				$this->db->set($key, $value);
			}
		}
		//$this->db->set($data);
		$this->db->where('id_pendaftar', $id);
		$this->db->update('data_calonsiswa');
		return true;
	}
}
?>