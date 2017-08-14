<?php
class daftarulang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_daftarulang');
	}

	function hitungnilaiakhir(){
		$operasi = $this->uri->segment(3);

		if($operasi == "all"){
			foreach ($this->m_daftarulang->get_data('all')->result() as $row)
			{
				if($row->nilai_wawancara != 0){
					$na = ((65/100 * $row->nilai_un) + (35/100 * $row->nilai_wawancara)) + $row->nilai_prestasi;
				}else{
					$na = 0;
				}

				$data 						= array(   	
					'nilai_akhir'     			=>   $na
				);
				$this->m_daftarulang->update($row->id_pendaftar,$data);

				
			}
			redirect('dashboard/seleksipendaftar');
		}else if($operasi == "one"){
			$id = $this->uri->segment(4);
			foreach ($this->m_daftarulang->get_data('one',$id)->result() as $row)
			{
				if($row->nilai_wawancara != 0){
					$na = ((65/100 * $row->nilai_un) + (35/100 * $row->nilai_wawancara)) + $row->nilai_prestasi;
				}else{
					$na = 0;
				}

				$data 						= array(   	
					'nilai_akhir'     			=>   $na
				);
				$this->m_daftarulang->update($row->id_pendaftar,$data);

				
			}
			redirect('dashboard/seleksipendaftar');
		}else if($operasi == "reset"){
			foreach ($this->m_daftarulang->get_data('all')->result() as $row)
			{
				$na = 0;

				$data 						= array(   	
					'nilai_akhir'     			=>   $na
				);
				$this->m_daftarulang->update($row->id_pendaftar,$data);

				
			}
			redirect('dashboard/seleksipendaftar');
		}
	}

	//========================================================================
	// proses input data pendaftar
	//========================================================================
	function inputbayaran(){
		//echo $this->input->post('nama');
		//echo $_POST['action']);

		/*$mi = new MultipleIterator();
		$mi->attachIterator(new ArrayIterator($this->input->post('id_pendaftar')));
		$mi->attachIterator(new ArrayIterator($this->input->post('nilai_un')));
		$mi->attachIterator(new ArrayIterator($this->input->post('nilai_wawancara')));
		foreach ($mi as $value) {*/
			//list($id, $un, $wawancara) 		= 	$value;
			$id_pendaftar					= 	$this->uri->segment(3);
			//get biaya blm bayar

			$query = $this->m_daftarulang->get_data('one',$id_pendaftar)->result();
			$blmbayar = 0;
			$sdhbayar = 0;

			foreach ($query as $row) {
				$blmbayar = $row->biaya_belumbayar;
				$sdhbayar = $row->biaya_telahbayar;
			}

			$nominal_pembayaran				= 	$this->input->post('nominal_pembayaran');

			if($blmbayar == 2500000){
				$kekurangan 					= 	2500000 - $nominal_pembayaran;

			}else{
				$kekurangan 					= 	$blmbayar - $nominal_pembayaran;

			}

			if($sdhbayar != 0){
				$nominal_pembayaran = $sdhbayar + $nominal_pembayaran;
			}

			if($kekurangan != 0){
				$status = 'titip';
			}else{
				$status = 'du';
				$this->m_daftarulang->movetosiswa($id_pendaftar);
				$this->m_daftarulang->delfromcalonsiswa($id_pendaftar);
			}

			//echo $nilai_wawancara;

			$data 						= array(   	
				'biaya_telahbayar'  =>   $nominal_pembayaran,
				'biaya_belumbayar'    =>   $kekurangan,
				'status'      		=>   $status
			);
			$this->m_daftarulang->update($id_pendaftar,$data);
		//}
			redirect('dashboard/daftarulang');

		}

}//end class
?>