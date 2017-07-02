<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search | CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/search.css'); ?>" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<div class="main-body flex__item card">
				<h2 class="section-title"><strong>Search Results</strong></h2>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#accounts" aria-controls="accounts" role="tab" data-toggle="tab">Accounts</a></li>
					<li role="presentation"><a href="#companyAccounts" aria-controls="companyAccounts" role="tab" data-toggle="tab">Company Accounts</a></li>
					<li role="presentation"><a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">Job Offers</a></li>
					<li role="presentation"><a href="#internships" aria-controls="internships" role="tab" data-toggle="tab">Internship Offers</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="accounts">
						<div class="flex account media align-center">
							<img src="http://backoffice.campuspuppy.com/assets/profileImages/nikhilverma.jpg" alt="user" class="media-figure">
							<div class="media-body flex">
								<div class="user-info">
									<p><strong>Nikhil Verma</strong></p>
									<p>vrmanikhil@gmail.com</p>
									<p>Noida, UP</p>
								</div>
								<div class="actions">
									<a href="javascript:" class="btn btn--primary view-profile">View Profile</i></a>
								</div>
							</div>
						</div>
						<div class="flex account media align-center">
							<img src="http://backoffice.campuspuppy.com/assets/profileImages/nikhilverma.jpg" alt="user" class="media-figure">
							<div class="media-body flex">
								<div class="user-info">
									<p><strong>Nikhil Verma</strong></p>
									<p>vrmanikhil@gmail.com</p>
									<p>Noida, UP</p>
								</div>
								<div class="actions">
									<a href="javascript:" class="btn btn--primary view-profile">View Profile</i></a>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade in" id="companyAccounts">
						<div class="flex account media align-center">
							<img src="http://backoffice.campuspuppy.com/assets/profileImages/nikhilverma.jpg" alt="user" class="media-figure">
							<div class="media-body flex">
								<div class="user-info">
									<p><strong>Nikhil Verma</strong></p>
									<p>vrmanikhil@gmail.com</p>
									<p>Noida, UP</p>
								</div>
								<div class="actions">
									<a href="javascript:" class="btn btn--primary view-profile">View Profile</i></a>
								</div>
							</div>
						</div>
						<div class="flex account media align-center">
							<img src="http://backoffice.campuspuppy.com/assets/profileImages/nikhilverma.jpg" alt="user" class="media-figure">
							<div class="media-body flex">
								<div class="user-info">
									<p><strong>Nikhil Verma</strong></p>
									<p>vrmanikhil@gmail.com</p>
									<p>Noida, UP</p>
								</div>
								<div class="actions">
									<a href="javascript:" class="btn btn--primary view-profile">View Profile</i></a>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade in" id="jobs">
						<div class="posting-card">
							<div class="flex media">
								<img src="http://backoffice.campuspuppy.com/assets/companyLogo/fitpass.jpg" alt="user" class="media-figure posting-card__img">
								<div class="media-body flex flex--col">
									<p class="posting-card__title">
										<strong>Fitpass</strong>
									</p>
									<p class="posting-card__desc">ABC</p>
									<p class="posting-card__post-location">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<span>New Delhi</span>
									</p>
									<p class="posting-card__status" style="font-size: 0.9rem;"><strong>Skills</strong> : <span style="font-size: 0.9rem;">No Specific Skills Required</span></p>
									<div class="posting-card__apply">
										<button data-id="7" class="btn white midnight-blue-bg s-14 js-view-posting-details view" id="view7">View</button>
									</div>
								</div>
							</div>
						</div>
						<div class="posting-card">
							<div class="flex media">
								<img src="http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg" alt="user" class="media-figure posting-card__img">
								<div class="media-body flex flex--col">
									<p class="posting-card__title">
										<strong>Fitpass</strong>
									</p>
									<p class="posting-card__desc">ABC</p>
									<p class="posting-card__post-location">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<span>New Delhi</span>
									</p>
									<p class="posting-card__status" style="font-size: 0.9rem;"><strong>Skills</strong> : <span style="font-size: 0.9rem;">No Specific Skills Required</span></p>
									<div class="posting-card__apply">
										<button data-id="7" class="btn white midnight-blue-bg s-14 js-view-posting-details view" id="view7">View</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade in" id="internships">
						<div class="posting-card">
							<div class="flex media">
								<img src="http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg" alt="user" class="media-figure posting-card__img">
								<div class="media-body flex flex--col">
									<p class="posting-card__title">
										<strong>Fitpass</strong>
									</p>
									<p class="posting-card__desc">ABC</p>
									<p class="posting-card__post-location">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<span>New Delhi</span>
									</p>
									<p class="posting-card__status" style="font-size: 0.9rem;"><strong>Skills</strong> : <span style="font-size: 0.9rem;">No Specific Skills Required</span></p>
									<div class="posting-card__apply">
										<button data-id="7" class="btn white midnight-blue-bg s-14 js-view-posting-details view" id="view7">View</button>
									</div>
								</div>
							</div>
						</div>
						<div class="posting-card">
							<div class="flex media">
								<img src="http://backoffice.campuspuppy.com/assets/companyLogo/fitpass.jpg" alt="user" class="media-figure posting-card__img">
								<div class="media-body flex flex--col">
									<p class="posting-card__title">
										<strong>Fitpass</strong>
									</p>
									<p class="posting-card__desc">ABC</p>
									<p class="posting-card__post-location">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<span>New Delhi</span>
									</p>
									<p class="posting-card__status" style="font-size: 0.9rem;"><strong>Skills</strong> : <span style="font-size: 0.9rem;">No Specific Skills Required</span></p>
									<div class="posting-card__apply">
										<button data-id="7" class="btn white midnight-blue-bg s-14 js-view-posting-details view" id="view7">View</button>
									</div>
								</div>
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
				<h1>Job Offer <small>Content Writer Intern</small></h1>
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
						<button type="button" class="btn--apply">APPLY</button>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/tabs.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/jobs.js'); ?>"></script>

</body>
</html>
