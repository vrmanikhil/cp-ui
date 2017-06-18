<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us|CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/contact.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<div class="main-body flex__item">
				<div class="card">
					<h1 style="font-size: 1rem; text-transform: uppercase; text-align: left; margin-top: 0;">We'd Love to Hear from You</h1>
					<label style="font-size: 0.75rem; text-transform: uppercase; font-weight:bold;">Reach Us</label>
					<p style="font-size: 0.75rem; margin-top:10px;"><strong>Mobile: </strong> +91-7503705892</p>
					<p style="font-size: 0.75rem; margin-top:10px;"><strong>E-Mail: </strong> hello@campuspuppy.com</p>
					<p style="font-size: 0.75rem; margin-top:10px;"><strong>Registered Address: </strong> Campus Puppy Private Limited, TBI, Shriram Institute of Industrial Research, 19, University Road, New Delhi</p>
					<p style="font-size: 0.75rem; margin-top:10px;"><strong>Office Address: </strong> Campus Puppy Private Limited, TBI, Shriram Institute of Industrial Research, 19, University Road, New Delhi</p>
				</div>


				<form class="contact-us__form form" method="post" action="<?php echo base_url('web/contactUs'); ?>">
					<label style="font-size: 0.75rem; text-transform: uppercase; font-weight:bold;">Drop Us a Message</label><br>

				<label for="name" class="form__label">Name</label>
				<input type="text" id="name" name="name" placeholder="Name" class="form__input" required>

				<div class="flex">
					<div class="form-group">
						<label for="email" class="form__label">E-Mail Address</label>
						<input type="email" id="email" name="email" placeholder="E-Mail Address" class="form__input" required>
					</div>
					<div class="form-group">
						<label for="mobile" class="form__label">Mobile Number</label>
						<input type="text" id="mobile" name="mobile" placeholder="Mobile Number" class="form__input" required>
					</div>
				</div>

				<label for="message" class="form__label">Message</label>
				<textarea id="message" name="message" placeholder="Message" class="form__input" required></textarea>

				<input type="submit" value="Contact Us" class="btn btn--primary contact-us__form-submit">
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
