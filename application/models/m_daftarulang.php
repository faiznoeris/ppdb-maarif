<?php
class m_daftarulang extends CI_Model{
	function update($id,$data){
		$this->db->set($data);
		$this->db->where('id_pendaftar',$id);
		$this->db->update('daftar_ulang');
		///$insert_id = $this->db->insert_id();
		//$this->session->set_tempdata('ID_Pendaftar', $insert_id, 120);
		return true;
	}

	function movetosiswa($id){
		$this->db->query("INSERT INTO data_siswa SELECT * FROM data_calonsiswa WHERE data_calonsiswa.id_pendaftar = ".$id);
		return true;
	}

	function delfromcalonsiswa($id){
		$this->db->query("DELETE FROM data_calonsiswa WHERE id_pendaftar = ".$id);
		return true;
	}

	function get_data($operasi,$id){
		if($operasi == "allwithlulus"){
			//SELECT seleksi.keterangan, data_calonsiswa.nm_lengkap, daftar_ulang.* FROM data_calonsiswa INNER JOIN seleksi ON data_calonsiswa.id_pendaftar = seleksi.id_pendaftar INNER JOIN daftar_ulang ON seleksi.id_pendaftar = daftar_ulang.id_pendaftar
			$this->db->select('seleksi.keterangan as keterangan_lulus, daftar_ulang.*, data_calonsiswa.nm_lengkap');
			$this->db->from('data_calonsiswa');
			$this->db->join('seleksi', 'seleksi.id_pendaftar = data_calonsiswa.id_pendaftar');
			$this->db->join('daftar_ulang', 'seleksi.id_pendaftar = daftar_ulang.id_pendaftar');
			$this->db->where('seleksi.keterangan','lulus');

			return $this->db->get();	

		}else if($operasi == "all"){
			return $this->db->query("SELECT * FROM daftar_ulang");
		}else if($operasi == "one"){
			return $this->db->get_where('daftar_ulang',array('id_pendaftar' => $id));
		}else if($operasi == "du"){
			return $this->db->get_where('daftar_ulang',array('status' => 'du'));
		}else if($operasi == "titip"){
			return $this->db->get_where('daftar_ulang',array('status' => 'titip'));
		}else if($operasi == "du+titip"){
			return $this->db->get_where('daftar_ulang',array('status' => 'du+titip'));
		}else if($operasi == "mundur"){
			return $this->db->get_where('daftar_ulang',array('status' => 'mundur'));
		}else if($operasi == "cabut-berkas"){
			return $this->db->get_where('daftar_ulang',array('status' => 'cabut-berkas'));
		}


		
	}

	function get_nilai(){
		$this->db->select('data_calonsiswa.nm_lengkap, data_calonsiswa.id_pendaftar, data_calonsiswa.skhu, seleksi.nilai_wawancara, seleksi.nilai_prestasi,seleksi.nilai_sertifikat');
		$this->db->from('data_calonsiswa');
		$this->db->join('seleksi', 'seleksi.id_pendaftar = data_calonsiswa.id_pendaftar');

		return $this->db->get();	
	}

	function check_data($id){
		return $this->db->query("SELECT * FROM daftar_ulang WHERE id_pendaftar = ".$id);
	}

	function insert_data($id){
		//$this->db->query("INSERT INTO seleksi(`id_pendaftar`, `nilai_un`, `nilai_prestasi`,`nilai_sertifikat`, `nilai_wawancara`, `nilai_akhir`, `keterangan`) VALUES (".$id.",".$skhu.",".$prestasi.",".$sertifikat.",0,0,'-')");
		$this->db->query("INSERT INTO `daftar_ulang` (`id_pendaftar`, `status`, `biaya_telahbayar`, `biaya_belumbayar`, `keterangan`) VALUES (".$id.",'-',0,2500000,'-')");
		///$insert_id = $this->db->insert_id();
		//$this->session->set_tempdata('ID_Pendaftar', $insert_id, 120);
		return true;
	}


}
?>