<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends MY_Controller{
	function pendaftar_all(){
		$this->load->model(array("m_calonsiswa"));

		if($this->isloggedin() == false){
			redirect("");
		}else{
			$data["data_tav"]	=	$this->m_calonsiswa->tampil_data('0')->result();
			$data["data_tkr"]	=	$this->m_calonsiswa->tampil_data('1')->result();
			$data["data_tkj"]	=	$this->m_calonsiswa->tampil_data('2')->result();
			$data["data_tab"]	=	$this->m_calonsiswa->tampil_data('3')->result();

			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator("");
			$objPHPExcel->getProperties()->setLastModifiedBy("");
			$objPHPExcel->getProperties()->setTitle("");
			$objPHPExcel->getProperties()->setSubject("");
			$objPHPExcel->getProperties()->setDescription("");

			$objPHPExcel->setActiveSheetIndex(0);

			/*
			*
			*
			*			DATA TAV
			*
			*
			*/

			$objPHPExcel->getActiveSheet()->setCellValue("A1","ID Pendaftar");
			$objPHPExcel->getActiveSheet()->setCellValue("B1","Nama Lengkap");
			$objPHPExcel->getActiveSheet()->setCellValue("C1","Jenis Kelamin");
			$objPHPExcel->getActiveSheet()->setCellValue("D1","Asal Sekolah");
			$objPHPExcel->getActiveSheet()->setCellValue("E1","SKHU");
			$objPHPExcel->getActiveSheet()->setCellValue("F1","NISN");
			$objPHPExcel->getActiveSheet()->setCellValue("G1","No. Ijazah");
			$objPHPExcel->getActiveSheet()->setCellValue("H1","No. SKHUN");
			$objPHPExcel->getActiveSheet()->setCellValue("I1","No. UN");
			$objPHPExcel->getActiveSheet()->setCellValue("J1","NIK");

			$objPHPExcel->getActiveSheet()->setCellValue("K1","Tempat Lahir");
			$objPHPExcel->getActiveSheet()->setCellValue("L1","Tanggal Lahir");
			$objPHPExcel->getActiveSheet()->setCellValue("M1","Alamat");
			$objPHPExcel->getActiveSheet()->setCellValue("N1","No. Telpon");
			$objPHPExcel->getActiveSheet()->setCellValue("O1","Email");
			$objPHPExcel->getActiveSheet()->setCellValue("P1","No. KPS");
			$objPHPExcel->getActiveSheet()->setCellValue("Q1","Tinggi Badan");
			$objPHPExcel->getActiveSheet()->setCellValue("R1","Berat Badan");
			$objPHPExcel->getActiveSheet()->setCellValue("S1","Jarak Rumah");
			$objPHPExcel->getActiveSheet()->setCellValue("T1","Waktu Tempuh");

			$objPHPExcel->getActiveSheet()->setCellValue("U1","Jumlah Saudara");
			$objPHPExcel->getActiveSheet()->setCellValue("V1","Anak Ke-");
			$objPHPExcel->getActiveSheet()->setCellValue("W1","Hobi");
			$objPHPExcel->getActiveSheet()->setCellValue("X1","Prestasi");
			$objPHPExcel->getActiveSheet()->setCellValue("Y1","ID Jurusan");
			$objPHPExcel->getActiveSheet()->setCellValue("Z1","Foto Path");
			$objPHPExcel->getActiveSheet()->setCellValue("AA1","Nama Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AB1","Tahun Lahir Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AC1","Pekerjaan Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AD1","Pendidikan Ayah");

			$objPHPExcel->getActiveSheet()->setCellValue("AE1","Nama Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AF1","Tahun Lahir Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AG1","Pekerjaan Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AH1","Pendidikan Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AI1","Nama Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AJ1","Tahun Lahir Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AK1","Pekerjaan Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AL1","Pendidikan Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AM1","ID Tahun");

			$objPHPExcel->getActiveSheet()->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objPHPExcel->getActiveSheet()->getColumnDimension('AA')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AB')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AC')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AD')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AE')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AF')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AG')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AH')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AI')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AK')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AL')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data_tav"] as $key => $value) {
				$objPHPExcel->getActiveSheet()->setCellValue("A".$row,$value->id_siswa);
				$objPHPExcel->getActiveSheet()->setCellValue("B".$row,$value->nm_lengkap);
				$objPHPExcel->getActiveSheet()->setCellValue("C".$row,$value->jenis_kelamin);
				$objPHPExcel->getActiveSheet()->setCellValue("D".$row,$value->asal_sekolah);
				$objPHPExcel->getActiveSheet()->setCellValue("E".$row,$value->skhu);
				$objPHPExcel->getActiveSheet()->setCellValue("F".$row,$value->nisn);
				$objPHPExcel->getActiveSheet()->setCellValue("G".$row,$value->no_ijasah);
				$objPHPExcel->getActiveSheet()->setCellValue("H".$row,$value->no_skhun);
				$objPHPExcel->getActiveSheet()->setCellValue("I".$row,$value->no_un);
				$objPHPExcel->getActiveSheet()->setCellValue("J".$row,$value->nik);

				$objPHPExcel->getActiveSheet()->setCellValue("K".$row,$value->temp_lahir);
				$objPHPExcel->getActiveSheet()->setCellValue("L".$row,$value->tgl_lahir);
				$objPHPExcel->getActiveSheet()->setCellValue("M".$row,$value->alamat);
				$objPHPExcel->getActiveSheet()->setCellValue("N".$row,$value->telp);
				$objPHPExcel->getActiveSheet()->setCellValue("O".$row,$value->email);
				$objPHPExcel->getActiveSheet()->setCellValue("P".$row,$value->no_kps);
				$objPHPExcel->getActiveSheet()->setCellValue("Q".$row,$value->tinggi_bdn);
				$objPHPExcel->getActiveSheet()->setCellValue("R".$row,$value->berat_bdn);
				$objPHPExcel->getActiveSheet()->setCellValue("S".$row,$value->jarak_rumah);
				$objPHPExcel->getActiveSheet()->setCellValue("T".$row,$value->waktu_tempuh);

				$objPHPExcel->getActiveSheet()->setCellValue("U".$row,$value->jml_sodara);
				$objPHPExcel->getActiveSheet()->setCellValue("V".$row,$value->anak_ke);
				$objPHPExcel->getActiveSheet()->setCellValue("W".$row,$value->hobi);
				$objPHPExcel->getActiveSheet()->setCellValue("X".$row,$value->prestasi);
				$objPHPExcel->getActiveSheet()->setCellValue("Y".$row,$value->id_jurusan);
				$objPHPExcel->getActiveSheet()->setCellValue("Z".$row,$value->foto_path);
				$objPHPExcel->getActiveSheet()->setCellValue("AA".$row,$value->nm_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objPHPExcel->getActiveSheet()->setCellValue("AE".$row,$value->nm_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AI".$row,$value->nm_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AL".$row,$value->pendidikan_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AM".$row,$value->tahun);

				$row++;

			}

			$objPHPExcel->getActiveSheet()->setTitle("Data TAV");

			/*
			*
			*
			*			DATA TKR
			*
			*
			*/

			$objWorksheet = new PHPExcel_Worksheet($objPHPExcel);
			$objPHPExcel->addSheet($objWorksheet);
			$objWorksheet->setTitle('Data TKR');

			$objWorksheet->setCellValue("A1","ID Pendaftar");
			$objWorksheet->setCellValue("B1","Nama Lengkap");
			$objWorksheet->setCellValue("C1","Jenis Kelamin");
			$objWorksheet->setCellValue("D1","Asal Sekolah");
			$objWorksheet->setCellValue("E1","SKHU");
			$objWorksheet->setCellValue("F1","NISN");
			$objWorksheet->setCellValue("G1","No. Ijazah");
			$objWorksheet->setCellValue("H1","No. SKHUN");
			$objWorksheet->setCellValue("I1","No. UN");
			$objWorksheet->setCellValue("J1","NIK");

			$objWorksheet->setCellValue("K1","Tempat Lahir");
			$objWorksheet->setCellValue("L1","Tanggal Lahir");
			$objWorksheet->setCellValue("M1","Alamat");
			$objWorksheet->setCellValue("N1","No. Telpon");
			$objWorksheet->setCellValue("O1","Email");
			$objWorksheet->setCellValue("P1","No. KPS");
			$objWorksheet->setCellValue("Q1","Tinggi Badan");
			$objWorksheet->setCellValue("R1","Berat Badan");
			$objWorksheet->setCellValue("S1","Jarak Rumah");
			$objWorksheet->setCellValue("T1","Waktu Tempuh");

			$objWorksheet->setCellValue("U1","Jumlah Saudara");
			$objWorksheet->setCellValue("V1","Anak Ke-");
			$objWorksheet->setCellValue("W1","Hobi");
			$objWorksheet->setCellValue("X1","Prestasi");
			$objWorksheet->setCellValue("Y1","ID Jurusan");
			$objWorksheet->setCellValue("Z1","Foto Path");
			$objWorksheet->setCellValue("AA1","Nama Ayah");
			$objWorksheet->setCellValue("AB1","Tahun Lahir Ayah");
			$objWorksheet->setCellValue("AC1","Pekerjaan Ayah");
			$objWorksheet->setCellValue("AD1","Pendidikan Ayah");

			$objWorksheet->setCellValue("AE1","Nama Ibu");
			$objWorksheet->setCellValue("AF1","Tahun Lahir Ibu");
			$objWorksheet->setCellValue("AG1","Pekerjaan Ibu");
			$objWorksheet->setCellValue("AH1","Pendidikan Ibu");
			$objWorksheet->setCellValue("AI1","Nama Wali");
			$objWorksheet->setCellValue("AJ1","Tahun Lahir Wali");
			$objWorksheet->setCellValue("AK1","Pekerjaan Wali");
			$objWorksheet->setCellValue("AL1","Pendidikan Wali");
			$objWorksheet->setCellValue("AM1","ID Tahun");

			$objWorksheet->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objWorksheet->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objWorksheet->getColumnDimension('AA')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AB')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AC')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AD')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AE')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AF')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AG')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AH')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AI')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AJ')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AK')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AL')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data_tkr"] as $key => $value) {
				$objWorksheet->setCellValue("A".$row,$value->id_pendaftar);
				$objWorksheet->setCellValue("B".$row,$value->nm_lengkap);
				$objWorksheet->setCellValue("C".$row,$value->jenis_kelamin);
				$objWorksheet->setCellValue("D".$row,$value->asal_sekolah);
				$objWorksheet->setCellValue("E".$row,$value->skhu);
				$objWorksheet->setCellValue("F".$row,$value->nisn);
				$objWorksheet->setCellValue("G".$row,$value->no_ijasah);
				$objWorksheet->setCellValue("H".$row,$value->no_skhun);
				$objWorksheet->setCellValue("I".$row,$value->no_un);
				$objWorksheet->setCellValue("J".$row,$value->nik);

				$objWorksheet->setCellValue("K".$row,$value->temp_lahir);
				$objWorksheet->setCellValue("L".$row,$value->tgl_lahir);
				$objWorksheet->setCellValue("M".$row,$value->alamat);
				$objWorksheet->setCellValue("N".$row,$value->telp);
				$objWorksheet->setCellValue("O".$row,$value->email);
				$objWorksheet->setCellValue("P".$row,$value->no_kps);
				$objWorksheet->setCellValue("Q".$row,$value->tinggi_bdn);
				$objWorksheet->setCellValue("R".$row,$value->berat_bdn);
				$objWorksheet->setCellValue("S".$row,$value->jarak_rumah);
				$objWorksheet->setCellValue("T".$row,$value->waktu_tempuh);

				$objWorksheet->setCellValue("U".$row,$value->jml_sodara);
				$objWorksheet->setCellValue("V".$row,$value->anak_ke);
				$objWorksheet->setCellValue("W".$row,$value->hobi);
				$objWorksheet->setCellValue("X".$row,$value->prestasi);
				$objWorksheet->setCellValue("Y".$row,$value->id_jurusan);
				$objWorksheet->setCellValue("Z".$row,$value->foto_path);
				$objWorksheet->setCellValue("AA".$row,$value->nm_ayah);
				$objWorksheet->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objWorksheet->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objWorksheet->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objWorksheet->setCellValue("AE".$row,$value->nm_ibu);
				$objWorksheet->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objWorksheet->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objWorksheet->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objWorksheet->setCellValue("AI".$row,$value->nm_wali);
				$objWorksheet->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objWorksheet->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objWorksheet->setCellValue("AL".$row,$value->pendidikan_wali);
				$objWorksheet->setCellValue("AM".$row,$value->tahun);

				$row++;

			}

			/*
			*
			*
			*			DATA TKJ
			*
			*
			*/

			$objWorksheet2 = new PHPExcel_Worksheet($objPHPExcel);
			$objPHPExcel->addSheet($objWorksheet2);
			$objWorksheet2->setTitle('Data TKJ');

			$objWorksheet2->setCellValue("A1","ID Pendaftar");
			$objWorksheet2->setCellValue("B1","Nama Lengkap");
			$objWorksheet2->setCellValue("C1","Jenis Kelamin");
			$objWorksheet2->setCellValue("D1","Asal Sekolah");
			$objWorksheet2->setCellValue("E1","SKHU");
			$objWorksheet2->setCellValue("F1","NISN");
			$objWorksheet2->setCellValue("G1","No. Ijazah");
			$objWorksheet2->setCellValue("H1","No. SKHUN");
			$objWorksheet2->setCellValue("I1","No. UN");
			$objWorksheet2->setCellValue("J1","NIK");

			$objWorksheet2->setCellValue("K1","Tempat Lahir");
			$objWorksheet2->setCellValue("L1","Tanggal Lahir");
			$objWorksheet2->setCellValue("M1","Alamat");
			$objWorksheet2->setCellValue("N1","No. Telpon");
			$objWorksheet2->setCellValue("O1","Email");
			$objWorksheet2->setCellValue("P1","No. KPS");
			$objWorksheet2->setCellValue("Q1","Tinggi Badan");
			$objWorksheet2->setCellValue("R1","Berat Badan");
			$objWorksheet2->setCellValue("S1","Jarak Rumah");
			$objWorksheet2->setCellValue("T1","Waktu Tempuh");

			$objWorksheet2->setCellValue("U1","Jumlah Saudara");
			$objWorksheet2->setCellValue("V1","Anak Ke-");
			$objWorksheet2->setCellValue("W1","Hobi");
			$objWorksheet2->setCellValue("X1","Prestasi");
			$objWorksheet2->setCellValue("Y1","ID Jurusan");
			$objWorksheet2->setCellValue("Z1","Foto Path");
			$objWorksheet2->setCellValue("AA1","Nama Ayah");
			$objWorksheet2->setCellValue("AB1","Tahun Lahir Ayah");
			$objWorksheet2->setCellValue("AC1","Pekerjaan Ayah");
			$objWorksheet2->setCellValue("AD1","Pendidikan Ayah");

			$objWorksheet2->setCellValue("AE1","Nama Ibu");
			$objWorksheet2->setCellValue("AF1","Tahun Lahir Ibu");
			$objWorksheet2->setCellValue("AG1","Pekerjaan Ibu");
			$objWorksheet2->setCellValue("AH1","Pendidikan Ibu");
			$objWorksheet2->setCellValue("AI1","Nama Wali");
			$objWorksheet2->setCellValue("AJ1","Tahun Lahir Wali");
			$objWorksheet2->setCellValue("AK1","Pekerjaan Wali");
			$objWorksheet2->setCellValue("AL1","Pendidikan Wali");
			$objWorksheet2->setCellValue("AM1","ID Tahun");

			$objWorksheet2->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objWorksheet2->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objWorksheet2->getColumnDimension('AA')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AB')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AC')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AD')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AE')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AF')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AG')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AH')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AI')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AJ')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AK')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AL')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data_tkj"] as $key => $value) {
				$objWorksheet2->setCellValue("A".$row,$value->id_pendaftar);
				$objWorksheet2->setCellValue("B".$row,$value->nm_lengkap);
				$objWorksheet2->setCellValue("C".$row,$value->jenis_kelamin);
				$objWorksheet2->setCellValue("D".$row,$value->asal_sekolah);
				$objWorksheet2->setCellValue("E".$row,$value->skhu);
				$objWorksheet2->setCellValue("F".$row,$value->nisn);
				$objWorksheet2->setCellValue("G".$row,$value->no_ijasah);
				$objWorksheet2->setCellValue("H".$row,$value->no_skhun);
				$objWorksheet2->setCellValue("I".$row,$value->no_un);
				$objWorksheet2->setCellValue("J".$row,$value->nik);

				$objWorksheet2->setCellValue("K".$row,$value->temp_lahir);
				$objWorksheet2->setCellValue("L".$row,$value->tgl_lahir);
				$objWorksheet2->setCellValue("M".$row,$value->alamat);
				$objWorksheet2->setCellValue("N".$row,$value->telp);
				$objWorksheet2->setCellValue("O".$row,$value->email);
				$objWorksheet2->setCellValue("P".$row,$value->no_kps);
				$objWorksheet2->setCellValue("Q".$row,$value->tinggi_bdn);
				$objWorksheet2->setCellValue("R".$row,$value->berat_bdn);
				$objWorksheet2->setCellValue("S".$row,$value->jarak_rumah);
				$objWorksheet2->setCellValue("T".$row,$value->waktu_tempuh);

				$objWorksheet2->setCellValue("U".$row,$value->jml_sodara);
				$objWorksheet2->setCellValue("V".$row,$value->anak_ke);
				$objWorksheet2->setCellValue("W".$row,$value->hobi);
				$objWorksheet2->setCellValue("X".$row,$value->prestasi);
				$objWorksheet2->setCellValue("Y".$row,$value->id_jurusan);
				$objWorksheet2->setCellValue("Z".$row,$value->foto_path);
				$objWorksheet2->setCellValue("AA".$row,$value->nm_ayah);
				$objWorksheet2->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objWorksheet2->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objWorksheet2->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objWorksheet2->setCellValue("AE".$row,$value->nm_ibu);
				$objWorksheet2->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objWorksheet2->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objWorksheet2->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objWorksheet2->setCellValue("AI".$row,$value->nm_wali);
				$objWorksheet2->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objWorksheet2->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objWorksheet2->setCellValue("AL".$row,$value->pendidikan_wali);
				$objWorksheet2->setCellValue("AM".$row,$value->tahun);

				$row++;

			}


			/*
			*
			*
			*			DATA TAB
			*
			*
			*/

			$objWorksheet3 = new PHPExcel_Worksheet($objPHPExcel);
			$objPHPExcel->addSheet($objWorksheet3);
			$objWorksheet3->setTitle('Data TAB');

			$objWorksheet3->setCellValue("A1","ID Pendaftar");
			$objWorksheet3->setCellValue("B1","Nama Lengkap");
			$objWorksheet3->setCellValue("C1","Jenis Kelamin");
			$objWorksheet3->setCellValue("D1","Asal Sekolah");
			$objWorksheet3->setCellValue("E1","SKHU");
			$objWorksheet3->setCellValue("F1","NISN");
			$objWorksheet3->setCellValue("G1","No. Ijazah");
			$objWorksheet3->setCellValue("H1","No. SKHUN");
			$objWorksheet3->setCellValue("I1","No. UN");
			$objWorksheet3->setCellValue("J1","NIK");

			$objWorksheet3->setCellValue("K1","Tempat Lahir");
			$objWorksheet3->setCellValue("L1","Tanggal Lahir");
			$objWorksheet3->setCellValue("M1","Alamat");
			$objWorksheet3->setCellValue("N1","No. Telpon");
			$objWorksheet3->setCellValue("O1","Email");
			$objWorksheet3->setCellValue("P1","No. KPS");
			$objWorksheet3->setCellValue("Q1","Tinggi Badan");
			$objWorksheet3->setCellValue("R1","Berat Badan");
			$objWorksheet3->setCellValue("S1","Jarak Rumah");
			$objWorksheet3->setCellValue("T1","Waktu Tempuh");

			$objWorksheet3->setCellValue("U1","Jumlah Saudara");
			$objWorksheet3->setCellValue("V1","Anak Ke-");
			$objWorksheet3->setCellValue("W1","Hobi");
			$objWorksheet3->setCellValue("X1","Prestasi");
			$objWorksheet3->setCellValue("Y1","ID Jurusan");
			$objWorksheet3->setCellValue("Z1","Foto Path");
			$objWorksheet3->setCellValue("AA1","Nama Ayah");
			$objWorksheet3->setCellValue("AB1","Tahun Lahir Ayah");
			$objWorksheet3->setCellValue("AC1","Pekerjaan Ayah");
			$objWorksheet3->setCellValue("AD1","Pendidikan Ayah");

			$objWorksheet3->setCellValue("AE1","Nama Ibu");
			$objWorksheet3->setCellValue("AF1","Tahun Lahir Ibu");
			$objWorksheet3->setCellValue("AG1","Pekerjaan Ibu");
			$objWorksheet3->setCellValue("AH1","Pendidikan Ibu");
			$objWorksheet3->setCellValue("AI1","Nama Wali");
			$objWorksheet3->setCellValue("AJ1","Tahun Lahir Wali");
			$objWorksheet3->setCellValue("AK1","Pekerjaan Wali");
			$objWorksheet3->setCellValue("AL1","Pendidikan Wali");
			$objWorksheet3->setCellValue("AM1","ID Tahun");

			$objWorksheet3->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objWorksheet3->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objWorksheet3->getColumnDimension('AA')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AB')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AC')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AD')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AE')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AF')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AG')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AH')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AI')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AJ')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AK')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AL')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data_tab"] as $key => $value) {
				$objWorksheet3->setCellValue("A".$row,$value->id_pendaftar);
				$objWorksheet3->setCellValue("B".$row,$value->nm_lengkap);
				$objWorksheet3->setCellValue("C".$row,$value->jenis_kelamin);
				$objWorksheet3->setCellValue("D".$row,$value->asal_sekolah);
				$objWorksheet3->setCellValue("E".$row,$value->skhu);
				$objWorksheet3->setCellValue("F".$row,$value->nisn);
				$objWorksheet3->setCellValue("G".$row,$value->no_ijasah);
				$objWorksheet3->setCellValue("H".$row,$value->no_skhun);
				$objWorksheet3->setCellValue("I".$row,$value->no_un);
				$objWorksheet3->setCellValue("J".$row,$value->nik);

				$objWorksheet3->setCellValue("K".$row,$value->temp_lahir);
				$objWorksheet3->setCellValue("L".$row,$value->tgl_lahir);
				$objWorksheet3->setCellValue("M".$row,$value->alamat);
				$objWorksheet3->setCellValue("N".$row,$value->telp);
				$objWorksheet3->setCellValue("O".$row,$value->email);
				$objWorksheet3->setCellValue("P".$row,$value->no_kps);
				$objWorksheet3->setCellValue("Q".$row,$value->tinggi_bdn);
				$objWorksheet3->setCellValue("R".$row,$value->berat_bdn);
				$objWorksheet3->setCellValue("S".$row,$value->jarak_rumah);
				$objWorksheet3->setCellValue("T".$row,$value->waktu_tempuh);

				$objWorksheet3->setCellValue("U".$row,$value->jml_sodara);
				$objWorksheet3->setCellValue("V".$row,$value->anak_ke);
				$objWorksheet3->setCellValue("W".$row,$value->hobi);
				$objWorksheet3->setCellValue("X".$row,$value->prestasi);
				$objWorksheet3->setCellValue("Y".$row,$value->id_jurusan);
				$objWorksheet3->setCellValue("Z".$row,$value->foto_path);
				$objWorksheet3->setCellValue("AA".$row,$value->nm_ayah);
				$objWorksheet3->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objWorksheet3->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objWorksheet3->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objWorksheet3->setCellValue("AE".$row,$value->nm_ibu);
				$objWorksheet3->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objWorksheet3->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objWorksheet3->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objWorksheet3->setCellValue("AI".$row,$value->nm_wali);
				$objWorksheet3->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objWorksheet3->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objWorksheet3->setCellValue("AL".$row,$value->pendidikan_wali);
				$objWorksheet3->setCellValue("AM".$row,$value->tahun);

				$row++;

			}


			$filename = "Data Pendaftar - ".date("d-M-Y").'.xlsx';

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_end_clean();
			$writer->save('php://output');
			exit;
		}
	}


	/*
	*
	*
	*			DATA SISWA
	*			DATA SISWA
	*			DATA SISWA
	*			DATA SISWA
	*			DATA SISWA
	*			DATA SISWA
	*			DATA SISWA
	*			DATA SISWA
	*
	*
	*/

	function siswa_all(){
		$this->load->model(array("m_siswa"));

		if($this->isloggedin() == false){
			redirect("");
		}else{
			$data["data_tav"]		 	=	$this->m_siswa->get_data('all','0')->result();
			$data["data_tkr"]		 	=	$this->m_siswa->get_data('all','1')->result();
			$data["data_tkj"] 			=	$this->m_siswa->get_data('all','2')->result();
			$data["data_tab"] 			=	$this->m_siswa->get_data('all','3')->result();

			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator("");
			$objPHPExcel->getProperties()->setLastModifiedBy("");
			$objPHPExcel->getProperties()->setTitle("");
			$objPHPExcel->getProperties()->setSubject("");
			$objPHPExcel->getProperties()->setDescription("");

			$objPHPExcel->setActiveSheetIndex(0);

			/*
			*
			*
			*			DATA TAV
			*
			*
			*/

			$objPHPExcel->getActiveSheet()->setCellValue("A1","ID Siswa");
			$objPHPExcel->getActiveSheet()->setCellValue("B1","Nama Lengkap");
			$objPHPExcel->getActiveSheet()->setCellValue("C1","Jenis Kelamin");
			$objPHPExcel->getActiveSheet()->setCellValue("D1","Asal Sekolah");
			$objPHPExcel->getActiveSheet()->setCellValue("E1","SKHU");
			$objPHPExcel->getActiveSheet()->setCellValue("F1","NISN");
			$objPHPExcel->getActiveSheet()->setCellValue("G1","No. Ijazah");
			$objPHPExcel->getActiveSheet()->setCellValue("H1","No. SKHUN");
			$objPHPExcel->getActiveSheet()->setCellValue("I1","No. UN");
			$objPHPExcel->getActiveSheet()->setCellValue("J1","NIK");

			$objPHPExcel->getActiveSheet()->setCellValue("K1","Tempat Lahir");
			$objPHPExcel->getActiveSheet()->setCellValue("L1","Tanggal Lahir");
			$objPHPExcel->getActiveSheet()->setCellValue("M1","Alamat");
			$objPHPExcel->getActiveSheet()->setCellValue("N1","No. Telpon");
			$objPHPExcel->getActiveSheet()->setCellValue("O1","Email");
			$objPHPExcel->getActiveSheet()->setCellValue("P1","No. KPS");
			$objPHPExcel->getActiveSheet()->setCellValue("Q1","Tinggi Badan");
			$objPHPExcel->getActiveSheet()->setCellValue("R1","Berat Badan");
			$objPHPExcel->getActiveSheet()->setCellValue("S1","Jarak Rumah");
			$objPHPExcel->getActiveSheet()->setCellValue("T1","Waktu Tempuh");

			$objPHPExcel->getActiveSheet()->setCellValue("U1","Jumlah Saudara");
			$objPHPExcel->getActiveSheet()->setCellValue("V1","Anak Ke-");
			$objPHPExcel->getActiveSheet()->setCellValue("W1","Hobi");
			$objPHPExcel->getActiveSheet()->setCellValue("X1","Prestasi");
			$objPHPExcel->getActiveSheet()->setCellValue("Y1","ID Jurusan");
			$objPHPExcel->getActiveSheet()->setCellValue("Z1","Foto Path");
			$objPHPExcel->getActiveSheet()->setCellValue("AA1","Nama Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AB1","Tahun Lahir Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AC1","Pekerjaan Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AD1","Pendidikan Ayah");

			$objPHPExcel->getActiveSheet()->setCellValue("AE1","Nama Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AF1","Tahun Lahir Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AG1","Pekerjaan Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AH1","Pendidikan Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AI1","Nama Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AJ1","Tahun Lahir Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AK1","Pekerjaan Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AL1","Pendidikan Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AM1","ID Tahun");

			$objPHPExcel->getActiveSheet()->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objPHPExcel->getActiveSheet()->getColumnDimension('AA')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AB')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AC')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AD')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AE')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AF')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AG')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AH')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AI')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AK')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AL')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data_tav"] as $key => $value) {
				$objPHPExcel->getActiveSheet()->setCellValue("A".$row,$value->id_siswa);
				$objPHPExcel->getActiveSheet()->setCellValue("B".$row,$value->nm_lengkap);
				$objPHPExcel->getActiveSheet()->setCellValue("C".$row,$value->jenis_kelamin);
				$objPHPExcel->getActiveSheet()->setCellValue("D".$row,$value->asal_sekolah);
				$objPHPExcel->getActiveSheet()->setCellValue("E".$row,$value->skhu);
				$objPHPExcel->getActiveSheet()->setCellValue("F".$row,$value->nisn);
				$objPHPExcel->getActiveSheet()->setCellValue("G".$row,$value->no_ijasah);
				$objPHPExcel->getActiveSheet()->setCellValue("H".$row,$value->no_skhun);
				$objPHPExcel->getActiveSheet()->setCellValue("I".$row,$value->no_un);
				$objPHPExcel->getActiveSheet()->setCellValue("J".$row,$value->nik);

				$objPHPExcel->getActiveSheet()->setCellValue("K".$row,$value->temp_lahir);
				$objPHPExcel->getActiveSheet()->setCellValue("L".$row,$value->tgl_lahir);
				$objPHPExcel->getActiveSheet()->setCellValue("M".$row,$value->alamat);
				$objPHPExcel->getActiveSheet()->setCellValue("N".$row,$value->telp);
				$objPHPExcel->getActiveSheet()->setCellValue("O".$row,$value->email);
				$objPHPExcel->getActiveSheet()->setCellValue("P".$row,$value->no_kps);
				$objPHPExcel->getActiveSheet()->setCellValue("Q".$row,$value->tinggi_bdn);
				$objPHPExcel->getActiveSheet()->setCellValue("R".$row,$value->berat_bdn);
				$objPHPExcel->getActiveSheet()->setCellValue("S".$row,$value->jarak_rumah);
				$objPHPExcel->getActiveSheet()->setCellValue("T".$row,$value->waktu_tempuh);

				$objPHPExcel->getActiveSheet()->setCellValue("U".$row,$value->jml_sodara);
				$objPHPExcel->getActiveSheet()->setCellValue("V".$row,$value->anak_ke);
				$objPHPExcel->getActiveSheet()->setCellValue("W".$row,$value->hobi);
				$objPHPExcel->getActiveSheet()->setCellValue("X".$row,$value->prestasi);
				$objPHPExcel->getActiveSheet()->setCellValue("Y".$row,$value->id_jurusan);
				$objPHPExcel->getActiveSheet()->setCellValue("Z".$row,$value->foto_path);
				$objPHPExcel->getActiveSheet()->setCellValue("AA".$row,$value->nm_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objPHPExcel->getActiveSheet()->setCellValue("AE".$row,$value->nm_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AI".$row,$value->nm_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AL".$row,$value->pendidikan_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AM".$row,$value->tahun);

				$row++;

			}

			$objPHPExcel->getActiveSheet()->setTitle("Data TAV");

			/*
			*
			*
			*			DATA TKR
			*
			*
			*/

			$objWorksheet = new PHPExcel_Worksheet($objPHPExcel);
			$objPHPExcel->addSheet($objWorksheet);
			$objWorksheet->setTitle('Data TKR');

			$objWorksheet->setCellValue("A1","ID Siswa");
			$objWorksheet->setCellValue("B1","Nama Lengkap");
			$objWorksheet->setCellValue("C1","Jenis Kelamin");
			$objWorksheet->setCellValue("D1","Asal Sekolah");
			$objWorksheet->setCellValue("E1","SKHU");
			$objWorksheet->setCellValue("F1","NISN");
			$objWorksheet->setCellValue("G1","No. Ijazah");
			$objWorksheet->setCellValue("H1","No. SKHUN");
			$objWorksheet->setCellValue("I1","No. UN");
			$objWorksheet->setCellValue("J1","NIK");

			$objWorksheet->setCellValue("K1","Tempat Lahir");
			$objWorksheet->setCellValue("L1","Tanggal Lahir");
			$objWorksheet->setCellValue("M1","Alamat");
			$objWorksheet->setCellValue("N1","No. Telpon");
			$objWorksheet->setCellValue("O1","Email");
			$objWorksheet->setCellValue("P1","No. KPS");
			$objWorksheet->setCellValue("Q1","Tinggi Badan");
			$objWorksheet->setCellValue("R1","Berat Badan");
			$objWorksheet->setCellValue("S1","Jarak Rumah");
			$objWorksheet->setCellValue("T1","Waktu Tempuh");

			$objWorksheet->setCellValue("U1","Jumlah Saudara");
			$objWorksheet->setCellValue("V1","Anak Ke-");
			$objWorksheet->setCellValue("W1","Hobi");
			$objWorksheet->setCellValue("X1","Prestasi");
			$objWorksheet->setCellValue("Y1","ID Jurusan");
			$objWorksheet->setCellValue("Z1","Foto Path");
			$objWorksheet->setCellValue("AA1","Nama Ayah");
			$objWorksheet->setCellValue("AB1","Tahun Lahir Ayah");
			$objWorksheet->setCellValue("AC1","Pekerjaan Ayah");
			$objWorksheet->setCellValue("AD1","Pendidikan Ayah");

			$objWorksheet->setCellValue("AE1","Nama Ibu");
			$objWorksheet->setCellValue("AF1","Tahun Lahir Ibu");
			$objWorksheet->setCellValue("AG1","Pekerjaan Ibu");
			$objWorksheet->setCellValue("AH1","Pendidikan Ibu");
			$objWorksheet->setCellValue("AI1","Nama Wali");
			$objWorksheet->setCellValue("AJ1","Tahun Lahir Wali");
			$objWorksheet->setCellValue("AK1","Pekerjaan Wali");
			$objWorksheet->setCellValue("AL1","Pendidikan Wali");
			$objWorksheet->setCellValue("AM1","ID Tahun");

			$objWorksheet->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objWorksheet->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objWorksheet->getColumnDimension('AA')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AB')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AC')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AD')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AE')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AF')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AG')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AH')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AI')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AJ')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AK')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AL')
			->setAutoSize(true);
			$objWorksheet->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data_tkr"] as $key => $value) {
				$objWorksheet->setCellValue("A".$row,$value->id_siswa);
				$objWorksheet->setCellValue("B".$row,$value->nm_lengkap);
				$objWorksheet->setCellValue("C".$row,$value->jenis_kelamin);
				$objWorksheet->setCellValue("D".$row,$value->asal_sekolah);
				$objWorksheet->setCellValue("E".$row,$value->skhu);
				$objWorksheet->setCellValue("F".$row,$value->nisn);
				$objWorksheet->setCellValue("G".$row,$value->no_ijasah);
				$objWorksheet->setCellValue("H".$row,$value->no_skhun);
				$objWorksheet->setCellValue("I".$row,$value->no_un);
				$objWorksheet->setCellValue("J".$row,$value->nik);

				$objWorksheet->setCellValue("K".$row,$value->temp_lahir);
				$objWorksheet->setCellValue("L".$row,$value->tgl_lahir);
				$objWorksheet->setCellValue("M".$row,$value->alamat);
				$objWorksheet->setCellValue("N".$row,$value->telp);
				$objWorksheet->setCellValue("O".$row,$value->email);
				$objWorksheet->setCellValue("P".$row,$value->no_kps);
				$objWorksheet->setCellValue("Q".$row,$value->tinggi_bdn);
				$objWorksheet->setCellValue("R".$row,$value->berat_bdn);
				$objWorksheet->setCellValue("S".$row,$value->jarak_rumah);
				$objWorksheet->setCellValue("T".$row,$value->waktu_tempuh);

				$objWorksheet->setCellValue("U".$row,$value->jml_sodara);
				$objWorksheet->setCellValue("V".$row,$value->anak_ke);
				$objWorksheet->setCellValue("W".$row,$value->hobi);
				$objWorksheet->setCellValue("X".$row,$value->prestasi);
				$objWorksheet->setCellValue("Y".$row,$value->id_jurusan);
				$objWorksheet->setCellValue("Z".$row,$value->foto_path);
				$objWorksheet->setCellValue("AA".$row,$value->nm_ayah);
				$objWorksheet->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objWorksheet->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objWorksheet->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objWorksheet->setCellValue("AE".$row,$value->nm_ibu);
				$objWorksheet->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objWorksheet->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objWorksheet->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objWorksheet->setCellValue("AI".$row,$value->nm_wali);
				$objWorksheet->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objWorksheet->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objWorksheet->setCellValue("AL".$row,$value->pendidikan_wali);
				$objWorksheet->setCellValue("AM".$row,$value->tahun);

				$row++;

			}

			/*
			*
			*
			*			DATA TKJ
			*
			*
			*/

			$objWorksheet2 = new PHPExcel_Worksheet($objPHPExcel);
			$objPHPExcel->addSheet($objWorksheet2);
			$objWorksheet2->setTitle('Data TKJ');

			$objWorksheet2->setCellValue("A1","ID Siswa");
			$objWorksheet2->setCellValue("B1","Nama Lengkap");
			$objWorksheet2->setCellValue("C1","Jenis Kelamin");
			$objWorksheet2->setCellValue("D1","Asal Sekolah");
			$objWorksheet2->setCellValue("E1","SKHU");
			$objWorksheet2->setCellValue("F1","NISN");
			$objWorksheet2->setCellValue("G1","No. Ijazah");
			$objWorksheet2->setCellValue("H1","No. SKHUN");
			$objWorksheet2->setCellValue("I1","No. UN");
			$objWorksheet2->setCellValue("J1","NIK");

			$objWorksheet2->setCellValue("K1","Tempat Lahir");
			$objWorksheet2->setCellValue("L1","Tanggal Lahir");
			$objWorksheet2->setCellValue("M1","Alamat");
			$objWorksheet2->setCellValue("N1","No. Telpon");
			$objWorksheet2->setCellValue("O1","Email");
			$objWorksheet2->setCellValue("P1","No. KPS");
			$objWorksheet2->setCellValue("Q1","Tinggi Badan");
			$objWorksheet2->setCellValue("R1","Berat Badan");
			$objWorksheet2->setCellValue("S1","Jarak Rumah");
			$objWorksheet2->setCellValue("T1","Waktu Tempuh");

			$objWorksheet2->setCellValue("U1","Jumlah Saudara");
			$objWorksheet2->setCellValue("V1","Anak Ke-");
			$objWorksheet2->setCellValue("W1","Hobi");
			$objWorksheet2->setCellValue("X1","Prestasi");
			$objWorksheet2->setCellValue("Y1","ID Jurusan");
			$objWorksheet2->setCellValue("Z1","Foto Path");
			$objWorksheet2->setCellValue("AA1","Nama Ayah");
			$objWorksheet2->setCellValue("AB1","Tahun Lahir Ayah");
			$objWorksheet2->setCellValue("AC1","Pekerjaan Ayah");
			$objWorksheet2->setCellValue("AD1","Pendidikan Ayah");

			$objWorksheet2->setCellValue("AE1","Nama Ibu");
			$objWorksheet2->setCellValue("AF1","Tahun Lahir Ibu");
			$objWorksheet2->setCellValue("AG1","Pekerjaan Ibu");
			$objWorksheet2->setCellValue("AH1","Pendidikan Ibu");
			$objWorksheet2->setCellValue("AI1","Nama Wali");
			$objWorksheet2->setCellValue("AJ1","Tahun Lahir Wali");
			$objWorksheet2->setCellValue("AK1","Pekerjaan Wali");
			$objWorksheet2->setCellValue("AL1","Pendidikan Wali");
			$objWorksheet2->setCellValue("AM1","ID Tahun");

			$objWorksheet2->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objWorksheet2->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objWorksheet2->getColumnDimension('AA')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AB')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AC')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AD')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AE')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AF')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AG')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AH')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AI')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AJ')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AK')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AL')
			->setAutoSize(true);
			$objWorksheet2->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data_tkj"] as $key => $value) {
				$objWorksheet2->setCellValue("A".$row,$value->id_siswa);
				$objWorksheet2->setCellValue("B".$row,$value->nm_lengkap);
				$objWorksheet2->setCellValue("C".$row,$value->jenis_kelamin);
				$objWorksheet2->setCellValue("D".$row,$value->asal_sekolah);
				$objWorksheet2->setCellValue("E".$row,$value->skhu);
				$objWorksheet2->setCellValue("F".$row,$value->nisn);
				$objWorksheet2->setCellValue("G".$row,$value->no_ijasah);
				$objWorksheet2->setCellValue("H".$row,$value->no_skhun);
				$objWorksheet2->setCellValue("I".$row,$value->no_un);
				$objWorksheet2->setCellValue("J".$row,$value->nik);

				$objWorksheet2->setCellValue("K".$row,$value->temp_lahir);
				$objWorksheet2->setCellValue("L".$row,$value->tgl_lahir);
				$objWorksheet2->setCellValue("M".$row,$value->alamat);
				$objWorksheet2->setCellValue("N".$row,$value->telp);
				$objWorksheet2->setCellValue("O".$row,$value->email);
				$objWorksheet2->setCellValue("P".$row,$value->no_kps);
				$objWorksheet2->setCellValue("Q".$row,$value->tinggi_bdn);
				$objWorksheet2->setCellValue("R".$row,$value->berat_bdn);
				$objWorksheet2->setCellValue("S".$row,$value->jarak_rumah);
				$objWorksheet2->setCellValue("T".$row,$value->waktu_tempuh);

				$objWorksheet2->setCellValue("U".$row,$value->jml_sodara);
				$objWorksheet2->setCellValue("V".$row,$value->anak_ke);
				$objWorksheet2->setCellValue("W".$row,$value->hobi);
				$objWorksheet2->setCellValue("X".$row,$value->prestasi);
				$objWorksheet2->setCellValue("Y".$row,$value->id_jurusan);
				$objWorksheet2->setCellValue("Z".$row,$value->foto_path);
				$objWorksheet2->setCellValue("AA".$row,$value->nm_ayah);
				$objWorksheet2->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objWorksheet2->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objWorksheet2->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objWorksheet2->setCellValue("AE".$row,$value->nm_ibu);
				$objWorksheet2->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objWorksheet2->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objWorksheet2->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objWorksheet2->setCellValue("AI".$row,$value->nm_wali);
				$objWorksheet2->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objWorksheet2->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objWorksheet2->setCellValue("AL".$row,$value->pendidikan_wali);
				$objWorksheet2->setCellValue("AM".$row,$value->tahun);

				$row++;

			}


			/*
			*
			*
			*			DATA TAB
			*
			*
			*/

			$objWorksheet3 = new PHPExcel_Worksheet($objPHPExcel);
			$objPHPExcel->addSheet($objWorksheet3);
			$objWorksheet3->setTitle('Data TAB');

			$objWorksheet3->setCellValue("A1","ID Siswa");
			$objWorksheet3->setCellValue("B1","Nama Lengkap");
			$objWorksheet3->setCellValue("C1","Jenis Kelamin");
			$objWorksheet3->setCellValue("D1","Asal Sekolah");
			$objWorksheet3->setCellValue("E1","SKHU");
			$objWorksheet3->setCellValue("F1","NISN");
			$objWorksheet3->setCellValue("G1","No. Ijazah");
			$objWorksheet3->setCellValue("H1","No. SKHUN");
			$objWorksheet3->setCellValue("I1","No. UN");
			$objWorksheet3->setCellValue("J1","NIK");

			$objWorksheet3->setCellValue("K1","Tempat Lahir");
			$objWorksheet3->setCellValue("L1","Tanggal Lahir");
			$objWorksheet3->setCellValue("M1","Alamat");
			$objWorksheet3->setCellValue("N1","No. Telpon");
			$objWorksheet3->setCellValue("O1","Email");
			$objWorksheet3->setCellValue("P1","No. KPS");
			$objWorksheet3->setCellValue("Q1","Tinggi Badan");
			$objWorksheet3->setCellValue("R1","Berat Badan");
			$objWorksheet3->setCellValue("S1","Jarak Rumah");
			$objWorksheet3->setCellValue("T1","Waktu Tempuh");

			$objWorksheet3->setCellValue("U1","Jumlah Saudara");
			$objWorksheet3->setCellValue("V1","Anak Ke-");
			$objWorksheet3->setCellValue("W1","Hobi");
			$objWorksheet3->setCellValue("X1","Prestasi");
			$objWorksheet3->setCellValue("Y1","ID Jurusan");
			$objWorksheet3->setCellValue("Z1","Foto Path");
			$objWorksheet3->setCellValue("AA1","Nama Ayah");
			$objWorksheet3->setCellValue("AB1","Tahun Lahir Ayah");
			$objWorksheet3->setCellValue("AC1","Pekerjaan Ayah");
			$objWorksheet3->setCellValue("AD1","Pendidikan Ayah");

			$objWorksheet3->setCellValue("AE1","Nama Ibu");
			$objWorksheet3->setCellValue("AF1","Tahun Lahir Ibu");
			$objWorksheet3->setCellValue("AG1","Pekerjaan Ibu");
			$objWorksheet3->setCellValue("AH1","Pendidikan Ibu");
			$objWorksheet3->setCellValue("AI1","Nama Wali");
			$objWorksheet3->setCellValue("AJ1","Tahun Lahir Wali");
			$objWorksheet3->setCellValue("AK1","Pekerjaan Wali");
			$objWorksheet3->setCellValue("AL1","Pendidikan Wali");
			$objWorksheet3->setCellValue("AM1","ID Tahun");

			$objWorksheet3->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objWorksheet3->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objWorksheet3->getColumnDimension('AA')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AB')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AC')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AD')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AE')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AF')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AG')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AH')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AI')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AJ')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AK')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AL')
			->setAutoSize(true);
			$objWorksheet3->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data_tab"] as $key => $value) {
				$objWorksheet3->setCellValue("A".$row,$value->id_siswa);
				$objWorksheet3->setCellValue("B".$row,$value->nm_lengkap);
				$objWorksheet3->setCellValue("C".$row,$value->jenis_kelamin);
				$objWorksheet3->setCellValue("D".$row,$value->asal_sekolah);
				$objWorksheet3->setCellValue("E".$row,$value->skhu);
				$objWorksheet3->setCellValue("F".$row,$value->nisn);
				$objWorksheet3->setCellValue("G".$row,$value->no_ijasah);
				$objWorksheet3->setCellValue("H".$row,$value->no_skhun);
				$objWorksheet3->setCellValue("I".$row,$value->no_un);
				$objWorksheet3->setCellValue("J".$row,$value->nik);

				$objWorksheet3->setCellValue("K".$row,$value->temp_lahir);
				$objWorksheet3->setCellValue("L".$row,$value->tgl_lahir);
				$objWorksheet3->setCellValue("M".$row,$value->alamat);
				$objWorksheet3->setCellValue("N".$row,$value->telp);
				$objWorksheet3->setCellValue("O".$row,$value->email);
				$objWorksheet3->setCellValue("P".$row,$value->no_kps);
				$objWorksheet3->setCellValue("Q".$row,$value->tinggi_bdn);
				$objWorksheet3->setCellValue("R".$row,$value->berat_bdn);
				$objWorksheet3->setCellValue("S".$row,$value->jarak_rumah);
				$objWorksheet3->setCellValue("T".$row,$value->waktu_tempuh);

				$objWorksheet3->setCellValue("U".$row,$value->jml_sodara);
				$objWorksheet3->setCellValue("V".$row,$value->anak_ke);
				$objWorksheet3->setCellValue("W".$row,$value->hobi);
				$objWorksheet3->setCellValue("X".$row,$value->prestasi);
				$objWorksheet3->setCellValue("Y".$row,$value->id_jurusan);
				$objWorksheet3->setCellValue("Z".$row,$value->foto_path);
				$objWorksheet3->setCellValue("AA".$row,$value->nm_ayah);
				$objWorksheet3->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objWorksheet3->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objWorksheet3->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objWorksheet3->setCellValue("AE".$row,$value->nm_ibu);
				$objWorksheet3->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objWorksheet3->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objWorksheet3->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objWorksheet3->setCellValue("AI".$row,$value->nm_wali);
				$objWorksheet3->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objWorksheet3->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objWorksheet3->setCellValue("AL".$row,$value->pendidikan_wali);
				$objWorksheet3->setCellValue("AM".$row,$value->tahun);

				$row++;

			}


			$filename = "Data Siswa - ".date("d-M-Y").'.xlsx';

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_end_clean();
			$writer->save('php://output');
			exit;
		}
	}

	function test2(){
		require_once APPPATH . 'third_party/vendor/autoload.php';
		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
		$fancyTableStyleName = 'Fancy Table';
		$fancyTableStyle = array('borderSize' => 1, 'borderColor' => 'd2d2d2', 'cellMargin' => 40, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
		$fancyTableFirstRowStyle = array('bgColor' => 'DDDDDD');
		$fancyTableCellStyle = array('valign' => 'center');
		$fancyTableFontStyle = array('bold' => true);
		$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
		$table = $section->addTable($fancyTableStyleName);
		$table->addRow(900);
		$table->addCell(2000, $fancyTableCellStyle)->addText('Row 1', $fancyTableFontStyle);
		$table->addCell(2000, $fancyTableCellStyle)->addText('Row 2', $fancyTableFontStyle);
		$table->addCell(2000, $fancyTableCellStyle)->addText('Row 3', $fancyTableFontStyle);
		$table->addCell(2000, $fancyTableCellStyle)->addText('Row 4', $fancyTableFontStyle);
		for ($i = 1; $i <= 8; $i++) {
			$table->addRow();
			$table->addCell(2000)->addText("Cell {$i}");
			$table->addCell(2000)->addText("Cell {$i}");
			$table->addCell(2000)->addText("Cell {$i}");
			$table->addCell(2000)->addText("Cell {$i}");
		}
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment;filename="test.docx"');
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save('php://output');
	}

	function kelasmos(){
		$this->load->model(array("m_calonsiswa"));

		if($this->isloggedin() == false){
			redirect("");
		}else{
			$datasiswa	=	$this->m_calonsiswa->tampil_data('0')->result();

			$classtotal = 1;
			$siswatotal = 0;
			foreach ($datasiswa as $row) { //datanya order by nisn
				
				if($siswatotal == 36){
					$classtotal++;
				}

				$data = array(
					'id_siswa' => '',
					'nm_siswa' => '',
					'kelas' => $classtotal, 
				);

				$this->m_kelasmos->insert($data);

				$siswatotal++;

				//if siswatotal == 36, classtotal++, add to class 2
				//siswa 1 insert into class 1
				//siswatotal++

				//data order_by gender / jenis kelamin untuk kelas reguler

				//LOGIC FOR KELAS REGULER
				//pertama jumlah siswa dalam satu jurusan dibagi jumlah siswa max dalam kelas
				//kedua loop siswa jurusan
				//ketiga
				//masukkin siswa laki / perempuan ke satu kelas sampai max 13 (karena max total siswa 36)
				//kemudian jika sblumnya laki, maka perempuan masukin ke kelas yang belum full tadi sampe kelasnya full
				//begitu terus sampe kelas terakhir
			}

			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator("");
			$objPHPExcel->getProperties()->setLastModifiedBy("");
			$objPHPExcel->getProperties()->setTitle("");
			$objPHPExcel->getProperties()->setSubject("");
			$objPHPExcel->getProperties()->setDescription("");

			$objPHPExcel->setActiveSheetIndex(0);


			$objPHPExcel->getActiveSheet()->setCellValue("A1","ID Pendaftar");
			$objPHPExcel->getActiveSheet()->setCellValue("B1","Nama Lengkap");
			$objPHPExcel->getActiveSheet()->setCellValue("C1","Jenis Kelamin");
			$objPHPExcel->getActiveSheet()->setCellValue("D1","Asal Sekolah");
			$objPHPExcel->getActiveSheet()->setCellValue("E1","SKHU");
			$objPHPExcel->getActiveSheet()->setCellValue("F1","NISN");
			$objPHPExcel->getActiveSheet()->setCellValue("G1","No. Ijazah");
			$objPHPExcel->getActiveSheet()->setCellValue("H1","No. SKHUN");
			$objPHPExcel->getActiveSheet()->setCellValue("I1","No. UN");
			$objPHPExcel->getActiveSheet()->setCellValue("J1","NIK");


			$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->getFont()->setBold(true);

			foreach(range('A','J') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
			}



			$row = 2;

			foreach ($data as $key => $value) {
				$objPHPExcel->getActiveSheet()->setCellValue("A".$row,$value->id_siswa);
				$objPHPExcel->getActiveSheet()->setCellValue("B".$row,$value->nm_lengkap);
				$objPHPExcel->getActiveSheet()->setCellValue("C".$row,$value->jenis_kelamin);
				$objPHPExcel->getActiveSheet()->setCellValue("D".$row,$value->asal_sekolah);
				$objPHPExcel->getActiveSheet()->setCellValue("E".$row,$value->skhu);
				$objPHPExcel->getActiveSheet()->setCellValue("F".$row,$value->nisn);
				$objPHPExcel->getActiveSheet()->setCellValue("G".$row,$value->no_ijasah);
				$objPHPExcel->getActiveSheet()->setCellValue("H".$row,$value->no_skhun);
				$objPHPExcel->getActiveSheet()->setCellValue("I".$row,$value->no_un);
				$objPHPExcel->getActiveSheet()->setCellValue("J".$row,$value->nik);

				$row++;

			}

			$objPHPExcel->getActiveSheet()->setTitle("Data TAV");

			$filename = "Data Pendaftar - ".date("d-M-Y").'.xlsx';

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_end_clean();
			$writer->save('php://output');
			exit;
		}
	}


	function daftarulang(){
		$this->load->model(array("m_daftarulang"));

		if($this->isloggedin() == false){
			redirect("");
		}else{
			$data		=	$this->m_daftarulang->get_data('laporan','')->result();

			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator("");
			$objPHPExcel->getProperties()->setLastModifiedBy("");
			$objPHPExcel->getProperties()->setTitle("");
			$objPHPExcel->getProperties()->setSubject("");
			$objPHPExcel->getProperties()->setDescription("");

			$objPHPExcel->setActiveSheetIndex(0);


			$objPHPExcel->getActiveSheet()->setCellValue("A1","ID Daftar Ulang");
			$objPHPExcel->getActiveSheet()->setCellValue("B1","ID Pendaftar");
			$objPHPExcel->getActiveSheet()->setCellValue("C1","Status");
			$objPHPExcel->getActiveSheet()->setCellValue("D1","Biaya Telah Bayar");
			$objPHPExcel->getActiveSheet()->setCellValue("E1","Biaya Belum Bayar");
			$objPHPExcel->getActiveSheet()->setCellValue("F1","Deadline");
			$objPHPExcel->getActiveSheet()->setCellValue("G1","Keterangan Seleksi");
			$objPHPExcel->getActiveSheet()->setCellValue("H1","Nama Lengkap");


			$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setBold(true);

			foreach(range('A','H') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
			}



			$row = 2;

			foreach ($data as $key => $value) {
				$objPHPExcel->getActiveSheet()->setCellValue("A".$row,$value->id_daftarulang);
				$objPHPExcel->getActiveSheet()->setCellValue("B".$row,$value->id_pendaftar);
				$objPHPExcel->getActiveSheet()->setCellValue("C".$row,$value->status);
				$objPHPExcel->getActiveSheet()->setCellValue("D".$row,$value->biaya_telahbayar);
				$objPHPExcel->getActiveSheet()->setCellValue("E".$row,$value->biaya_belumbayar);
				$objPHPExcel->getActiveSheet()->setCellValue("F".$row,$value->deadline);
				$objPHPExcel->getActiveSheet()->setCellValue("G".$row,$value->keterangan_lulus);
				$objPHPExcel->getActiveSheet()->setCellValue("H".$row,$value->nm_lengkap);
				$row++;

			}

			$objPHPExcel->getActiveSheet()->setTitle("Data");

			$filename = "Data Daftar Ulang - ".date("d-M-Y").'.xlsx';

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_end_clean();
			$writer->save('php://output');
			exit;
		}
	}


	//laporan pendaftar, satu data
	function laporansiswa(){
		$this->load->model(array("m_calonsiswa"));

		$id = $this->uri->segment(3);
		$nama = $this->uri->segment(4);

		if($this->isloggedin() == false){
			redirect("");
		}else{
			$data["data"]	=	$this->m_calonsiswa->getsiswa($id)->result();

			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
			require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

			$objPHPExcel = new PHPExcel();

			$objPHPExcel->getProperties()->setCreator("");
			$objPHPExcel->getProperties()->setLastModifiedBy("");
			$objPHPExcel->getProperties()->setTitle("");
			$objPHPExcel->getProperties()->setSubject("");
			$objPHPExcel->getProperties()->setDescription("");

			$objPHPExcel->setActiveSheetIndex(0);


			$objPHPExcel->getActiveSheet()->setCellValue("A1","ID Pendaftar");
			$objPHPExcel->getActiveSheet()->setCellValue("B1","Nama Lengkap");
			$objPHPExcel->getActiveSheet()->setCellValue("C1","Jenis Kelamin");
			$objPHPExcel->getActiveSheet()->setCellValue("D1","Asal Sekolah");
			$objPHPExcel->getActiveSheet()->setCellValue("E1","SKHU");
			$objPHPExcel->getActiveSheet()->setCellValue("F1","NISN");
			$objPHPExcel->getActiveSheet()->setCellValue("G1","No. Ijazah");
			$objPHPExcel->getActiveSheet()->setCellValue("H1","No. SKHUN");
			$objPHPExcel->getActiveSheet()->setCellValue("I1","No. UN");
			$objPHPExcel->getActiveSheet()->setCellValue("J1","NIK");

			$objPHPExcel->getActiveSheet()->setCellValue("K1","Tempat Lahir");
			$objPHPExcel->getActiveSheet()->setCellValue("L1","Tanggal Lahir");
			$objPHPExcel->getActiveSheet()->setCellValue("M1","Alamat");
			$objPHPExcel->getActiveSheet()->setCellValue("N1","No. Telpon");
			$objPHPExcel->getActiveSheet()->setCellValue("O1","Email");
			$objPHPExcel->getActiveSheet()->setCellValue("P1","No. KPS");
			$objPHPExcel->getActiveSheet()->setCellValue("Q1","Tinggi Badan");
			$objPHPExcel->getActiveSheet()->setCellValue("R1","Berat Badan");
			$objPHPExcel->getActiveSheet()->setCellValue("S1","Jarak Rumah");
			$objPHPExcel->getActiveSheet()->setCellValue("T1","Waktu Tempuh");

			$objPHPExcel->getActiveSheet()->setCellValue("U1","Jumlah Saudara");
			$objPHPExcel->getActiveSheet()->setCellValue("V1","Anak Ke-");
			$objPHPExcel->getActiveSheet()->setCellValue("W1","Hobi");
			$objPHPExcel->getActiveSheet()->setCellValue("X1","Prestasi");
			$objPHPExcel->getActiveSheet()->setCellValue("Y1","ID Jurusan");
			$objPHPExcel->getActiveSheet()->setCellValue("Z1","Foto Path");
			$objPHPExcel->getActiveSheet()->setCellValue("AA1","Nama Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AB1","Tahun Lahir Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AC1","Pekerjaan Ayah");
			$objPHPExcel->getActiveSheet()->setCellValue("AD1","Pendidikan Ayah");

			$objPHPExcel->getActiveSheet()->setCellValue("AE1","Nama Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AF1","Tahun Lahir Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AG1","Pekerjaan Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AH1","Pendidikan Ibu");
			$objPHPExcel->getActiveSheet()->setCellValue("AI1","Nama Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AJ1","Tahun Lahir Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AK1","Pekerjaan Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AL1","Pendidikan Wali");
			$objPHPExcel->getActiveSheet()->setCellValue("AM1","ID Tahun");

			$objPHPExcel->getActiveSheet()->getStyle("A1:AM1")->getFont()->setBold(true);

		//\PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
			foreach(range('A','Z') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$objPHPExcel->getActiveSheet()->getColumnDimension('AA')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AB')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AC')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AD')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AE')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AF')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AG')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AH')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AI')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AK')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AL')
			->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AM')
			->setAutoSize(true);


			$row = 2;

			foreach ($data["data"] as $key => $value) {
				$objPHPExcel->getActiveSheet()->setCellValue("A".$row,$value->id_pendaftar);
				$objPHPExcel->getActiveSheet()->setCellValue("B".$row,$value->nm_lengkap);
				$objPHPExcel->getActiveSheet()->setCellValue("C".$row,$value->jenis_kelamin);
				$objPHPExcel->getActiveSheet()->setCellValue("D".$row,$value->asal_sekolah);
				$objPHPExcel->getActiveSheet()->setCellValue("E".$row,$value->skhu);
				$objPHPExcel->getActiveSheet()->setCellValue("F".$row,$value->nisn);
				$objPHPExcel->getActiveSheet()->setCellValue("G".$row,$value->no_ijasah);
				$objPHPExcel->getActiveSheet()->setCellValue("H".$row,$value->no_skhun);
				$objPHPExcel->getActiveSheet()->setCellValue("I".$row,$value->no_un);
				$objPHPExcel->getActiveSheet()->setCellValue("J".$row,$value->nik);

				$objPHPExcel->getActiveSheet()->setCellValue("K".$row,$value->temp_lahir);
				$objPHPExcel->getActiveSheet()->setCellValue("L".$row,$value->tgl_lahir);
				$objPHPExcel->getActiveSheet()->setCellValue("M".$row,$value->alamat);
				$objPHPExcel->getActiveSheet()->setCellValue("N".$row,$value->telp);
				$objPHPExcel->getActiveSheet()->setCellValue("O".$row,$value->email);
				$objPHPExcel->getActiveSheet()->setCellValue("P".$row,$value->no_kps);
				$objPHPExcel->getActiveSheet()->setCellValue("Q".$row,$value->tinggi_bdn);
				$objPHPExcel->getActiveSheet()->setCellValue("R".$row,$value->berat_bdn);
				$objPHPExcel->getActiveSheet()->setCellValue("S".$row,$value->jarak_rumah);
				$objPHPExcel->getActiveSheet()->setCellValue("T".$row,$value->waktu_tempuh);

				$objPHPExcel->getActiveSheet()->setCellValue("U".$row,$value->jml_sodara);
				$objPHPExcel->getActiveSheet()->setCellValue("V".$row,$value->anak_ke);
				$objPHPExcel->getActiveSheet()->setCellValue("W".$row,$value->hobi);
				$objPHPExcel->getActiveSheet()->setCellValue("X".$row,$value->prestasi);
				$objPHPExcel->getActiveSheet()->setCellValue("Y".$row,$value->id_jurusan);
				$objPHPExcel->getActiveSheet()->setCellValue("Z".$row,$value->foto_path);
				$objPHPExcel->getActiveSheet()->setCellValue("AA".$row,$value->nm_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AB".$row,$value->th_lahir_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AC".$row,$value->pekerjaan_ayah);
				$objPHPExcel->getActiveSheet()->setCellValue("AD".$row,$value->pendidikan_ayah);

				$objPHPExcel->getActiveSheet()->setCellValue("AE".$row,$value->nm_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AF".$row,$value->th_lahir_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AG".$row,$value->pekerjaan_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AH".$row,$value->pendidikan_ibu);
				$objPHPExcel->getActiveSheet()->setCellValue("AI".$row,$value->nm_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AJ".$row,$value->th_lahir_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AK".$row,$value->pekerjaan_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AL".$row,$value->pendidikan_wali);
				$objPHPExcel->getActiveSheet()->setCellValue("AM".$row,$value->tahun);

				$row++;

			}

			$objPHPExcel->getActiveSheet()->setTitle("Data Siswa ID ".$id);

			$filename = "Data ".$nama." - ".date("d-M-Y").'.xlsx';

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');

			$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_end_clean();
			$writer->save('php://output');
			exit;
		}
	}
}
?>