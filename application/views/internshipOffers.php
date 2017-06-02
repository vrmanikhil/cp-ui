<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/jobs.css'); ?>" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<div class="explore-panel card flex">
				  <a href="<?php echo base_url('jobs/job-offers'); ?>" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 50.2 50.2" class="briefcase-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#briefcase-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Jobs</span>
				  </a>
				  <a href="<?php echo base_url('internships/internship-offers'); ?>" class="explore-panel__link active flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 31.387 31.386" class="computer-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#computer-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Internships</span>
				  </a>
				  <a href="<?php echo base_url('skills'); ?>" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 232.7 232.7" class="skills-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#skills-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Skills</span>
				  </a>
				</div>
				<div class="card card--no-padding">
					<div class="nav nav--stacked js-nav--stacked">
						<a href="<?php echo base_url('internships/relevant-internships'); ?>" class="nav__link js-nav-link">Relevant Internship Offers</a>
						<a href="<?php echo base_url('internships/internship-offers'); ?>" class="nav__link js-nav-link active">Browse Internship Offers</a>
						<a href="<?php echo base_url('internships/applied-internship-offers'); ?>" class="nav__link js-nav-link">Applied Internship Offers</a>
					</div>
				</div>
				<div class="card card--no-padding search-filter">
					<div class="search-filter__head">
						<p><strong>Locations</strong></p>
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
							<div class="search-filter__list-item checkbox">
								<label>
									<input type="checkbox"> PHP
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
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url('internships/internship-offers'); ?>">Internships</a></li>
						<li class="active">Browse Internship Offers</li>
					</ol>
				</div>
				<div class="card posting-card">
					<div class="flex media">
						<img src="/assets/img/image-placeholder.png" alt="user" class="media-figure posting-card__img">
						<div class="media-body flex flex--col">
							<p class="posting-card__title">
								<strong>Silver Touch Technologies Limited</strong>
							</p>
							<p class="posting-card__desc">Android developer</p>
							<p class="posting-card__post-location">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<span>Noida</span>
							</p>
							<p class="posting-card__status"><strong>Skills</strong> : <span>PHP, HTML, CSS, JavaScript</span></p>
							<div class="posting-card__apply">
								<button class="btn white midnight-blue-bg s-14 js-view-posting-details">View</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $activeUser; ?>
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
		<div class="remodal" data-remodal-id="modal">
			<button data-remodal-action="close" class="remodal-close"></button>
			<div class="modal-body">
				<h1>Offer <small>Content Writer Intern</small></h1>
				<div class="flex">
					<div class="modal-body__left flex__item">
						<p><strong>Why should you join FITPASS?</strong></p>
						<p>• <strong>Team:</strong> Work with smart and passionate people</p>
						<p>• <strong>Growth:</strong> We have, in a short span of time, put together a very impressive client list with some of the best names in the industry as our clients</p>
						<p>• <strong>Start-up Culture:</strong> Working in a start-up environment will give you exposure to multiple fields and you will learn how a business is built from the ground up</p>
						<p>• <strong>Impact:</strong> FITPASS does not function on a defined hierarchy &amp; everyone's given equal creative freedom to come up with and execute new ideas to further the business. This setup allows employees to take ownership of their ideas.</p>
						<p><strong>Here’s what you’ll do day-to-day:</strong></p>
						<p>• Curate and create quality, fact filled content for fitness blogs and articles</p>
						<p>• Create engaging content to be published on social media</p>
						<p>• Drafting articles and blogs to promote SEO activities of FITPASS</p>
						<p>• Contributing in promoting website and social media platforms through succinct, concise communication</p>
						<p>• Build a strong product-base for FITPASS with high quality write-up</p>
						<p>• Execute quality check of content on our website to ensure that information is accurate</p>
						<p><strong>Who we’re looking for:</strong></p>
						<p>• Someone with a prior work experience is a bonus, though it is not a necessity</p>
						<p>• Preferably studying English and Journalism</p>
						<p>• Excellent written and verbal communication skills in English, and a functional knowledge of Hindi</p>
						<p>• Great understanding of the product</p>
						<p>• Excellent organizational and time management skills with the drive to achieve targets</p>
						<p>• Comfortable travelling within the city</p>
						<p>• Ability to thrive in a highly-charged environment</p>
						<p>• Good knowledge of MS Office</p>
					</div>
					<aside class="modal-body__right flex__item">
						<center><strong>Company Profile</strong></center>
						<br>
						<strong>FITPASS</strong>
						<br>
						<p>https://fitpass.co.in/</p>
						<p><strong>FITPASS</strong> is your all access pass to 1250+ gyms and fitness studios in Delhi NCR. Available on iOS &amp; android, FITPASS users can freely workout anywhere, anytime however they want - gym workouts, Yoga, Zumba, Pilates, Cross Fit, Kickboxing, MMA, spinning and many many more. Priced at Rs.999 a month only, FITPASS makes fitness super affordable and accessible.</p>
						<p>Bolstered by a team with the strongest pedigree – Oxford, Columbia, IIT, St.Stephen's and Delhi University, with its teeth cut in UBS Investment Bank, McKinsey, the World Bank, Zomato, KPMG, etc. – we are bringing in the age of fit-tech in India!</p>
						<p>FITPASS is defined by our insistence on providing an unparalleled customer experience.</p>
						<p>Our team members are charged with bringing creativity, honesty, and intellectual rigor to their responsibilities in a never-ending quest to delight our customers. We have high expectations of each other and work as a team to build things we are all proud of.</p>
						<<button type="button" class="btn--apply">APPLY</button>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/jobs.js'); ?>"></script>
</body>

</html>
