<?php
class index extends CI_Controller{
	function filldropdown(){
		$this->load->model(array("m_daftar"));

		$id = $this->uri->segment(4);
		$dropdown = $this->uri->segment(3);

		if (!isset($id) || !is_numeric($id)){
			$reponse = array('success' => FALSE);
		}else {

			if($dropdown == "kecamatan"){
				$rows = $this->m_daftar->get_kecamatan($id)->result();

				$options = "";
				foreach ($rows as $row) {
					$options .= "<option value='". $row->id_kecamatan ."'>". $row->nm_kecamatan ."</option>";
				}
				$options .= "<option value='manual'>Masukkan Secara Manual</option>";


			}else if($dropdown == "desa"){
				$rows = $this->m_daftar->get_desa($id)->result();

				$options = "";
				foreach ($rows as $row) {
					$options .= "<option value='". $row->id_desa ."'>". $row->nm_desa ."</option>";
				}
				$options .= "<option value='manual'>Masukkan Secara Manual</option>";

			}
			$response = array(
				'success' => TRUE,
				'options' => $options
			);

		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}

	function test(){
		//$this->db->;
		$this->load->model(array("m_auth"));
		//echo $this->m_auth->encryptpwd("apasih");

		$data["result"]	=	$this->m_auth->test();

		require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php';
		require_once APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("");
		$objPHPExcel->getProperties()->setLastModifiedBy("");
		$objPHPExcel->getProperties()->setTitle("");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue("A1","Username");
		$objPHPExcel->getActiveSheet()->setCellValue("B1","Username");
		$objPHPExcel->getActiveSheet()->setCellValue("C1","Username");
		$objPHPExcel->getActiveSheet()->setCellValue("D1","Username");
		$objPHPExcel->getActiveSheet()->setCellValue("E1","Username");
		$objPHPExcel->getActiveSheet()->setCellValue("F1","Username");
		$objPHPExcel->getActiveSheet()->setCellValue("G1","Username");
		$objPHPExcel->getActiveSheet()->setCellValue("H1","Username");
		$objPHPExcel->getActiveSheet()->setCellValue("I1","Username");

		$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);

		foreach(range('A','I') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
			->setAutoSize(true);
		}

		echo "<pre>";
		print_r ($data["result"]);
		echo "</pre>";

		$row = 2;

		foreach ($data["result"] as $key => $value) {
			$objPHPExcel->getActiveSheet()->setCellValue("A".$row,$value->username);
			$objPHPExcel->getActiveSheet()->setCellValue("B".$row,$value->username);
			$objPHPExcel->getActiveSheet()->setCellValue("C".$row,$value->username);
			$objPHPExcel->getActiveSheet()->setCellValue("D".$row,$value->username);
			$objPHPExcel->getActiveSheet()->setCellValue("E".$row,$value->username);
			$objPHPExcel->getActiveSheet()->setCellValue("F".$row,$value->username);
			$objPHPExcel->getActiveSheet()->setCellValue("G".$row,$value->username);
			$objPHPExcel->getActiveSheet()->setCellValue("H".$row,$value->username);
			$objPHPExcel->getActiveSheet()->setCellValue("I".$row,$value->username);

			$row++;

		}

		$filename = "Task-exported-on-".date("Y-m-d-H-i-s").'.xlsx';

		$objPHPExcel->getActiveSheet()->setTitle("Task Overview");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');
		exit;
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


	/*
	*
	*
	*		MAIN PAGES
	*
	*
	*/


	function home(){
		$this->load->model("m_auth");

		$data["title"]			=	"SMK Ma'arif NU 1 Sumpiuh";
		$data["active"]			=	"home";
		$data["content"]		=	"pages/v_home";
		
		if($this->m_auth->isloggedin() == true){
			$data["loggedin"]		=	true;
		}else{
			$data["loggedin"]		=	false;
		}

		$this->load->view("template/main_template",$data);
	}

	function jurusan(){
		$this->load->model("m_auth");

		$data["title"]			=	"Informasi Jurusan";
		$data["active"]			=	"jurusan";
		$data["content"]		=	"pages/v_jurusan";

		if($this->m_auth->isloggedin() == true){
			$data["loggedin"]		=	true;
		}else{
			$data["loggedin"]		=	false;
		}

		$this->load->view("template/main_template",$data);
	}	

	function pengumuman(){
		$this->load->model(array("m_auth","m_seleksi"));

		$data["title"]					=	"Pengumuman Kelulusan";
		$data["active"]					=	"pengumuman";
		$data["content"]				=	"pages/v_pengumuman";
		$data["data_tav"]				=	$this->m_seleksi->get_data('tav','')->result();
		$data["data_tkr"]				= 	$this->m_seleksi->get_data('tkr','')->result();
		$data["data_tkj"]				= 	$this->m_seleksi->get_data('tkj','')->result();
		$data["data_tab"]				= 	$this->m_seleksi->get_data('tab','')->result();

		if($this->m_auth->isloggedin() == true){
			$data["loggedin"]		=	true;
		}else{
			$data["loggedin"]		=	false;
		}
		
		$this->load->view("template/main_template",$data);
	}


	function daftar(){
		$this->load->model(array("m_dashboard","m_auth","m_daftar"));

		$status = $this->uri->segment(2);

		if($status == "sukses"){
			$data["title"]				=	"Pendaftaran Sukses";
		}else{
			$data["title"]				=	"Pendaftaran";
		}

		//$yearprevious					=	date("Y", strtotime("-1 year"));
		//$yearnow		 				=	date("Y");
		//$tahunajaran 					= 	$yearprevious . "/" . $yearnow;
		$tahun_skrng					=	date('Y');
		$tahun_dulu						=	date('Y')-1;
		$tahun							=	$tahun_dulu."/".$tahun_skrng;

		//$data["data_kuota"]				=	$this->m_dashboard->get_datakuota('',$this->m_dashboard->get_tahunID($tahun));
		
		$data["active"]					=	"daftar";
		$data["content"]				=	"pages/v_daftar";
		$data["status_pendaftaran"]		= 	$this->m_dashboard->status_pendaftaran($tahun);
		$data["waktu_pendaftaran"]		= 	$this->m_dashboard->get_timedaftar($tahun);
		$data["jadwal_pendaftaran"]		= 	$this->m_dashboard->get_jadwaldaftar($tahun)->row();
		$data["status"]					=	$status;
		//$data["kecamatan"]				= 	$this->m_daftar->get_kecamatan()->result();

		if($this->m_auth->isloggedin() == true){
			$data["loggedin"]			=	true;
		}else{
			$data["loggedin"]			=	false;
		}

		$this->load->view("template/main_template",$data);

		
	}	

	function login(){
		$this->load->model("m_auth");

		$status = $this->uri->segment(2);

		if($this->m_auth->isloggedin() == true){
			redirect("/dashboard");
		}else{
			$data["title"]			=	"Login";
			$data["active"]			=	"login";
			$data["content"]		=	"pages/login/login";

			if($status == "gagal" && isset($_SESSION['error'])){
				$data["error"]			=	$_SESSION['error'];
			}

			$this->load->view("template/main_template",$data);
		}
	}


	/*
	*
	*
	*		DASHBOARD PAGES
	*
	*
	*/


	function dashboard(){
		$this->load->model(array("m_auth","m_dashboard","m_daftar"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$tahun_skrng			=	date('Y');
			$tahun_dulu				=	date('Y')-1;
			$tahun					=	$tahun_dulu."/".$tahun_skrng;

			$data["tahunajaran"]	= 	$tahun;

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Dashboard";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/main_dashboard";
			$data["totaldata_tav"]	=	$this->m_daftar->tampil_data('0')->num_rows();
			$data["totaldata_tkr"]	=	$this->m_daftar->tampil_data('1')->num_rows();
			$data["totaldata_tkj"]	=	$this->m_daftar->tampil_data('2')->num_rows();
			$data["totaldata_tab"]	=	$this->m_daftar->tampil_data('3')->num_rows();

			if(!empty($this->m_dashboard->get_datakuota('withyear',$this->m_dashboard->get_tahunID($tahun))->row())){
				$data["data_kuota"]		=	$this->m_dashboard->get_datakuota('withyear',$this->m_dashboard->get_tahunID($tahun))->row();
				$data["total_kuota"] = $data["data_kuota"]->kuota_tav + $data["data_kuota"]->kuota_tkr + $data["data_kuota"]->kuota_tkj + $data["data_kuota"]->kuota_tab;
			}else{
				//$data["data_kuota"]	= '0';
				$data["data_kuota"]		=	$this->m_dashboard->get_datakuota('withyear',$this->m_dashboard->get_tahunID($tahun))->row();
				$data["total_kuota"] = '0';
			}

			$data["total_pendaftar"] = $data["totaldata_tav"] + $data["totaldata_tkr"] + $data["totaldata_tkj"] + $data["totaldata_tab"];
		

			$data["status_pendaftaran"]	= $this->m_dashboard->status_pendaftaran($tahun);


			$this->load->view("template/main_template",$data);
		}
	}	



	function editprofile(){
		$this->load->model(array("m_auth","m_profile"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$row 					=	$this->m_profile->getdatauser($this->session->userdata('id_user'));

			$data["uname"] 			= 	$row->username;
			$data["email"] 			= 	$row->email;
			//$data["pin"] 			= 	$row->pin;
			//$data["date_joined"] 	= 	//$session['date_joined'];
			//$data["loggedin"] 		= 	//$session['loggedin'];

			$data["title"]			=	"Edit Profile";
			$data["pages"]			=	"editprofile";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/edit_profile";

			$this->load->view("template/main_template",$data);
		}
	}		

	function adduser(){
		$this->load->model("m_auth");

		$status = $this->uri->segment(3);


		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$data["title"]			=	"Add New User";
			$data["pages"]			=	"adduser";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/add_user";
			
			$data["status"]			=	$status;	
			if($status == "fail"){
				$data["error"] 		=	$_SESSION['error'];
			}else if(isset($_SESSION['uname'])){
				$data["uname"]		= 	$_SESSION['uname'];
				$data["email"]		= 	$_SESSION['email'];
				$data["pin"]		= 	$_SESSION['pin'];
				$data["ulvl"]		= 	$_SESSION['ulvl'];
			}

			$this->load->view("template/main_template",$data);
		}
	}	

	function datapendaftar(){
		$this->load->model(array("m_auth","m_daftar"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$data["title"]				=	"Data Pendaftar";
			$data["pages"]				=	"datapendaftar";
			$data["active"]				=	"dashboard";
			$data["content"]			=	"pages/dashboard/data_pendaftar";
			$data["data_tav"]		 	=	$this->m_daftar->tampil_data('0')->result();
			$data["data_tkr"]		 	=	$this->m_daftar->tampil_data('1')->result();
			$data["data_tkj"] 			=	$this->m_daftar->tampil_data('2')->result();
			$data["data_tab"] 			=	$this->m_daftar->tampil_data('3')->result();

			$this->load->view("template/main_template",$data);
		}
	}

	function datasiswa(){
		$this->load->model(array("m_auth","m_datasiswa"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$data["title"]				=	"Data Siswa";
			$data["pages"]				=	"datasiswa";
			$data["active"]				=	"dashboard";
			$data["content"]			=	"pages/dashboard/v_datasiswa";
			$data["data_tav"]		 	=	$this->m_datasiswa->get_data('all','0')->result();
			$data["data_tkr"]		 	=	$this->m_datasiswa->get_data('all','1')->result();
			$data["data_tkj"] 			=	$this->m_datasiswa->get_data('all','2')->result();
			$data["data_tab"] 			=	$this->m_datasiswa->get_data('all','3')->result();

			$this->load->view("template/main_template",$data);
		}
	}

	function datablacklist(){
		$this->load->model(array("m_auth","m_blacklist"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$data["title"]				=	"Data Blacklist";
			$data["pages"]				=	"datablacklist";
			$data["active"]				=	"dashboard";
			$data["content"]			=	"pages/dashboard/v_blacklist";
			$data["data"]		 		=	$this->m_blacklist->get_data()->result();

			$this->load->view("template/main_template",$data);
		}
	}

	function seleksipendaftar(){
		$this->load->model(array("m_auth","m_daftar","m_seleksi"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$size 					= 	$this->m_seleksi->get_data('all','')->num_rows();
			$sizeDataCalonSiswa 	=	$this->m_daftar->get_data()->num_rows();


			if($size == 0){	
				foreach ($this->m_daftar->tampil_data("with_prestasi")->result() as $row) {
					$this->m_seleksi->insert_data($row->id_pendaftar,$row->skhu,$row->nilai_prestasi,$row->nilai_sertifikat);
				}
			}else if($size != $sizeDataCalonSiswa){
				foreach ($this->m_daftar->tampil_data("with_prestasi")->result() as $row) {
					if($this->m_seleksi->check_data($row->id_pendaftar)->num_rows() == 0){
						$this->m_seleksi->insert_data($row->id_pendaftar,$row->skhu,$row->nilai_prestasi,$row->nilai_sertifikat);
					}
				}	
			}

			$data["title"]					=	"Seleksi Data Pendaftar";
			$data["pages"]					=	"seleksipendaftar";
			$data["active"]					=	"dashboard";
			$data["content"]				=	"pages/dashboard/seleksi_pendaftar";
			$data["data"]				 	=	$this->m_seleksi->get_nilai()->result();
			$data["data_hasilseleksi"]		= 	$this->m_seleksi->get_data('allwithname','')->result();
			//$data["data_checkwawancara"]	=	$this->m_seleksi->check_nilaiwawancara()->result();

			$this->load->view("template/main_template",$data);
		}
	}	

	function daftarulang(){
		$this->load->model(array("m_auth","m_daftarulang","m_seleksi"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{

			/*$size 					= 	$this->m_seleksi->get_data('all','')->num_rows();
			$sizeDataCalonSiswa 	=	$this->m_daftar->get_data()->num_rows();*/

			$size_daftarulang 	= 	$this->m_daftarulang->get_data('all','')->num_rows();
			$size_seleksi	 	= 	$this->m_seleksi->get_data('all','')->num_rows();

			if($size_daftarulang == 0){	
				foreach ($this->m_seleksi->get_data("onlylulus",'')->result() as $row) {
					$this->m_daftarulang->insert_data($row->id_pendaftar);
				}
			}else if($size_daftarulang != $size_seleksi){
				foreach ($this->m_seleksi->get_data("onlylulus",'')->result() as $row) {
					if($this->m_daftarulang->check_data($row->id_pendaftar)->num_rows() == 0){
						$this->m_daftarulang->insert_data($row->id_pendaftar);
					}
				}	
			}

			$data["title"]					=	"Daftar Ulang";
			$data["pages"]					=	"daftarulang";
			$data["active"]					=	"dashboard";
			$data["content"]				=	"pages/dashboard/daftar_ulang";
			$data["data"]				 	=	$this->m_daftarulang->get_data('allwithlulus','')->result();
			//$data["data_checkwawancara"]	=	$this->m_seleksi->check_nilaiwawancara()->result();

			$this->load->view("template/main_template",$data);
		}
	}	

	function editdatapendaftar(){
		$this->load->model(array("m_auth","m_calonsiswa"));
		$id = $this->uri->segment(4);

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$data["title"]			=	"Edit Data Calon Siswa";
			$data["pages"]			=	"editdatapendaftar";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/edit_calonsiswa";
			$data["data_siswa"] 	=	$this->m_calonsiswa->getsiswa($id)->row();
			
			$this->load->view("template/main_template",$data);
		}
	}

	function lihatdatapendaftar(){
		$this->load->model(array("m_auth","m_calonsiswa"));
		$id = $this->uri->segment(4);

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$data["title"]			=	"Lihat Data Calon Siswa";
			$data["pages"]			=	"lihatdatapendaftar";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/lihat_calonsiswa";
			$data["data_siswa"] 	=	$this->m_calonsiswa->getsiswa($id)->row();
			
			$this->load->view("template/main_template",$data);
		}
	}



	/*
	*
	*
	*		PENGATURAN
	*
	*
	*/


	function pengaturan(){
		$this->load->model(array("m_auth","m_dashboard"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$tahun_skrng			=	date('Y');
			$tahun_dulu				=	date('Y')-1;
			$tahun					=	$tahun_dulu."/".$tahun_skrng;

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Pengaturan";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"pengaturan";
			$data["content"]		=	"pages/dashboard/v_pengaturan";
			$data["data_kuota"]		=	$this->m_dashboard->get_datakuota('withyear',$this->m_dashboard->get_tahunID($tahun))->result();
			$data["data_bobot"]		=	$this->m_dashboard->get_bobotnilai();
			$data["peng_thAjaran"]	=	$this->m_dashboard->get_datathajaran('all','');

			$this->load->view("template/main_template",$data);
		}
	}	


	function addthajaran(){
		$this->load->model(array("m_auth","m_dashboard"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Add Tahun Ajaran";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"addthajaran";
			$data["content"]		=	"pages/dashboard/v_add_thajaran";
			//$data["peng_thAjaran"]	=	$this->m_dashboard->pengaturan_thajaran();

			$this->load->view("template/main_template",$data);
		}
	}	


	function editthajaran(){
		$this->load->model(array("m_auth","m_dashboard"));

		$id = $this->uri->segment(5);

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Edit Tahun Ajaran";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"editthajaran";
			$data["content"]		=	"pages/dashboard/v_edit_thajaran";
			$data["data_thajaran"]		=	$this->m_dashboard->get_datathajaran('one',$id);

			$this->load->view("template/main_template",$data);
		}
	}

	function editkuota(){
		$this->load->model(array("m_auth","m_dashboard"));

		$id = $this->uri->segment(5);

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Edit Kuota";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"editkuota";
			$data["content"]		=	"pages/dashboard/v_edit_kuota";
			$data["data_kuota"]		=	$this->m_dashboard->get_datakuota('',$id);

			$this->load->view("template/main_template",$data);
		}
	}



	/*
	*
	*
	*		OTHER PAGES
	*
	*
	*/


	function forgotpassword(){
		$status 				= 	$this->uri->segment(3);

		$data["title"]			=	"Forgot Password";
		$data["active"]			=	"forgotpassword";
		$data["content"]		=	"pages/login/forgot_password";
		$data["status"]			= 	$status;

		if($status == "gagal" && isset($_SESSION['error'])){
			$data["error"]			=	$_SESSION['error'];
		}else if($status == "sukses" && isset($_SESSION['emailsent'])){
			$data["emailsent"]		= 	$_SESSION['emailsent'];
		}

		$this->load->view("template/main_template",$data);
	}	
}
?>