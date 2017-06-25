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
								<a href="javascript:" class="btn message-btn"><i class="fa fa-envelope" aria-hidden="true"></i></a>
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
						<?php if($userDetails['accountType']=='2') { ?>
						<li role="presentation"><a href="#company-details" aria-controls="company-details" role="tab" data-toggle="tab">Company Details</a></li>
						<?php } ?>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="professional-details">
							<section>
								<h3 class="heading flex">
										<span>Education</span>
										<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-education"><i class="fa fa-plus" aria-hidden="true"></i></a>
								</h3>
								<div class="education-details__container">
									<?php if(empty($educationalDetails)) echo "<p>No Educational Details Found</p>"; else { foreach ($educationalDetails as $key => $value) { ?>
										<div class="education-details">
											<div class="action-btns">
												<a href="javascript:" data-json='<?= json_encode($value) ?>' data-type="edit-education" class="btn btn--primary js-edit-entity"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="javascript:" class="btn btn--primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</div>
											<p><?php echo $value['description']; ?></p>
											<p><strong>Year: </strong><?php echo  $value['year']; ?></p>
											<p><strong>Score: </strong><?php echo  $value['score']; ?><?php if($value['scoreType']=="1") echo "CGPA"; else { echo " Percentage"; } ?></p>
										</div>
									<?php }} ?>
								</div>
							</section>
							<section>
								<h3 class="heading flex">
									<span>Work Experience</span>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-work-experience"><i class="fa fa-plus" aria-hidden="true"></i></a>
								</h3>
								<div class="work-experience__container">
									<?php if(empty($workExperiences)) echo "<p>No Work Experiences Added</p>";
									else foreach ($workExperiences as $key => $value) { ?>
										<div class="work-experience">
											<div class="action-btns">
												<a href="javascript:" data-json='<?= json_encode($value) ?>' data-type="edit-work-experience" class="btn btn--primary js-edit-entity"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="javascript:" class="btn btn--primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</div>
											<p><strong><?= $value['companyName'] ?></strong></p>
											<p><?= $value['position'] ?></p>
											<p><?php echo $value['startMonth'].' '.$value['startYear'].'-'.$value['endMonth'].' '.$value['endYear'] ?></p>
											<p><?= $value['description'] ?></p>
										</div>
									<?php } ?>
								</div>
							</section>
							<section>
								<h3 class="heading flex">
									<span>Projects</span>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-projects"><i class="fa fa-plus" aria-hidden="true"></i></a>
								</h3>
								<div class="projects__container">
									<?php if(empty($projects)) echo "<p>No Projects Added</p>";
									else foreach ($projects as $key => $value) { ?>
										<div class="project">
											<div class="action-btns">
												<a href="javascript:" data-json='<?= json_encode($value) ?>' data-type="edit-projects" class="btn btn--primary js-edit-entity"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="javascript:" class="btn btn--primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</div>
											<p><strong><?= $value['projectTitle'] ?></strong></p>
											<p><a target='_blank' href='<?= $value["projectLink"] ?>'><?= $value['projectLink'] ?></a></p>
											<p><?= $value['projectDescription'] ?></p>
										</div>
									<?php } ?>
								</div>
							</section>
							<section>
								<h3 class="heading flex">
									<span>Achievements</span>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-achievements"><i class="fa fa-plus" aria-hidden="true"></i></a>
								</h3>
								<div class="achievements__container">
									<?php if(empty($achievements)) echo "<p>No Achievements Added</p>";
									else foreach ($achievements as $key => $value) { ?>
										<div class="achievement">
											<div class="action-btns">
												<a href="javascript:" data-json='<?= json_encode($value) ?>' data-type="edit-achievements" class="btn btn--primary js-edit-entity"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="javascript:" class="btn btn--primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</div>
											<p><strong><?= $value['achievementTitle'] ?></strong></p>
											<p><?= $value['achievementDescription'] ?></p>
										</div>
									<?php } ?>
								</div>
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
								<a href="javascript:" data-json='<?= json_encode($userDetails) ?>' data-type="edit-personal-information" class="btn btn--primary js-edit-entity">Edit</a>
							</h3>
							<p class="flex personal-info"><strong>Sex</strong><span><?php if($userDetails['gender']==="M") { echo "Male"; } else { echo "Female"; } ?></span></p>
							<p class="flex personal-info"><strong>Location</strong><span><?php echo $userDetails['city'].", ".$userDetails['state']; ?></span></p>
							<p class="flex personal-info"><strong>Email Address</strong><span>vrmanikhil@gmail.com</span></p>
							<p class="flex personal-info"><strong>Mobile Number</strong><span>7503705892</span></p>
						</div>
						<?php if($userDetails['accountType']=='2') { ?>
						<div role="tabpanel" class="tab-pane fade" id="company-details">
							<h3 class="heading flex">
								<span>Company Details</span>
								<a href="javascript:" data-json='<?= json_encode($employerDetails[0]) ?>' data-type="edit-company-details" class="btn btn--primary js-edit-entity">Edit</a>
							</h3>
							<div class="company-details__container">
								<p class="flex personal-info"><strong>Company Name</strong><span><?php echo $employerDetails[0]['companyName']; ?></span></p>
								<p class="flex personal-info"><strong>Position</strong><span><?php echo $employerDetails[0]['position']; ?></span></p>
								<p class="flex personal-info"><strong>Company Description </strong><span><?php echo $employerDetails[0]['companyDescription']; ?></span></p>
								<p class="flex personal-info"><strong>Company Logo</strong><span><img src="<?php echo $employerDetails[0]['companyLogo']; ?>"></span></p>
							</div>
						</div>
						<?php } ?>

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
						<label for="location">Location</label>
						<select class="select" name="location" id="location">
							<?php foreach ($locations as $key => $value) { ?>
								<option value="<?php echo $value['cityID']; ?>"><?php echo $value['city'].", ".$value['state']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="select" name="gender" id="gender">
							<option value="M">Male</option>
							<option value="F">Female</option>
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
	<div class="remodal edit-education" data-remodal-id="editEducationModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Education Details</h3>
			<form action="" method="POST" class="form">
				<div class="horizontal-group">
					<div class="form-group">
						<label for="educationType">Type</label>
						<select class="select" name="educationType" id="educationType">
							<option value="1" selected="">Type 1</option>
							<option value="2" selected="">Type 2</option>
							<option value="3" selected="">Type 3</option>
						</select>
					</div>
					<div class="form-group">
						<label for="educationYear">Year</label>
						<input type="number" name="educationYear" id="educationYear" class="form__input">
					</div>
				</div>
				<div class="horizontal-group">
					<div class="form-group">
						<label for="educationScoreType">Score Type</label>
						<select class="select" name="educationScoreType" id="educationScoreType">
							<option value="1">Type 1</option>
							<option value="2">Type 2</option>
							<option value="3">Type 3</option>
						</select>
					</div>
					<div class="form-group">
						<label for="educationScore">Score</label>
						<input type="number" name="educationScore" id="educationScore" class="form__input">
					</div>
				</div>
				<div class="form-group">
					<label for="educationDescription">Description</label>
					<textarea name="educationDescription" data-ckeditor="yes" id="educationDescription" cols="30" rows="5" class="form__input"></textarea>
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
			<form action="<?php echo base_url('web/addAchievement'); ?>" method="POST" class="form">
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
									<option>June</option>
								</select>
							</div>
							<div class="form-group">
								<label for="startingYear">Year</label>
								<select name="startingYear" id="startingYear" class="select">
									<option>2017</option>
									<option>2016</option>
									<option>2015</option>
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
									<option>July</option>
								</select>
							</div>
							<div class="form-group">
								<label for="endingYear">Year</label>
								<select name="endingYear" id="endingYear" class="select">
									<option>2017</option>
									<option>2016</option>
									<option>2015</option>
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
	<div class="remodal edit-company-details" data-remodal-id="editCompanyDetails">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Company Details</h3>
			<form action="" method="POST" class="form">
				<div class="horizontal-group">
					<div class="form-group">
						<label for="companyName">Company's Name</label>
						<input type="text" class="form__input" placeholder="Company's name" id="companyName" name="companyName">
					</div>
					<div class="form-group">
						<label for="positionInCompany">Position</label>
						<input type="text" class="form__input" placeholder="Company's name" id="positionInCompany" name="positionInCompany">
					</div>
				</div>
				<div class="form-group">
					<label for="companyDescription">Description</label>
					<textarea name="companyDescription" id="companyDescription" cols="30" data-ckeditor="yes" rows="5" class="form__input"></textarea>
				</div>
				<div class="horizontal-group">
					<div class="form-group">
						<img src="" alt="" id="companyLogo">
						<input type="hidden" name="companyLogo">
					</div>
					<div class="form-group">
						<label for="logo">Company Logo</label>
						<input type="file" class="form__input" name="logo" id="logo">
					</div>
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
