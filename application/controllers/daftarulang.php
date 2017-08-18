<?php
class daftarulang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('m_daftarulang','m_blacklist','m_calonsiswa','m_history'));
	}

	function cabutberkas(){

		$id_pendaftar				= 	$this->uri->segment(3);
		$row 						=	$this->m_daftarulang->get_data('onewithname',$id_pendaftar)->row();


		$data 						= array(   	
			'status'     			=>   "cabut-berkas",
			'deadline'				=>	 '0000-00-00'
		);

		$cadanganquery 		= $this->m_daftarulang->get_data('randomcadangan','');
		$cadanganavailable 	= $cadanganquery->num_rows();

		if($cadanganavailable > 0){	

			//move move cadangan to daftar ulang
			$rowcadangan 	= 	$cadanganquery->row();

			$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));  //get dates 2 days from now

			$datacadangan 						= array(   	
				'status'     			=>   "-",
				'deadline'				=>	 $date
			);

			$this->m_daftarulang->update($rowcadangan->id_pendaftar,$datacadangan);


			//delete data pendaftar yang cabut berkas
			$this->m_blacklist->ins_blacklist($row->nm_lengkap,$row->nisn);
			$this->m_history->insert($row->id_pendaftar);
			$this->m_calonsiswa->remove_data($row->id_pendaftar);
			$this->m_daftarulang->update($row->id_pendaftar,$data);

		}else{
			$this->m_blacklist->ins_blacklist($row->nm_lengkap,$row->nisn);
			$this->m_history->insert($row->id_pendaftar);
			$this->m_calonsiswa->remove_data($row->id_pendaftar);
			$this->m_daftarulang->update($row->id_pendaftar,$data);
		}


		
		redirect('dashboard/daftarulang');
	}


	function inputbayaran(){

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