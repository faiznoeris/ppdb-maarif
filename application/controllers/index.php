<?php
class index extends CI_Controller{
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
		$this->load->model("m_auth");

		$data["title"]			=	"Pengumuman Kelulusan";
		$data["active"]			=	"pengumuman";
		$data["content"]		=	"pages/v_pengumuman";

		if($this->m_auth->isloggedin() == true){
			$data["loggedin"]		=	true;
		}else{
			$data["loggedin"]		=	false;
		}
		
		$this->load->view("template/main_template",$data);
	}


	function daftar(){
		$this->load->model(array("m_dashboard","m_auth"));

		$status = $this->uri->segment(2);

		if($status == "sukses"){
			$data["title"]				=	"Pendaftaran Sukses";
		}else{
			$data["title"]				=	"Pendaftaran";
		}

		$yearprevious					=	date("Y", strtotime("-1 year"));
		$yearnow		 				=	date("Y");
		$tahunajaran 					= 	$yearprevious . "/" . $yearnow;

		$data["active"]					=	"daftar";
		$data["content"]				=	"pages/v_daftar";
		$data["status_pendaftaran"]		= 	$this->m_dashboard->status_pendaftaran($tahunajaran);
		$data["status"]					=	$status;

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
		$this->load->model(array("m_auth","m_dashboard"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Dashboard";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/main_dashboard";
			$data["timelinedata"]	=	$this->m_dashboard->getalltimeline();

			$yearprevious				=	date("Y", strtotime("-1 year"));
			$yearnow		 			=	date("Y");
			$tahunajaran 				= 	$yearprevious . "/" . $yearnow;
			$data["tahunajaran"]		= 	$tahunajaran;

			//$row 						= $this->m_dashboard->status_pendaftaran($tahunajaran)->row();
			$data["status_pendaftaran"]	= $this->m_dashboard->status_pendaftaran($tahunajaran);


			//pagination
			$config 				= 	array();
			$config["base_url"] 	= 	base_url() . "dashboard";
			$config["total_rows"] 	= 	$this->m_dashboard->timeline_rows();
			$config["per_page"] 	= 	3;
			$config["uri_segment"] 	= 	3;


			$this->pagination->initialize($config);

			$page 					= 	($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["results"] 		= 	$this->m_dashboard->fetch_timeline($config["per_page"], $page);
			$str_links 				= 	$this->pagination->create_links();
			$data["links"] 			= 	explode('&nbsp;',$str_links );
			//$data["links"] 			= 	$this->pagination->create_links();


			$this->load->view("template/main_template",$data);
		}
	}	

	function pengaturan(){
		$this->load->model(array("m_auth","m_dashboard"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Pengaturan";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/v_pengaturan";
			$data["timelinedata"]	=	$this->m_dashboard->getalltimeline();

			$yearprevious				=	date("Y", strtotime("-1 year"));
			$yearnow		 			=	date("Y");
			$tahunajaran 				= 	$yearprevious . "/" . $yearnow;
			$data["tahunajaran"]		= 	$tahunajaran;

			//$row 						= $this->m_dashboard->status_pendaftaran($tahunajaran)->row();
			$data["status_pendaftaran"]	= $this->m_dashboard->status_pendaftaran($tahunajaran);


			//pagination
			$config 				= 	array();
			$config["base_url"] 	= 	base_url() . "dashboard";
			$config["total_rows"] 	= 	$this->m_dashboard->timeline_rows();
			$config["per_page"] 	= 	3;
			$config["uri_segment"] 	= 	3;


			$this->pagination->initialize($config);

			$page 					= 	($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["results"] 		= 	$this->m_dashboard->fetch_timeline($config["per_page"], $page);
			$str_links 				= 	$this->pagination->create_links();
			$data["links"] 			= 	explode('&nbsp;',$str_links );
			//$data["links"] 			= 	$this->pagination->create_links();


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
			$data["data_pendaftar"] 	=	$this->m_daftar->tampil_data()->result();

			$this->load->view("template/main_template",$data);
		}
	}

	function seleksipendaftar(){
		$this->load->model(array("m_auth","m_daftar"));

		if($this->m_auth->isloggedin() == false){
			redirect("");
		}else{
			$data["title"]				=	"Seleksi Data Pendaftar";
			$data["pages"]				=	"seleksipendaftar";
			$data["active"]				=	"dashboard";
			$data["content"]			=	"pages/dashboard/seleksi_pendaftar";
			//$data["seleksiPendaftar"] 	=	$this->m_daftar->tampil_data()->result();

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