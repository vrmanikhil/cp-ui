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
	<link href="<?php echo base_url('/assets/css/userProfile.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/croppie.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
</head>

<body>
	<?php
		$year = date('Y');
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
	<div class="layout-container flex flex--col">
		<?php if(isset($_SESSION['userData']['loggedIn'])){ echo $header; } else { echo $headerLogin; } ?>
		<main class="flex main-container globalContainer">
			<div class="main-body flex__item card">
				<div class="user__cover-pic" style="background: url('<?php echo $userDetails['coverImage']; ?>') center no-repeat; background-size: cover;">
					<?php if($userID == $_SESSION['userData']['userID']){ ?>
					<a href="javascript:" class="btn edit-cover-pic-btn js-edit-entity" data-json='' data-type="edit-user-cover-pic"><i class="fa fa-camera" aria-hidden="true"></i> Change cover Image</a>
					<?php } ?>
				</div>
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
								<a href="<?php echo base_url('messages/chats/').$userDetails['userID']; ?>" href="javascript:" class="btn message-btn"><i class="fa fa-envelope" aria-hidden="true"></i></a>
								<a href="<?php echo base_url('connections/removeConnection/').$userDetails['userID']."/".$_SESSION['userData']['userID']; ?>" onclick="alert('Are you sure you want to Remove the Connection?')" class="btn">Remove Connection</a>
							<?php
							}
						} ?>
					<?php } ?>
				</div>
				<div class="user__pic">
					<img src="<?php echo $userDetails['profileImage']; ?>" alt="">
					<?php $data = array('userProfilePic' => $userDetails['profileImage']); ?>
					<?php if($userID == $_SESSION['userData']['userID']){ ?>
					<div class="edit-user-pic">
						<a class="edit-user-pic-btn js-edit-entity" data-json='<?= json_encode($data) ?>' data-type="edit-user-profile-pic" href="javascript:"><i class="fa fa-camera" aria-hidden="true"></i></a>
					</div>
					<?php } ?>
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
										<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
											<a href="javascript:" class="btn btn--primary js-open-edit-modal"  data-modal-type="edit-education"><i class="fa fa-plus" aria-hidden="true"></i></a>
										<?php } ?>
								</h3>
								<div class="education-details__container">
									<?php if(empty($educationalDetails)) echo "<p>No Educational Details Found</p>"; else { foreach ($educationalDetails as $key => $value) { ?>
										<div class="education-details">
										<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
											<div class="action-btns">
												<a href="javascript:" data-json='<?= json_encode($value) ?>' data-type="edit-education" class="btn btn--primary js-edit-entity educationDetails"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="<?php echo base_url('web/delete/'.$value['educationID'].'/educationalDetails/educationID')?>" class="btn btn--primary delete-education"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</div>
										<?php } ?>
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
									<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-work-experience"><i class="fa fa-plus" aria-hidden="true"></i></a>
									<?php } ?>
								</h3>
								<div class="work-experience__container">
									<?php if(empty($workExperiences)) echo "<p>No Work Experiences Added</p>";
									else foreach ($workExperiences as $key => $value) { ?>
										<div class="work-experience">
										<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
											<div class="action-btns">
												<a href="javascript:" data-json='<?= json_encode($value) ?>' data-type="edit-work-experience" class="btn btn--primary js-edit-entity weDetails"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="<?php echo base_url('web/delete/'.$value['weID'].'/workExperience/weID')?>" class="btn btn--primary delete-work"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</div>
											<?php } ?>
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
									<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-projects"><i class="fa fa-plus" aria-hidden="true"></i></a>
									<?php } ?>
								</h3>
								<div class="projects__container">
									<?php if(empty($projects)) echo "<p>No Projects Added</p>";
									else foreach ($projects as $key => $value) { ?>
										<div class="project">
										<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
											<div class="action-btns">
												<a href="javascript:" data-json='<?= json_encode($value) ?>' data-type="edit-projects" class="btn btn--primary js-edit-entity projectDetails"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="<?php echo base_url('web/delete/'.$value['projectID'].'/projects/projectID')?>" class="btn btn--primary delete-project"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</div>
											<?php } ?>
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
									<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
									<a href="javascript:" class="btn btn--primary js-open-edit-modal" data-modal-type="edit-achievements"><i class="fa fa-plus" aria-hidden="true"></i></a>
									<?php } ?>
								</h3>
								<div class="achievements__container">
									<?php if(empty($achievements)) echo "<p>No Achievements Added</p>";
									else foreach ($achievements as $key => $value) { ?>
										<div class="achievement">
										<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
											<div class="action-btns">
												<a href="javascript:" data-json='<?= json_encode($value) ?>' data-type="edit-achievements" class="btn btn--primary js-edit-entity achievementDetails"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="<?php echo base_url('web/delete/'.$value['achievementID'].'/achievements/achievementID')?>" class="btn btn--primary delete-achievement"><i class="fa fa-trash" aria-hidden="true"></i></a>
											</div>
											<?php } ?>
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
								<?php foreach($skills as $skill){
									if($skill['skillType'] == 1){?>
									<div class="skill flex free">
										<p><?= $skill['skill_name']?></p>
									</div>
								<?php } else {?>
									<div class="skill flex paid">
										<p><?= $skill['skill_name']?></p>
									</div>
								<?php } } ?>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="personal-details">
							<h3 class="heading flex">
								<span>Personal Details</span>
								<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
								<a href="javascript:" data-json='<?= json_encode($userDetails) ?>' data-type="edit-personal-information" class="btn btn--primary js-edit-entity">Edit</a>
								<?php } ?>
							</h3>
							<p class="flex personal-info"><strong>Sex</strong><span><?php if($userDetails['gender']==="M") { echo "Male"; } else { echo "Female"; } ?></span></p>
							<p class="flex personal-info"><strong>Location</strong><span><?php echo $userDetails['city'].", ".$userDetails['state']; ?></span></p>
							<p class="flex personal-info"><strong>Email Address</strong><span><?= $userDetails['email']?></span></p>
							<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){
								if($userDetails['displayMobile'] == 1){?>
								<a href="<?=base_url('home/toggleMobilePrivacy/0/'.$_SESSION['userData']['userID'])?>" style ="float:right" class="btn btn--primary js-edit-entity">Hide Mobile</a>
								<?php }else{?>
								<a href="<?= base_url('home/toggleMobilePrivacy/1/'.$_SESSION['userData']['userID'])?>" style= "float: right" class="btn btn--primary js-edit-entity">Show Mobile</a>
							<?php } }?>
							<?php if($userDetails['displayMobile'] == 1 || $_SESSION['userData']['userID'] == $userDetails['userID']){?>
								<p class="flex personal-info"><strong>Mobile Number</strong><span><?= $userDetails['mobile']?></span></p>
							<?php } ?>
						</div>
						<?php if($userDetails['accountType']=='2') { ?>
						<div role="tabpanel" class="tab-pane fade" id="company-details">
							<h3 class="heading flex">
								<span>Company Details</span>
								<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
								<a href="javascript:" data-json='<?= json_encode($employerDetails[0]) ?>' data-type="edit-company-details" class="btn btn--primary js-edit-entity">Edit</a>
								<?php } ?>
							</h3>
							<div class="company-details__container">
								<p class="flex personal-info"><strong>Company Name</strong><span><?php echo $employerDetails[0]['companyName']; ?></span></p>
								<p class="flex personal-info"><strong>Position</strong><span><?php echo $employerDetails[0]['position']; ?></span></p>
								<p class="flex personal-info"><strong>Company Description </strong><span><?php echo $employerDetails[0]['companyDescription']; ?></span></p>
								<h3 class="heading flex">
									<span>Company Logo</span>
									<?php if($userDetails['userID'] == $_SESSION['userData']['userID']){?>
									<a href="javascript:" data-json='<?= json_encode($employerDetails[0]) ?>' data-type="edit-company-logo" class="btn btn--primary js-edit-entity">Update Logo</a>
									<?php } ?>
								</h3>
								<div class = "currentLogo">
									<strong>Company Logo</strong>
									<p class="flex personal-info"><span style ="padding-left: 30%"><img src="<?php echo $employerDetails[0]['companyLogo']; ?>"></span></p>
								</div>
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
						<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
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
			<form action="<?=base_url('web/editPersonalDetails')?>" method="POST" class="form">
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
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
			</form>
		</div>
	</div>
	<div class="remodal edit-education" data-remodal-id="editEducationModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Education Details</h3>
			<form action="<?= base_url('web/addEducation')?>" method="POST" class="form educationDet">
				<div class="horizontal-group">
					<div class="form-group">
						<label for="educationType">Type</label>
						<select class="select" name="educationType" id="educationType">
							<option value="1" selected="">High School</option>
							<option value="2" selected="">Senior Secondary or Equivalent</option>
							<option value="3" selected="">Graduation</option>
							<option value="4" selected="">Post-Graduation</option>
						</select>
					</div>
					<div class="form-group">
						<label for="educationYear">Year</label>
						<select name="educationYear" id="educationYear" class="select">
							<?php
								for($i = $year; $i>=1980; $i++){?>
								<option><?= $i?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="horizontal-group">
					<div class="form-group">
						<label for="educationScoreType">Score Type</label>
						<select class="select" name="scoreType" id="educationScoreType">
							<option value="1">CGPA</option>
							<option value="2">Percentage</option>
						</select>
					</div>
					<div class="form-group">
						<label for="educationScore">Score</label>
						<input type="number" name="score" id="educationScore" class="form__input" step = 0.01>
					</div>
				</div>
				<div class="form-group">
					<label for="educationDescription">Description</label>
					<textarea name="educationDescription" data-ckeditor="yes" id="educationDescription" cols="30" rows="5" class="form__input"></textarea>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn">Close</button>
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
			</form>
		</div>
	</div>
	<div class="remodal edit-achievements" data-remodal-id="editAchievementsModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Achievement</h3>
			<form action="<?php echo base_url('web/addAchievement'); ?>" method="POST" class="form achievementDet">
				<div class="form-group">
					<label for="achievementName">Name</label>
					<input type="text" class="form__input" placeholder="Achievement name" id="achievementName" name="achievementTitle">
				</div>
				<div class="form-group">
					<label for="achievementDescription">Description</label>
					<textarea name="achievementDescription" data-ckeditor="yes" id="achievementDescription" cols="30" rows="5" class="form__input"></textarea>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn">Close</button>
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
			</form>
		</div>
	</div>
	<div class="remodal edit-projects" data-remodal-id="editProjectsModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Project</h3>
			<form action="<?= base_url('web/addProject')?>" method="POST" class="form projectDet">
				<div class="form-group">
					<label for="projectName">Name</label>
					<input type="text" class="form__input" placeholder="Project name" id="projectName" name="projectTitle">
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
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
		</form>
	</div>
	<div class="remodal edit-work-experience" data-remodal-id="editWorkExperienceModal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Work Experience</h3>
			<form action="<?=base_url('web/addWorkEx')?>" method="POST" class="form workExDet">
				<div class="horizontal-group">
					<div class="form-group">
						<label for="companyName">Company's Name</label>
						<input type="text" class="form__input" placeholder="Company's name" id="companyName" name="companyName">
					</div>
					<div class="form-group">
						<label for="workingPosition">Working position</label>
						<input type="text" class="form__input" placeholder="Company's name" id="workingPosition" name="position">
					</div>
				</div>
				<div class="horizontal-group">
					<div class="form-group">
						<label>Starting Date</label>
						<div class="horizontal-group">
							<div class="form-group">
								<label for="startingMonth">Month</label>
								<select name="startMonth" id="startingMonth" class="select">
									<option>Jan</option>
									<option>Feb</option>
									<option>Mar</option>
									<option>April</option>
									<option>May</option>
									<option>June</option>
									<option>July</option>
									<option>Aug</option>
									<option>Sept</option>
									<option>Oct</option>
									<option>Nov</option>
									<option>Dec</option>
								</select>
							</div>
							<div class="form-group">
								<label for="startingYear">Year</label>
								<select name="startYear" id="startingYear" class="select">
									<?php
								for($i = $year; $i>=1980; $i++){?>
								<option><?= $i?></option>
							<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ending Date</label>
						<div class="horizontal-group">
							<div class="form-group">
								<label for="endingMonth">Month</label>
								<select name="endMonth" id="endingMonth" class="select">
									<option>Jan</option>
									<option>Feb</option>
									<option>Mar</option>
									<option>April</option>
									<option>May</option>
									<option>June</option>
									<option>July</option>
									<option>Aug</option>
									<option>Sept</option>
									<option>Oct</option>
									<option>Nov</option>
									<option>Dec</option>
								</select>
							</div>
							<div class="form-group">
								<label for="endingYear">Year</label>
								<select name="endYear" id="endingYear" class="select">
									<?php
								for($i = $year; $i>=1980; $i++){?>
								<option><?= $i?></option>
							<?php } ?>
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
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type="submit" class="btn btn--primary" value="Save">
				</div>
			</form>
		</div>
	</div>
	<div class="remodal edit-company-details" data-remodal-id="editCompanyDetails">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Company Details</h3>
			<form action="<?= base_url('web/editCompanyDetails')?>" method="POST" class="form">
				<div class="horizontal-group">
					<div class="form-group">
						<label for="companyName">Company's Name</label>
						<input type="text" class="form__input" placeholder="Company's name" id="companyName" name="companyName">
					</div>
					<div class="form-group">
						<label for="positionInCompany">Position</label>
						<input type="text" class="form__input" placeholder="Company's name" id="positionInCompany" name="position">
					</div>
				</div>
				<div class="form-group">
					<label for="companyDescription">Description</label>
					<textarea name="companyDescription" id="companyDescription" cols="30" data-ckeditor="yes" rows="5" class="form__input"></textarea>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn">Close</button>
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type = 'submit'  class="btn btn--primary upload-result" value="Save Changes">
				</div>
			</form>
		</div>
	</div>
	<div class="remodal edit-user-profile-pic" data-remodal-id="editUserProfilePic">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Edit Profile Pic</h3>
			<form action="<?= base_url('web/editUserProfilePic')?>" method="POST" class="form" enctype="multipart/form-data">
				<div class="horizontal-group">
					<div class="form-group">
						<img src="" alt="" id="userProfilePic">
					</div>
					<div class="form-group">
						<div class = "inputPic">
							<label for="updatedUserPic">Upload Profile Pic</label>
							<input type="file" class="form__input updatedUserPic" id="updatedUserPic" accept="image/*" name = img[]>
							<input type="hidden" name="profilePic">
						</div>
					</div>
				</div>
				<div class = "form-group">
					<div class = "crop" style = "display:none">
						<img src="" alt="" id="cropped-pic" hidden style ="padding-left: 25%">
					</div>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn save_pic" style="display: none">Close</button>
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type = 'submit'  class="btn btn--primary save_pic" value="Save Changes" style="display: none">
				</div>
			</form>
				<div class="form-group action-bar" style="float: right">
					<button data-remodal-action="close" class="btn upload-pic">Close</button>
					<button class="btn btn--primary upload-pic">Upload Image</button>
				</div>
		</div>
	</div>
	<div class="remodal edit-company-logo" data-remodal-id="editCompanyLogo">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Company Logo</h3>
			<form action="<?= base_url('web/editCompanyLogo')?>" method="POST" class="form" enctype="multipart/form-data">
				<div class="horizontal-group">
					<div class="form-group">
						<img src="" alt="" id="companyLogo">
					</div>
					<div class="form-group">
						<div class = 'inputLogo'>
							<label for="logo">Company Logo</label>
							<input type="file" class="form__input logo" id="logo" accept="image/*" name = img[]>
							<input type="hidden" name="companyLogo">
						</div>
					</div>
				</div>

				<div class = "form-group">
					<div class = "demo" style = "display:none">
						<img src="" alt="" id="cropped-img" hidden style ="padding-left: 25%">
					</div>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn submit-changes" style="display: none">Close</button>
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type = 'submit'  class="btn btn--primary submit-changes" value="Save Changes" style ="display: none">
				</div>
			</form>
			<div class="form-group action-bar" style="float: right">
				<button data-remodal-action="close" class="btn upload-result">Close</button>
				<button class="btn btn--primary upload-result">Upload Image</button>
			</div>
		</div>
	</div>
	<div class="remodal edit-user-cover-pic" data-remodal-id="editUserCoverPic">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<h3>Update Cover Image</h3>
			<form action="<?= base_url('web/changeCoverImage')?>" method="POST" class="form">
				<div class="horizontal-group">
					<div class="form-group">
						<div class="radio">
							<label class="cover-pic-option">
								<input type="radio" name="optionsRadios" id="optionsRadios" value="1" checked>
								<img src="<?php echo base_url('/assets/img/cover-001.jpg'); ?>" alt="">
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="radio">
							<label class="cover-pic-option">
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="2">
								<img src="<?php echo base_url('/assets/img/cover-002.jpg'); ?>" alt="">
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="radio">
							<label class="cover-pic-option">
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="3">
								<img src="<?php echo base_url('/assets/img/cover-003.jpg'); ?>" alt="">
							</label>
						</div>
					</div>
				</div>
				<div class="horizontal-group">
					<div class="form-group">
						<div class="radio">
							<label class="cover-pic-option">
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="4">
								<img src="<?php echo base_url('/assets/img/cover-004.jpg'); ?>" alt="">
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="radio">
							<label class="cover-pic-option">
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="5">
								<img src="<?php echo base_url('/assets/img/cover-005.jpg'); ?>" alt="">
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="radio">
							<label class="cover-pic-option">
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="6">
								<img src="<?php echo base_url('/assets/img/cover-006.jpg'); ?>" alt="">
							</label>
						</div>
					</div>
				</div>
				<div class="form-group action-bar">
					<button data-remodal-action="close" class="btn">Close</button>
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<input type = 'submit'  class="btn btn--primary upload-result" value="Save Changes">
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
	<script src="<?php echo base_url('/assets/js/croppie.js'); ?>"></script>
	<script>
		$(document).ready(function () {
			$(document).on('click', '.js-forgot-password', openForgotPsswdModal);
			function openForgotPsswdModal(ev) {
				var modal = $('[data-remodal-id="forgotPassword"]').remodal();
				modal.open();
			}
		});
		$(document).ready(function(){
			$('.delete-project').click(function(){
				alert('Are you sure you want delete the added Project??')
			});

			$('.delete-work').click(function(){
				alert('Are you sure you want delete the added Work Experience??')
			});

			$('.delete-achievement').click(function(){
				alert('Are you sure you want delete the added Achievement??')
			});

			$('.delete-education').click(function(){
				alert('Are you sure you want delete the added Educational Detail??')
			});
		});
	</script>

	<script type="text/javascript">
	var $uploadCrop;

	function readImgFile(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				console.log(e.target.result)
				$uploadCrop.croppie('bind', {
					url: e.target.result
				});
				$('.demo').show();
			}
			reader.readAsDataURL(input.files[0]);
		}
		else {
			alert("Sorry - you're browser doesn't support the FileReader API");
		}
	}
	$uploadCrop = $('#cropped-img').croppie({
		viewport: {
			width: 300,
			height: 300,
			type: 'square'
		},
		boundary: {
			width: 350,
			height: 350,
		},
		exif: false
	});

	$('#logo').on('change', function () { readImgFile(this)});
	$('.upload-result').on('click', function () {
			$uploadCrop.croppie('result',{
				type: 'canvas',
				size: 'viewport',
				format:'jpeg'
			}).then(function (resp) {
				console.log(resp)
				$('.upload-result').hide();
				$('.submit-changes').show();
				$('.cr-boundary').hide();
				$('.cr-slider-wrap').hide();
				$('.inputLogo').hide();
				$('#cropped-img').attr('src', resp)
				$('#cropped-img').show()
				$('input[name="companyLogo"]').val(resp)
			});
		});
	</script>
	<script type="text/javascript">
	var $uploadImage;

	function readFile(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$uploadImage.croppie('bind', {
					url: e.target.result
				});
				$('.crop').show();
			}
			reader.readAsDataURL(input.files[0]);
		}
		else {
			alert("Sorry - you're browser doesn't support the FileReader API");
		}
	}
	$uploadImage = $('#cropped-pic').croppie({
		viewport: {
			width: 300,
			height: 300,
			type: 'square'
		},
		boundary: {
			width: 350,
			height: 350,
		},
		exif: false
	});
	$('#updatedUserPic').on('change', function () { readFile(this)});
	$('.upload-pic').on('click', function () {
			$uploadImage.croppie('result',{
				type: 'canvas',
				size: 'viewport',
				format:'jpeg'
			}).then(function (resp) {
				console.log(resp)
				$('.upload-pic').hide();
				$('.save_pic').show();
				$('.cr-boundary').hide();
				$('.cr-slider-wrap').hide();
				$('.inputPic').hide();
				$('#cropped-pic').attr('src', resp)
				$('#cropped-pic').show()
				$('input[name="profilePic"]').val(resp)
				$('#userProfilePic').hide()
			});
		});
	</script>
</body>
</html>
