<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Terms And Conditions|CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/content.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="<?php if(isset($_SESSION['userData']['loggedIn'])){ echo base_url('assets/css/components/header.css'); } else { echo base_url('/assets/css/components/logged-out-header.css'); }  ?>" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
	
	<script type="text/javascript">
	if (screen.width <= 800) { window.location.replace("http://m.campuspuppy.com/terms-and-conditions"); }
	</script>
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
	<div class="layout-container flex flex--col">
		<?php if(isset($_SESSION['userData']['loggedIn'])){ echo $header; } else { echo $headerLogin; } ?>
		<main class="flex main-container globalContainer" style="margin-top: 10px;">
			<div class="main-body flex__item">
				<div class="card">
					<h1 style="font-size: 1rem; text-transform: uppercase; text-align: left; margin-top: 0;"><b>Terms And Conditions</b></h1>
					<?php echo $terms[0]['termsAndConditions']; ?>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<div class="post card">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- CampusPuppy -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-2273757004475004"
					     data-ad-slot="7062717170"
					     data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</aside>
		</main>
		<?php echo $footer; ?>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script>
		$(document).ready(function () {
			$(document).on('click', '.js-forgot-password', openForgotPsswdModal);
			function openForgotPsswdModal(ev) {
				var modal = $('[data-remodal-id="forgotPassword"]').remodal();
				modal.open();
			}
		});
	</script>
</body>

</html>
