<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Verify Mobile Number|CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/verify-number.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>

	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container">
			<div class="globalContainer flex">
				<div class="main-body flex__item flex flex--col">
					<div class="verify-number-container">
						<h2>Verify Mobile Number</h2>
						<form class="form" action="<?php echo base_url('web/verifyMobile'); ?>" method="post">
						<div class="form-group">
							<label for="otp" class="form__label">One Time Password</label>
							<input type="text" name="otp" id="otp" maxlength="4" placeholder="Enter your OTP" class="form__input">
							<div class="resend-otp">
								<a href="<?php echo base_url('verify-mobile-number/8800'); ?>">Resend OTP</a>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
							<input type="submit" value="Verify Mobile Number" class="btn btn--primary">
						</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php echo $footer; ?>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
</body>
</html>
