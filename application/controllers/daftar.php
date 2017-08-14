<?php
class daftar extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('m_daftar','m_dashboard'));
	}

	//========================================================================
	// proses input data pendaftar
	//========================================================================
	function input(){
		//echo $this->input->post('nama');
		//echo $_POST['action']);
		if(!empty($_POST)){
			$bobot_nilai 		= 	$this->m_dashboard->get_bobotnilai()->row();

			//-------------------------------------------------------------------
			//data siswa pendaftar
			//-------------------------------------------------------------------
			$nama_lengkap_siswa = 	$this->input->post('nama');
			//$jenis_kelamin      = 	$this->input->post('jenis_kelamin');
			$asal_sekolah		= 	$this->input->post('asalsekolah');
			$nilaiSkhu   		= 	$this->input->post('skhu');
			$nisn        		= 	$this->input->post('nisn');

			$jenis_kelamin		= 	$this->input->post('select_kelamin');
			$jurusan         	= 	$this->input->post('select_jurusan');

			$ijazah_from   		= 	$this->input->post('select_ijazah');

			$ijazah_from   		= 	$this->input->post('select_ijazah');
			if($ijazah_from == "SMP"){
				$no_ijasah   	= 	"DN".$this->input->post('ijazah');
			}else{
				$no_ijasah  	= 	"MTs".$this->input->post('ijazah');
			}

			$no_skhun 			= 	"DN".$this->input->post('skhun');

			//$pilseklh    		= 	$this->input->post('pilsekolah');


			//---------------------------------------
			// nomor ujian
			//------------------------------------
			$no_temp = array(1,2,3,4,5,6,7);
			$no_ujian = "";
			for($i = 0; $i < 7; $i++){
				$no_temp[$i]  	= 	$this->input->post('no_un_'.$i);
				if($i ==6){
					$no_ujian		.=	$no_temp[$i];
				}else{
					$no_ujian		.= 	$no_temp[$i] . "-";
				}
			}

			/*$no_un1       		= 	$this->input->post('no_un1');
			$no_un2       		= 	$this->input->post('no_un2');
			$no_un3       		= 	$this->input->post('no_un3');
			$no_un4       		= 	$this->input->post('no_un4');
			$no_un5       		= 	$this->input->post('no_un5');
			$no_un6       		= 	$this->input->post('no_un6');
			$no_un7       		= 	$this->input->post('no_un7');
			$no_ujian           = 	$no_un1."-".$no_un2."-".$no_un3."-".$no_un4."-".$no_un5."-".$no_un6."-".$no_un7;*/

			//---------------------------------------
			//end nomor ujuan smp
			//---------------------------------------
			$nik         		= 	$this->input->post('nik');
			$tmp_lahir   		= 	$this->input->post('tmpt_lhr');
			$tgl_lahir   		= 	$this->input->post('tgl_lhr');
			//---------------------------------------------
			// alamat
			//----------------------------------------------
			$rt 	      		= 	$this->input->post('rt');
			$rw 	      		= 	$this->input->post('rw');
			//$desa       		= 	$this->input->post('desa');
			//$kecamatan     		= 	$this->input->post('select_kecamatan');
			//$kabupaten     		= 	$this->input->post('select_kabupaten');
			$kodepos      		= 	$this->input->post('kodepos');

			$id_kab     		= 	$this->input->post('select_kabupaten');
			$id_kec     		= 	$this->input->post('select_kecamatan');
			$id_desa     		= 	$this->input->post('select_desa');

			if(!empty($id_kab)){
				$q_kab = $this->m_daftar->get_kabupatenname($id_kab)->result();

				foreach ($q_kab as $row) {
					$kabupaten = $row->nm_kabupaten;
				}
			}else{
				$kabupaten       		= 	$this->input->post('kabupaten_input');
				if(!$this->m_daftar->kab_exist($kabupaten)){
					$kab_name_fix = ucfirst(strtolower($kabupaten)); //lower the word then capitalize first letter
					$data = array('nm_kabupaten' => $kab_name_fix);

					$this->m_daftar->ins_kabupaten($data);
				}
			}

			if(!empty($id_kec)){
				$q_kec = $this->m_daftar->get_kecamatanname($id_kec)->result();

				foreach ($q_kec as $row) {
					$kecamatan = $row->nm_kecamatan;
				}
			}else{
				$kecamatan       		= 	$this->input->post('kecamatan_input');
				if(!$this->m_daftar->kec_exist($kecamatan)){
					$kec_name_fix = ucfirst(strtolower($kecamatan)); //lower the word then capitalize first letter

					if(!empty($this->m_daftar->getID_kabupaten($kab_name_fix))){
						$id_kab = $this->m_daftar->getID_kabupaten($kab_name_fix);
					}else{
						$id_kab = $this->m_daftar->getKabLastID;
					}

					$data =  array('id_kabupaten' => $id_kab,'nm_kecamatan' => $kec_name_fix);
					$this->m_daftar->ins_kecamatan($data);
				}
			}

			if(!empty($id_desa)){
				$q_desa = $this->m_daftar->get_desaname($id_desa)->result();

				foreach ($q_desa as $row) {
					$desa = $row->nm_desa;
				}
			}else{
				$desa       		= 	$this->input->post('desa_input');
				if(!$this->m_daftar->desa_exist($desa)){
					$desa_name_fix = ucfirst(strtolower($desa)); //lower the word then capitalize first letter

					if(!empty($this->m_daftar->getID_kecamatan($kec_name_fix))){
						$id_kec = $this->m_daftar->getID_kecamatan($kec_name_fix);
					}else{
						$id_kec = $this->m_daftar->getKecLastID;
					}

					$data =  array('id_kecamatan' => $id_kec,'nm_kecamatan' => $desa_name_fix);
					$this->m_daftar->ins_desa($data);
				}
			}

			$alamat      		= 	"Desa ".$desa." RT. ".$rt." RW. ".$rw." Kecamatan "
			.$kecamatan." Kabupaten ".$kabupaten." Kode Pos ".$kodepos;
			//--------------------------------------------------
			//end alamat
			//------------------------------------------------
			if(!empty($this->input->post('email'))){
				$email       		= 	$this->input->post('email');
			}else{
				$email       		= 	'-';
			}

			if(!empty($this->input->post('no_telp'))){
				$telp        		= 	$this->input->post('no_telp');
			}else{
				$telp        		= 	"-";
			}
			
			
			if(!empty($this->input->post('kps'))){
				$no_kps      		= 	$this->input->post('kps');
			}else{
				$no_kps 		= 	"0";
			}
			$tinggi_bdn  		= 	$this->input->post('tinggi_badan');
			$berat_bdn   		= 	$this->input->post('berat_badan');
			$jarak_tempuh    	= 	$this->input->post('jarak_tempuh');
			$waktu_tempuh    	= 	$this->input->post('waktu_tempuh');
			$jml_sodara      	= 	$this->input->post('jml_saudara');
			$anak_ke         	= 	$this->input->post('anak_ke');
			if(!empty($this->input->post('hobi'))){
				$hobi            	= 	$this->input->post('hobi');
			}else{
				$hobi            	=	"0";
			}




			if($this->input->post('select_memiliki_sertifikat') == "1"){

				if($this->input->post('select_jenjang_sertifikat') == "1"){
					$bobot_sertifikat = $bobot_nilai->sertifikat_lanjut;
				}else if($this->input->post('select_jenjang_sertifikat') == "2"){
					$bobot_sertifikat = $bobot_nilai->sertifikat_menengah;
				}else if($this->input->post('select_jenjang_sertifikat') == "3"){
					$bobot_sertifikat = $bobot_nilai->sertifikat_dasar;
				}

			}else{
				$bobot_sertifikat = 0;
			}

			$bobot_prestasi = 0;
			$tingkat_juara = "";
			$prestasi = "";
			$jmlprestasi = $this->input->post('jmlPrestasi');

			for ($i=1; $i <= $jmlprestasi; $i++) { 
				if($this->input->post('select_peringkat_juara'.$i) == ""){
					$tingkat_juara .= ".. - ";
				}

				if($this->input->post('select_tingkat_prestasi'.$i) == "1"){
					if($this->input->post('select_peringkat_juara'.$i) == "1"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_1;
						$tingkat_juara .= "Nasional - I ";
					}else if($this->input->post('select_peringkat_juara'.$i) == "2"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_2;
						$tingkat_juara .= "Nasional - II ";
					}else if($this->input->post('select_peringkat_juara'.$i) == "3"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_3;
						$tingkat_juara .= "Nasional - III ";
					}
				}else if($this->input->post('select_tingkat_prestasi'.$i) == "2"){
					if($this->input->post('select_peringkat_juara1') == "1"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_1;
						$tingkat_juara .= "Provinsi - I ";
					}else if($this->input->post('select_peringkat_juara'.$i) == "2"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_2;
						$tingkat_juara .= "Provinsi - II ";
					}else if($this->input->post('select_peringkat_juara'.$i) == "3"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_3;
						$tingkat_juara .= "Provinsi - III ";
					}
				}else if($this->input->post('select_tingkat_prestasi'.$i) == "3"){
					if($this->input->post('select_peringkat_juara1') == "1"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_1;
						$tingkat_juara .= "Kabupaten - I ";
					}else if($this->input->post('select_peringkat_juara'.$i) == "2"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_2;
						$tingkat_juara .= "Kabupaten - II ";
					}else if($this->input->post('select_peringkat_juara.$i'.$i) == "3"){
						$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_3;
						$tingkat_juara .= "Kabupaten - III ";
					}
				}else{
					$bobot_prestasi = $bobot_prestasi + 0;
				}


				if(!empty($this->input->post('prestasi_ket'.$i))){
					if($i > 1){
						$prestasi        	.= 	nl2br("\n".$i.". ".$this->input->post('prestasi_ket2'));
					}else{
						$prestasi        	.= 	$i.". ".$this->input->post('prestasi_ket'.$i);
					}
				}else{
					if($i > 1){
						$prestasi        	.= 	nl2br("\n".$i.". -");
					}else{
						$prestasi        	.= 	$i.". -";
					}
				}

				
			}

			$nilai_prestasi = $bobot_prestasi / $jmlprestasi;

			// if($this->input->post('select_jml_prestasi') == "1"){

			// 	if($this->input->post('select_tingkat_prestasi1') == "1"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_1;
			// 			$tingkat_juara = "Nasional - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_2;
			// 			$tingkat_juara = "Nasional - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_3;
			// 			$tingkat_juara = "Nasional - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi1') == "2"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_1;
			// 			$tingkat_juara = "Provinsi - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_2;
			// 			$tingkat_juara = "Provinsi - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_3;
			// 			$tingkat_juara = "Provinsi - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi1') == "3"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_1;
			// 			$tingkat_juara = "Kabupaten - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_2;
			// 			$tingkat_juara = "Kabupaten - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_3;
			// 			$tingkat_juara = "Kabupaten - III ";
			// 		}
			// 	}

			// 	if(!empty($this->input->post('prestasi_ket1'))){
			// 		$prestasi        	= 	"1. ".$this->input->post('prestasi_ket1');
			// 	}else{
			// 		$prestasi          	=	"0";
			// 	}

			// 	$nilai_prestasi = $bobot_prestasi;

			// }else if($this->input->post('select_jml_prestasi') == "2"){

			// 	if($this->input->post('select_tingkat_prestasi1') == "1"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_1;
			// 			$tingkat_juara = "Nasional - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_2;
			// 			$tingkat_juara = "Nasional - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_3;
			// 			$tingkat_juara = "Nasional - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi1') == "2"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_1;
			// 			$tingkat_juara = "Provinsi - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_2;
			// 			$tingkat_juara = "Provinsi - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_3;
			// 			$tingkat_juara = "Provinsi - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi1') == "3"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_1;
			// 			$tingkat_juara = "Kabupaten - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_2;
			// 			$tingkat_juara = "Kabupaten - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_3;
			// 			$tingkat_juara = "Kabupaten - III ";
			// 		}
			// 	}


			// 	if($this->input->post('select_tingkat_prestasi2') == "1"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_1;
			// 			$tingkat_juara .= "Nasional - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_2;
			// 			$tingkat_juara .= "Nasional - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_3;
			// 			$tingkat_juara .= "Nasional - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi2') == "2"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_1;
			// 			$tingkat_juara .= "Provinsi - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_2;
			// 			$tingkat_juara .= "Provinsi - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_3;
			// 			$tingkat_juara .= "Provinsi - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi2') == "3"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_1;
			// 			$tingkat_juara .= "Kabupaten - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_2;
			// 			$tingkat_juara .= "Kabupaten - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_3;
			// 			$tingkat_juara .= "Kabupaten - III ";
			// 		}
			// 	}


			// 	if(!empty($this->input->post('prestasi_ket1'))){
			// 		$prestasi        	= 	"1. ".$this->input->post('prestasi_ket1');
			// 	}else{
			// 		$prestasi          	=	"0";
			// 	}

			// 	if(!empty($this->input->post('prestasi_ket2'))){
			// 		$prestasi        	.= 	nl2br("\n2. ".$this->input->post('prestasi_ket2'));
			// 	}else{
			// 		//$prestasi          	.=	"0";
			// 	}

			// 	$nilai_prestasi = $bobot_prestasi / 2;

			// }else if($this->input->post('select_jml_prestasi') == "3"){

			// 	if($this->input->post('select_tingkat_prestasi1') == "1"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_1;
			// 			$tingkat_juara = "Nasional - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_2;
			// 			$tingkat_juara = "Nasional - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_3;
			// 			$tingkat_juara = "Nasional - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi1') == "2"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_1;
			// 			$tingkat_juara = "Provinsi - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_2;
			// 			$tingkat_juara = "Provinsi - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_3;
			// 			$tingkat_juara = "Provinsi - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi1') == "3"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_1;
			// 			$tingkat_juara = "Kabupaten - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_2;
			// 			$tingkat_juara = "Kabupaten - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_3;
			// 			$tingkat_juara = "Kabupaten - III ";
			// 		}
			// 	}


			// 	if($this->input->post('select_tingkat_prestasi2') == "1"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_1;
			// 			$tingkat_juara .= "Nasional - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_2;
			// 			$tingkat_juara .= "Nasional - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_3;
			// 			$tingkat_juara .= "Nasional - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi2') == "2"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_1;
			// 			$tingkat_juara .= "Provinsi - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_2;
			// 			$tingkat_juara .= "Provinsi - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_3;
			// 			$tingkat_juara .= "Provinsi - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi2') == "3"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_1;
			// 			$tingkat_juara .= "Kabupaten - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_2;
			// 			$tingkat_juara .= "Kabupaten - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_3;
			// 			$tingkat_juara .= "Kabupaten - III ";
			// 		}
			// 	}


			// 	if($this->input->post('select_tingkat_prestasi3') == "1"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_1;
			// 			$tingkat_juara .= "Nasional - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_2;
			// 			$tingkat_juara .= "Nasional - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_nasional_3;
			// 			$tingkat_juara .= "Nasional - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi3') == "2"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_1;
			// 			$tingkat_juara .= "Provinsi - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_2;
			// 			$tingkat_juara .= "Provinsi - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_provinsi_3;
			// 			$tingkat_juara .= "Provinsi - III ";
			// 		}
			// 	}else if($this->input->post('select_tingkat_prestasi3') == "3"){
			// 		if($this->input->post('select_peringkat_juara1') == "1"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_1;
			// 			$tingkat_juara .= "Kabupaten - I ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "2"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_2;
			// 			$tingkat_juara .= "Kabupaten - II ";
			// 		}else if($this->input->post('select_peringkat_juara1') == "3"){
			// 			$bobot_prestasi = $bobot_prestasi + $bobot_nilai->prestasi_kabupaten_3;
			// 			$tingkat_juara .= "Kabupaten - III ";
			// 		}
			// 	}

			// 	if(!empty($this->input->post('prestasi_ket1'))){
			// 		$prestasi        	= 	"1. ".$this->input->post('prestasi_ket1');
			// 	}else{
			// 		$prestasi          	=	"0";
			// 	}

			// 	if(!empty($this->input->post('prestasi_ket2'))){
			// 		$prestasi        	.= 	nl2br("\n2. ".$this->input->post('prestasi_ket2'));
			// 	}else{
			// 		//$prestasi          	.=	"0";
			// 	}

			// 	if(!empty($this->input->post('prestasi_ket3'))){
			// 		$prestasi        	.= 	nl2br("\n3. ".$this->input->post('prestasi_ket3'));
			// 	}else{
			// 		//$prestasi          	.=	"0";
			// 	}

			// 	$nilai_prestasi = $bobot_prestasi / 3;
			// }else{
			// 	$nilai_prestasi = 0;
			// 	$prestasi = "-";
			// }


			

			
			//=====================================================================
			// data orang tua murid
			//---------------------------------------------------------------------
			if(!empty($this->input->post('nama_ayah'))){
				$nama_ayah  		= 	$this->input->post('nama_ayah');
				$th_lahir_ayah   	= 	$this->input->post('tahun_lahir_ayah');
				$pekerjaar_ayah  	= 	$this->input->post('pekerjaan_ayah');
				$pendidikan_ayah 	= 	$this->input->post('pendidikan_ayah');
			}else{
				$nama_ayah  		= 	"0";
				$th_lahir_ayah   	= 	"0000";
				$pekerjaar_ayah  	= 	"0";
				$pendidikan_ayah 	= 	"0";
			}

			if(!empty($this->input->post('nama_ibu'))){
				$nama_ibu   		= 	$this->input->post('nama_ibu');
				$th_lahir_ibu    	= 	$this->input->post('tahun_lahir_ibu');
				$pekerjaar_ibu   	= 	$this->input->post('pekerjaan_ibu');
				$pendidikan_ibu  	= 	$this->input->post('pendidikan_ibu');
			}else{
				$nama_ibu  			= 	"0";
				$th_lahir_ibu   	= 	"0000";
				$pekerjaar_ibu	 	= 	"0";
				$pendidikan_ibu 	= 	"0";
			}

			
			if(!empty($this->input->post('nama_wali'))){
				$nama_wali 			= 	$this->input->post('nama_wali');
				$th_lahir_wali  	= 	$this->input->post('tahun_lahir_wali');
				$pekerjaar_wali  	= 	$this->input->post('pekerjaan_wali');
				$pendidikan_wali 	= 	$this->input->post('pendidikan_wali');
			}else{
				$nama_wali  		= 	"0";
				$th_lahir_wali   	= 	"0000";
				$pekerjaar_wali  	= 	"0";
				$pendidikan_wali 	= 	"0";
			}

			$data_prestasi =  array(
				'nilai_prestasi' => $nilai_prestasi,
				'nilai_sertifikat' => $bobot_sertifikat,
				'tingkat_juara' => $tingkat_juara
			);

			$data 				= array(   	
				'nm_lengkap'       	=>   $nama_lengkap_siswa,
				'jenis_kelamin'     =>   $jenis_kelamin,
				'temp_lahir'       	=>   $tmp_lahir,
				'tgl_lahir'       	=>   $tgl_lahir,
				'alamat'       		=>   $alamat,
				'telp'       		=>   $telp,
				'email'       		=>   $email,

				'tinggi_bdn'       	=>   $tinggi_bdn,
				'berat_bdn'       	=>   $berat_bdn,
				'jarak_rumah'     	=>   $jarak_tempuh,
				'waktu_tempuh'      =>   $waktu_tempuh,
				'jml_sodara'       	=>   $jml_sodara,
				'anak_ke'       	=>   $anak_ke,
				'hobi'       		=>   $hobi,
				'prestasi'       	=>   $prestasi,
				'id_jurusan'       	=>   $jurusan,
				'asal_sekolah'      =>   $asal_sekolah,
				//'sekolah'       	=>   $pilseklh,											

				//nilai dan no
				'skhu'       		=>   $nilaiSkhu,
				'nisn'      		=>   $nisn,					
				'nik'       		=>   $nik,					
				'no_ijasah'       	=>   $no_ijasah,
				'no_skhun'       	=>   $no_skhun,
				'no_un'       		=>   $no_ujian,	
				'no_kps'       		=>   $no_kps,																			
				//orangtua
				'nm_ayah'       	=>   $nama_ayah,
				'th_lahir_ayah'     =>   $th_lahir_ayah,
				'pekerjaan_ayah'    =>   $pekerjaar_ayah,
				'pendidikan_ayah'   =>   $pendidikan_ayah,
				'nm_ibu'       		=>   $nama_ibu,
				'th_lahir_ibu'      =>   $th_lahir_ibu,
				'pekerjaan_ibu'     =>   $pekerjaar_ibu,
				'pendidikan_ibu'    =>   $pendidikan_ibu,
				'nm_wali'       	=>   $nama_wali,
				'th_lahir_wali'     =>   $th_lahir_wali,
				'pekerjaan_wali'    =>   $pekerjaar_wali,
				'pendidikan_wali'   =>   $pendidikan_wali,
			);

			/*$kuotaQuery = $this->m_daftar->getKuota()->result();
			foreach ($kuotaQuery as $row) {
				$kuota = $row->kuota;
				$currentSize = $this->m_daftar->getSizeCalonSiswa();
			}*/

			$tahun_skrng			=	date('Y');
			$tahun_dulu				=	date('Y')-1;
			$tahun					=	$tahun_dulu."/".$tahun_skrng;

			$rowkuota = $this->m_dashboard->get_datakuota('withyear',$this->m_dashboard->get_tahunID($tahun))->row();
			$isblacklist = $this->m_daftar->is_blacklist($nama_lengkap_siswa);

			if($jurusan == "0"){
				$currentsize = $this->m_daftar->getSizeCalonSiswa("0");
				$sisa = $rowkuota->kuota_tav - $currentsize;

			}else if($jurusan == "1"){
				$currentsize = $this->m_daftar->getSizeCalonSiswa("1");
				$sisa = $rowkuota->kuota_tkr - $currentsize;

			}else if($jurusan == "2"){
				$currentsize = $this->m_daftar->getSizeCalonSiswa("2");
				$sisa = $rowkuota->kuota_tkj - $currentsize;

			}else if($jurusan == "3"){
				$currentsize = $this->m_daftar->getSizeCalonSiswa("3");
				$sisa = $rowkuota->kuota_tab - $currentsize;

			}
			


			//if(!(($kuota - $currentSize) <= 0)){ //cek apakah kuota full
			if(!($isblacklist)){ //check blacklist ato engga
				if(!($sisa <= 0)){
					if($this->m_daftar->input($data, $data_prestasi)){
						if($this->uploadfoto($this->m_daftar->getLastID())){
							redirect('pendaftaran/sukses');
						}
				//redirect('pendaftaran/sukses');
					}else{
						redirect('pendaftaran/gagal');
					}
				}else{
				//send message / info that registration is failed cuz slot is full
					redirect('pendaftaran/gagal');
				}
			}else{
				//send message / info that registration is failed cuz blacklisted
				redirect('pendaftaran/gagal');
			}
		}else{
			redirect("pendaftaran");
		}//end !empty post action
	}//end function input


	function uploadfoto($id){
		$config = array(
			'upload_path' => "./asset/images/foto_calonsiswa/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "348000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "300",
			'max_width' => "300",
			'file_name' => "foto". $id
		);

		$this->upload->initialize($config);
		//$this->load->library('upload', $config);
		
		if($_FILES['foto']['size'] == 0){
			return false;
		}else if($this->upload->do_upload('foto')){
			$fotopath 				= 	$this->upload->data();
			$fotopath 				= 	$fotopath["full_path"];
			$fotopath 				= 	substr($fotopath, 32);

			//unlink('.'.$this->session->userdata('foto_path'));

			if($this->m_daftar->updatefotopath($fotopath, $id)){
				return true;
			}else{
				return false;
			}
			//echo $avapath;
			//redirect("/dashboard");
			//return true;
		}else{
			return false;
		}
	}
}//end class
?>