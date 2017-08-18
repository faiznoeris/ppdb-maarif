<?php
class m_waitapproval extends CI_Model{
	public $lastID = "";

	function setlastid($id){
		$this->lastID = $id;
	}

	function getlastid(){
		return $this->lastID;
	}

	function delete($id){
		$this->db->delete('wait_approval', array('id_approval' => $id));
		return true;
	}

	function get($id){
		if($id != ""){
			$this->db->select("*, DATE_FORMAT(date_requested, '%d - %M - %Y') as date_requested2");
			$this->db->from("wait_approval");
			$this->db->where("id_approval",$id);	
		}else{
			$this->db->select("*, DATE_FORMAT(date_requested, '%d - %M - %Y') as date_requested2");
			$this->db->from("wait_approval");
			$this->db->join("users","wait_approval.id_user = users.id_user");
		}

		return $this->db->get();
	}

	function insert($id,$data){
		$this->db->insert("wait_approval",$data);
		$this->setlastid($this->db->insert_id());
		return true;
	}


}
?>