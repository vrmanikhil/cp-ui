<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/jobs.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<?php echo $userNavigation; ?>
				<div class="card card--no-padding search-filter">
					<div class="search-filter__head">
						<p><strong>All Cities</strong></p>
					</div>
					<div class="search-filter__body">
						<form name="city-search" class="search-filter__form">
							<label>Search</label>
							<input type="search" class="form-control" name="" placeholder="Search here">
						</form>
						<div class="search-filter__list js-prevent-body-scroll">
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> Delhi
								</label>
							</div>
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> Gurugram
								</label>
							</div>
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> Noida
								</label>
							</div>
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> Greader Noida
								</label>
							</div>
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> Bangalore
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="card card--no-padding search-filter">
					<div class="search-filter__head">
						<p><strong>Skills</strong></p>
					</div>
					<div class="search-filter__body">
						<form name="city-search" class="search-filter__form">
							<label>Search</label>
							<input type="search" class="form-control" name="" placeholder="Search here">
						</form>
						<div class="search-filter__list">
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> HTML
								</label>
							</div>
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> Javascript
								</label>
							</div>
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> CSS
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="card">
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">Jobs</li>
					</ol>
				</div>
				<div class="card posting-card">
					<div class="flex media">
						<img src="/assets/img/image-placeholder.png" alt="user" class="media-figure posting-card__img">
						<div class="media-body flex flex--col">
							<p class="posting-card__title">
								<strong>Silver Touch Technologies Limited</strong>
							</p>
							<p class="posting-card__desc">About company</p>
							<p class="posting-card__post">Android developer</p>
							<p class="posting-card__post-location">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<span>Noida</span>
							</p>
							<div class="posting-card__apply">
								<button class="btn white midnight-blue-bg s-14 js-view-posting-details">View</button>
							</div>
						</div>
					</div>
				</div>
				<div class="card posting-card">
					<div class="flex media">
						<img src="/assets/img/image-placeholder.png" alt="user" class="media-figure posting-card__img">
						<div class="media-body flex flex--col">
							<p class="posting-card__title">
								<strong>Silver Touch Technologies Limited</strong>
							</p>
							<p class="posting-card__desc">About company</p>
							<p class="posting-card__post">Android developer</p>
							<p class="posting-card__status"><strong>Status</strong> : <span class="green">Selected</span></p>
							<div class="posting-card__apply">
								<button class="btn white midnight-blue-bg s-14 js-view-posting-details">View</button>
							</div>
						</div>
					</div>
				</div>
				<div class="card posting-card">
					<div class="flex media">
						<img src="/assets/img/image-placeholder.png" alt="user" class="media-figure posting-card__img">
						<div class="media-body flex flex--col">
							<p class="posting-card__title">
								<strong>Silver Touch Technologies Limited</strong>
							</p>
							<p class="posting-card__desc">About company</p>
							<p class="posting-card__post">Android developer</p>
							<p class="posting-card__status"><strong>Status</strong> : <span class="red">Rejected</span></p>
							<div class="posting-card__apply">
								<button class="btn white midnight-blue-bg s-14 js-view-posting-details">View</button>
							</div>
						</div>
					</div>
				</div>
				<div class="card posting-card">
					<div class="flex media">
						<img src="/assets/img/image-placeholder.png" alt="user" class="media-figure posting-card__img">
						<div class="media-body flex flex--col">
							<p class="posting-card__title">
								<strong>Silver Touch Technologies Limited</strong>
							</p>
							<p class="posting-card__desc">About company</p>
							<p class="posting-card__post">Android developer</p>
							<p class="posting-card__status"><strong>Status</strong> : <span class="yellow">Short listed</span></p>
							<div class="posting-card__apply">
								<button class="btn white midnight-blue-bg s-14 js-view-posting-details">View</button>
							</div>
						</div>
					</div>
				</div>
				<div class="card posting-card">
					<div class="flex media">
						<img src="/assets/img/image-placeholder.png" alt="user" class="media-figure posting-card__img">
						<div class="media-body flex flex--col">
							<p class="posting-card__title">
								<strong>Silver Touch Technologies Limited</strong>
							</p>
							<p class="posting-card__desc">About company</p>
							<p class="posting-card__post">Android developer</p>
							<p class="posting-card__status"><strong>Status</strong> : <span class="yellow">Short listed</span></p>
							<div class="posting-card__apply">
								<button class="btn white midnight-blue-bg s-14">View Applicants</button>
								<button class="btn white midnight-blue-bg s-14 js-view-posting-details">View</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $activeUserLeft; ?>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
		</main>
		<?php echo $footer; ?>
		<div class="remodal" data-remodal-id="modal">
			<button data-remodal-action="close" class="remodal-close"></button>
			<p>
				Responsive, lightweight, fast, synchronized with CSS animations, fully customizable modal window plugin with declarative configuration and hash tracking.
			</p>
		</div>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/jobs.js'); ?>"></script>
</body>

</html>
