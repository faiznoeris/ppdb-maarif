<?php
class m_biaya extends CI_Model{
	// untuk biaya administrasi

	// function get_biaya(){

	// 	return $this->db->query("SELECT b.id_biaya, b.uraian, th.tahun, b.nominal FROM biaya as b, tahun_ajaran as th WHERE b.id_tahun=th.id_tahun");
	// }

	function get_biaya($operasi,$id_tahun,$jurusan){
		if($operasi == "all"){
			$this->db->select("biaya.*, tahun_ajaran.tahun, tahun_ajaran.id_tahun");
			$this->db->from("biaya");
			$this->db->join("tahun_ajaran","biaya.id_tahun = tahun_ajaran.id_tahun");
		}else if($operasi == "one"){
			$this->db->select("*");
			$this->db->from("biaya");
			$this->db->where("id_tahun = ".$id_tahun." AND jurusan = '".$jurusan."'");
		}

		return $this->db->get();
	}

	function get_tahun(){
		return $this->db->query("SELECT * FROM tahun_ajaran");
	}

	function input_biaya($data){

		$this->db->insert('biaya',$data);
	}

	function get_onebiaya($id){

		$this->db->select('*');
		$this->db->from("biaya");
		$this->db->where('id_biaya', $id);
		return $this->db->get()->row();

	}

	function update($data,$id){
		foreach ($data as $key => $value) {
			if($value != ""){
				$this->db->set($key, $value);
			}
		}
		
		$this->db->where('id_biaya',$id);
		$this->db->update('biaya');

	}

	function data_biaya(){


		return $this->db->query("SELECT * FROM `biaya`");
	}

	// end biaya administrasi
}
?>