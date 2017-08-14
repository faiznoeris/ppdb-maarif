<br><br>
<main>
	<?php if($status == "sukses"): ?>
		<!-- Pendaftaran Sukses Page -->
		<div class="container" style="padding: 32px 88px 0px 88px; width: 1000px;">
			<div class="col s12 m12 l6 z-depth-2">
				<div class="card-panel">
					<h3 class="center">Sukses!</h3>
					<p class="flow-text">
						Anda telah berhasil terdaftar sebagai calon siswa <b>SMK Ma'arif NU 1 Sumpiuh</b> dengan ID Pendaftar <b><i>#<?= $this->session->tempdata('ID_Pendaftar') ?></i></b>. Tunggu informasi selanjutnya dari sekolah untuk mengikuti tahap seleksi selanjutnya.
					</p>				
				</div>
			</div>
		</div>
		<!-- Pendaftaran Sukses Page -->
	<?php else: ?>
		<!-- Pendaftaran Page -->
		<div class="container white s12 m12 l6 z-depth-2"  style=" padding: 32px 88px 10px 30px; width: 1000px;">
			<?php
			date_default_timezone_set('Asia/Jakarta'); //set timezone to jakarta
			$waktumulai = substr($waktu_pendaftaran, 0, 5);
			$waktuakhir = substr($waktu_pendaftaran, 8, 14);
			$timenow = date('H:i');
			$datenow = date('d - F - Y');
			?>

			<?php if($status_pendaftaran == "aktif" && $timenow >= $waktumulai && $timenow <= $waktuakhir && $datenow >= $jadwal_pendaftaran->tanggal_mulai && $datenow <= $jadwal_pendaftaran->tanggal_terakhir): ?>		
				<!-- Pendaftaran Aktif Page -->		
				<form id="formValidate" method="post" action="<?php echo base_url('daftar/input/');?>"  enctype='multipart/form-data'>
					<center><h3>Pendafataran Siswa Baru</h3><br></center>
					<span class="flow-text text-darken-3" style="font-size: 13px;"><i><b>NOTE:<br>*Wajib diisi</b></i></span>
					<!-- DATA SISWA	-->

					<h5>Data Calon Siswa</h5><br>

					<!-- NAMA -->
					<div class="row">
						<div class="input-field col s6">
							<input 	
							name 			=	"nama" 
							placeholder 	=	"Adi Sucipto"
							id 				=	"nama" 
							type 			= 	"text"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt1">
							<label for="nama">Nama Lengkap*</label>
							<div class="errorTxt1"></div>
						</div>
					</div>

					<!-- JENIS KELAMIN -->
					<div class="row"> 
						<div class="input-field col s12 m6">
							<select class="icons" name="select_kelamin" id="select_kelamin" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="Laki - Laki" >Laki - Laki</option>
								<option value="Perempuan" >Perempuan</option>
							</select>
							<label>Jenis Kelamin*</label>
						</div>
					</div>

					<!-- ASAL SEKOLAH -->
					<div class="row">
						<div class="input-field col s6">
							<input 	
							name 			=   "asalsekolah" 
							placeholder 	=   "SMP 1 Sumpiuh" 
							id  			=   "asalsekolah" 
							type 			=   "text"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true">
							<label for="asalsekolah">Sekolah Asal*</label>
						</div>
					</div>

					<!-- NISN -->
					<div class="row">
						<div class="input-field col s6">
							<input 
							name    			=   "nisn" 
							placeholder      =   "0012345678" 
							id               =   "nisn" 
							type             =   "number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"

							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"								maxlength 		= 	"10"
							data-error 		=	".errorTxt2">
							<label for="nisn">NISN (diperoleh dari sekolah asal)*</label>
							<div class="errorTxt2"></div>
						</div>
					</div>

					<!-- NILAI SKHU -->
					<div class="row">
						<div class="input-field col s2">
							<input 	
							name 			=	"skhu"
							placeholder 	=	"225"
							id 				=	"skhu" 
							type 			=	"number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt3">
							<label for="skhu">Jumlah Nilai/SKHU*</label>
							<div class="errorTxt3"></div>
						</div>
					</div>

					<!-- NOMOR SERI IJAZAH -->
					<div class="row">
						<div class="input-field col s4">
							<select name="select_ijazah" id="select_ijazah" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="SMP">SMP</option>
								<option value="MTs">MTs</option>
							</select>
							<label for="ijazah">Nomor Seri Ijazah & SKHUN SMP/MTs*</label>
						</div>
						<div class="input-field col s4">
							<input name             =    "ijazah" 
							placeholder      =    "Ijazah" 
							id               =    "ijazah" 
							type             =    "number" 
							class 			 = 	"validate" 			
							maxlength 		=	"9"
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							data-error 		 =	".errorTxt4" disabled />
							<div class="errorTxt4"></div>										
						</div>
						<div class="input-field col s4">
							<input 
							name             =    "skhun" 
							placeholder      =    "SKHUN"
							id               =    "skhun" 
							type             =    "number"
							class 			 = 	  "validate" 
							maxlength 		=	"9"
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							data-error		 =	  ".errorTxt5" disabled />
							<div class="errorTxt5"></div>
						</div>
					</div>



					<!-- NOMOR UJIAN NASIONAL -->
					<div class="row">
						<label style="margin-left: 10px;">No. Ujian Nasional SMP/MTs</label><br>
						<div class="input-field col s1">
							<input 	
							name 			=	"no_un_0" 
							placeholder 	=	"0" 
							id 				=	"no-un" 
							type 			=	"number"
							maxlength 		=	"1" 
							required 		=	"" 
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							aria-required 	=	"true"
							style 			= 	"text-align: center;">
						</div>
						<div class="input-field col s1">
							<input 	
							name 			=	"no_un_1" 
							placeholder 	=	"00" 
							id 				=	"no-un" 
							type 			=	"number"
							maxlength 		=	"2" 
							required 		=	"" 
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							aria-required 	=	"true"
							style="text-align: center;">	
						</div>
						<div class="input-field col s1">
							<input 	
							name 			=	"no_un_2" 
							placeholder 	=	"00" 
							id 				=	"no-un" 
							type 			=	"number"
							maxlength 		= 	"2" 
							required 		=	"" 
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							aria-required 	=	"true"
							style="text-align: center;">	
						</div>
						<div class="input-field col s1">
							<input 	
							name 			=	"no_un_3" 
							placeholder 	=	"00" 
							id 				=	"no-un" 
							type 			=	"number"
							maxlength 		= 	"2" 
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							required 		=	"" 
							aria-required 	=	"true"
							style="text-align: center;">	
						</div>
						<div class="input-field col s1">
							<input 
							name 			=	"no_un_4" 
							placeholder 	=	"000" 
							id 				=	"no-un" 
							type 			=	"number"
							maxlength 		= 	"3" 
							required 		=	"" 
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							aria-required 	=	"true"
							style="text-align: center;">	
						</div>
						<div class="input-field col s1">
							<input 	
							name 			=	"no_un_5" 
							placeholder 	=	"000" 
							id 				=	"no-un" 
							type 			=	"number"
							maxlength 		= 	"3" 
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							required 		=	"" 
							aria-required 	=	"true"
							style="text-align: center;">	
						</div>
						<div class="input-field col s1">
							<input 	
							name 			=	"no_un_6" 
							placeholder 	=	"0" 
							id 				=	"no-un" 
							type 			=	"number"
							maxlength 		= 	"1" 
							required 		=	"" 
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							aria-required 	=	"true"
							style="text-align: center;">	
						</div>
					</div>	

					<!-- NOMOR INDUK KEPENDUDUKAN -->
					<div class="row">
						<div class="input-field col s6">
							<input 	name 			=	"nik" 
							placeholder 	=	"00000000000000" 
							id 				=	"nik" 
							type 			=	"number"
							class 			 = 	"validate" 
							required 		=	"" 
							maxlength 		=	"13"
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							aria-required 	=	"true"
							data-error		 =	  ".errorTxt13">
							<label for="nik">No. Induk Kependudukan (NIK)*</label>
							<div class="errorTxt13"></div>	
						</div>
					</div>		

					<!-- TEMPAT & TANGGAL LAHIR -->
					<h6>Tempat, Tanggal Lahir*</h6>
					<div class="row">
						<div class="col s4">
							<label for="tmpt_lahir">Tempat Lahir</label>
							<input 	name 			=	"tmpt_lhr" 
							placeholder 	=	"Tempat Lahir" 
							id 				=	"tmpt_lhr" 
							type 			=	"text"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt14">			
							
							<div class="errorTxt14"></div>	
						</div>
						<div class="col s4">
							<label for="tgl_lahir">Tanggal Lahir</label>
							<input 	name 			=	"tgl_lhr" 
							type 			=	"date" 
							placeholder 	=	"Tanggal Lahir" 
							class 			=	"datepicker"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt15">
							
							<div class="errorTxt15	"></div>	
						</div>
					</div>

					<!-- ALAMAT -->
					<h6>Alamat*</h6>
					<div class="row">
						<div class="input-field col s6" id="kabupaten" style="display: block">
							<select name="select_kabupaten" id="select_kabupaten" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<?php 
								$kabupaten = $this->m_daftar->get_kabupaten()->result();
								foreach ($kabupaten as $row) {
									echo "<option value='".$row->id_kabupaten."'>".$row->nm_kabupaten."</option>";
								}
								?>
								<option value="manual">Masukkan Secara Manual</option>
							</select>
							<label for="select_kabupaten">Kabupaten</label>
						</div>
						<div class="input-field col s6" id="manual_kabupaten" style="display: none">
							<input name="kabupaten" placeholder="Kabupaten" id="kabupaten_input" type="text" class 			=	"validate" >
							<label for="kabupaten">Kabupaten</label>
						</div>

						<div class="input-field col s4" id="kecamatan" style="display: block">
							<select name="select_kecamatan" id="select_kecamatan" required="required">
								<option value="" disabled selected>Pilih kabupaten terlebih dahulu</option>
								<option value="manual">Masukkan Secara Manual</option>
							</select>

							<label for="select_kecamatan">Kecamatan</label>
						</div>
						<div class="input-field col s4" id="manual_kecamatan" style="display: none">
							<input name="kecamatan" placeholder="Kecamatan" id="kecamatan_input" type="text" class 			=	"validate">
							<label for="kecamatan">Kecamatan</label>
						</div>

						<div class="input-field col s5" id="desa" style="display: block">
							<select name="select_desa" id="select_desa" required="required">
								<option value="" disabled selected>Pilih kecamatan terlebih dahulu</option>
								<option value="manual">Masukkan Secara Manual</option>
							</select>
							<label for="select_desa">Desa</label>
						</div>
						<div class="input-field col s5" id="manual_desa" style="display: none">
							<input name="desa" placeholder="Desa" id="desa_input" type="text" class 			=	"validate">
							<label for="desa">Desa</label>
						</div>


						<div class="input-field col s1">
							<input name="rt" placeholder="RT" id="RT" type="number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true">
							<label for="rt">RT</label>
						</div>
						<div class="input-field col s1">
							<input name="rw" placeholder="RW" id="RW" type="number" class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true">
							<label for="rw">RW</label>
						</div>
						
						

						<div class="input-field col s3">
							<input 	name 			=	"kodepos" 
							placeholder 	=	"Kode Pos" 
							id 				=	"kodepos" 
							type 			=	"number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true">
							<label for="kodepos">Kode Pos</label>
						</div>
					</div>

					<!-- KONTAK (EMAIL DAN NO HP / TELP) -->
					<h6>Kontak</h6>
					<div class="row">
						<div class="input-field col s5">
							<input 	name 			=	"email" 
							placeholder 	=	"example@mail.com" 
							id 				=	"email" 
							type 			=	"email"
							class 			=	"validate" 
							data-error 		=	".errorTxtEmail">			
							<label for="email">Email</label>
							<div class="errorTxtEmail"></div>
						</div>
						<div class="input-field col s3">
							<input 	name 			=	"no_telp" 
							placeholder 	=	"08573245231" 
							id 				=	"no_telp" 
							type 			=	"number"
							class 			=	"validate" 
							data-error 		=	".errorTxtHP">		
							<label for="no_telp">No. Telpon/HP</label>
							<div class="errorTxtHP"></div>
						</div>
					</div>

					<!-- KPS -->
					<div class="row">			
						<div class="input-field col s3">
							<select id="select_kps" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="Ya">YA</option>
								<option value="TIDAK">TIDAK</option>
							</select>
							<label>Penerima KPS</label>
						</div>
						<div class="input-field col s4">
							<input 	
							name 			=	"kps" 
							placeholder 	=	"020012345678"
							id 				=	"kps" 
							type 			=	"number" 
							class 			 = 	"validate" 	
							oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"	
							maxlength 		= "6 " 
							data-error 		 =	".errorTxt23" disabled>
							<div class="errorTxt23"></div>	
						</div>
					</div>	

					<!-- TINGGI & BERAT BADAN -->
					<h6>Informasi Tambahan</h6>
					<div class="row">
						<div class="input-field col s4">
							<input 	name 			=	"tinggi_badan" 
							placeholder 	=	"175" 
							id 				= 	"tinggi_badan" 
							type 			=	"number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt24">											
							<label for="tinggi_badan">Tinggi Badan (CM)*</label>
							<div class="errorTxt24"></div>	
						</div>
						<div class="input-field col s4">
							<input 	name 			=	"berat_badan" 
							placeholder 	=	"45" 
							id 				=	"berat_badan" 
							type 			=	"number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt25">	
							<label for="berat_badan">Berat Badan (KG)*</label>
							<div class="errorTxt25"></div>	
						</div>
					</div>

					<!-- Jarak & Waktu Tempuh Ke Sekolah -->
					<div class="row">
						<div class="input-field col s4">
							<input 	name 			=	"jarak_tempuh" 
							placeholder 	=	"2" 
							id 				=	"jarak_tempuh" 
							type 			=	"number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt26">	
							<label for="jarak_tempuh">Jarak Tempuh ke Sekolah (KM)*</label>
							<div class="errorTxt26"></div>
						</div>
						<div class="input-field col s4">
							<input 	name 			=	"waktu_tempuh" 
							placeholder 	=	"35" 
							id 	 			= 	"waktu_tempuh" 
							type 			=	"number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt27">	
							<label for="waktu_tempuh">Waktu Tempuh ke Sekolah (MENIT)*</label>
							<div class="errorTxt27"></div>
						</div>
					</div>

					<!-- JUMLAH SAUDARA DAN ANAK KE -->
					<div class="row">
						<div class="input-field col s4">
							<input 	name 			=	"jml_saudara" 
							placeholder 	= 	"4" 
							id 				=	"jml_saudara" 
							type 			=	"number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt28">	
							<label for="jml_saudara">Jumlah Saudara Kandung*</label>
							<div class="errorTxt28"></div>
						</div>
						<div class="input-field col s4">
							<input 	name 			=	"anak_ke"
							placeholder 	= 	"2" 
							id 				=	"anak_ke" 
							type 			=	"number"
							class 			=	"validate" 
							required 		=	"" 
							aria-required 	=	"true"
							data-error 		=	".errorTxt29">	
							<label for="anak_ke">Anak ke*</label>
							<div class="errorTxt29"></div>
						</div>
					</div>

					<!-- Prestasi & Hobi -->
					<div class="row">
						<div class="input-field col s6">
							<textarea 
							name 			=	"hobi" 
							id 				=	"hobi" 
							placeholder 	=	"Bermain, Menyanyi" 
							class 			=	"materialize-textarea"></textarea>
							<label for="hobi">Hobi</label>
						</div>
					</div>

					<h6>Prestasi</h6>
					<!--<div class="row">
						<div class="input-field col s3">

							<select class="icons" name="select_jml_prestasi" id="select_jml_prestasi" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
							<label for="select_jml_prestasi">Banyak Prestasi</label>
						</div>
					</div>-->



					<div class="row" id="prestasi1" style="display: block">
						<div class="input-field col s2">
							<select class="icons" name="select_tingkat_prestasi1" id="select_tingkat_prestasi1">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="1">Nasional</option>
								<option value="2">Provinsi</option>
								<option value="3">Kabupaten</option>
							</select>
							<label for="select_tingkat_prestasi1">Tingkat Prestasi</label>
						</div>
						<div class="input-field col s2">
							<select class="icons" name="select_peringkat_juara1" id="select_peringkat_juara1">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="1">Juara I</option>
								<option value="2">Juara II</option>
								<option value="3">Juara III</option>
							</select>
							<label for="select_peringkat_juara1">Peringkat / Juara</label>
						</div>
						<div class="input-field col s4">
							<input
							name 			=	"prestasi_ket1" 
							id 				=	"prestasi_ket1" 
							type			= 	"text"
							placeholder 	=	"Juara 1 Makan Kerupuk 17 an" 
							class 			=	"materialize-textarea"></textarea>
							<label for="prestasi">Keterangan Juara</label>
						</div>
						<a class='btn-floating btn-small tooltipped green darken-2' name="addPrestasi" data-position='top' data-delay='50' data-tooltip='Tambah Prestasi'>
							<i class='material-icons'>add</i>
						</a>
					</div>

					<input type="hidden" name="jmlPrestasi" id="jmlPrestasi" value="1">

					<!--<div class="row" id="prestasi2" style="display: none;">
						<div class="input-field col s2">
							<select class="icons" name="select_tingkat_prestasi2" id="select_tingkat_prestasi2" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="1">Nasional</option>
								<option value="2">Provinsi</option>
								<option value="3">Kabupaten</option>
							</select>
							<label for="select_tingkat_prestasi2">Tingkat Prestasi</label>
						</div>
						<div class="input-field col s2">
							<select class="icons" name="select_peringkat_juara2" id="select_peringkat_juara2" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="1">Juara I</option>
								<option value="2">Juara II</option>
								<option value="3">Juara III</option>
							</select>
							<label for="select_peringkat_juara2">Peringkat / Juara</label>
						</div>
						<div class="input-field col s4">
							<input
							name 			=	"prestasi_ket2" 
							id 				=	"prestasi_ket2" 
							type			= 	"text"
							placeholder 	=	"Juara 1 Makan Kerupuk 17 an" 
							class 			=	"materialize-textarea"></textarea>
							<label for="prestasi">Keterangan Juara</label>
						</div>
					</div>

					<div class="row" id="prestasi3" style="display: none;">
						<div class="input-field col s2">
							<select class="icons" name="select_tingkat_prestasi3" id="select_tingkat_prestasi3" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="1">Nasional</option>
								<option value="2">Provinsi</option>
								<option value="3">Kabupaten</option>
							</select>
							<label for="select_tingkat_prestasi3">Tingkat Prestasi</label>
						</div>
						<div class="input-field col s2">
							<select class="icons" name="select_peringkat_juara3" id="select_peringkat_juara3" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="1">Juara I</option>
								<option value="2">Juara II</option>
								<option value="3">Juara III</option>
							</select>
							<label for="select_peringkat_juara3">Peringkat / Juara</label>
						</div>
						<div class="input-field col s4">
							<input
							name 			=	"prestasi_ket3" 
							id 				=	"prestasi_ket3" 
							type			= 	"text"
							placeholder 	=	"Juara 1 Makan Kerupuk 17 an" 
							class 			=	"materialize-textarea"></textarea>
							<label for="prestasi">Keterangan Juara</label>
						</div>
					</div>-->

					<br><br>

					<h6>Sertifikat Bahasa Inggris</h6>
					<div class="row">
						<div class="input-field col s3">
							<select class="icons" name="select_memiliki_sertifikat" id="select_memiliki_sertifikat" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="1">Ya</option>
								<option value="0">Tidak</option>
							</select>
							<label for="select_memiliki_sertifikat">Memiliki Sertifikat Bahasa Inggris</label>
						</div>
					</div>

					<div class="row" id="sertifikat_inggris" style="display: none;">
						<div class="input-field col s2">
							<select class="icons" name="select_jenjang_sertifikat" id="select_jenjang_sertifikat" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="1">Lanjut (<i>Expand</i>)</option>
								<option value="2">Menengang (<i>Intermediate</i>)</option>
								<option value="3">Dasar (<i>Elementary</i>)</option>
							</select>
							<label for="prestasi">Tingkat Prestasi</label>
						</div>
						<div class="input-field col s4">
							<input
							name 			=	"ket_sertifikat" 
							id 				=	"ket_sertifikat" 
							type			= 	"text"
							placeholder 	=	"Sertifikat Inggris" 
							class 			=	"materialize-textarea"></textarea>
							<label for="prestasi">Keterangan Sertifikat</label>
						</div>
					</div>

					<br>

					<div class="divider"></div><br>
					<h5>Data Orang Tua / Wali</h5><br>
					<!-- DATA ORANG TUA / WALI -->

					<div class="row">
						<div class="input-field col s3">
							<select name="select_orgtua" id="select_orgtua" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="OrgTua">Ayah / Ibu</option>
								<option value="Wali">Wali</option>
							</select>
							<label for="select_orgtua">Data Orang Tua / Wali*</label>
						</div>
					</div>
					<div id="dataorgtua" style="display: none;">

						<h6>Data Ayah</h6><br>
						<!-- Data Ayah -->
						<div class="row">
							<div class="input-field col s4">
								<input name="nama_ayah" placeholder="Budi Sumarso" id="nama_ayah" type="text">
								<label for="nama_ayah">Nama Ayah</label>
							</div>
							<div class="input-field col s4">
								<select name="tahun_lahir_ayah" id="tahun_lahir_ayah">
									<option value="" disabled selected>Pilih salah satu</option>
									<?php 
									for ($i=1960; $i <= 2017; $i++) { 
										echo "<option value='".$i."'>".$i."</option>";
									}
									?>
								</select>
								<label for="select_orgtua">Tahun Lahir Ayah</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s4">
								<input name="pekerjaan_ayah" placeholder="Guru" id="pekerjaan_ayah" type="text">
								<label for="pekerjaan_ayah">Pekerjaan Ayah</label>
							</div>
							<div class="input-field col s4">
								<input name="pendidikan_ayah" placeholder="SMA" id="pendidikan_ayah" type="text">
								<label for="pendidikan_ayah">Pendidikan Terakhir Ayah</label>
							</div>
						</div>

						<br>


						<h6>Data Ibu</h6><br>
						<!-- Data Ibu -->
						<div class="row">
							<div class="input-field col s4">
								<input name="nama_ibu" placeholder="Siti Homina" id="nama_ibu" type="text">
								<label for="nama_ibu">Nama Ibu</label>
							</div>
							<div class="input-field col s4">
								<select name="tahun_lahir_ibu" id="tahun_lahir_ibu">
									<option value="" disabled selected>Pilih salah satu</option>
									<?php 
									for ($i=1960; $i <= 2017; $i++) { 
										echo "<option value='".$i."'>".$i."</option>";
									}
									?>
								</select>
								<label for="select_orgtua">Tahun Lahir Ibu</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s4">
								<input name="pekerjaan_ibu" placeholder="PNS" id="pekerjaan_ibu" type="text">
								<label for="pekerjaan_ibu">Pekerjaan Ibu</label>
							</div>
							<div class="input-field col s4">
								<input name="pendidikan_ibu" placeholder="S1" id="pendidikan_ibu" type="text">
								<label for="pendidikan_ibu">Pendidikan Terakhir Ibu</label>
							</div>
						</div>

						<br>
					</div>

					<div id="datawali" style="display: none;">									
						<h6>Data Wali</h6><br>
						<!-- Data Wali -->
						<div class="row">
							<div class="input-field col s4">
								<input name="nama_wali" placeholder="Budi Santoso" id="nama_wali" type="text">
								<label for="nama_wali">Nama Wali</label>
							</div>
							<div class="input-field col s4">
								<select name="tahun_lahir_wali" id="tahun_lahir_wali">
									<option value="" disabled selected>Pilih salah satu</option>
									<?php 
									for ($i=1960; $i <= 2017; $i++) { 
										echo "<option value='".$i."'>".$i."</option>";
									}
									?>
								</select>
								<label for="select_orgtua">Tahun Lahir Wali</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s4">
								<input name="pekerjaan_wali" placeholder="Buruh" id="pekerjaan_wali" type="text">
								<label for="pekerjaan_wali">Pekerjaan Wali</label>
							</div>
							<div class="input-field col s4">
								<input name="pendidikan_wali" placeholder="SMP" id="pendidikan_wali" type="text">
								<label for="pendidikan_wali">Pendidikan Terakhir Wali</label>
							</div>
						</div>

					</div>




					<br><div class="divider"></div><br>
					<h5>Jurusan</h5><br>

					<div class="row"> 
						<div class="input-field col s12 m6">
							<select class="icons" name="select_jurusan" id="select_jurusan" required="required">
								<option value="" disabled selected>Pilih salah satu</option>
								<option value="0">Teknik Audio Video</option>
								<option value="1">Teknik Kendaraan Ringan</option>
								<option value="2">Teknik Komputer Jaringan</option>
								<option value="3">Teknik Alat Berat</option>
							</select>
							<label>Jurusan yang ingin dipilih*</label>
						</div>
					</div>

					<div class="divider"></div><br>

					<h5>Foto</h5><br>

					<div class="file-field input-field" style="width: 75%;">
						<div class="btn green darken-3">
							<span>File</span>
							<input type="file" accept=".gif,.jpg,.png,.jpeg" name="foto" required="" class="validate" data-error 		=	".errorTxtFile">
						</div>
						
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Masukkan foto anda.">
						</div><br>
						<div class="errorTxtFile"></div>
					</div>

					<br><div class="divider"></div><br>

					<label class="left">
						<b class='red-text text-darken-2'>
							<?php if(isset($error)){echo $error;} ?>
						</b>
					</label>

					<?php if(isset($error)){echo "<br/>";} ?>

					<div class="row center">
						<div class="row">
							<div class="input-field col s12">
								<button class="btn cyan waves-effect green darken-3" type="submit" name="action">Submit</button>
							</div>
						</div>
					</div>

				</form>
				<!-- Pendaftaran Aktif Page -->		
			<?php else: ?>
				<!-- Pendaftaran Tidak Aktif Page -->		
				<center><h3>Jadwal Pendaftaran</h3><br></center>
				<p>
					Sesi pendaftaran belum aktif, waktu pendaftaran akan dibuka pada tanggal:<br><br>
					<b><i><?= $jadwal_pendaftaran->tanggal_mulai ?></i></b> &emsp;-&emsp; <b><i><?= $jadwal_pendaftaran->tanggal_terakhir ?></i></b><br><br> Pada pukul <b><i><?= $waktu_pendaftaran ?> WIB</i></b>.
				</p><br>
				<!-- Pendaftaran Tidak Aktif Page -->	
			<?php endif; ?>
		</div>
		<!-- Pendaftaran Page -->
	<?php endif; ?>
</main>
<br><br>

<style type="text/css">
.input-field div.error{
	position: relative;
	top: -1rem;
	float: right;
	font-size: 0.8rem;
	color:#FF4081;
	-webkit-transform: translateY(0%);
	-ms-transform: translateY(0%);
	-o-transform: translateY(0%);
	transform: translateY(0%);
}
.input-field .prefix.active {
	color: green !important;
}

.row .input-field input:focus {
	border-bottom: 1px solid green !important;
	box-shadow: 0 1px 0 0 green !important
}

div.error{
	position: relative;
	top: -1rem;
	float: right;
	font-size: 0.8rem;
	color:#FF4081;
	-webkit-transform: translateY(0%);
	-ms-transform: translateY(0%);
	-o-transform: translateY(0%);
	transform: translateY(0%);
}

</style>