<br><br>
<center>
	<div class="container">
		<div class="z-depth-3 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 450px;">
			<form class="col s12" method="post" id="formValidate" action="<?php echo base_url('/authentication/login');?>">
				<img class="responsive-img" src="http://3.bp.blogspot.com/-t1IYXxFBkGQ/VqQ-X-LdlcI/AAAAAAAAAC4/0H6834-RoVs/s200/logomf%2Bsmk.jpg"" style="height: 120px;">

				<div class="section"></div>

				<div class='row'>
					<div class='input-field col s12'>
						<i class="material-icons prefix">person</i>
						<input class="validate login" type='text' name='username' id='username' required="" aria-required="true" data-error=".errorTxt1"/>
						<label for='username'>Masukkan username Anda</label>
						<div class="errorTxt1"></div>
					</div>
					<div class='input-field col s12'>
						<i class="material-icons prefix">lock</i>
						<input class="validate login" type='password' name='password' id='password' required="" aria-required="true" data-error=".errorTxt2"/>
						<label for='password'>Masukkan password Anda</label>
						<div class="errorTxt2"></div><br>
					</div>
					<label class="left">
						<b class='red-text text-darken-2'><?php if(isset($error)){echo $error;} ?></b>
					</label>
					<label style='float: right;'>
						<a class='green-text text-lighten-2' href='<?= base_url('login/forgotpassword'); ?>'><b>Forgot Password?</b></a>
					</label>
				</div>

				<br />

				<center>
					<div class='row'>
						<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect green darken-3'>Login</button>
					</div>
				</center>
			</form>
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
input[type=password].invalid,
input[type=password]:focus.invalid{
  border-bottom: 1px solid white;
  box-shadow: 0 1px 0 0 white;
}
-->