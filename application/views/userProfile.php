<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User | CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="<?php if(isset($_SESSION['userData']['loggedIn'])){ echo base_url('assets/css/components/header.css'); } else { echo base_url('/assets/css/components/logged-out-header.css'); }  ?>" rel="stylesheet">
	<link href="/assets/css/userProfile.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
	<div class="layout-container flex flex--col">
		<?php if(isset($_SESSION['userData']['loggedIn'])){ echo $header; } else { echo $headerLogin; } ?>
		<main class="flex main-container globalContainer">
			<div class="main-body flex__item card">
				<div class="user__cover-pic" style="background: url('<?php echo $userDetails['coverImage']; ?>') center no-repeat; background-size: cover;"></div>
				<div class="user__name flex">
					<p><?php echo $userDetails['name']; ?></p>
					<?php if($userDetails['userID']!=$_SESSION['userData']['userID']){ ?>
						<?php if(empty($checkConnection)) { ?>
					<a href="<?php echo base_url('connections/requestConnection/').$userDetails['userID']."/".$_SESSION['userData']['userID']; ?>" class="btn">Add to Connection</a>
						<?php } else {
							if($checkConnection[0]['status']!='1'){ if($checkConnection[0]['active']==$_SESSION['userData']['userID']) { ?>
								<a href="<?php echo base_url('connections/cancelConnectionRequest/').$userDetails['userID']."/".$_SESSION['userData']['userID']; ?>" onclick="alert('Are you sure you want to Cancel the Connection Request?')" class="btn">Cancel Connection Request</a>
							<?php
								}
								else{ ?>
									<a href="<?php echo base_url('connections/acceptConnectionRequest/').$userDetails['userID']."/".$_SESSION['userData']['userID']; ?>" class="btn">Accept Request</a>
									<a href="<?php echo base_url('connections/cancelConnectionRequest/').$userDetails['userID']."/".$_SESSION['userData']['userID']; ?>" onclick="alert('Are you sure you want to Decline the Connection Request?')" class="btn" style="margin-left: 5px;">Decline</a>
								<?php
								}
							}
							else{ ?>
								<a href="<?php echo base_url('connections/removeConnection/').$userDetails['userID']."/".$_SESSION['userData']['userID']; ?>" onclick="alert('Are you sure you want to Remove the Connection?')" class="btn">Remove Connection</a>
							<?php
							}
						} ?>
					<?php } ?>
				</div>
				<div class="user__pic">
					<img src="<?php echo $userDetails['profileImage']; ?>" alt="">
				</div>
				<div class="user-information">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#professional-details" aria-controls="professional-details" role="tab" data-toggle="tab">Professional Details</a></li>
						<li role="presentation"><a href="#skills" aria-controls="skills" role="tab" data-toggle="tab">Skills</a></li>
						<li role="presentation"><a href="#personal-details" aria-controls="personal-details" role="tab" data-toggle="tab">Personal Details</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="professional-details">
							<section>
							<h3 class="heading">Education</h3>
							<div class="flex media align-center">
								<img src="http://bo.campuspuppy.com//assets/uploads/college_logo/jss-logo1.png" alt="user" class="media-figure">
								<div class="media-body">
									<p><strong>JSS Academy of Technical Education, Noida</strong></p>
									<p>Bachelor of Technology- Computer Science and Engineering</p>
									<p>2012-2016</p>
								</div>
							</div>
							</section>
							<section>
								<h3 class="heading">Work Experience</h3>
								<p>No Work experience added</p>
							</section>
							<section>
								<h3 class="heading">Projects</h3>
								<p>No Projects added</p>
							</section>
							<section>
								<h3 class="heading">Achievements</h3>
								<p>No Achievements added</p>
							</section>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="skills">
							<h3 class="heading">Skills</h3>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="personal-details">
							<h3 class="heading">Personal Details</h3>
							<p class="flex personal-info"><strong>Sex</strong><span>Male</span></p>
							<p class="flex personal-info"><strong>Current Location</strong><span>Not Available</span></p>
							<p class="flex personal-info"><strong>Hometown</strong><span>Lucknow, Uttar Pradesh</span></p>
							<p class="flex personal-info"><strong>Relationship status</strong><span>Single</span></p>
							<p class="flex personal-info"><strong>Birthday</strong><span>30th March 1993</span></p>
							<p class="flex personal-info"><strong>Age</strong><span>24 Years</span></p>
							<p class="flex personal-info"><strong>Email Address</strong><span>vrmanikhil@gmail.com</span></p>
							<p class="flex personal-info"><strong>Mobile Number</strong><span>7503705892</span></p>
						</div>
					</div>
				</div>
			</div>
			<aside class="flex__item right-pane">
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
	<div class="remodal forgot-psswd-modal" data-remodal-id="forgotPassword">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<div class="forgot-psswd-form-container">
				<h2>Forgot your Password?</h2>
				<form method="get" class="form forgot-psswd-form" action="<?php echo base_url('web/forgotPassword'); ?>">
					<div class="form-group">
						<label for="forgot-psswd-email" class="form__label">Registered E-Mail</label>
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
	<script src="<?php echo base_url('/assets/js/tabs.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script>
		$(document).ready(function () {
			$(document).on('click', '.js-forgot-password', openForgotPsswdModal);
			function openForgotPsswdModal(ev) {
				var modal = $('[data-remodal-id="forgotPassword"]').remodal();
				modal.open();
			}
		});
	</script>
</body>
</html>
