<br><br>
<center>
	<div class="container">
		<div class="z-depth-3 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 450px;">
			<?php if($status == "sukses"): ?>
				<p class="flow-text">Password anda berhasil direset! Silahkan cek email anda di <b><i><?=$emailsent?></i></b> untuk melihat password yang baru, jangan lupa untuk mengganti password setelah login.</p>
				<div class="row center">
					<a class="waves-effect waves-light btn green darken-3" href="<?= base_url('login'); ?>">Back to login</a>
				</div>
				<br>
			<?php else: ?>
				<form class="col s12" method="post" id="formValidate" action="<?php echo base_url('/authentication/forgotpassword');?>">
					<br>
					<h5 style="font-weight: 600;">Forgot password</h5>
					<br>

					<div class="section"></div>

					<div class='row'>
						<div class='input-field col s12'>
							<input class="validate login" type='email' name='email' id='email' required="" aria-required="true" data-error=".errorTxt1"/>
							<label for='email'>Masukkin email</label>
							<div class="errorTxt1"></div>
						</div>
						<div class='input-field col s12'>
							<input class="validate login" type='number' name='pin' id='pin' required="" aria-required="true" maxLength="4" data-error=".errorTxt2"/>
							<label for='pin'>Masukkan pin</label>
							<div class="errorTxt2"></div><br>
						</div>
						<label class="left">
							<b class='red-text text-darken-2'><?php if(isset($error)){echo $error;} ?></b>
						</label>
					</div>

					<br />

					<center>
						<div class='row'>
							<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect green darken-3'>OK</button>
						</div>
					</center>
				</form>
			<?php endif; ?>
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

<!--
change error underline input
input:not([type]).invalid, input:not([type]):focus.invalid,
input[type=text].invalid,
input[type=text]:focus.invalid,
input[type=pin].invalid,
input[type=pin]:focus.invalid{
  border-bottom: 1px solid white;
  box-shadow: 0 1px 0 0 white;
}
-->