<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/add-offer.css'); ?>" rel="stylesheet">
</head>

<body>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<?php echo $activeUserLeft; ?>
				<div class="card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="card">
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li><a href="/">Jobs</a></li>
						<li class="active">Add Job Offer</li>
					</ol>
				</div>
				<div class="change-password__section card">
					<h1 class="change-password__section-title">Add Job Offer</h1>
					<form class="change-password__form form">
					<label for="currentPassword" class="form__label">Job Offer Title</label>
					<input type="password" id="currentPassword" placeholder="Current Password" class="form__input">
					<label for="newPassword" class="form__label">New Password</label>
					<input type="password" id="newPassword" placeholder="New Password" class="form__input">
					<label for="confirmNewPassword" class="form__label">Confirm New Password</label>
					<input type="password" id="confirmNewPassword" placeholder="Confirm New Password" class="form__input">
					<input type="submit" value="Change Password" class="btn btn--primary change-password__form-submit">
				</form>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $userNavigation; ?>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
		</main>
		<?php echo $footer; ?>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
</body>

</html>
