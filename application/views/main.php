<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
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
				<div class="login-from-container flex">
					<form method="post" action="<?php echo base_url('web/doLogin'); ?>" class="flex login-from form">
						<div class="form-group">
							<label class="form__label" for="email">Email</label>
							<input type="email" id="email" required name="email" class="form__input form__input--tiny" placeholder="E-Mail Address">
						</div>
						<div class="form-group">
							<label class="form__label" for="password">Password</label>
							<input type="password" id="password" required class="form__input form__input--tiny" name="password" placeholder="Password">
							<a href="javascript:" class="forgot-psswd">Forgot password</a>
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
							<input type="text" class="form__input" name="name" placeholder="Full Name" required>
						</div>
						<div class="form-group">
							<input type="email" class="form__input" name="email" placeholder="E-Mail Address" required>
						</div>
						<div class="form-group">
							<input type="text" class="form__input" name="mobile" placeholder="Mobile Number" maxlength="10" required>
						</div>
						<div class="form-group">
							<input type="password" class="form__input" name="password" placeholder="Password" required>
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
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
</body>
</html>
