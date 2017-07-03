<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/add-offer.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
				  <a href="<?php echo base_url('jobs/add-job-offer'); ?>" class="explore-panel__link active flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 50.2 50.2" class="briefcase-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#briefcase-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Jobs</span>
				  </a>
				  <a href="<?php echo base_url('internships/add-internship-offer'); ?>" class="explore-panel__link flex flex--col flex__item align-center">
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
						<a href="<?php echo base_url('jobs/add-job-offer'); ?>" class="nav__link js-nav-link active">Add Job Offer</a>
						<a href="<?php echo base_url('jobs/added-job-offer'); ?>" class="nav__link js-nav-link">Added Job Offers</a>
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
			<div class="main-body flex__item">
				<div class="card">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url('jobs/add-job-offer'); ?>">Jobs</a></li>
						<li class="active">Add Job Offer</li>
					</ol>
				</div>
				
				<div class="add-offer__section card">
					<h1 class="add-offer__section-title">Add Job Offer</h1>
					<form class="add-offer__form form" method="post" action="<?php echo base_url('employers/editJobOffer'); ?>">
					<label for="jobOfferTitle" class="form__label">Job Offer Title</label>
					<input type="text" id="jobOfferTitle" name="jobOfferTitle" placeholder="Job Offer Title" class="form__input" value="<?php echo $jobDetails['jobTitle']; ?>" required>
					<label for="jobOfferDescription" class="form__label">Job Offer Description</label>
					<textarea id="jobOfferDescription" name="jobOfferDescription" placeholder="Job Offer Description" class="form__input" required><?php echo $jobDetails['jobDescription']; ?></textarea>
					<div class="flex">
						<div class="form-group">
							<label for="openings" class="form__label">Number of Openings</label>
							<input type="text" id="openings" name="openings" placeholder="Number of Openings" class="form__input" value="<?php echo $jobDetails['openings']; ?>" required>
						</div>
						<div class="form-group">
							<label for="partTime" class="form__label">Part Time Allowed</label>
							<select type="text" id="partTime" name="partTime" placeholder="Part Time Allowed" class="form__input" required>
								<option value="1" <?php if($jobDetails['partTime']=='1') echo "selected"; ?>>Yes</option>
								<option value="2" <?php if($jobDetails['partTime']=='2') echo "selected"; ?>>No</option>
							</select>
						</div>
					</div>
					<div class="flex">
						<div class="form-group">
							<label for="startDate" class="form__label">Joining Date</label>
							<input type="date" id="startDate" name="startDate" placeholder="Start Date" class="form__input" value="<?php echo $jobDetails['startDate']; ?>" required>
						</div>
						<div class="form-group">
							<label for="applicationDeadline" class="form__label">Application Deadline</label>
							<input type="date" id="applicationDeadline" name="applicationDeadline" placeholder="Application Deadline" class="form__input" value="<?php echo $jobDetails['applicationDeadline']; ?>" required>
						</div>
					</div>
					<label for="salaryType" class="form__label">Salary Type</label>
					<select id="salaryType" name="salaryType" placeholder="Salary Type" class="form__input" required>
						<option value="1" <?php if($jobDetails['offerType']=='1') echo "selected"; ?>>Offered in Range</option>
						<option value="2" <?php if($jobDetails['offerType']=='2') echo "selected"; ?>>Fixed Offer</option>
					</select>
					<div class="flex" id="offeredRange" <?php if($jobDetails['offerType']=='1'){}else{?> style="display: none;"<?php } ?>>
						<div class="form-group">
							<label for="minimumOffer" class="form__label">Minimum Salary Offered</label>
							<input type="text" id="minimumOffer" name="minimumOffer" placeholder="Minimum Salary (in lakhs)" class="form__input" value = "<?= $jobDetails['minimumOffer']?>">
						</div>
						<div class="form-group">
							<label for="maximumOffer" class="form__label">Maximum Salary Offered</label>
							<input type="text" id="maximumOffer" name="maximumOffer" placeholder="Maximum Salary (in lakhs)" class="form__input" value = "<?= $jobDetails['maximumOffer']?>">
						</div>
					</div>
					<div id="salaryOffered" <?php if($jobDetails['offerType']=='2'){}else{?> style="display: none;"<?php } ?>>
					<label for="salary" class="form__label">Salary Offer</label>
					<input type="text" id="salary" name="salary" placeholder="Salary Offered (in lakhs)" class="form__input" value = "<?= $jobDetails['offer']?>">
					</div>
					<div class="flex">
						<div class="form-group">
							<label for="applicants" class="form__label">Applicant Type</label>
							<select type="text" id="applicants" name="applicants" placeholder="Applicant Type" class="form__input" required>
								<option value="3" <?php if($jobDetails['applicants']=='3') echo "selected"; ?>>Anyone can Apply</option>
								<option value="1" <?php if($jobDetails['applicants']=='1') echo "selected"; ?>>100% Match with Skills</option>
								<option value="2" <?php if($jobDetails['applicants']=='2') echo "selected"; ?>>Partial Match</option>
							</select>
						</div>
						<div class="form-group">
							<label for="jobType" class="form__label">Job Type</label>
							<select type="text" id="jobType" name="jobType" placeholder="Applicant Type" class="form__input" required>
								<option value="1" <?php if($jobDetails['jobType']=='1') echo "selected"; ?>>Work from Home</option>
								<option value="2" <?php if($jobDetails['jobType']=='2') echo "selected"; ?>>In-Office/On-Field</option>
							</select>
						</div>
					</div>
					<div id="skillsDiv" <?php if($jobDetails['applicants'] != 3){}else{?> style="display:none;"<?php }?>>
					<div class="flex">
						<div class="form-group" style="width: 85%;">
							<label class="form__label">Skills</label>
							<select id="skills" class="form__input" required>
								<?php foreach ($skills as $key => $value) { ?>
									<option value="<?php echo $value['skill_name'] ?>" skill-id="<?php echo $value['skillID'] ?>"><?php echo $value['skill_name'] ?></option>
							 <?php  } ?>
							</select>
						</div>
						<div class="form-group" style="margin-top: 38px; width: 15%;">
							<a href="javascript:" class="addSkill btn btn--primary add-skill-location">Add</a>
						</div>
					</div>
					<div class="selectedSkills">
						<label class="form__label">Skill(s) Required-</label>
						<?php if($jobDetails['skillsRequired'] != NULL){?>
							<?php $skillsRequired = explode(",", $jobDetails['skillsRequired']);
							$skillIDsRequired = explode(",", $jobDetails['skillIDsRequired']);?>
						 <?php for($i = 0; $i < sizeof($skillsRequired);$i++){
						 	$skill[$i] = ['skillname' => $skillsRequired[$i], 'skillID' => $skillIDsRequired[$i]];		
						 	?>
						<p class="skill"><?=$skillsRequired[$i]?><a href="javascript:" data-skill="<?= $skillsRequired[$i]?>" index="<?=$i?>" skill-id="<?=$skillIDsRequired[$i]?>"><i class="fa fa-times red" aria-hidden="true"></i></a></p>
						<?php }}else{$skill = [];}?>
						<input type="hidden" name="selected_skills" value = '<?=json_encode($skill)?>'>
					</div>
					</div>
					<div id="cityLocations" <?php if($jobDetails['jobType'] != 1){}else{?> style="display:none;"<?php }?>>
					<div class="flex">
						<div class="form-group" style="width: 85%;">
							<label class="form__label">Locations</label>
							<select id="locations" class="form__input" required>
								<?php foreach ($locations as $key => $value) { ?>
									<option value="<?php echo $value['city'].", ".$value['state']; ?>" location-id="<?php echo $value['cityID'] ?>"><?php echo $value['city'].", ".$value['state']; ?></option>
							 <?php  } ?>
							</select>
						</div>
						<div class="form-group" style="margin-top: 38px; width: 15%;">
							<a href="javascript:" class="addLocation btn btn--primary add-skill-location">Add</a>
						</div>
					</div>
					<div class="selectedLocations">
						<label class="form__label">Internship Location(s)-</label>
						<?php if($jobDetails['cities'] != NULL){?>
							<?php $cities = explode(",", $jobDetails['cities']);
							$cityIDs = explode(",", $jobDetails['cityIDs']);?>	
						<?php for($i = 0; $i < sizeof($cities);$i++){
							$location[$i] = ['city_name' => $cities[$i], 'location_id' => $cityIDs[$i]];
							?>
						<p class="location"><?= $cities[$i]?><a href="javascript:" data-location="<?=$cities[$i]?>" index="<?=$i?>" location-id="<?=$cityIDs[$i]?>"><i class="fa fa-times red" aria-hidden="true"></i></a></p>
						<?php }}else{$location = [];} ?>
						<input type="hidden" name="selected_locations" value = '<?=json_encode($location)?>'>
					</div>
					</div>
					<input type="submit" value="Edit Job Offer" class="btn btn--primary add-offer__form-submit">
				</form>
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
	<script src="<?= base_url('assets/ckeditor/ckeditor.js')?>"></script>
	<script>
		$(document).ready(function(){
			editor = CKEDITOR.replace('jobOfferDescription');
		});
		</script>
		<script type="text/javascript">

		 $('#salaryType').on('change',function(){
		   if( $(this).val()==="2"){
		     $("#salaryOffered").show()
		   }
		   else{
		     $("#salaryOffered").hide()
		   }
		 });
		 $('#salaryType').on('change',function(){
		   if( $(this).val()==="1"){
		     $("#offeredRange").show()
		   }
		   else{
		     $("#offeredRange").hide()
		   }
		 });
		 $('#jobType').on('change',function(){
			 if( $(this).val()==="2"){
				 $("#cityLocations").show()
			 }
			 else{
				 $("#cityLocations").hide()
			 }
		 });
		 $('#durationType').on('change',function(){
			 if( $(this).val()==="1"){
				 $("#durationValue").show()
			 }
			 else{
				 $("#durationValue").hide()
			 }
		 });
		</script>
		<script type="text/javascript">

		 $('#applicants').on('change',function(){
		   if( $(this).val()==="3"){
		     $("#skillsDiv").hide()
		   }
		   else{
		     $("#skillsDiv").show()
		   }
		 });
		</script>
		<script>
  	var skills_arr =[]
  	var selectedSkills = <?=json_encode($skill)?>;

  	$(document).on('click','.addSkill',function(){
  	  var skill ={}
  	  skill.skillname = $('#skills').find(":selected").val();
  	  skill.skillID = $('#skills').find(":selected").attr('skill-id');
  		if(!isAlreadyPresentSkill(skill.skillID)){
  	    var html='<p class="skill">'+skill.skillname+
  			' <a href="javascript:" data-skill="'+skill.skillname+'" index="'+selectedSkills.length+'" skill-id="'+skill.skillID+'"><i class="fa fa-times red" aria-hidden="true"></i></a></p>';
  	    selectedSkills.push(skill);
  	    $('.selectedSkills').append(html);
  	  }
  	  $("input[name=\"selected_skills\"]").val(JSON.stringify(selectedSkills));
  	});

  	    function isAlreadyPresentSkill(id){
  	        if(selectedSkills.length == 0)
  	            return false
  	        var alreadyPresent = false
  					selectedSkills.forEach(function(value){
  	            if(value.skillID == id)
  	                alreadyPresent =true
  	        })
  	        return alreadyPresent
  	    }
  	$(document).on('click','.skill a',function(){
  	  var skill = $(this).attr('data-skill');
  	 	var parent = $(this).parent();

  	  if(selectedSkills.length > 0)
  	  {
  	    delete selectedSkills[$(this).attr('index')]
  	    $(this).parent().remove();
  	  }
  	  $("input[name=\"selected_skills\"]").val(JSON.stringify(selectedSkills));
  	});

  	</script>

		<script>
		var locations_arr =[]
		var selectedLocations = <?=json_encode($location)?>;

		$(document).on('click','.addLocation',function(){
		  var locations ={};
		  locations.city_name = $('#locations').find(":selected").val();
		  locations.location_id = $('#locations').find(":selected").attr('location-id');
		  if(!isAlreadyPresent(locations.location_id)){
		    var html='<p class="location">'+locations.city_name+' <a href="javascript:" data-location="'+locations.city_name+'" index="'+selectedLocations.length+'" location-id="'+locations.location_id+'"><i class="fa fa-times red" aria-hidden="true"></i></a></p>';
		    selectedLocations.push(locations);
		    $('.selectedLocations').append(html);
		  }
		  $("input[name=\"selected_locations\"]").val(JSON.stringify(selectedLocations));

		});

		function isAlreadyPresent(id){
		    if(selectedLocations.length == 0)
		    	return false;
		    var alreadyPresent = false;
		      selectedLocations.forEach(function(value){
		      if(value.location_id == id)
		          alreadyPresent =true;
		        })
		        return alreadyPresent;
		    }
		$(document).on('click','.location a',function(){
		  var location = $(this).attr('data-location');
		 	var parent = $(this).parent();

		  if(selectedLocations.length > 0)
		  {
		    delete selectedLocations[$(this).attr('index')]
		    $(this).parent().remove();
		  }
		  $("input[name=\"selected_locations\"]").val(JSON.stringify(selectedLocations));
		});
		</script>
</body>

</html>
