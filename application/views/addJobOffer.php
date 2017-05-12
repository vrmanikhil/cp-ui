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
					<label for="jobOfferTitle" class="form__label">Job Offer Title</label>
					<input type="text" id="jobOfferTitle" placeholder="Job Offer Title" class="form__input">
					<label for="jobOfferDescription" class="form__label">Job Offer Description</label>
					<textarea id="jobOfferDescription" placeholder="Job Offer Description" class="form__input"></textarea>
					<label for="openings" class="form__label">Number of Openings</label>
					<input type="text" id="openings" placeholder="Number of Openings" class="form__input">
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
