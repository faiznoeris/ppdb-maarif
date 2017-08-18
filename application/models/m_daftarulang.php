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
		$this->db->query("INSERT INTO siswa SELECT * FROM calonsiswa WHERE calonsiswa.id_pendaftar = ".$id);
		return true;
	}

	function delfromcalonsiswa($id){
		$this->db->query("DELETE FROM calonsiswa WHERE id_pendaftar = ".$id);
		return true;
	}

	function get_data($operasi,$id){
		if($operasi == "allwithlulus"){
			//SELECT seleksi.keterangan, calonsiswa.nm_lengkap, daftar_ulang.* FROM calonsiswa INNER JOIN seleksi ON calonsiswa.id_pendaftar = seleksi.id_pendaftar INNER JOIN daftar_ulang ON seleksi.id_pendaftar = daftar_ulang.id_pendaftar
			$this->db->select('seleksi.keterangan as keterangan_lulus, daftar_ulang.*, DATE_FORMAT(daftar_ulang.deadline, "%d-%m-%Y") as deadline2, calonsiswa.nm_lengkap');
			$this->db->from('calonsiswa');
			$this->db->join('seleksi', 'seleksi.id_pendaftar = calonsiswa.id_pendaftar');
			$this->db->join('daftar_ulang', 'seleksi.id_pendaftar = daftar_ulang.id_pendaftar');
			$this->db->where('seleksi.keterangan','lulus');
			$this->db->or_where('seleksi.keterangan','tidak_lulus');

			return $this->db->get();	

		}else if($operasi == "randomcadangan"){
			
			$this->db->select('*');
			$this->db->from('daftar_ulang');
			$this->db->where('status','cadangan');
			$this->db->order_by(1,'RANDOM');

			return $this->db->get();


		}else if($operasi == "all"){
			return $this->db->query("SELECT * FROM daftar_ulang");
		}else if($operasi == "cbtberkas"){
			$this->db->select('seleksi.keterangan as keterangan_lulus, daftar_ulang.*, history.nm_lengkap');
			$this->db->from('history');
			$this->db->join('seleksi', 'seleksi.id_pendaftar = history.id_pendaftar');
			$this->db->join('daftar_ulang', 'seleksi.id_pendaftar = daftar_ulang.id_pendaftar');
			$this->db->where('seleksi.keterangan','lulus');
			$this->db->or_where('seleksi.keterangan','tidak_lulus');

			return $this->db->get();	
		}else if($operasi == "laporan"){

			if($this->db->query('select * from history')->num_rows() > 0){
				return $this->db->query('
					SELECT seleksi.keterangan as keterangan_lulus, calonsiswa.nm_lengkap, calonsiswa.nisn, daftar_ulang.*
					FROM daftar_ulang
					JOIN calonsiswa ON daftar_ulang.id_pendaftar = calonsiswa.id_pendaftar
					JOIN seleksi ON daftar_ulang.id_pendaftar = seleksi.id_pendaftar

					UNION

					SELECT seleksi.keterangan as keterangan_lulus, history.nm_lengkap, history.nisn, daftar_ulang.*
					FROM daftar_ulang
					JOIN history ON daftar_ulang.id_pendaftar = history.id_pendaftar
					JOIN seleksi ON daftar_ulang.id_pendaftar = seleksi.id_pendaftar

					ORDER BY(id_pendaftar)
					');
			}else{
				$this->db->select('seleksi.keterangan as keterangan_lulus, daftar_ulang.*, calonsiswa.nm_lengkap');
				$this->db->from('calonsiswa');
				$this->db->join('seleksi', 'seleksi.id_pendaftar = calonsiswa.id_pendaftar');
				$this->db->join('daftar_ulang', 'seleksi.id_pendaftar = daftar_ulang.id_pendaftar');
				$this->db->where('seleksi.keterangan','lulus');
				$this->db->or_where('seleksi.keterangan','tidak_lulus');

				return $this->db->get();	
			}



		}else if($operasi == "one"){
			return $this->db->get_where('daftar_ulang',array('id_pendaftar' => $id));
		}else if($operasi == "onewithname"){
			$this->db->select('calonsiswa.nm_lengkap, calonsiswa.nisn, daftar_ulang.*');
			$this->db->from('daftar_ulang');
			$this->db->join('calonsiswa', 'daftar_ulang.id_pendaftar = calonsiswa.id_pendaftar');
			$this->db->where('calonsiswa.id_pendaftar',$id);

			return $this->db->get();
		}else if($operasi == "du"){
			return $this->db->get_where('daftar_ulang',array('status' => 'du'));
		}else if($operasi == "titip"){
			return $this->db->get_where('daftar_ulang',array('status' => 'titip'));
		}else if($operasi == "du+titip"){
			return $this->db->get_where('daftar_ulang',array('status' => 'du+titip'));
		}else if($operasi == "cabut-berkas"){
			return $this->db->get_where('daftar_ulang',array('status' => 'cabut-berkas'));
		}else if($operasi == "cadangan"){
			return $this->db->get_where('daftar_ulang',array('status' => 'cadangan'));
		}else if($operasi == "-"){
			return $this->db->get_where('daftar_ulang',array('status' => '-'));
		}


		
	}

	function get_nilai(){
		$this->db->select('calonsiswa.nm_lengkap, calonsiswa.id_pendaftar, calonsiswa.skhu, seleksi.nilai_wawancara, seleksi.nilai_prestasi,seleksi.nilai_sertifikat');
		$this->db->from('calonsiswa');
		$this->db->join('seleksi', 'seleksi.id_pendaftar = calonsiswa.id_pendaftar');

		return $this->db->get();	
	}

	function check_data($id){
		return $this->db->query("SELECT * FROM daftar_ulang WHERE id_pendaftar = ".$id);
	}

	function insert_data($data){
		//$this->db->query("INSERT INTO seleksi(`id_pendaftar`, `nilai_un`, `nilai_prestasi`,`nilai_sertifikat`, `nilai_wawancara`, `nilai_akhir`, `keterangan`) VALUES (".$id.",".$skhu.",".$prestasi.",".$sertifikat.",0,0,'-')");
		// $date = date('Y-m-d');

		$this->db->insert("daftar_ulang", $data);

		// if($status != ""){
		// 	$this->db->query("INSERT INTO `daftar_ulang` (`id_pendaftar`, `status`, `biaya_telahbayar`, `biaya_belumbayar`, `deadline`) VALUES (".$id.",'".$status."',0,2500000, ".$date." )");
		// }else{
		// 	$this->db->query("INSERT INTO `daftar_ulang` (`id_pendaftar`, `status`, `biaya_telahbayar`, `biaya_belumbayar`, `deadline`) VALUES (".$id.",'-',0,2500000, ".$date.")");
		// }
		///$insert_id = $this->db->insert_id();
		//$this->session->set_tempdata('ID_Pendaftar', $insert_id, 120);
		return true;
	}


}
?>