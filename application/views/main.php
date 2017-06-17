<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="/assets/css/landing-page.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>

	<div class="layout-container flex flex--col">
		<header class="primary-header flex__item">
			<div class="globalContainer flex">
				<a href="<?php echo base_url(); ?>" class="flex__item">
					<img alt="logo" src="<?php echo base_url('/assets/img/logo-white.png'); ?>" class="logo">
				</a>
				<div class="login-form-container flex">
					<form method="post" action="<?php echo base_url('web/doLogin'); ?>" class="flex login-form form">
						<div class="form-group">
							<label class="form__label" for="email">Email</label>
							<input type="email" id="email" required name="email" class="form__input form__input--tiny" placeholder="E-Mail Address">
						</div>
						<div class="form-group">
							<label class="form__label" for="password">Password</label>
							<input type="password" id="password" required class="form__input form__input--tiny" name="password" placeholder="Password">
							<a href="javascript:" class="forgot-psswd js-forgot-password">Forgot password</a>
						</div>
						<div class="from-group flex">
							<button type="submit" class="btn btn--primary">LOGIN</button>
						</div>
					</form>
				</div>
			</div>
		</header>
		<main class="main-container flex">
			<div class="globalContainer flex main-body">
				<div class="flex__item register-form-container">
					<h2>Register</h2>
					<form method="post" class="form register-form" action="<?php echo base_url('web/register'); ?>">
						<div class="form-group">
							<label for="name" class="form__label">Name</label>
							<input type="text" id="name" class="form__input" name="name" placeholder="Full Name" required>
						</div>
						<div class="form-group">
							<label for="register-email" class="form__label">Email</label>
							<input type="email" class="form__input" id="register-email" name="email" placeholder="E-Mail Address" required>
						</div>
						<div class="form-group">
							<label for="mobile-number" class="form__label">Mobile Number</label>
							<input type="text" class="form__input" id="mobile-number" name="mobile" placeholder="Mobile Number" maxlength="10" required>
						</div>
						<div class="form-group">
							<label for="register-password" class="form__label">Password</label>
							<input type="password" id="register-password" class="form__input" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label for="accountType">Are you an Employer ?</label>
							<select class="select" name="accountType">
								<option value="1">No</option>
								<option value="2">Yes</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" value="Register" class="btn btn--primary">
						</div>
					</form>
				</div>
			</div>
		</main>
		<?php echo $footer; ?>
	</div>
	<div class="remodal forgot-psswd-modal" data-remodal-id="modal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<div class="forgot-psswd-form-container">
				<h2>Forgot your password ?</h2>
				<form method="post" class="form forgot-psswd-form" action="">
					<div class="form-group">
						<label for="forgot-psswd-email" class="form__label">Email Address</label>
						<input type="email" class="form__input" id="forgot-psswd-email" name="email" placeholder="E-Mail Address" required>
					</div>
					<div class="form-group">
						<input type="submit" value="Send Me Instructions" class="btn btn--primary">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script>
		$(document).ready(function () {
			$(document).on('click', '.js-forgot-password', openForgotPsswdModal);
			function openForgotPsswdModal(ev) {
				var modal = $('[data-remodal-id="modal"]').remodal();
				modal.open();
			}
		});
	</script>
</body>
</html>
