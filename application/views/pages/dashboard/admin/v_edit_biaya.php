

<br><br><br><br>
<!-- Pendaftaran Page -->
<div class="container white s12 m12 l6 z-depth-2"  style=" padding: 32px 88px 10px 30px; width: 1000px;">
	<!-- add tahun ajaran	-->

	<h5>Edit Rincian Biaya Untuk Jurusan <u><b><i><?= $jurusan ?></i></b></u> Tahun Ajaran <u><b><i><?= $thajaran ?></i></b></u></h5><br><br>
	<form id="formValidate" method="post" action="<?php echo base_url('pengaturan/editbiaya/');?>">
		<!--<div class="row">
			<div class="col s6">
				<label for="tahunajaran">Tahun Ajaran</label>
				<select name="tahun">
					<?php
					foreach ($peng_tahun as $k){

						echo "<option value='$k->id_tahun'";
						echo $data_onebiaya->id_tahun==$k->id_tahun?'selected':'';        
						echo">$k->tahun</option>";
					}
					?>
				</select>	
			</div>
		</div>-->
		<?php 
		foreach ($data as $row) {
			?>
			<div class="row">
				<input type='hidden' name='id_biaya[]' value='<?= $row->id_biaya ?>'/>

				<div class="col s6">
					<label for="uraianbiaya">Uraian Pembayaran</label>
					<input 	
					name 			=	"uraian<?= $row->id_biaya ?>" 
					type 			=	"text"
					class 			=	"validate" 
					placeholder 	=	"<?php echo $row->uraian ?>" />
				</div>

				<div class="col s6">
					<label for="nominal">Nominal (RP)</label>
					<input 
					name 			=	"nominal<?= $row->id_biaya ?>" 
					type 			=	"number" 
					placeholder 	=	"<?php echo $row->nominal ?>" />
				</div>

			</div>

			<?php
		} 
		?>
		<div class="row center">
			<div class="row">
				<div class="input-field col s12">
					<button class="btn cyan waves-effect green darken-3" type="submit" name="action">SAVE</button>
				</div>
			</div>
		</div>
	</form>
</div>
<br><br>

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