<br><br>
<center>
	<div class="container" style="padding-right: 100px; padding-left: 100px;">
		<div class="card-panel z-depth-3">
			<?php if($status == "sukses"): ?>
				<h3 class="center">Sukses!</h3>
				<p class="flow-text">
					Berhasil menambah user <b><i><?= $uname; ?></i></b>. Dengan detail sebagai berikut: <br>
					Email: <b><i><?= $email; ?></b></i><br>
					Pin: <b><i><?= $pin; ?></b></i><br>
				</p>
				<div class="row center">
					<a class="waves-effect waves-light btn green darken-3" href="<?= base_url('dashboard/adduser'); ?>">Back</a>
				</div>
			<?php elseif($status == "gagal"): ?>
				<h3 class="center">Gagal :(</h3>
				<p class="flow-text">
					<?php if(isset($error)){echo $error;} ?>
					<!--Gagal menambahkan user <b><i><?= $uname; ?></i></b>.<br>-->
				</p>
				<div class="row center">
					<a class="waves-effect waves-light btn green darken-3" href="<?= base_url('dashboard/adduser'); ?>">Coba lagi</a>
				</div>
			<?php else: ?>
				<form method="post" id="formValidate" action="<?php echo base_url('/dashboard/add_user');?>" novalidate="novalidate">
					<!--<img class="responsive-ig" src="http://3.bp.blogspot.com/-t1IYXxFBkGQ/VqQ-X-LdlcI/AAAAAAAAAC4/0H6834-RoVs/s200/logomf%2Bsmk.jpg"" style="height: 120px;">-->

					<h5>Add New User</h5>
					<br><br>
					<div class="divider"></div>
					<br>

					<div class='row s12' style="padding-right: 50px; padding-left: 50px;">
						<div class='input-field col s12'>
							<input class="validate" type='text' name='username' id='username' required="" aria-required="true" minlength="5" maxlength="12" data-error=".errorTxt1"/>
							<label for='username'>Username*</label>
							<div class="errorTxt1"></div>
						</div>
						<div class='input-field col s12'>
							<input class='validate' type='email' name='email' id='email' required="" aria-required="true" data-error=".errorTxt2"/>
							<label for='email'>Email*</label>
							<div class="errorTxt2"></div>
						</div>
						<div class='input-field col s12'>
							<input class='validate' type='number' name='pin' id='pin' required="" aria-required="true" min="1000" max="9999" data-error=".errorTxt3"/>
							<label for='pin'>Pin*</label>
							<div class="errorTxt3"></div>
						</div>
						<div class='input-field col s12'>
							<input class='validate' type='password' name='password' id='password' required="" aria-required="true" minlength="6" maxlength="12" data-error=".errorTxt4"/>
							<label for='password'>Password*</label>
							<div class="errorTxt4"></div><br>
						</div>
					</div>

					<br>
					<div class="divider"></div>
					<br>

					<div class="row center">
						<div class="input-field col s12">
							<button class="btn cyan waves-effect green darken-3" type="submit" name="add">Add</button>
						</div>
					</div>
				</form>
			<?php endif; ?>
		</div>
	</div>
</div>

</center>
<br>

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
</style>