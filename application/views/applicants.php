<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connections | CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="/assets/css/applicants.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<div class="explore-panel card flex">
				  <a href="<?php if($_SESSION['userData']['accountType']=='1') { echo base_url('jobs/job-offers'); } else { echo base_url('jobs/add-job-offer'); } ?>" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 50.2 50.2" class="briefcase-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#briefcase-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Jobs</span>
				  </a>
				  <a href="<?php if($_SESSION['userData']['accountType']=='1') { echo base_url('internships/internship-offers');} else { echo base_url('internships/add-internship-offer'); } ?>" class="explore-panel__link flex flex--col flex__item align-center">
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
			<div class="main-body flex__item">
				<div class="card">
					<section>
						<h2 class="section-title">APPLICANTS</h2>
						<?php if(empty($applicants)) { echo "<center>No Applicants</center>"; } else {  foreach ($applicants as $key => $value) { ?>
						<div class="connections">
							<div class="flex connection media align-center">
								<img src="<?php echo $value['profileImage']; ?>" alt="user" class="media-figure">
								<div class="media-body flex">
									<div class="user-info">
										<p style="font-size: 18px;"><a href="<?php echo base_url('user-profile/').$value['userID']; ?>"><strong><?php echo $value['name']; ?></strong></a></p>
										<p><?php echo $value['course']."-".$value['batch']; ?></p>
										<p><?php echo $value['college']; ?></p>
										<p><?php echo "<b>Skills: </b>".$value['userSkills']; ?></p>
										<p style="margin-top: 8px; float:right;"><a href="<?php echo base_url('user-profile/').$value['userID']."?download=1"; ?>" class="btn" style="color: white; background: var(--midnight-blue);"><i class="fa fa-download" aria-hidden="true"></i></a><a target="_blank" href="<?php echo base_url('user-profile/').$value['userID']; ?>" class="btn" style="margin-left: 5px; color: white; background: var(--midnight-blue);"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="btn" style="margin-left: 5px; color: white; background: var(--midnight-blue);"><i class="fa fa-plus" aria-hidden="true"></i> Add to Compare</a></p>
									</div>
								</div>
							</div>
						</div>
							<?php }} ?>
					</section>
				</div>
			</div>
			<aside class="flex__item right-pane">

				<div class="feed-actor-module card">
					<h2 class="section-title">Offer Details</h2>
					<div class="feed-actor-module__profile-image-container">
						<a href="javascript:">
							<img src="<?php echo $_SESSION['companyLogo']; ?>" alt="" style="margin-top:45px;" class="feed-actor-module__profile-image">
						</a>
					</div>
					<div class=" feed-actor-module__actor-meta">
						<p class="text-center feed-actor-module__name"><a href="<?php echo base_url('user-profile/').$_SESSION['userData']['userID']; ?>"><?php echo $_SESSION['companyName']; ?></a></p>


						<div class="media flex">
							<p class="media-body text-center flex s-12 align-center margin-l-5"><b><?php if($offerType=='2') { echo $offerData['internshipTitle']; } if($offerType=='1') { echo $offerData['jobTitle']; } ?></b></p>
						</div>
						<div class="media flex" style="margin-top: 10px;">
							<p class="media-body" style="font-size: 14px;"><b>Skills Required: </b><?php if(empty($offerData['skillsRequired'])) echo "<i>No Specific Skills Required</i>"; else echo $offerData['skillsRequired']; ?></p>
						</div>
						<div style="margin-top: 10px;">
							<p class="media-body"><center><a class="btn btn-primary">View More</a></center></p>
						</div>
					</div>

				</div>







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
