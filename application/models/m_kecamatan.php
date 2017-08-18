<?php
class m_kecamatan extends CI_Model{
	public $kecJustInsertedID = "";

	function setKecLastID($id){
		$this->kecJustInsertedID = $id;
	}

	function getKecLastID(){
		return $this->kecJustInsertedID;
	}



	function insert_kecamatan($data){
		$this->db->insert('kecamatan', $data);
		$insert_id = $this->db->insert_id();
		$this->setKecLastID($insert_id);
		return true;
	}



	function get_kecamatan($id){
		$this->db->distinct();
		$this->db->order_by('nm_kecamatan', 'ASC');
		return $this->db->get_where('kecamatan',array('id_kabupaten' => $id));
	}	

	function get_idkecamatan($name){
		$query = $this->db->query("SELECT id_kecamatan FROM kecamatan WHERE nm_kecamatan LIKE '%".$name."%'");
		if(!empty($query)){
			return $query;
		}else{
			return "";
		}
	}

	function get_namekecamatan($id){
		return $this->db->get_where('kecamatan',array('id_kecamatan' => $id));
	}
}
?>