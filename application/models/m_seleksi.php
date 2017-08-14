<?php
class m_seleksi extends CI_Model{
	function update($id,$data){
		$this->db->set($data);
		$this->db->where('id_pendaftar',$id);
		$this->db->update('seleksi');
		///$insert_id = $this->db->insert_id();
		//$this->session->set_tempdata('ID_Pendaftar', $insert_id, 120);
		return true;
	}

	function get_data($operasi,$id){
		if($operasi == "allwithname"){
			$this->db->select('data_calonsiswa.nm_lengkap, seleksi.*');
			$this->db->from('data_calonsiswa');
			$this->db->join('seleksi', 'seleksi.id_pendaftar = data_calonsiswa.id_pendaftar');

			return $this->db->get();	

		}else if($operasi == "all"){
			return $this->db->query("SELECT * FROM seleksi");
		}else if($operasi == "one"){
			return $this->db->get_where('seleksi',array('id_pendaftar' => $id));
		}else if($operasi == "onewithname"){
			$this->db->select('data_calonsiswa.nm_lengkap, seleksi.*');
			$this->db->from('seleksi');
			$this->db->join('data_calonsiswa', 'seleksi.id_pendaftar = data_calonsiswa.id_pendaftar');
			$this->db->where('data_calonsiswa.id_pendaftar',$id);
			

			return $this->db->get();
		}else if($operasi == "tav"){
			return $this->db->query("SELECT seleksi.*, data_calonsiswa.* FROM data_calonsiswa INNER JOIN seleksi ON data_calonsiswa.id_pendaftar = seleksi.id_pendaftar WHERE data_calonsiswa.id_jurusan = 0");
		}else if($operasi == "tkr"){
			return $this->db->query("SELECT seleksi.*, data_calonsiswa.* FROM data_calonsiswa INNER JOIN seleksi ON data_calonsiswa.id_pendaftar = seleksi.id_pendaftar WHERE data_calonsiswa.id_jurusan = 1");
		}else if($operasi == "tkj"){
			return $this->db->query("SELECT seleksi.*, data_calonsiswa.* FROM data_calonsiswa INNER JOIN seleksi ON data_calonsiswa.id_pendaftar = seleksi.id_pendaftar WHERE data_calonsiswa.id_jurusan = 2");
		}else if($operasi == "tab"){
			return $this->db->query("SELECT seleksi.*, data_calonsiswa.* FROM data_calonsiswa INNER JOIN seleksi ON data_calonsiswa.id_pendaftar = seleksi.id_pendaftar WHERE data_calonsiswa.id_jurusan = 3");
		}else if($operasi == "onlylulus"){
			return $this->db->get_where('seleksi',array('keterangan' => 'lulus'));
		}
		
	}

	function check_data($id){
		return $this->db->query("SELECT * FROM seleksi WHERE id_pendaftar = ".$id);
	}

	function remove_data($id){
		$this->db->query("DELETE FROM seleksi WHERE id_pendaftar = ".$id);
		return true;
	}

	function ins_blacklist($nm){
		$this->db->query("INSERT INTO blacklist_temp(`nama_pendaftar`) VALUES ('".$nm."')");
		///$insert_id = $this->db->insert_id();
		//$this->session->set_tempdata('ID_Pendaftar', $insert_id, 120);
		return true;
	}

	function insert_data($id,$skhu,$prestasi,$sertifikat){
		$this->db->query("INSERT INTO seleksi(`id_pendaftar`, `nilai_un`, `nilai_prestasi`,`nilai_sertifikat`, `nilai_wawancara`, `nilai_akhir`, `keterangan`) VALUES (".$id.",".$skhu.",".$prestasi.",".$sertifikat.",0,0,'-')");
		///$insert_id = $this->db->insert_id();
		//$this->session->set_tempdata('ID_Pendaftar', $insert_id, 120);
		return true;
	}

	function get_nilai(){
		$this->db->select('data_calonsiswa.nm_lengkap, data_calonsiswa.id_pendaftar, data_calonsiswa.skhu, seleksi.nilai_wawancara, seleksi.nilai_prestasi,seleksi.nilai_sertifikat');
		$this->db->from('data_calonsiswa');
		$this->db->join('seleksi', 'seleksi.id_pendaftar = data_calonsiswa.id_pendaftar');

		return $this->db->get();	
	}
}
?>