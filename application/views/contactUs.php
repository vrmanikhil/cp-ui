<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us|CampusPuppy</title>
	<link href="/assets/css/about.css" rel="stylesheet">
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
					<label style="font-size: 0.75rem; text-transform: uppercase; font-weight:bold;">Contact Us</label>
					<p style="font-size: 0.75rem; margin-top:10px;"><strong>Mobile: </strong> +91-7503705892</p>
					<p style="font-size: 0.75rem; margin-top:10px;"><strong>E-Mail: </strong> hello@campuspuppy.com</p>
					<p style="font-size: 0.75rem; margin-top:10px;"><strong>Address: </strong> Campus Puppy Private Limited, TBI, Shriram Institute of Industrial Research, 19, University Road, New Delhi</p>
				</div>
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
