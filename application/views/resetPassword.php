<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Password | CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/reset-password.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>

	<div class="layout-container flex flex--col">
		<?php echo $headerLogin; ?>
		<main class="flex main-container">
			<div class="globalContainer flex">
				<div class="main-body flex__item flex flex--col">
					<div class="reset-password-container">
						<h2>Reset Password</h2>
						<form class="form" action="<?php echo base_url('web/resetPassword'); ?>" method="post">
							<div class="form-group">
								<label for="new-passowrd" class="form__label">New password</label>
								<input type="password" id="newPassword" name="newPassword" placeholder="New Password" class="form__input">
							</div>
							<div class="from-group">
								<label for="confirmNewPassword">Confirm New Password</label>
								<input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New Password" class="form__input">
								<div class="resend-link">
									<a href="javascript:">Resend Link</a>
								</div>
							</div>
							<input type="hidden" name="email" value="<?php echo $this->input->get('email'); ?>">
							<input type="hidden" name="token" value="<?php echo $this->input->get('token'); ?>">
							<div class="form-group">
								<input type="submit" value="Reset Password" class="btn btn--primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php echo $footer; ?>
	</div>

	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
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
