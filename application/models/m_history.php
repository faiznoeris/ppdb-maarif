<?php
class m_history extends CI_Model{

	function insert($id){
		$query = $this->db->get_where('calonsiswa', array('id_pendaftar' => $id));
		foreach ($query->result() as $row) {
			$this->db->insert('history',$row);
		}
		//$this->db->query("INSERT INTO history select * from calonsiswa where id_pendaftar = ".$id);
		return true;
	}

}
?>