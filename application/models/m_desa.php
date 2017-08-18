<?php
class m_desa extends CI_Model{


	function insert_desa($data){
		$this->db->insert('desa', $data);
		return true;
	}


	function get_desa($id){
		$this->db->distinct();
		$this->db->order_by('nm_desa', 'ASC');
		return $this->db->get_where('desa',array('id_kecamatan' => $id));
	}

	function desa_exist($name){
		if(!empty($this->db->query("SELECT nm_desa FROM desa WHERE nm_desa LIKE '%".$name."%'")->row()->nm_desa)){
			return true;
		}else{
			return false;
		}
	}

	function get_namedesa($id){
		return $this->db->get_where('desa',array('id_desa' => $id));
	}
}
?>