<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connections | CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="/assets/css/connections.css" rel="stylesheet">
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
						<h2 class="section-title">CONNECTION REQUESTS</h2>
						<div class="connections">
							<?php if(empty($connectionRequests)) { echo "<center>No Connection Requests Found</center>"; } else { foreach ($connectionRequests as $key => $value) { ?>
							<div class="flex connection media align-center">
								<img src="<?php echo $value['profileImage']; ?>" alt="user" class="media-figure">
								<div class="media-body flex">
									<div class="user-info">
										<p><strong><?php echo $value['name']; ?></strong></p>
										<p><?php echo $value['email']; ?></p>
										<p><?php echo $value['city'].", ".$value['state']; ?></p>
									</div>
									<div class="actions">
										<a href="<?php echo base_url('connections/cancelConnectionRequest/').$value['active']."/".$value['passive']; ?>" class="btn btn--primary reject"><i class="fa fa-times" aria-hidden="true"></i></a>
										<a href="<?php echo base_url('connections/acceptConnectionRequest/').$value['active']."/".$value['passive']; ?>" class="btn btn--primary accept"><i class="fa fa-check" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							<?php }} ?>
						</div>
					</section>
				</div>
				<div class="card">
					<section>
						<h2 class="section-title">MY CONNECTIONS</h2>
						<?php if(empty($connectionRequests)) { echo "<center>No Connections Found</center>"; } else { foreach ($connections as $key => $value) { ?>
						<div class="connections">
							<div class="flex connection media align-center">
								<img src="<?php echo $value['profileImage']; ?>" alt="user" class="media-figure">
								<div class="media-body flex">
									<div class="user-info">
										<p><strong><?php echo $value['name']; ?></strong></p>
										<p><?php echo $value['email']; ?></p>
										<p><?php echo $value['city'].", ".$value['state']; ?></p>
									</div>
									<div class="actions">
										<a href="<?php echo base_url('user-profile/').$value['userID']; ?>" class="btn btn--primary view-profile">View Profile</i></a>
									</div>
								</div>
							</div>
						</div>
							<?php }} ?>
					</section>
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
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
</body>
</html>
