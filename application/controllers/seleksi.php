<?php
class seleksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('m_seleksi','m_daftar'));
	}

	function hitungnilaiakhir(){
		$operasi = $this->uri->segment(3);

		if($operasi == "all"){
			foreach ($this->m_seleksi->get_data('allwithname')->result() as $row)
			{
				$lulus = "-";
				if($row->nilai_wawancara != 0){
					$na = ((65/100 * $row->nilai_un) + (35/100 * $row->nilai_wawancara)) + $row->nilai_prestasi;
					if($na >= 100){
						$lulus = "lulus";
					}else if($na < 100 && $na != 0){
						$lulus = "tidak_lulus";
					}
				}else{
					$na = 0;
				}

				$data 						= array(   	
					'nilai_akhir'     			=>   $na,
					'keterangan'     			=>   $lulus
				);

				if($lulus = "tidak_lulus"){
					$this->m_seleksi->ins_blacklist($row->id_pendaftar);
					//$this->m_seleksi->remove_data($row->id_pendaftar);
					//$this->m_daftar->remove_data($row->id_pendaftar);
					$this->m_seleksi->update($row->id_pendaftar,$data);
				}else{
					$this->m_seleksi->update($row->id_pendaftar,$data);
				}
				

				
			}
			redirect('dashboard/seleksipendaftar');
		}else if($operasi == "one"){
			$id = $this->uri->segment(4);
			foreach ($this->m_seleksi->get_data('onewithname',$id)->result() as $row)
			{
				$lulus = "-";
				if($row->nilai_wawancara != 0){
					$na = ((65/100 * $row->nilai_un) + (35/100 * $row->nilai_wawancara)) + $row->nilai_prestasi;
					if($na >= 100){
						$lulus = "lulus";
					}else if($na < 100 && $na != 0){
						$lulus = "tidak_lulus";
					}
				}else{
					$na = 0;
				}

				$data 						= array(   	
					'nilai_akhir'     			=>   $na,
					'keterangan'     			=>   $lulus
				);

				if($lulus = "tidak_lulus"){
					$this->m_seleksi->ins_blacklist($row->nm_lengkap);
					//$this->m_seleksi->remove_data($row->id_pendaftar);
					//$this->m_daftar->remove_data($row->id_pendaftar);
					$this->m_seleksi->update($row->id_pendaftar,$data);
				}else{
					$this->m_seleksi->update($row->id_pendaftar,$data);
				}
				
			}
			redirect('dashboard/seleksipendaftar');
		}else if($operasi == "reset"){
			foreach ($this->m_seleksi->get_data('all')->result() as $row)
			{
				$na = 0;

				$data 						= array(   	
					'nilai_akhir'     			=>   $na
				);
				$this->m_seleksi->update($row->id_pendaftar,$data);

				
			}
			redirect('dashboard/seleksipendaftar');
		}
	}

	//========================================================================
	// proses input data pendaftar
	//========================================================================
	function inputwawancara(){
		//echo $this->input->post('nama');
		//echo $_POST['action']);

		/*$mi = new MultipleIterator();
		$mi->attachIterator(new ArrayIterator($this->input->post('id_pendaftar')));
		$mi->attachIterator(new ArrayIterator($this->input->post('nilai_un')));
		$mi->attachIterator(new ArrayIterator($this->input->post('nilai_wawancara')));
		foreach ($mi as $value) {*/
			//list($id, $un, $wawancara) 		= 	$value;
			$id_pendaftar					= 	$this->uri->segment(3);

			foreach ($this->m_seleksi->get_data('one',$id_pendaftar)->result() as $row)
			{
				$nilai_un						= 	$row->nilai_un;
				$nilai_prestasi					= 	$row->nilai_prestasi;
				$nilai_wawancara				= 	$this->input->post('nilai_wawancara');
			}

			//echo $nilai_wawancara;

			$data 						= array(   	
				'nilai_un'     			=>   $nilai_un,
				'nilai_prestasi'       	=>   $nilai_prestasi,
				'nilai_wawancara'      	=>   $nilai_wawancara
			);
			$this->m_seleksi->update($id_pendaftar,$data);
		//}
			redirect('dashboard/seleksipendaftar');

		}

}//end class
?>