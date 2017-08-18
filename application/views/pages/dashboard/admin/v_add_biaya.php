

<br><br><br><br>
<!-- Pendaftaran Page -->
<div class="container white s12 m12 l6 z-depth-2"  style=" padding: 32px 88px 10px 30px; width: 1000px;">
	<!-- add tahun ajaran	-->

	<h5>Masukkan Uraian dan Nominal Pembayaran</h5>
	<form id="formValidate" method="post" action="<?php echo base_url('pengaturan/addbiaya/');?>">
		<h6 >Anda akan menambahkan rincian administrasi keuangan calon siswa baru.</h6><br><br>
		<div class="row">
			<div class="col s6">
				<label for="uraianbiaya">Uraian Pembayaran</label>
				<input 	
				name 			=	"uraian" 
				type 			=	"text"
				class 			=	"validate" 
				required 		=	"" 
				aria-required 	=	"true"
				data-error 		=	".errorTxt15">
				
				<div class="errorTxt15	"></div>	
			</div>
			<div class="col s6">
				<label for="nominal">Nominal (RP)</label>
				<input 
				name 			=	"nominal" 
				type 			=	"number"
				required 		=	"" 
				aria-required 	=	"true"
				data-error 		=	".errorTxt16">

				<div class="errorTxt16"></div>	
			</div>
			<div class="col s6">
				<label for="tahunajaran">Tahun Ajaran</label>
				<select name="tahun" required="required">
					<option value="" disabled selected>Pilih salah satu</option>
					<?php
					foreach ($daftar_thajaran as $k){
						echo "<option value='$k->id_tahun'>$k->tahun</option>";
					}
					?>
				</select>	
			</div>
			<div class="col s6">
				<label for="jurusan">Jurusan</label>
				<select name="jurusan" required="required">
					<option value="" disabled selected>Pilih salah satu</option>
					<option value='tav'>TAV</option>
					<option value='tkr'>TKR</option>
					<option value='tkj'>TKJ</option>
					<option value='tab'>TAB</option>
				</select>	
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