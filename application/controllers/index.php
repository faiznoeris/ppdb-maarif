<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends MY_Controller{
	function filldd(){
		$this->filldropdown();
	}


	/*
	*
	*
	*		MAIN PAGES
	*
	*
	*/


	function home(){
		$this->load->model("m_user");

		$data["title"]			=	"SMK Ma'arif NU 1 Sumpiuh";
		$data["active"]			=	"home";
		$data["content"]		=	"pages/v_home";
		
		if($this->isLoggedin() == true){
			$data["loggedin"]		=	true;
		}else{
			$data["loggedin"]		=	false;
		}

		$this->load->view("template/main_template",$data);
	}

	function jurusan(){
		$this->load->model("m_user");

		$data["title"]			=	"Informasi Jurusan";
		$data["active"]			=	"jurusan";
		$data["content"]		=	"pages/v_jurusan";

		if($this->isLoggedin() == true){
			$data["loggedin"]		=	true;
		}else{
			$data["loggedin"]		=	false;
		}

		$this->load->view("template/main_template",$data);
	}	

	function pengumuman(){
		$this->load->model(array("m_user","m_seleksi"));

		$data["title"]					=	"Pengumuman Kelulusan";
		$data["active"]					=	"pengumuman";
		$data["content"]				=	"pages/v_pengumuman";
		$data["data_tav"]				=	$this->m_seleksi->get_data('tav','')->result();
		$data["data_tkr"]				= 	$this->m_seleksi->get_data('tkr','')->result();
		$data["data_tkj"]				= 	$this->m_seleksi->get_data('tkj','')->result();
		$data["data_tab"]				= 	$this->m_seleksi->get_data('tab','')->result();

		if($this->isLoggedin() == true){
			$data["loggedin"]		=	true;
		}else{
			$data["loggedin"]		=	false;
		}
		
		$this->load->view("template/main_template",$data);
	}


	function daftar(){
		$this->load->model(array("m_tahunajaran","m_user","m_kabupaten"));

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

		//$data["data_kuota"]				=	$this->m_dashboard->get_kuota('',$this->m_dashboard->get_idtahun($tahun));
		
		$data["active"]					=	"daftar";
		$data["content"]				=	"pages/v_daftar";
		$data["status_pendaftaran"]		= 	$this->m_tahunajaran->get_status($tahun);
		$data["waktu_pendaftaran"]		= 	$this->m_tahunajaran->get_waktudaftar($tahun);
		if($this->m_tahunajaran->get_tanggaldaftar($tahun) != ""){
			$data["jadwal_pendaftaran"]		= 	$this->m_tahunajaran->get_tanggaldaftar($tahun)->row();
		}else{
			$data["jadwal_pendaftaran"]	=	"";
		}
		$data["status"]					=	$status;
		//$data["kecamatan"]				= 	$this->m_calonsiswa->get_kecamatan()->result();

		if($this->isLoggedin() == true){
			$data["loggedin"]			=	true;
		}else{
			$data["loggedin"]			=	false;
		}

		$this->load->view("template/main_template",$data);

		
	}	

	function login(){
		$this->load->model("m_user");

		$status = $this->uri->segment(2);

		if($this->isLoggedin() == true){
			redirect("/dashboard");
		}else{
			$data["title"]			=	"Login";
			$data["active"]			=	"login";
			$data["content"]		=	"pages/login/v_login";

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
		$this->load->model(array("m_user","m_kuota","m_calonsiswa","m_tahunajaran"));

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$tahun_skrng			=	date('Y');
			$tahun_dulu				=	date('Y')-1;
			$tahun					=	$tahun_dulu."/".$tahun_skrng;

			$data["tahunajaran"]	= 	$tahun;

			$data["uname"] 			= 	$session['username'];
			$data["user_lvl"] 			= 	$session['user_lvl'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Dashboard";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/v_dashboard";
			$data["totaldata_tav"]	=	$this->m_calonsiswa->tampil_data('0')->num_rows();
			$data["totaldata_tkr"]	=	$this->m_calonsiswa->tampil_data('1')->num_rows();
			$data["totaldata_tkj"]	=	$this->m_calonsiswa->tampil_data('2')->num_rows();
			$data["totaldata_tab"]	=	$this->m_calonsiswa->tampil_data('3')->num_rows();

			if(!empty($this->m_kuota->get_kuota('withyear',$this->m_tahunajaran->get_idtahun($tahun))->row())){
				$data["data_kuota"]		=	$this->m_kuota->get_kuota('withyear',$this->m_tahunajaran->get_idtahun($tahun))->row();
				$data["total_kuota"] = $data["data_kuota"]->kuota_tav + $data["data_kuota"]->kuota_tkr + $data["data_kuota"]->kuota_tkj + $data["data_kuota"]->kuota_tab;
			}else{
				//$data["data_kuota"]	= '0';
				$data["data_kuota"]		=	$this->m_kuota->get_kuota('withyear',$this->m_tahunajaran->get_idtahun($tahun))->row();
				$data["total_kuota"] = '0';
			}

			$data["total_pendaftar"] = $data["totaldata_tav"] + $data["totaldata_tkr"] + $data["totaldata_tkj"] + $data["totaldata_tab"];


			$data["status_pendaftaran"]	= $this->m_tahunajaran->get_status($tahun);


			$this->load->view("template/main_template",$data);
		}
	}	



	function editprofile(){
		$this->load->model(array("m_user"));

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$row 					=	$this->m_user->get_user($this->session->userdata('id_user'));

			$data["uname"] 			= 	$row->username;
			$data["email"] 			= 	$row->email;
			//$data["pin"] 			= 	$row->pin;
			//$data["date_joined"] 	= 	//$session['date_joined'];
			//$data["loggedin"] 		= 	//$session['loggedin'];

			$data["title"]			=	"Edit Profile";
			$data["pages"]			=	"editprofile";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/v_edit_profile";

			$this->load->view("template/main_template",$data);
		}
	}		

	function adduser(){
		$this->load->model("m_user");

		$status = $this->uri->segment(3);


		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$data["title"]			=	"Add New User";
			$data["pages"]			=	"adduser";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/admin/v_add_user";
			
			$data["status"]			=	$status;	
			if($status == "fail"){
				$data["error"] 		=	$_SESSION['error'];
			}else if(isset($_SESSION['uname'])){
				$data["uname"]		= 	$_SESSION['uname'];
				$data["email"]		= 	$_SESSION['email'];
				$data["pin"]		= 	$_SESSION['pin'];
			}

			$this->load->view("template/main_template",$data);
		}
	}	

	function daftaruser(){
		$this->load->model("m_user");

		$status = $this->uri->segment(3);


		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$data["title"]			=	"Daftar User";
			$data["pages"]			=	"daftaruser";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/admin/v_view_daftaruser";
			$data["data"]			=	$this->m_user->get_alluser()->result();

			$this->load->view("template/main_template",$data);
		}
	}	

	function datapendaftar(){
		$this->load->model(array("m_user","m_calonsiswa"));

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$data["title"]				=	"Data Pendaftar";
			$data["pages"]				=	"datapendaftar";
			$data["active"]				=	"dashboard";
			$data["content"]			=	"pages/dashboard/siswa/v_view_datacalonsiswa";
			$data["data_tav"]		 	=	$this->m_calonsiswa->tampil_data('0')->result();
			$data["data_tkr"]		 	=	$this->m_calonsiswa->tampil_data('1')->result();
			$data["data_tkj"] 			=	$this->m_calonsiswa->tampil_data('2')->result();
			$data["data_tab"] 			=	$this->m_calonsiswa->tampil_data('3')->result();

			$this->load->view("template/main_template",$data);
		}
	}

	function datasiswa(){
		$this->load->model(array("m_user","m_siswa"));

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$data["title"]				=	"Data Siswa";
			$data["pages"]				=	"datasiswa";
			$data["active"]				=	"dashboard";
			$data["content"]			=	"pages/dashboard/siswa/v_view_siswa";
			$data["data_tav"]		 	=	$this->m_siswa->get_data('all','0')->result();
			$data["data_tkr"]		 	=	$this->m_siswa->get_data('all','1')->result();
			$data["data_tkj"] 			=	$this->m_siswa->get_data('all','2')->result();
			$data["data_tab"] 			=	$this->m_siswa->get_data('all','3')->result();

			$this->load->view("template/main_template",$data);
		}
	}

	function datablacklist(){
		$this->load->model(array("m_user","m_blacklist"));

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$data["title"]				=	"Data Blacklist";
			$data["pages"]				=	"datablacklist";
			$data["active"]				=	"dashboard";
			$data["content"]			=	"pages/dashboard/siswa/v_view_blacklist";
			$data["data"]		 		=	$this->m_blacklist->get_data()->result();

			$this->load->view("template/main_template",$data);
		}
	}

	function seleksipendaftar(){
		$this->load->model(array("m_user","m_calonsiswa","m_seleksi","m_waitapproval"));

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$size 					= 	$this->m_seleksi->get_data('all','')->num_rows();
			$sizeDataCalonSiswa 	=	$this->m_calonsiswa->get_data()->num_rows();

			if($size == 0){	
				foreach ($this->m_calonsiswa->tampil_data("with_prestasi")->result() as $row) {
					$this->m_seleksi->insert_data($row->id_pendaftar,$row->skhu,$row->nilai_prestasi,$row->nilai_sertifikat);
				}
			}else{
				foreach ($this->m_calonsiswa->tampil_data("with_prestasi")->result() as $row) {
					if($this->m_seleksi->check_data($row->id_pendaftar)->num_rows() == 0){
						$this->m_seleksi->insert_data($row->id_pendaftar,$row->skhu,$row->nilai_prestasi,$row->nilai_sertifikat);
					}
				}	
			}

			$session 						= 	$this->session->all_userdata();

			$data["title"]					=	"Seleksi Data Pendaftar";
			$data["pages"]					=	"seleksipendaftar";
			$data["active"]					=	"dashboard";
			$data["content"]				=	"pages/dashboard/siswa/v_view_seleksi";
			$data["data"]				 	=	$this->m_seleksi->get_nilai()->result();
			$data["data_hasilseleksi"]		= 	$this->m_seleksi->get_data('allwithname','')->result();
			$data["data_userlvl"]			= 	$session["user_lvl"];
			$data["data_iduser"]			= 	$session["id_user"];
			$data["data_approval"]			= 	$this->m_waitapproval->get('')->result();
			//$data["data_checkwawancara"]	=	$this->m_seleksi->check_nilaiwawancara()->result();

			$this->load->view("template/main_template",$data);
		}
	}	

	function daftarulang(){
		$this->load->model(array("m_user","m_daftarulang","m_seleksi"));

		if($this->isLoggedin() == false){
			redirect("");
		}else{

			/*$size 					= 	$this->m_seleksi->get_data('all','')->num_rows();
			$sizeDataCalonSiswa 	=	$this->m_daftar->get_data()->num_rows();*/

			// $size_daftarulang 	= 	$this->m_daftarulang->get_data('all','')->num_rows();
			// $size_seleksi	 	= 	$this->m_seleksi->get_data('all','')->num_rows();

			/*if($size_daftarulang == 0){	
				foreach ($this->m_seleksi->get_data("onlylulus",'')->result() as $row) {
					$this->m_daftarulang->insert_data($row->id_pendaftar,'');
				}
			}else if($size_daftarulang != $size_seleksi){
				foreach ($this->m_seleksi->get_data("all",'')->result() as $row) {
					if($this->m_daftarulang->check_data($row->id_pendaftar)->num_rows() == 0 && $row->nilai_narkoba > 2 && $row->status != "-"){
						$this->m_daftarulang->insert_data($row->id_pendaftar,'');
					}else if($this->m_daftarulang->check_data($row->id_pendaftar)->num_rows() == 0 && $row->nilai_narkoba == -20 && $row->status != "-"){
						$this->m_daftarulang->insert_data($row->id_pendaftar,'cadangan');
					}
				}	
			}*/

			$data["title"]					=	"Daftar Ulang";
			$data["pages"]					=	"daftarulang";
			$data["active"]					=	"dashboard";
			$data["content"]				=	"pages/dashboard/siswa/v_view_daftarulang";
			$data["data"]				 	=	$this->m_daftarulang->get_data('allwithlulus','')->result();
			$data["data_du"]				=	$this->m_daftarulang->get_data('du','')->num_rows();
			$data["data_titip"]				=	$this->m_daftarulang->get_data('titip','')->num_rows();
			$data["data_dutitip"]			=	$this->m_daftarulang->get_data('du+titip','')->num_rows();
			$data["jml_cabutberkas"]		=	$this->m_daftarulang->get_data('cabut-berkas','')->num_rows();
			$data["data_cadangan"]			=	$this->m_daftarulang->get_data('cadangan','')->num_rows();
			$data["data_blmbayar"]			=	$this->m_daftarulang->get_data('-','')->num_rows();
			$data["data_cbtberkas"]			=	$this->m_daftarulang->get_data('cbtberkas','')->result();
			//$data["data_checkwawancara"]	=	$this->m_seleksi->check_nilaiwawancara()->result();

			$this->load->view("template/main_template",$data);
		}
	}		

	function editdatapendaftar(){
		$this->load->model(array("m_user","m_calonsiswa"));
		$id = $this->uri->segment(4);

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$data["title"]			=	"Edit Data Calon Siswa";
			$data["pages"]			=	"editdatapendaftar";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/siswa/v_edit_calonsiswa";
			$data["data_siswa"] 	=	$this->m_calonsiswa->getsiswa($id)->row();
			
			$this->load->view("template/main_template",$data);
		}
	}

	function lihatdatapendaftar(){
		$this->load->model(array("m_user","m_calonsiswa"));
		$id = $this->uri->segment(4);

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$data["title"]			=	"Lihat Data Calon Siswa";
			$data["pages"]			=	"lihatdatapendaftar";
			$data["active"]			=	"dashboard";
			$data["content"]		=	"pages/dashboard/siswa/v_view_calonsiswa";
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
		$this->load->model(array("m_user","m_kuota","m_tahunajaran","m_bobot_nilai","m_biaya"));

		if($this->isLoggedin() == false){
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
			$data["content"]		=	"pages/dashboard/admin/v_view_pengaturan";
			$data["data_kuota"]		=	$this->m_kuota->get_kuota('withyear',$this->m_tahunajaran->get_idtahun($tahun))->result();
			$data["data_biaya"]		=	$this->m_biaya->get_biaya('all','','')->result();
			$data["data_bobot"]		=	$this->m_bobot_nilai->get_bobotnilai();
			$data["peng_thAjaran"]	=	$this->m_tahunajaran->get_thajaran('all','');

			$this->load->view("template/main_template",$data);
		}
	}	


	function addthajaran(){
		$this->load->model(array("m_user"));

		if($this->isLoggedin() == false){
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
			$data["content"]		=	"pages/dashboard/admin/v_add_thajaran";

			$this->load->view("template/main_template",$data);
		}
	}	


	function editthajaran(){
		$this->load->model(array("m_user","m_tahunajaran"));

		$id = $this->uri->segment(5);

		if($this->isLoggedin() == false){
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
			$data["content"]		=	"pages/dashboard/admin/v_edit_thajaran";
			$data["data_thajaran"]		=	$this->m_tahunajaran->get_thajaran('one',$id);

			$this->load->view("template/main_template",$data);
		}
	}

	function editkuota(){
		$this->load->model(array("m_user","m_kuota"));

		$id = $this->uri->segment(5);

		if($this->isLoggedin() == false){
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
			$data["content"]		=	"pages/dashboard/admin/v_edit_kuota";
			$data["data_kuota"]		=	$this->m_kuota->get_kuota('',$id);

			$this->load->view("template/main_template",$data);
		}
	}

	function editbiaya(){
		$this->load->model(array("m_biaya","m_tahunajaran"));

		$id_tahun = $this->uri->segment(5);
		$jurusan = $this->uri->segment(6);

		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Edit Biaya";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"editbiaya";
			$data["content"]		=	"pages/dashboard/admin/v_edit_biaya";
			$data["data"]			=	$this->m_biaya->get_biaya('one',$id_tahun,$jurusan)->result();
			$data["jurusan"]		=	$jurusan;
			$data["thajaran"]		=	$this->m_tahunajaran->get_thajaran('one',$id_tahun)->tahun;

			$this->load->view("template/main_template",$data);
		}
	}

	function addbiaya(){
		$this->load->model(array("m_biaya","m_tahunajaran"));
		
		if($this->isLoggedin() == false){
			redirect("");
		}else{
			$session 				= 	$this->session->all_userdata();

			$data["uname"] 			= 	$session['username'];
			//$data["email"] 			= 	$session['email'];
			$data["date_joined"] 	= 	$session['date_joined'];
			$data["loggedin"] 		= 	$session['loggedin'];

			$data["title"]			=	"Add Biaya";
			$data["active"]			=	"dashboard";
			$data["pages"]			=	"addbiaya";
			$data["content"]		=	"pages/dashboard/admin/v_add_biaya";
			$data["daftar_thajaran"]	=	$this->m_tahunajaran->get_thajaran('all','');

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
		$data["active"]			=	"login";
		$data["content"]		=	"pages/login/v_forgotpassword";
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