

<br><br><br><br>
<!-- Pendaftaran Page -->
<div class="container white s12 m12 l6 z-depth-2"  style=" padding: 32px 88px 10px 30px; width: 1000px;">
	<!-- add tahun ajaran	-->

	<h5>Masukkan Tanggal Pembukaan dan penutupan Pendaftaran</h5>
	<form id="formValidate" method="post" action="<?php echo base_url('pengaturan/addtahunAjaran/');?>">
		<?php
		$date_skrng		=	date('Y');
		$date_dulu		=	date('Y')-1;
		$date 			= 	$date_dulu."/".$date_skrng;
		?>
		<h6 >Anda akan menambahkan jadwal untuk tahun ajaran <u><b><i><?= $date ?></i></b></u></h6><br><br>
		<div class="row">
			<div class="col s3">
				<label for="tgl_mulai">Tanggal pembukaan Pendaftaran</label>
				<input 	name 			=	"tgl_mulai" 
				type 			=	"date" 
				class 			=	"datepicker"
				class 			=	"validate" 
				required 		=	"" 
				aria-required 	=	"true"
				data-error 		=	".errorTxt15">
				
				<div class="errorTxt15	"></div>	
			</div>
			<div class="col s3">
				<label for="tgl_akhir">Tanggal Terakkhir Pendaftaran</label>
				<input 	name 			=	"tgl_akhir" 
				type 			=	"date" 
				class 			=	"datepicker"
				class 			=	"validate" 
				required 		=	"" 
				aria-required 	=	"true"
				data-error 		=	".errorTxt15">

				<div class="errorTxt15	"></div>	
			</div>
			<div class="col s3">
				<label for="tgl_mulai">Waktu Mulai Pendaftaran</label>
				<input name 			=	"waktu_mulai" class="timepicker" type="text" />
			</div>

			<div class="col s3">
				<label for="tgl_mulai">Waktu Selesai Pendaftaran</label>
				<input name="waktu_selesai" class="timepicker" type="text" />

			</div>

		</div>
		<div class="row center">
			<div class="row">
				<div class="input-field col s12">
					<button class="btn cyan waves-effect green darken-3" type="submit" name="action">ADD</button>
				</div>
			</div>
		</div>

	</form>
</div>
<!-- Pendaftaran Page -->


<style type="text/css">
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
.prefix.active {
	color: green !important;
}

.row .input-field input:focus {
	border-bottom: 1px solid green !important;
	box-shadow: 0 1px 0 0 green !important
}
</style>