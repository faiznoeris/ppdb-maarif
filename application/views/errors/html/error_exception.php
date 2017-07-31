<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
if( ! isset($CI))
{
	$CI = new CI_Controller();
}
$CI->load->helper('url');
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


<link href="<?php echo base_url('/asset/materialize/css/custom-style.css');?>" rel="stylesheet">
<link href="<?php echo base_url('/asset/materialize/css/materialize.css');?>" rel="stylesheet" media="screen,projection">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body class="red">
	<div class="container" style="top: 50%; left: 50%; margin-top: 100px; margin-bottom: 100px;">
		<center>
			<div class="row s12 z-depth-2 red darken-2" style="padding: 32px 48px 32px 48px; width: 1000px;">
				<center>
					<i class="material-icons" style="font-size: 80px; color: rgba(255, 255, 255, 1);">error</i>
					<h3 class="white-text">An uncaught Exception was encountered</h3>

					<p>Type: <?php echo get_class($exception); ?></p>
					<p>Message: <?php echo $message; ?></p>
					<p>Filename: <?php echo $exception->getFile(); ?></p>
					<p>Line Number: <?php echo $exception->getLine(); ?></p>

					<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

						<p>Backtrace:</p>
						<?php foreach ($exception->getTrace() as $error): ?>

							<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

								<p style="margin-left:10px">
									File: <?php echo $error['file']; ?><br />
									Line: <?php echo $error['line']; ?><br />
									Function: <?php echo $error['function']; ?>
								</p>
							<?php endif ?>

						<?php endforeach ?>

					<?php endif ?>
				</center>
			</div>
		</center>
	</div>
</body>