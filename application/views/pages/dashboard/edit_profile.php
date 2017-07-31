 	<br><br><br>
 	<div class="container">
 		<center>
 			<div class="row s12 z-depth-1">
 				<div class="row s12" style="padding: 32px 48px 32px 48px;">
 					<form method="post" id="formValidate" action="<?php echo base_url('/profiles/updateprofile');?>" enctype='multipart/form-data'>
 						<div class="col s6">
 							<img src="<?= base_url($this->session->userdata('ava_path')) ?>" alt="" class="circle responsive z-depth-2" style="height: 110px; width: 110px; margin-top: 70px;"> 

 							<div class="file-field input-field" style="width: 75%;">
 								<div class="btn green darken-3">
 									<span>File</span>
 									<input type="file" accept=".gif,.jpg,.png,.jpeg" name="avatar">
 								</div>
 								<div class="file-path-wrapper">
 									<input class="file-path validate" type="text" placeholder="Upload avatar anda yang baru">
 								</div>
 							</div>
 						</div>

 						<div class="col s6">
 							<div class='input-field col s12'>
 								<input class="validate" placeholder="<?= $uname; ?>" type='text' name='username' id='username'  minlength="5" maxlength="12" data-error=".errorTxt1"/>
 								<label for='username'>Username</label>
 								<div class="errorTxt1"></div>
 							</div>
 							<div class='input-field col s12'>
 								<input class='validate' placeholder="<?= $email; ?>" type='email' name='email' id='email'  data-error=".errorTxt2"/>
 								<label for='email'>Email</label>
 								<div class="errorTxt2"></div>
 							</div>
 							<div class='input-field col s12'>
 								<input class='validate' placeholder="****" type='number' name='pin' id='pin'  min="1000" max="9999" data-error=".errorTxt3"/>
 								<label for='pin'>Pin</label>
 								<div class="errorTxt3"></div>
 							</div>
 							<div class='input-field col s12'>
 								<input class='validate' placeholder="********" type='password' name='password' id='password'  minlength="6" maxlength="12" data-error=".errorTxt4"/>
 								<label for='password'>Password</label>
 								<div class="errorTxt4"></div><br>
 							</div>
 						</div>

 						<center>
 							<label>
 								<b class='red-text text-darken-2'><?= $this->session->tempdata('error'); ?></b><br><br>
 							</label>
 							<button type='submit' name='btn_savechg' class='btn waves-effect green darken-3'>Save Changes</button>
 						</center>
 					</form>
 				</div>
 			</div>
 		</center>
 	</div>

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
