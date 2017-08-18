<?php
class m_kabupaten extends CI_Model{
	public $kabJustInsertedID = "";

	function setKabLastID($id){
		$this->kabJustInsertedID = $id;
	}

	function getKabLastID(){
		return $this->kabJustInsertedID;
	}



	function insert_kabupaten($data){
		$this->db->insert('kabupaten', $data);
		$insert_id = $this->db->insert_id();
		$this->setKabLastID($insert_id);
		return true;
	}



	function get_allkabupaten(){
		$this->db->distinct();
		$this->db->order_by('nm_kabupaten', 'ASC');
		return $this->db->get('kabupaten');
	}

	function get_idkabupaten($name){
		$query = $this->db->query("SELECT id_kabupaten FROM kabupaten WHERE nm_kabupaten LIKE '%".$name."%'");
		if(!empty($query)){
			return $query;
		}else{
			return "";
		}
	}

	function get_namekabupaten($id){
		return $this->db->get_where('kabupaten',array('id_kabupaten' => $id));
	}
}
?>