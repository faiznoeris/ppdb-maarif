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


	<link href="<?php echo base_url('/asset/asset/materialize/css/custom-style.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/asset/materialize/css/materialize.css');?>" rel="stylesheet" media="screen,projection">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<title>Error</title>
</head>
<body class="red">
	<header>
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper green darken-3">
					<a href="<?= base_url(''); ?>" class="brand-logo"><img style="height: 60px; width: 70px; float: left; padding-right: 10px;"src="http://3.bp.blogspot.com/-t1IYXxFBkGQ/VqQ-X-LdlcI/AAAAAAAAAC4/0H6834-RoVs/s200/logomf%2Bsmk.jpg">SMK Ma'arif NU 1 Sumpiuh</i></a>
				</div>
			</nav>
		</div>
	</header>
	<main>
		<div class="container" style="top: 50%; left: 50%; margin-top: 100px; margin-bottom: 100px;">
			<center>
				<div class="row s12 z-depth-2 red darken-2" style="padding: 32px 48px 32px 48px; width: 600px;">
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
	<footer class="page-footer green darken-3">
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
	</footer>
</body>
</html>