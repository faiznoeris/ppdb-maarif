<?php
class m_kuota extends CI_Model{
	function get_kuota($operasi, $id){
		if($operasi == "withyear"){
			$this->db->select("kuota.*, tahun_ajaran.tahun, tahun_ajaran.id_tahun");
			$this->db->from("kuota");
			$this->db->join("tahun_ajaran","kuota.id_tahun = tahun_ajaran.id_tahun");
			// $this->db->where('kuota.id_tahun', $id);
			return $this->db->get();
		}else{
			$this->db->select("kuota.*, tahun_ajaran.tahun, tahun_ajaran.id_tahun");
			$this->db->from("kuota");
			$this->db->join("tahun_ajaran","kuota.id_tahun = tahun_ajaran.id_tahun");
			$this->db->where('kuota.id_kuota', $id);
			return $this->db->get()->row();
		}
	}

	function update_kuota($data,$id){
		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$this->db->set($key, $value);
			}
		}

		$this->db->where('id_kuota', $id);

		if($this->db->update('kuota')){
			return true;
		}
		
		return false;
	}

	function insert_kuota($id){
		$this->db->query("INSERT INTO `kuota`(`id_tahun`, `kuota_tav`, `kuota_tkr`, `kuota_tkj`, `kuota_tab`) VALUES (".$id.",0,0,0,0)");
	}
}
?>