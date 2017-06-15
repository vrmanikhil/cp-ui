<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us|CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/reset-password.css'); ?>" rel="stylesheet">
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
					<form class="change-password__form form" method="post" action="<?php echo base_url('web/resetPassword'); ?>">
					<label for="newPassword" class="form__label">New Password</label>
					<input type="password" id="newPassword" name="newPassword" placeholder="New Password" class="form__input">
					<label for="confirmNewPassword" class="form__label">Confirm New Password</label>
					<input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New Password" class="form__input">
					<input type="hidden" name="email" value="<?php echo $this->input->get('email'); ?>">
					<input type="hidden" name="token" value="<?php echo $this->input->get('token'); ?>">
					<input type="submit" value="Reset Password" class="btn btn--primary change-password__form-submit">
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
