<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
if( ! isset($CI))
{
	$CI = new CI_Controller();
}
$CI->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


	<link href="<?php echo base_url('/asset/materialize/css/custom-style.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/asset/materialize/css/materialize.css');?>" rel="stylesheet" media="screen,projection">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<title>Database Error</title>
</head>
<body class="red">

	<main>
		<div class="container" style="top: 50%; left: 50%; margin-bottom: 100px;margin-top: 100px;">
			<center>
				<div class="row s12 z-depth-2 red darken-2" style="padding: 32px 48px 32px 48px; width: 1000px;">
					<center>
						<i class="material-icons" style="font-size: 80px; color: rgba(255, 255, 255, 1);">error</i>
						<h3 class="white-text">
							
							<?php echo $heading; ?>
						</h3>
						<?php echo $message; ?>
					</center>
				</div>
			</center>
		</div>
	</main>
	<!--<footer class="page-footer green darken-3">
		<div class="footer-copyright green darken-3">
			<div class="container green darken-3" style="margin-bottom: 15px;">
				<span style="display:table;margin:0 auto;">Copyright © 2017 
					(
					<a class="grey-text text-lighten-4" href="https://www.facebook.com/faiz.noeris" target="_blank">Faiz Noeris </a>
					-
					<a class="grey-text text-lighten-4" href="https://www.facebook.com/inuyasha.asya" target="_blank">Asfan Syaiful</a> 
					)
				</span>
			</div>
		</div>
	</footer>-->
</body>
</html>