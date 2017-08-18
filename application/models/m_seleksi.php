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

	function update_editwawancara($data,$id){
		foreach ($data as $key => $value) {
			if($value != ""){
				$this->db->set($key, $value);
			}
		}
		//$this->db->set($data);
		$this->db->where('id_pendaftar', $id);
		$this->db->update('seleksi');
		return true;
	}

	// function get($operasi){
	// 	if($operasi == "approval"){
	// 		$this->db->select("*, DATE_FORMAT(date_requested, '%d - %M - %Y') as date_requested2");
	// 		$this->db->from("seleksi");
	// 		$this->db->join("users","seleksi.id_user = users.id_user");
	// 		$this->db->where("wait_approval", "1");
	// 	}
	// 	return $this->db->get();
	// }

	function get_data($operasi,$id){
		if($operasi == "allwithname"){
			
			if($this->db->query('select * from history')->num_rows() > 0){
				return $this->db->query('
					SELECT calonsiswa.nm_lengkap, calonsiswa.nisn, seleksi.*
					FROM seleksi
					JOIN calonsiswa ON seleksi.id_pendaftar = calonsiswa.id_pendaftar

					UNION

					SELECT history.nm_lengkap, history.nisn, seleksi.*
					FROM seleksi
					JOIN history ON seleksi.id_pendaftar = history.id_pendaftar

					ORDER BY(id_pendaftar)
					');
			}else{
				$this->db->select('calonsiswa.nm_lengkap, calonsiswa.nisn, seleksi.*');
				$this->db->from('seleksi');
				$this->db->join('calonsiswa', 'calonsiswa.id_pendaftar = seleksi.id_pendaftar');

				return $this->db->get();
			}


			
			// if($this->db->query('select * from history')->num_rows > 0){
			// 	$this->db->join('history', 'history.id_pendaftar = seleksi.id_pendaftar','right');
			// }

			// $this->db->join('calonsiswa', 'calonsiswa.id_pendaftar = seleksi.id_pendaftar');

				

		}else if($operasi == "all"){
			return $this->db->query("SELECT * FROM seleksi");
		}else if($operasi == "one"){
			return $this->db->get_where('seleksi',array('id_pendaftar' => $id));
		}else if($operasi == "onewithname"){
			$this->db->select('calonsiswa.nm_lengkap, calonsiswa.nisn, seleksi.*');
			$this->db->from('seleksi');
			$this->db->join('calonsiswa', 'seleksi.id_pendaftar = calonsiswa.id_pendaftar');
			$this->db->where('calonsiswa.id_pendaftar',$id);
			

			return $this->db->get();
		}else if($operasi == "tav"){
			return $this->db->query("
				SELECT calonsiswa.nm_lengkap, calonsiswa.id_pendaftar, calonsiswa.asal_sekolah, calonsiswa.alamat, seleksi.keterangan
				FROM seleksi
				JOIN calonsiswa ON seleksi.id_pendaftar = calonsiswa.id_pendaftar
				WHERE calonsiswa.id_jurusan = 0

				UNION

				SELECT history.nm_lengkap, history.id_pendaftar, history.asal_sekolah, history.alamat, seleksi.keterangan
				FROM seleksi
				JOIN history ON seleksi.id_pendaftar = history.id_pendaftar
				WHERE history.id_jurusan = 0    

				ORDER BY(id_pendaftar)
				");
		}else if($operasi == "tkr"){
			return $this->db->query("
				SELECT calonsiswa.nm_lengkap, calonsiswa.id_pendaftar, calonsiswa.asal_sekolah, calonsiswa.alamat, seleksi.keterangan
				FROM seleksi
				JOIN calonsiswa ON seleksi.id_pendaftar = calonsiswa.id_pendaftar
				WHERE calonsiswa.id_jurusan = 1

				UNION

				SELECT history.nm_lengkap, history.id_pendaftar, history.asal_sekolah, history.alamat, seleksi.keterangan
				FROM seleksi
				JOIN history ON seleksi.id_pendaftar = history.id_pendaftar
				WHERE history.id_jurusan = 1    

				ORDER BY(id_pendaftar)
				");
		}else if($operasi == "tkj"){
			return $this->db->query("
				SELECT calonsiswa.nm_lengkap, calonsiswa.id_pendaftar, calonsiswa.asal_sekolah, calonsiswa.alamat, seleksi.keterangan
				FROM seleksi
				JOIN calonsiswa ON seleksi.id_pendaftar = calonsiswa.id_pendaftar
				WHERE calonsiswa.id_jurusan = 2

				UNION

				SELECT history.nm_lengkap, history.id_pendaftar, history.asal_sekolah, history.alamat, seleksi.keterangan
				FROM seleksi
				JOIN history ON seleksi.id_pendaftar = history.id_pendaftar
				WHERE history.id_jurusan = 2   

				ORDER BY(id_pendaftar)
				");
		}else if($operasi == "tab"){
			return $this->db->query("
				SELECT calonsiswa.nm_lengkap, calonsiswa.id_pendaftar, calonsiswa.asal_sekolah, calonsiswa.alamat, seleksi.keterangan
				FROM seleksi
				JOIN calonsiswa ON seleksi.id_pendaftar = calonsiswa.id_pendaftar
				WHERE calonsiswa.id_jurusan = 3

				UNION

				SELECT history.nm_lengkap, history.id_pendaftar, history.asal_sekolah, history.alamat, seleksi.keterangan
				FROM seleksi
				JOIN history ON seleksi.id_pendaftar = history.id_pendaftar
				WHERE history.id_jurusan = 3    

				ORDER BY(id_pendaftar)
				");
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



	function insert_data($id,$skhu,$prestasi,$sertifikat){
		$this->db->query("INSERT INTO seleksi(`id_pendaftar`, `nilai_un`, `nilai_prestasi`,`nilai_sertifikat`, `nilai_minat`, `nilai_kepribadian`, `nilai_ibadah`, `nilai_keluarga`, `nilai_narkoba`, `nilai_lain`, `nilai_akhir`, `keterangan`) VALUES (".$id.",".$skhu.",".$prestasi.",".$sertifikat.",-1,-1,-1,-1,-1,-1,0,'-')");
		///$insert_id = $this->db->insert_id();
		//$this->session->set_tempdata('ID_Pendaftar', $insert_id, 120);
		return true;
	}

	function get_nilai(){
		$this->db->select('calonsiswa.nm_lengkap, calonsiswa.id_pendaftar, calonsiswa.skhu, seleksi.*');
		$this->db->from('calonsiswa');
		$this->db->join('seleksi', 'seleksi.id_pendaftar = calonsiswa.id_pendaftar');

		return $this->db->get();	
	}
}
?>