<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us | CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="<?php if(isset($_SESSION['userData']['loggedIn'])){ echo base_url('assets/css/components/header.css'); } else { echo base_url('/assets/css/components/logged-out-header.css'); }  ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/contact.css'); ?>" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>

	<div class="layout-container flex flex--col">
		<?php if(isset($_SESSION['userData']['loggedIn'])){ echo $header; } else { echo $headerLogin; } ?>
		<main class="flex main-container globalContainer">
			<div class="main-body flex__item card">
				<h1 class="title">We'd Love to Hear from You</h1>
				<div class="flex">
					<div class="left">
						<p><strong>Reach Us</strong></p>
						<p><strong>Mobile : </strong> +91-7503705892</p>
						<p><strong>E-Mail : </strong> <a href="mailto:hello@campuspuppy.com">hello@campuspuppy.com</a></p>
						<address>
							<strong>Registered Office: </strong> Campus Puppy Private Limited, TBI, Shriram Institute of Industrial Research, 19, University Road, New Delhi
						</address>
						<address>
							<strong>Office Address: </strong><br>TBI, Shriram Institute of Industrial Research, 19, University Road, New Delhi
						</address>
					</div>
					<div class="right">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.329890203608!2d77.21116705498672!3d28.67977683109248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd6a1d2921af%3A0x570c5acc7d0f7853!2sPaharganj%2C+New+Delhi%2C+Delhi!5e0!3m2!1sen!2sin!4v1497776662365" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="contact-us__container">
					<p><strong>Drop Us a Message</strong></p>
					<form class="form" method="post" action="<?php echo base_url('web/contactUs'); ?>">
						<div class="horizontal-group">
							<div class="form-group">
								<label class="form__label" for="name">Name</label>
								<input type="text" id="name" name="name" placeholder="Name" class="form__input" required>
							</div>
							<div class="form-group">
								<label for="email" class="form__label">E-Mail Address</label>
								<input type="email" id="email" name="email" placeholder="E-Mail Address" class="form__input" required>
							</div>
							<div class="form-group">
								<label for="mobile" class="form__label">Mobile Number</label>
								<input type="text" id="mobile" name="mobile" placeholder="Mobile Number" class="form__input" required>
							</div>
						</div>
						<div class="form-group">
							<label for="message" class="form__label">Message</label>
						<textarea class="form__input" name="message" id="message" cols="30" rows="5"></textarea>
						</div>
						<div class="form__group">
							<input type="submit" value="Contact Us" class="btn btn--primary contact-us__form-submit">
						</div>
					</form>
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
</body>

</html>
