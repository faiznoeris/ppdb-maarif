<?php
class seleksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('m_seleksi','m_calonsiswa','m_waitapproval','m_blacklist','m_daftarulang','m_history'));
	}

	function hitungnilaiakhir(){
		$operasi = $this->uri->segment(3);

		if($operasi == "all"){
			foreach ($this->m_seleksi->get_data('allwithname')->result() as $row)
			{
				$lulus = "-";
				$cadangan = false;

				$nilai_wawancara = $row->nilai_minat + $row->nilai_kepribadian + $row->nilai_ibadah + $row->nilai_keluarga + $row->nilai_narkoba + $row->nilai_lain;

				$na = (($row->nilai_un + $nilai_wawancara)/2) + $row->nilai_prestasi + $row->nilai_sertifikat;

				if($nilai_wawancara != -6){
					
					if($na >= 35.00){
						$lulus = "lulus";
					}else if($na < 35.00 && $na != 0){
						$lulus = "tidak_lulus";
						if($row->nilai_ibadah >= 20 && $row->nilai_narkoba >= 5){
							$cadangan = true; 
						}
					}

				}else{
					$na = 0;
				}

				$data 						= array(   	
					'nilai_akhir'     			=>   $na,
					'keterangan'     			=>   $lulus
				);

				if($lulus == "tidak_lulus"){					
					if($cadangan){
						
						$datacadangan 		= array(   	
							'id_pendaftar' 				=>	$row->id_pendaftar,
							'status' 					=>	"cadangan",
							'biaya_telahbayar' 			=>  0,
							'biaya_belumbayar' 			=>  2500000
						);

						$this->m_seleksi->update($row->id_pendaftar,$data);
						$this->m_daftarulang->insert_data($datacadangan);

					}else{


						$this->m_blacklist->ins_blacklist($row->nm_lengkap,$row->nisn);
						$this->m_history->insert($row->id_pendaftar);
						//$this->m_seleksi->remove_data($row->id_pendaftar);
						$this->m_calonsiswa->remove_data($row->id_pendaftar);
						$this->m_seleksi->update($row->id_pendaftar,$data);
					}

				}else{
					$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));  //get dates 2 days from now

					$datalulus 		= array(   	
						'id_pendaftar' 				=>	$row->id_pendaftar,
						'status' 					=>	"-",
						'biaya_telahbayar' 			=>  0,
						'biaya_belumbayar' 			=>  2500000,
						'deadline'					=>	$date
					);

					$this->m_seleksi->update($row->id_pendaftar,$data);
					$this->m_daftarulang->insert_data($datalulus);
				}
			}
			redirect('dashboard/seleksipendaftar');
		}else if($operasi == "one"){
			$id = $this->uri->segment(4);
			foreach ($this->m_seleksi->get_data('onewithname',$id)->result() as $row)
			{
				$lulus = "-";
				$cadangan = false;

				$nilai_wawancara = $row->nilai_minat + $row->nilai_kepribadian + $row->nilai_ibadah + $row->nilai_keluarga + $row->nilai_narkoba + $row->nilai_lain;

				$na = (($row->nilai_un + $nilai_wawancara)/2) + $row->nilai_prestasi + $row->nilai_sertifikat;

				if($nilai_wawancara != -6){
					
					if($na >= 35.00){
						$lulus = "lulus";
					}else if($na < 35.00 && $na != 0){
						$lulus = "tidak_lulus";
						if($row->nilai_ibadah >= 20 && $row->nilai_narkoba >= 5){
							$cadangan = true; 
						}
					}

				}else{
					$na = 0;
				}

				$data 						= array(   	
					'nilai_akhir'     			=>   $na,
					'keterangan'     			=>   $lulus
				);

				if($lulus == "tidak_lulus"){					
					if($cadangan){
						
						$datacadangan 		= array(   	
							'id_pendaftar' 				=>	$row->id_pendaftar,
							'status' 					=>	"cadangan",
							'biaya_telahbayar' 			=>  0,
							'biaya_belumbayar' 			=>  2500000
						);

						$this->m_seleksi->update($row->id_pendaftar,$data);
						$this->m_daftarulang->insert_data($datacadangan);

					}else{


						$this->m_blacklist->ins_blacklist($row->nm_lengkap,$row->nisn);
						$this->m_history->insert($row->id_pendaftar);
						//$this->m_seleksi->remove_data($row->id_pendaftar);
						$this->m_calonsiswa->remove_data($row->id_pendaftar);
						$this->m_seleksi->update($row->id_pendaftar,$data);
					}

				}else{
					$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));  //get dates 2 days from now

					$datalulus 		= array(   	
						'id_pendaftar' 				=>	$row->id_pendaftar,
						'status' 					=>	"-",
						'biaya_telahbayar' 			=>  0,
						'biaya_belumbayar' 			=>  2500000,
						'deadline'					=>	$date
					);

					$this->m_seleksi->update($row->id_pendaftar,$data);
					$this->m_daftarulang->insert_data($datalulus);
				}
			}
			redirect('dashboard/seleksipendaftar');
		}else if($operasi == "reset"){
			foreach ($this->m_seleksi->get_data('all','')->result() as $row)
			{

				$data 						= array(   	
					'nilai_akhir'     		=>   0,
					'keterangan'     			=>   "-"
				);
				$this->m_seleksi->update($row->id_pendaftar,$data);

				
			}
			redirect('dashboard/seleksipendaftar');
		}
	}

	function inputwawancara(){
		$id_pendaftar					= 	$this->uri->segment(3);

		foreach ($this->m_seleksi->get_data('one',$id_pendaftar)->result() as $row)
		{
			$nilai_un				= 	$row->nilai_un;
			$nilai_prestasi			= 	$row->nilai_prestasi;
			$nilai_minat			= 	$this->input->post('nilai_minat');
			$nilai_kepribadian		= 	$this->input->post('nilai_kepribadian');
			$nilai_ibadah			= 	$this->input->post('nilai_ibadah');
			$nilai_keluarga			= 	$this->input->post('nilai_keluarga');
			$nilai_narkoba			= 	$this->input->post('nilai_narkoba');
			$nilai_lain				= 	$this->input->post('nilai_lain');
		}

			//echo $nilai_wawancara;

		$data 						= array(   	
			'nilai_un'     			=>   $nilai_un,
			'nilai_prestasi'       	=>   $nilai_prestasi,
			'nilai_minat'      		=>   $nilai_minat,
			'nilai_kepribadian'    	=>   $nilai_kepribadian,
			'nilai_ibadah'      	=>   $nilai_ibadah,
			'nilai_keluarga'      	=>   $nilai_keluarga,
			'nilai_narkoba'      	=>   $nilai_narkoba,
			'nilai_lain'      		=>   $nilai_lain

		);
		$this->m_seleksi->update($id_pendaftar,$data);
		//}
		redirect('dashboard/seleksipendaftar');

	}

	function approve(){

		$id					= 	$this->uri->segment(3);
		$row 				=	$this->m_waitapproval->get($id)->row();


		$id_pendaftar		= 	$row->id_pendaftar;

		if($row->nilai_minat != 0){
			$nilai_minat		= 	$row->nilai_minat;
		}else{
			$nilai_minat 		= 	"";
		}

		if($row->nilai_kepribadian != 0){
			$nilai_kepribadian	= 	$row->nilai_kepribadian;
		}else{
			$nilai_kepribadian 	= 	"";
		}


		if($row->nilai_ibadah != 0){
			$nilai_ibadah		= 	$row->nilai_ibadah;
		}else{
			$nilai_ibadah		= 	"";
		}


		if($row->nilai_keluarga != 0){
			$nilai_keluarga		= 	$row->nilai_keluarga;
		}else{
			$nilai_keluarga 	= 	"";
		}

		if($row->nilai_narkoba != 0){
			$nilai_narkoba		= 	$row->nilai_narkoba;
		}else{
			$nilai_narkoba 		= 	"";
		}

		if($row->nilai_lain != 0){
			$nilai_lain			= 	$row->nilai_lain;
		}else{
			$nilai_lain 		= 	"";
		}



		$data 						= array(   	
			'nilai_minat'      		=>   $nilai_minat,
			'nilai_kepribadian'    	=>   $nilai_kepribadian,
			'nilai_ibadah'      	=>   $nilai_ibadah,
			'nilai_keluarga'      	=>   $nilai_keluarga,
			'nilai_narkoba'      	=>   $nilai_narkoba,
			'nilai_lain'      		=>   $nilai_lain,
			'wait_approval'			=>	 "0"

		);


		$this->m_seleksi->update_editwawancara($data,$id_pendaftar);
		$this->m_waitapproval->delete($id);

		redirect('dashboard/seleksipendaftar');

	}



	function editwawancara(){
		
		$id_admin = $this->uri->segment(4);
		$id_pendaftar = $this->uri->segment(5);
		$adminstatus = $this->uri->segment(3);
		$row =	$this->m_seleksi->get_data('one',$id_pendaftar)->row();

		if(!empty($_POST)){
			$changes = "";
			$date = date('Y-m-d');

			if(!empty($this->input->post('nilai_minat'))){
				$nilai_minat		= 	$this->input->post('nilai_minat');
				$changes 			.=  "Merubah Nilai Minat dari ".$row->nilai_minat." menjadi ".$nilai_minat;
			}else{
				$nilai_minat 		= 	"";
			}

			if(!empty($this->input->post('nilai_kepribadian'))){
				$nilai_kepribadian	= 	$this->input->post('nilai_kepribadian');
				$changes 			.=  nl2br("\nMerubah Nilai Kepribadian dari ".$row->nilai_kepribadian." menjadi ".$nilai_kepribadian);
			}else{
				$nilai_kepribadian 		= 	"";
			}


			if(!empty($this->input->post('nilai_ibadah'))){
				$nilai_ibadah		= 	$this->input->post('nilai_ibadah');
				$changes 			.=  nl2br("\nMerubah Nilai Ibadah dari ".$row->nilai_ibadah." menjadi ".$nilai_ibadah);
			}else{
				$nilai_ibadah		= 	"";
			}


			if(!empty($this->input->post('nilai_keluarga'))){
				$nilai_keluarga		= 	$this->input->post('nilai_keluarga');
				$changes 			.=  nl2br("\nMerubah Nilai Keluarga dari ".$row->nilai_keluarga." menjadi ".$nilai_keluarga);
			}else{
				$nilai_keluarga 	= 	"";
			}

			if(!empty($this->input->post('nilai_narkoba'))){
				$nilai_narkoba		= 	$this->input->post('nilai_narkoba');
				$changes 			.=  nl2br("\nMerubah Nilai Narkoba dari ".$row->nilai_narkoba." menjadi ".$nilai_narkoba);
			}else{
				$nilai_narkoba 		= 	"";
			}

			if(!empty($this->input->post('nilai_lain'))){
				$nilai_lain		= 	$this->input->post('nilai_lain');
				$changes 			.=  nl2br("\nMerubah Nilai Lain dari ".$row->nilai_lain." menjadi ".$nilai_lain);
			}else{
				$nilai_lain 		= 	"";
			}


			if($adminstatus == "reguleradmin"){

				$data 				= array(   	
					'nilai_minat'       	=>   $nilai_minat,
					'nilai_kepribadian'     =>   $nilai_kepribadian,
					'nilai_ibadah'       	=>   $nilai_ibadah,
					'nilai_keluarga'       	=>   $nilai_keluarga,
					'nilai_narkoba'       	=>   $nilai_narkoba,
					'nilai_lain'       		=>   $nilai_lain,
					'id_user'				=>	 $id_admin,
					'changes'				=>	 $changes,
					'date_requested'		=> 	 $date,
					'id_pendaftar'			=> 	 $id_pendaftar
				);  	

				if($this->m_waitapproval->insert($id,$data)){

					$data 				= array(   	
						'wait_approval'       =>   "1"
					);  	

					if($this->m_seleksi->update($id_pendaftar,$data)){
						//add notif that sucessfully edit
						redirect('dashboard/seleksipendaftar');
					}else{
						redirect('dashboard/seleksipendaftar');
					}
					
				}else{
				//add notif that gagal edit
					redirect('dashboard/seleksipendaftar');
				}

			}else{

				$data 				= array(   	
					'nilai_minat'       	=>   $nilai_minat,
					'nilai_kepribadian'     =>   $nilai_kepribadian,
					'nilai_ibadah'       	=>   $nilai_ibadah,
					'nilai_keluarga'       	=>   $nilai_keluarga,
					'nilai_narkoba'       	=>   $nilai_narkoba,
					'nilai_lain'       		=>   $nilai_lain
				);

				if($this->m_seleksi->update_editwawancara($data,$id_pendaftar)){
				//add notif that sucessfully edit
					redirect("dashboard/seleksipendaftar");
				}else{
				//add notif that gagal edit
					redirect("dashboard/seleksipendaftar");
				}

			}


		}else{
			redirect("dashboard");
		}//end !empty post action
	}
}//end class
?>