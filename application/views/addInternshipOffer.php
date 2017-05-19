<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/add-offer.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
.skill{
  border-radius: 3px;
  display: inline-block;
  height: 28px;
  line-height: 28px;
  margin: 0 8px 6px 0;
  padding: 0 8px 0 8px;
  font-weight: 400;
  white-space: nowrap;
  background-color: #E0EDF5;
  color: #2F5D92;
}
</style>

</head>

<body>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<div class="explore-panel card flex">
				  <a href="<?php echo base_url('jobs/add-job-offer'); ?>" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 50.2 50.2" class="briefcase-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#briefcase-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Jobs</span>
				  </a>
				  <a href="<?php echo base_url('internships/add-internship-offer'); ?>" class="explore-panel__link active flex flex--col flex__item align-center">
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
						<a href="<?php echo base_url('internships/add-internship-offer'); ?>" class="nav__link js-nav-link active">Add Internship Offer</a>
						<a href="<?php echo base_url('internships/added-internship-offer'); ?>" class="nav__link js-nav-link">Added Internship Offers</a>
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
						<li><a href="<?php echo base_url('jobs/add-internship-offer'); ?>">Internships</a></li>
						<li class="active">Add Internship Offer</li>
					</ol>
				</div>
				<div class="add-offer__section card">
					<h1 class="add-offer__section-title">Add Internship Offer</h1>
					<form class="add-offer__form form">
					<label for="jobOfferTitle" class="form__label">Internship Offer Title</label>
					<input type="text" id="jobOfferTitle" placeholder="Job Offer Title" class="form__input">
					<label for="jobOfferDescription" class="form__label">Internship Offer Description</label>
					<textarea id="jobOfferDescription" placeholder="Job Offer Description" class="form__input"></textarea>
					<label for="openings" class="form__label">Number of Openings</label>
					<input type="text" id="openings" placeholder="Number of Openings" class="form__input">
					<label for="partTime" class="form__label">Part Time Allowed</label>
					<select type="text" id="partTime" placeholder="Part Time Allowed" class="form__input">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
					<div class="flex">
						<div class="form-group">
							<label for="startDate" class="form__label">Internship Start Date</label>
							<input type="date" id="startDate" placeholder="Internship Start Date" class="form__input">
						</div>
						<div class="form-group">
							<label for="applicationDeadline" class="form__label">Application Deadline</label>
							<input type="date" id="applicationDeadline" placeholder="Application Deadline" class="form__input">
						</div>
					</div>
					<label for="stipendType" class="form__label">Stipend Type</label>
					<select id="stipendType" placeholder="Stipend Type" class="form__input">
						<option value="1">No Stipend</option>
						<option value="1">Offered in Range</option>
						<option value="2">Fixed</option>
					</select>
					<label for="minimumStipend" class="form__label">Minimum Stipend</label>
					<input type="text" id="minimumStipend" placeholder="Minimum Stipend" class="form__input">
					<label for="maximumStipend" class="form__label">Maximum Stipend</label>
					<input type="text" id="maximumStipend" placeholder="Maximum Stipend" class="form__input">
					<label for="stipend" class="form__label">Stipend</label>
					<input type="text" id="stipend" placeholder="Stipend" class="form__input">
					<label for="applicants" class="form__label">Applicant Type</label>
					<select type="text" id="partTime" placeholder="Applicant Type" class="form__input">
						<option value="1">100% Match with Skills</option>
						<option value="2">Partial Match</option>
						<option value="3">Anyone can Apply</option>
					</select>

					<label class="form__label">Skills</label>
					<select id="skills" class="form__input" required>
						<?php foreach ($skills as $key => $value) { ?>
							<option value="<?php echo $value['skill_name'] ?>" skill-id="<?php echo $value['skillID'] ?>"><?php echo $value['skill_name'] ?></option>
					 <?php  } ?>
					</select>
					<a href="javascript:" class="addSkill">Add</a>
					<br><br>
					<div class="selectedSkills">
						<label class="form__label">Skills Required-</label>
						<input type="hidden" name="selected_skills">
					</div>
					<br><br><br><br><br><br>


					<input type="submit" value="Add Internship" class="btn btn--primary add-offer__form-submit">
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

		<script>
  	var skills_arr =[]
  	var selectedSkills = [];

  	$(document).on('click','.addSkill',function(){
  	  var skill ={}
  	  skill.skillname = $('#skills').find(":selected").val();
  	  skill.skillID = $('#skills').find(":selected").attr('skill-id');
  		if(!isAlreadyPresentSkill(skill.skillID)){
  	    var html='<p class="skill">'+skill.skillname+
  			' <a href="javascript:" data-skill="'+skill.skillname+'" index="'+selectedSkills.length+'" skill-id="'+skill.skillID+'">X</a></p>';
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

</body>

</html>
