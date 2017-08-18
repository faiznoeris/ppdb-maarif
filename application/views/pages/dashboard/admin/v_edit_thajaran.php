

<br><br><br><br>
<!-- Pendaftaran Page -->
<div class="container white s12 m12 l6 z-depth-2"  style=" padding: 32px 88px 10px 30px; width: 1000px;">
	<!-- add tahun ajaran	-->

	<h5>Masukkan Tanggal Pembukaan dan penutupan Pendaftaran</h5>
	<form id="formValidate" method="post" action="<?php echo base_url('pengaturan/edittahunAjaran/'.$data_thajaran->id_tahun);?>">
		<h6 >Anda akan menambahkan jadwal untuk tahun ajaran <u><b><i><?= $data_thajaran->tahun ?></i></b></u></h6><br><br>
		<div class="row">
			<div class="input-field col s3">
				<select name="select_status">
					<?php if($data_thajaran->status == "nonaktif"): ?>
						<option value="aktif">Aktif</option>
						<option value="nonaktif" selected="">Non Aktif</option>
					<?php else: ?>
						<option value="aktif" selected="">Aktif</option>
						<option value="nonaktif">Non Aktif</option>
					<?php endif; ?>
				</select>
				<label>Status</label>
			</div>
		</div>
		<div class="row">
			<div class="col s3">
				<label for="tgl_mulai">Tanggal pembukaan Pendaftaran</label>
				<input 	name 			=	"tgl_mulai" 
				type 			=	"date" 
				class 			=	"datepicker"
				class 			=	"validate" 
				
				placeholder 	= 	"<?= $data_thajaran->tgl_pendaftaran ?>" 
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
				
				placeholder 	= 	"<?= $data_thajaran->tgl_terakhir ?>" 
				aria-required 	=	"true"
				data-error 		=	".errorTxt15">

				<div class="errorTxt15	"></div>	
			</div>
			<div class="col s3">
				<label for="tgl_mulai">Waktu Mulai Pendaftaran</label>
				<input name="waktu_mulai" required="" class="timepicker" type="text" placeholder = "<?= substr($data_thajaran->waktu_pendaftaran, 0, 5); ?>" />
			</div>

			<div class="col s3">
				<label for="tgl_mulai">Waktu Selesai Pendaftaran</label>
				<input name="waktu_selesai" required=""  class="timepicker" type="text" placeholder = "<?= substr($data_thajaran->waktu_pendaftaran, 8, 14); ?>"/>

			</div>

		</div>
		<div class="row center">
			<div class="row">
				<div class="input-field col s12">
					<button class="btn cyan waves-effect green darken-3" type="submit" name="action">SAVE</button>
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