<br><br><br><br>
<div class="container white s12 m12 l6 z-depth-2"   style="padding: 32px 88px 0px 88px; width: 1000px;">
	<h5>Edit Jumlah Kuota Tiap Jurusan Untuk Tahun Ajaran <b><i><u><?= $data_kuota->tahun ?></u></i></b></h5><br><br>
	<form id="formValidate" method="post" action="<?php echo base_url('pengaturan/savekuota/'.$data_kuota->id_kuota);?>">
		<div class="row">
			<div class="col s3">
				<div class="row">
					<div class="col s12">
						Kuota TAV:
						<div class="input-field inline">
							<input 
							id            = "tav"
							name          = "tav" 
							type          = "number" 
							class         = "validate"
							placeholder   = "<?= $data_kuota->kuota_tav ?>" 
							data-error    = ".errorTxt1">

							<label for = "tav"></label>
							<div class="errorTxt1"></div>
						</div>
					</div>
				</div>
			</div>


			<div class="col s3">
				<div class="row">
					<div class="col s12">
						Kuota TKR:
						<div class="input-field inline">
							<input 
							id            = "tkr"
							name          = "tkr" 
							type          = "number" 
							class         = "validate"
							placeholder   = "<?= $data_kuota->kuota_tkr ?>" 
							data-error    = ".errorTxt2">

							<label for = "tkr"></label>
							<div class="errorTxt2"></div>
						</div>
					</div>
				</div>
			</div>


			<div class="col s3">
				<div class="row">
					<div class="col s12">
						Kuota TKJ:
						<div class="input-field inline">
							<input 
							id            = "tkj"
							name          = "tkj" 
							type          = "number" 
							class         = "validate"
							placeholder   = "<?= $data_kuota->kuota_tkj ?>" 
							data-error    = ".errorTxt3">

							<label for = "tkj"></label>
							<div class="errorTxt3"></div>
						</div>
					</div>
				</div>
			</div>


			<div class="col s3">
				<div class="row">
					<div class="col s12">
						Kuota TAB:
						<div class="input-field inline">
							<input 
							id            = "tab"
							name          = "tab" 
							type          = "number" 
							class         = "validate"
							placeholder   = "<?= $data_kuota->kuota_tab ?>" 
							data-error    = ".errorTxt4">

							<label for = "tab"></label>
							<div class="errorTxt4"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="row center">
				<div class="row">
					<div class="input-field col s12">
						<button class="btn cyan waves-effect green darken-3" type="submit" name="action">SAVE</button>
					</div>
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