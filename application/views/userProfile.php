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
								<?php if(empty($educationalDetails)) echo "<p>No Educational Details Found</p>"; else { foreach ($educationalDetails as $key => $value) { ?>
								<div class="media-body">
									<p><?php echo $value['description']; ?></p>
									<p><strong>Year: </strong><?php echo  $value['year']; ?></p>
									<p><strong>Score: </strong><?php echo  $value['score']; ?><?php if($value['scoreType']=="1") echo "CGPA"; else { echo "Percentage"; } ?></p>
								</div>
								<?php }} ?>
							</div>
							</section>
							<section>
								<h3 class="heading flex">
									<span>Work Experience</span>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-work-experience">Add</a>
								</h3>
								<?php if(empty($workExperiences)) echo "<p>No Work Experiences Added</p>"; else foreach ($workExperiences as $key => $value) {
									echo "<p><b>".$value['companyName']."</b><br>".$value['position']."<br>".$value['startMonth']."-".$value['startYear']."-".$value['endMonth']."-".$value['endYear']."<br>".$value['description']."</p>";
								} ?>
							</section>
							<section>
								<h3 class="heading flex">
									<span>Projects</span>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-projects">Add</a>
								</h3>
								<?php if(empty($projects)) echo "<p>No Projects Added</p>"; else foreach ($projects as $key => $value) {
									echo "<p><b>".$value['projectTitle']."</b><br><a target='_blank' href='".$value['projectLink']."'>".$value['projectLink']."</a><br>".$value['projectDescription']."</p>";
								} ?>
							</section>
							<section>
								<h3 class="heading flex">
									<span>Achievements</span>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-achievements">Add</a>
								</h3>
								<?php if(empty($achievements)) echo "<p>No Achievements Added</p>"; else foreach ($achievements as $key => $value) {
									echo "<p><b>".$value['achievementTitle']."</b><br>".$value['achievementDescription']."</p>";
								} ?>
							</section>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="skills">
							<h3 class="heading">Skills</h3>
							<div class="skills-container flex">
								<div class="skill flex free">
									<p>PHP</p>
								</div>
								<div class="skill flex paid">
									<p>HTML</p>
								</div>
								<div class="skill flex paid">
									<p>CSS</p>
								</div>
								<div class="skill flex free">
									<p>JS</p>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="personal-details">
							<h3 class="heading flex">
								<span>Personal Details</span>
								<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-personal-information">Edit</a>
							</h3>
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
	<div class="remodal edit-personal-information" data-remodal-id="editPersonalInfoModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Personal Information</h3>
			<form action="" method="POST" class="form">
				<div class="horizontal-group">
					<div class="form-group">
						<label for="relationshipStatus">Relationship status</label>
						<select class="select" name="relationshipStatus" id="relationshipStatus">
							<option value="0" selected="">Single</option>
							<option value="1">Comitted</option>
							<option value="2">Open Relationship</option>
							<option value="3">Married</option>
							<option value="4">Divorced</option>
							<option value="5">Prefer not to say</option>
						</select>
					</div>
					<div class="form-group">
						<label for="dateOfBirth">Date of birth</label>
						<input type="date" name="dateOfBirth" id="dateOfBirth" class="form__input">
					</div>
				</div>
				<div class="horizontal-group">
					<div class="form-group">
						<label for="location">Current Location</label>
						<select class="select" name="location" id="location">
							<option value="0">Location 1</option>
							<option value="1">Location 2</option>
						</select>
					</div>
					<div class="form-group">
						<label for="hometown">Hometown</label>
						<select class="select" name="hometown" id="hometown">
							<option value="0">Location 1</option>
							<option value="1">Location 2</option>
						</select>
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="select" name="gender" id="gender">
							<option value="m">Male</option>
							<option value="f">Female</option>
						</select>
					</div>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn">Close</button>
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
			</form>
		</div>
	</div>
	<div class="remodal edit-achievements" data-remodal-id="editAchievementsModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Achievement</h3>
			<form action="" method="POST" class="form">
				<div class="form-group">
					<label for="achievementName">Name</label>
					<input type="text" class="form__input" placeholder="Achievement name" id="achievementName" name="achievementName">
				</div>
				<div class="form-group">
					<label for="achievementDescription">Description</label>
					<textarea name="achievementDescription" data-ckeditor="yes" id="achievementDescription" cols="30" rows="5" class="form__input"></textarea>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn">Close</button>
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
			</form>
		</div>
	</div>
	<div class="remodal edit-projects" data-remodal-id="editProjectsModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Project</h3>
			<form action="" method="POST" class="form">
				<div class="form-group">
					<label for="projectName">Name</label>
					<input type="text" class="form__input" placeholder="Project name" id="projectName" name="projectName">
				</div>
				<div class="form-group">
					<label for="projectLink">Link (optional)</label>
					<input type="text" class="form__input" placeholder="Project Link" id="projectLink" name="projectLink">
				</div>
			</div>
			<div class="form-group action-bar">
				<button data-remodal-action="close" class="btn">Close</button>
				<input type="submit" class="btn btn--primary" value="Save">
			</div>
		</form>
	</div>
	<div class="edit-achievements hidden">
		<h3>Add Achievement</h3>
		<form action="<?php echo base_url('web/addAchievement'); ?>" method="POST" class="form">
			<div class="form-group">
				<label for="achievementTitle">Achievement Title</label>
				<input type="text" class="form__input" placeholder="Achievement Title" id="achievementTitle" name="achievementTitle">
			</div>
			<div class="form-group">
				<label for="achievementDescription">Description</label>
				<textarea name="achievementDescription" data-ckeditor="yes" id="achievementDescription" cols="30" rows="5" class="form__input"></textarea>
			</div>
			<div class="form-group action-bar">
				<button data-remodal-action="close" class="btn">Close</button>
				<input type="submit" class="btn btn--primary" value="Save">
			</div>
		</form>
	</div>
	<div class="edit-projects hidden">
		<h3>Project</h3>
		<form action="" method="POST" class="form">
			<div class="form-group">
				<label for="projectName">Name</label>
				<input type="text" class="form__input" placeholder="Project name" id="projectName" name="projectName">
			</div>
			<div class="form-group">
				<label for="projectLink">Link (optional)</label>
				<input type="text" class="form__input" placeholder="Project Link" id="projectLink" name="projectLink">
			</div>
			<div class="form-group">
				<label for="projectDescription">Description</label>
				<textarea name="projectDescription" data-ckeditor="yes" id="projectDescription" cols="30" rows="5" class="form__input"></textarea>
			</div>
			<div class="form-group action-bar">
				<button data-remodal-action="close" class="btn">Close</button>
				<input type="submit" class="btn btn--primary" value="Save">
			</div>
		</form>
	</div>
	<div class="edit-work-experience hidden">
		<h3>Work Experience</h3>
		<form action="" method="POST" class="form">
			<div class="horizontal-group">
				<div class="form-group">
					<label for="projectDescription">Description</label>
					<textarea name="projectDescription" data-ckeditor="yes" id="projectDescription" cols="30" rows="5" class="form__input"></textarea>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn">Close</button>
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
			</form>
		</div>
	</div>
	<div class="remodal edit-work-experience" data-remodal-id="editWorkExperienceModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Work Experience</h3>
			<form action="" method="POST" class="form">
				<div class="horizontal-group">
					<div class="form-group">
						<label for="companyName">Company's Name</label>
						<input type="text" class="form__input" placeholder="Company's name" id="companyName" name="companyName">
					</div>
					<div class="form-group">
						<label for="workingPosition">Working position</label>
						<input type="text" class="form__input" placeholder="Company's name" id="workingPosition" name="workingPosition">
					</div>
				</div>
				<div class="horizontal-group">
					<div class="form-group">
						<label>Starting Date</label>
						<div class="horizontal-group">
							<div class="form-group">
								<label for="startingMonth">Month</label>
								<select name="startingMonth" id="startingMonth" class="select">
									<option>Jan</option>
									<option>Feb</option>
								</select>
							</div>
							<div class="form-group">
								<label for="startingYear">Year</label>
								<select name="startingYear" id="startingYear" class="select">
									<option>2017</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ending Date</label>
						<div class="horizontal-group">
							<div class="form-group">
								<label for="endingMonth">Month</label>
								<select name="endingMonth" id="endingMonth" class="select">
									<option>Jan</option>
									<option>Feb</option>
								</select>
							</div>
							<div class="form-group">
								<label for="endingYear">Year</label>
								<select name="endingYear" id="endingYear" class="select">
									<option>2017</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="workDescription">Description</label>
					<textarea name="workDescription" id="workDescription" cols="30" data-ckeditor="yes" rows="5" class="form__input"></textarea>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn">Close</button>
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/tabs.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/ckeditor/ckeditor.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/editUserProfile.js'); ?>"></script>
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
