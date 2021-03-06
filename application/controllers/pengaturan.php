<?php
class Pengaturan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array("m_user","m_tahunajaran","m_kuota","m_bobot_nilai","m_biaya")); 
	}

	function addtahunAjaran(){

		if(!empty($_POST)){
			$tgl_mulai		= 	$this->input->post('tgl_mulai');
			$tgl_akhir		= 	$this->input->post('tgl_akhir');
			$waktu_mulai		= 	$this->input->post('waktu_mulai');
			$waktu_akhir		= 	$this->input->post('waktu_selesai');
			//$status 			= 	$this->input->post('select_status');

			$waktu = $waktu_mulai." - ".$waktu_akhir;

			$tahun_skrng		=	date('Y');
			$tahun_dulu		=	date('Y')-1;
			$tahun			=	$tahun_dulu."/".$tahun_skrng;
			$data           =	array(
				"tahun"		=>	$tahun,
				"tgl_pendaftaran"	=>	$tgl_mulai,
				"tgl_terakhir"    =>	$tgl_akhir,
				"waktu_pendaftaran" => $waktu,
				"status"			=>	"nonaktif"
			);
			//echo $nama;

			if($this->m_tahunajaran->get_tahun($tahun) > 0){
				$this->session->set_tempdata('toastaddTHajaranFail', true, 5);
				redirect("dashboard/pengaturan");
			}else{
				$this->session->set_tempdata('toastaddTHajaranSuccess', true, 3);
				$this->m_tahunajaran->insert_thajaran($data);
				$this->m_kuota->insert_kuota($this->m_tahunajaran->getLastIDTahun());
				redirect("dashboard/pengaturan");
			}
		}else{
			redirect("dashboard/pengaturan");
		}
	}

	function edittahunAjaran(){
		if(!empty($_POST)){
			$id 			=	$this->uri->segment(3);

			$tgl_mulai		= 	$this->input->post('tgl_mulai');
			$tgl_akhir		= 	$this->input->post('tgl_akhir');
			$waktu_mulai	= 	$this->input->post('waktu_mulai');
			$waktu_akhir	= 	$this->input->post('waktu_selesai');
			$status 			= 	$this->input->post('select_status');

			$waktu = $waktu_mulai." - ".$waktu_akhir;


			$data           =	array(
				"tgl_pendaftaran"	=>	$tgl_mulai,
				"tgl_terakhir"   	=>	$tgl_akhir,
				"waktu_pendaftaran" => 	$waktu,
				"status"			=>	$status
			);
			//echo $nama;
			$this->m_tahunajaran->update_thajaran($data,$id);
			redirect("dashboard/pengaturan");
		}else{
			
			redirect("dashboard/pengaturan");
		}
		
	}


	function savebobot(){
		if(!empty($_POST)){
			$nasional_1		= 	$this->input->post('nas_1');
			$nasional_2		= 	$this->input->post('nas_2');
			$nasional_3		= 	$this->input->post('nas_3');

			$provinsi_1		= 	$this->input->post('prov_1');
			$provinsi_2		= 	$this->input->post('prov_2');
			$provinsi_3		= 	$this->input->post('prov_3');

			$kabupaten_1	= 	$this->input->post('kab_1');
			$kabupaten_2	=	$this->input->post('kab_2');
			$kabupaten_3	= 	$this->input->post('kab_3');

			$sertifikat_lanjut		= 	$this->input->post('ser_1');
			$sertifikat_menengah	= 	$this->input->post('ser_2');
			$sertifikat_dasar		= 	$this->input->post('ser_3');

			$data           =	array(
				"prestasi_nasional_1"	=>	$nasional_1,
				"prestasi_nasional_2"	=>	$nasional_2,
				"prestasi_nasional_3"   =>	$nasional_3,

				"prestasi_provinsi_1"	=>	$provinsi_1,
				"prestasi_provinsi_2"	=>	$provinsi_2,
				"prestasi_provinsi_3"	=>	$provinsi_3,

				"prestasi_kabupaten_1"	=>	$kabupaten_1,
				"prestasi_kabupaten_2"	=>	$kabupaten_2,
				"prestasi_kabupaten_3"	=>	$kabupaten_3,

				"sertifikat_lanjut"		=>	$sertifikat_lanjut,
				"sertifikat_menengah"	=>	$sertifikat_menengah,
				"sertifikat_dasar"		=>	$sertifikat_dasar
			);

			$this->m_bobot_nilai->update_bobot($data);
			$this->session->set_tempdata('toastEditBobotSukses', true, 3);
			redirect("dashboard/pengaturan");
		}else{
			redirect("dashboard/pengaturan");
		}
		
	}


	function savekuota(){
		if(!empty($_POST)){
			$id 		=	$this->uri->segment(3);

			$tav		= 	$this->input->post('tav');
			$tkr		= 	$this->input->post('tkr');
			$tkj		= 	$this->input->post('tkj');
			$tab		= 	$this->input->post('tab');

			$data           =	array(
				"kuota_tav"	=>	$tav,
				"kuota_tkr"	=>	$tkr,
				"kuota_tkj" =>	$tkj,
				"kuota_tab"	=>	$tab,
			);

			$this->m_kuota->update_kuota($data,$id);
			$this->session->set_tempdata('toastEditKuotaSukses', true, 3);
			redirect("dashboard/pengaturan");
		}else{
			redirect("dashboard/pengaturan");
		}
		
	}


	function addbiaya(){

		if(!empty($_POST)){
			$uraian		= 	$this->input->post('uraian');
			$tahun		= 	$this->input->post('tahun');
			$nominal	= 	$this->input->post('nominal');
			$jurusan	=	$this->input->post('jurusan');

			$data           =	array(
				"uraian"		=>	$uraian,
				"id_tahun"		=>	$tahun,
				"nominal"    	=>	$nominal,
				"jurusan"		=>	$jurusan
			);

			if($this->m_biaya->input_biaya($data)){
				redirect("dashboard/pengaturan");				
			}else{
				redirect("dashboard/pengaturan");
			}
		
		}else{
			redirect("dashboard/pengaturan");
		}
	}

	function editbiaya(){
		if(!empty($_POST)){
			// $id 		=	$this->uri->segment(3);
			// $uraian		= 	$this->input->post('uraian');
			// $tahun		= 	$this->input->post('tahun');
			// $nominal	= 	$this->input->post('nominal');

			$id_biaya 	=	$this->input->post('id_biaya');

			foreach( $id_biaya as $id) {
				if(!empty($this->input->post('uraian'.$id))){
					$uraian		= 	$this->input->post('uraian'.$id);
				}else{
					$uraian		= 	"";
				}
				
				if(!empty($this->input->post('nominal'.$id))){
					$nominal	= 	$this->input->post('nominal'.$id);
				}else{
					$nominal	= 	"";
				}

				if($uraian == "" && $nominal == ""){
					continue;
				}

				$data       =	array(
					"uraian"		=>	$uraian,
					"nominal"    	=>	$nominal
				);


				$this->m_biaya->update($data,$id);

				//print "The name is ".$uraian." and email is ".$nominal.", thank you<br>";
			}

			// $data       =	array(
			// 	"uraian"		=>	$uraian,
			// 	"id_tahun"		=>	$tahun,
			// 	"nominal"    	=>	$nominal
			// );
			//echo "$id.".".$uraian.".".$tahun.".".$nominal";

			// $this->m_dashboard->edit_biaya($data,$id);
			redirect("dashboard/pengaturan");
		}else{
			
			redirect("dashboard/pengaturan");
		}
		
	}

}
?>