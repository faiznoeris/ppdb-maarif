<?php
class daftar extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_daftar');
	}

	//========================================================================
	// proses input data pendaftar
	//========================================================================
	function input(){
		//echo $this->input->post('nama');
		//echo $_POST['action']);
		if(!empty($_POST)){
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
			$desa       		= 	$this->input->post('desa');
			$kecamatan     		= 	$this->input->post('select_kecamatan');
			$kabupaten     		= 	$this->input->post('select_kabupaten');
			$kodepos      		= 	$this->input->post('kodepos');
			$alamat      		= 	"Desa ".$desa." RT. ".$rt." RW. ".$rw." Kecamatan "
			.$kecamatan." Kabupaten ".$kabupaten." Kode Pos ".$kodepos;
			//--------------------------------------------------
			//end alamat
			//------------------------------------------------
			$email       		= 	$this->input->post('email');
			$telp        		= 	$this->input->post('no_telp');
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


			if(!empty($this->input->post('prestasi'))){
				$prestasi        	= 	$this->input->post('prestasi');
			}else{
				$hobi            	=	"0";
			}
			

			
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
				'pendidikan_wali'   =>   $pendidikan_wali
			);

			if($this->m_daftar->post($data)){
				redirect('pendaftaran/sukses');
			}else{
				redirect('pendaftaran/gagal');
			}
		}else{
			redirect("pendaftaran");
		}//end !empty post action
	}//end function input
}//end class
?>