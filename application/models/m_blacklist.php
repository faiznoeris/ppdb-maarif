<?php
class m_blacklist extends CI_Model{
	function get_data(){
		return $this->db->get('blacklist');
	}

	function is_blacklist($name,$nisn){
		if(!empty($this->db->query("SELECT nama_pendaftar FROM blacklist WHERE nama_pendaftar LIKE '%".$name."%' OR nisn LIKE '%".$nisn."%'")->row()->nama_pendaftar)){
			return true;
		}
		return false;
	}

	function ins_blacklist($nm,$nisn){
		$this->db->query("INSERT INTO blacklist (`nama_pendaftar`,`nisn`) VALUES ('".$nm."','".$nisn."')");
		return true;
	}
}
?>