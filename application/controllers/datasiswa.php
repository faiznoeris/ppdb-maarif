<?php
class Datasiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_siswa');
	}

	function delete(){
		$id = $this->uri->segment(3);
		
		if($this->m_siswa->delete($id)){
			$this->session->set_tempdata('toastDeletedatasiswa', true, 3);
			$this->session->set_tempdata('toastDeletedatasiswaID', $id , 3);
			redirect("dashboard/datapendaftar");
		}else{
			redirect("dashboard/datapendaftar");
		}
	}

	function saveedit(){
		$this->load->model(array("m_siswa"));
		$id = $this->uri->segment(3);

		if(!empty($_POST)){

			//-------------------------------------------------------------------
			//data siswa pendaftar
			//-------------------------------------------------------------------
			if(!empty($this->input->post('nama'))){
				$nama_lengkap_siswa = 	$this->input->post('nama');
			}else{
				$nama_lengkap_siswa =  "";
			}

			if(!empty($this->input->post('asalsekolah'))){
				$asal_sekolah		= 	$this->input->post('asalsekolah');
			}else{
				$asal_sekolah		= 	"";
			}

			if(!empty($this->input->post('skhu'))){
				$nilaiSkhu   		= 	$this->input->post('skhu');
			}else{
				$nilaiSkhu		= 	"";
			}

			if(!empty($this->input->post('nisn'))){
				$nisn        		= 	$this->input->post('nisn');
			}else{
				$nisn				= 	"";
			}
			

			$ijazah_from   		= 	$this->input->post('select_ijazah');

			$ijazah_from   		= 	$this->input->post('select_ijazah');
			if($ijazah_from == "SMP"){
				if(!empty($this->input->post('ijazah'))){
					$no_ijasah   	= 	"DN".$this->input->post('ijazah');
				}else{
					$no_ijasah 		= 	"";
				}
			}else{
				if(!empty($this->input->post('ijazah'))){
					$no_ijasah  	= 	"MTs".$this->input->post('ijazah');
				}else{
					$no_ijasah 		= 	"";
				}
			}

			if(!empty($this->input->post('skhun'))){
				$no_skhun 			= 	"DN".$this->input->post('skhun');
			}else{
				$no_skhun 		= 	"";
			}



			$jenis_kelamin 			= 	$this->input->post('select_kelamin');
			$jurusan         	= 	$this->input->post('select_jurusan');
			//---------------------------------------
			//end nomor ujuan smp
			//---------------------------------------
			if(!empty($this->input->post('nik'))){
				$nik         		= 	$this->input->post('nik');
			}
			else{
				$nik  				= 	"";
			}
			if(!empty($this->input->post('tmpt_lhr'))){
				$tmp_lahir   		= 	$this->input->post('tmpt_lhr');
			}else{
				$tmp_lahir 				= 	"";
			}

			if(!empty($this->input->post('tgl_lhr'))){
				$tgl_lahir   		= 	$this->input->post('tgl_lhr');
			}else{
				$tgl_lahir  				= 	"";
			}

			
			//---------------------------------------
			// nomor ujian
			//------------------------------------
			$no_temp = array(1,2,3,4,5,6,7);
			$no_ujian = "";
			for($i = 0; $i < 7; $i++){
				if(!empty($this->input->post('no_un_'.$i))){
					$no_temp[$i]  	= 	$this->input->post('no_un_'.$i);
				}else{
					$no_temp[$i]  	= 	0;
				}
				if($i ==6){
					$no_ujian		.=	$no_temp[$i];
				}else{
					$no_ujian		.= 	$no_temp[$i] . "-";
				}
			}
			//---------------------------------------------
			// alamat
			//----------------------------------------------
			if(!empty($this->input->post('rt'))){
				$rt 	      		= 	$this->input->post('rt');
			}else{
				$rt  				= 	"0";
			}

			if(!empty($this->input->post('rw'))){
				$rw 	      		= 	$this->input->post('rw');
			}else{
				$rw  				= 	"0";
			}

			if(!empty($this->input->post('desa'))){
				$desa       		= 	$this->input->post('desa');
			}else{
				$desa  				= 	"0";
			}


			if(!empty($this->input->post('kodepos'))){
				$kodepos      		= 	$this->input->post('kodepos');
			}else{
				$kodepos  			= 	"0";
			}

			
			$kecamatan     		= 	$this->input->post('select_kecamatan');
			$kabupaten     		= 	$this->input->post('select_kabupaten');

			$alamat      		= 	"Desa ".$desa." RT. ".$rt." RW. ".$rw." Kecamatan "
			.$kecamatan." Kabupaten ".$kabupaten." Kode Pos ".$kodepos;
			//--------------------------------------------------
			//end alamat
			//------------------------------------------------
			if(!empty($this->input->post('email'))){
				$email       		= 	$this->input->post('email');
			}else{
				$email				= 	"";
			}
			if(!empty($this->input->post('no_telp'))){
				$telp        		= 	$this->input->post('no_telp');
			}else{
				$telp 				= 	"";
			}

			if($this->input->post('select_kps') == "Ya"){
				if(!empty($this->input->post('kps'))){
					$no_kps      		= 	$this->input->post('kps');
				}else{
					$no_kps 		= 	"";
				}
			}else{
				$no_kps 		= 	"0";
			}

			

			if(!empty($this->input->post('tinggi_badan'))){
				$tinggi_bdn  		= 	$this->input->post('tinggi_badan');
			}else{
				$tinggi_bdn		= 	"";
			}

			if(!empty($this->input->post('berat_badan'))){
				$berat_bdn   		= 	$this->input->post('berat_badan');
			}else{
				$berat_bdn		= 	"";
			}
			if(!empty($this->input->post('jarak_tempuh'))){
				$jarak_tempuh    	= 	$this->input->post('jarak_tempuh');
			}else{
				$jarak_tempuh		= 	"";
			}
			if(!empty($this->input->post('waktu_tempuh'))){
				$waktu_tempuh    	= 	$this->input->post('waktu_tempuh');
			}else{
				$waktu_tempuh		= 	"";
			}
			if(!empty($this->input->post('jml_saudara'))){
				$jml_sodara      	= 	$this->input->post('jml_saudara');
			}else{
				$jml_sodara		= 	"";
			}
			if(!empty($this->input->post('anak_ke'))){
				$anak_ke         	= 	$this->input->post('anak_ke');
			}else{
				$anak_ke		= 	"";
			}
			if(!empty($this->input->post('hobi'))){
				$hobi            	= 	$this->input->post('hobi');
			}else{
				$hobi		= 	"";
			}
			if(!empty($this->input->post('anak_ke'))){
				$prestasi        	= 	$this->input->post('hobi');
			}else{
				$prestasi		= 	"";
			}


			
			


			
			//=====================================================================
			// data orang tua murid
			//---------------------------------------------------------------------
			/*
			*		ORGTUA
			*/
			if(!empty($this->input->post('nama_ayah'))){
				$nama_ayah  		= 	$this->input->post('nama_ayah');

			}else{
				$nama_ayah  		= 	"";
			}

			if(!empty($this->input->post('th_lahir_ayah'))){
				$th_lahir_ayah   	= 	$this->input->post('tahun_lahir_ayah');

			}else{
				$th_lahir_ayah  		= 	"";
			}

			if(!empty($this->input->post('pekerjaan_ayah'))){
				$pekerjaan_ayah  	= 	$this->input->post('pekerjaan_ayah');

			}else{
				$pekerjaan_ayah  		= 	"";
			}


			if(!empty($this->input->post('pendidikan_ayah'))){
				$pendidikan_ayah 	= 	$this->input->post('pendidikan_ayah');

			}else{
				$pendidikan_ayah  		= 	"";
			}

			
			

			if(!empty($this->input->post('nama_ibu'))){
				$nama_ibu  		= 	$this->input->post('nama_ibu');

			}else{
				$nama_ibu  		= 	"";
			}

			if(!empty($this->input->post('th_lahir_ibu'))){
				$th_lahir_ibu   	= 	$this->input->post('tahun_lahir_ibu');

			}else{
				$th_lahir_ibu  		= 	"";
			}

			if(!empty($this->input->post('pekerjaan_ibu'))){
				$pekerjaan_ibu  	= 	$this->input->post('pekerjaan_ibu');

			}else{
				$pekerjaan_ibu  		= 	"";
			}


			if(!empty($this->input->post('pendidikan_ibu'))){
				$pendidikan_ibu 	= 	$this->input->post('pendidikan_ibu');

			}else{
				$pendidikan_ibu  		= 	"";
			}


			/*
			*		WALI
			*/
			if(!empty($this->input->post('nama_wali'))){
				$nama_wali  		= 	$this->input->post('nama_wali');

			}else{
				$nama_wali  		= 	"";
			}

			if(!empty($this->input->post('th_lahir_wali'))){
				$th_lahir_wali   	= 	$this->input->post('tahun_lahir_wali');

			}else{
				$th_lahir_wali  		= 	"";
			}

			if(!empty($this->input->post('pekerjaan_wali'))){
				$pekerjaan_wali  	= 	$this->input->post('pekerjaan_wali');

			}else{
				$pekerjaan_wali  		= 	"";
			}


			if(!empty($this->input->post('pendidikan_wali'))){
				$pendidikan_wali 	= 	$this->input->post('pendidikan_wali');

			}else{
				$pendidikan_wali  		= 	"";
			}


			//CHECK IF GANTI DARI WALI JADI ORG TUA ATAU SEBALIKNYA
			if($this->input->post('select_orgtua') == "OrgTua_edit"){
				$nama_wali  			= 	"0";
				$th_lahir_wali  		= 	"0000";
				$pekerjaan_wali  		= 	"0";
				$pendidikan_wali  		= 	"0";
			}else{
				$nama_ayah 				= 	"0";
				$th_lahir_ayah  		= 	"0000";
				$pekerjaan_ayah  		= 	"0";
				$pendidikan_ayah  		= 	"0";
				$nama_ibu  				= 	"0";
				$th_lahir_ibu  			= 	"0000";
				$pekerjaan_ibu  		= 	"0";
				$pendidikan_ibu  		= 	"0";
			}
			

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
				'pekerjaan_ayah'    =>   $pekerjaan_ayah,
				'pendidikan_ayah'   =>   $pendidikan_ayah,
				'nm_ibu'       		=>   $nama_ibu,
				'th_lahir_ibu'      =>   $th_lahir_ibu,
				'pekerjaan_ibu'     =>   $pekerjaan_ibu,
				'pendidikan_ibu'    =>   $pendidikan_ibu,
				'nm_wali'       	=>   $nama_wali,
				'th_lahir_wali'     =>   $th_lahir_wali,
				'pekerjaan_wali'    =>   $pekerjaan_wali,
				'pendidikan_wali'   =>   $pendidikan_wali
				
			);

			if($this->m_siswa->savechanges($data,$id)){
				redirect('dashboard/datapendaftar');
			}else{
				redirect('dashboard/datapendaftar');
			}
		}else{
			redirect("dashboard/datapendaftar");
		}//end !empty post action
	}
}	
?>