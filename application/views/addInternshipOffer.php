<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Internship Offer|CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/add-offer.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">

</head>

<body>
	<?php
	if(isset($input)){
		$inputs = $input['inputs'];
	}
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>

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
					<form class="add-offer__form form" method="post" action="<?php echo base_url('employers/addInternshipOffer'); ?>">
					<label for="internshipOfferTitle" class="form__label">Internship Offer Title</label>
					<?php if(!isset($inputs['internshipTitle'])){$inputs['internshipTitle'] = '';}?>
					<input type="text" id="internshipOfferTitle" name="internshipOfferTitle" placeholder="Internship Offer Title" value = "<?=$inputs['internshipTitle']?>"  class="form__input" required>
					<label for="internshipOfferDescription" class="form__label">Internship Offer Description</label>
					<?php if(!isset($inputs['internshipDescription'])){$inputs['internshipDescription'] = '';}?>
					<textarea id="internshipOfferDescription" name="internshipOfferDescription" placeholder="Internship Offer Description" class="form__input" required><?=$inputs['internshipDescription']?></textarea>
					<div class="flex">
						<div class="form-group">
						<?php if(!isset($inputs['openings'])){$inputs['openings'] = '';}?>
							<label for="openings" class="form__label">Number of Openings</label>
							<input type="text" id="openings" name="openings" placeholder="Number of Openings" value = "<?=$inputs['openings']?>" class="form__input" required>
						</div>
						<div class="form-group">
						<?php if(!isset($inputs['partTime'])){$inputs['partTime']= '';}?>
							<label for="partTime" class="form__label">Part Time Allowed</label>
							<select type="text" id="partTime" name="partTime" placeholder="Part Time Allowed" class="form__input" required>
								<option value="1" <?php if($inputs['partTime'] == 1){echo "selected";}?>>Yes</option>
								<option value="2" <?php if($inputs['partTime'] == 2){echo "selected";}?>>No</option>
							</select>
						</div>
					</div>
					<div class="flex">
						<div class="form-group">
						<?php if(!isset($inputs['startDate'])){$inputs['startDate'] = '';}?>
							<label for="startDate" class="form__label">Internship Start Date</label>
							<input type="date" id="startDate" name="startDate" placeholder="Internship Start Date" value="<?=$inputs['startDate']?>" class="form__input" required>
						</div>
						<div class="form-group">
						<?php if(!isset($inputs['applicationDeadline'])){$inputs['applicationDeadline'] = '';}?>
							<label for="applicationDeadline" class="form__label">Application Deadline</label>
							<input type="date" id="applicationDeadline" name="applicationDeadline" placeholder="Application Deadline" value = "<?= $inputs['applicationDeadline']?>" class="form__input" required>
						</div>
					</div>
					<div class="flex">
						<div class="form-group">
						<?php if(!isset($inputs['durationType'])){$inputs['durationType'] = '';}?>
							<label for="durationType" class="form__label">Duration Type</label>
							<select type="text" id="durationType" name="durationType" placeholder="Duration Type" class="form__input" required>
								<option value="1" <?php if($inputs['durationType'] == 1){echo "selected";}?>>Fixed</option>
								<option value="2" <?php if($inputs['durationType'] == 2){echo "selected";}?>>Flexible</option>
							</select>
						</div>
						<div class="form-group" id="durationValue">
						<?php if(!isset($inputs['duration'])){$inputs['duration'] = '';}?>
							<label for="duration" class="form__label">Duration (in weeks)</label>
							<input type="text" id="duration" name="duration" placeholder="Duration" value="<?=$inputs['duration']?>" class="form__input">
						</div>
					</div>
					<?php if(!isset($inputs['stipendType'])){$inputs['stipendType'] = '';}?>
					<label for="stipendType" class="form__label">Stipend Type</label>
					<select id="stipendType" name="stipendType" placeholder="Stipend Type" class="form__input" required>
						<option value="1" <?php if($inputs['stipendType'] == 1){echo "selected";}?>>No Stipend</option>
						<option value="2" <?php if($inputs['stipendType'] == 2){echo "selected";}?>>Expenses Covered</option>
						<option value="3" <?php if($inputs['stipendType'] == 3){echo "selected";}?>>Offered in Range</option>
						<option value="4" <?php if($inputs['stipendType'] == 4){echo "selected";}?>>Fixed Stipend</option>
					</select>
					
					<div class="flex" id="offeredRange" <?php if($inputs['stipendType']=='3'){}else{?> style="display: none;"<?php } ?>>
						<div class="form-group">
						<?php if(!isset($inputs['minimumStipend'])){$inputs['minimumStipend'] = '';}?>
							<label for="minimumStipend" class="form__label">Minimum Stipend</label>
							<input type="text" id="minimumStipend" name="minimumStipend" placeholder="Minimum Stipend" value = "<?= $inputs['minimumStipend']?>" class="form__input">
						</div>
						<div class="form-group">
						<?php if(!isset($inputs['maximumStipend'])){$inputs['maximumStipend'] = '';}?>
							<label for="maximumStipend" class="form__label">Maximum Stipend</label>
							<input type="text" id="maximumStipend" name="maximumStipend" placeholder="Maximum Stipend" value = "<?= $inputs['maximumStipend']?>" class="form__input">
						</div>
					</div>
					<div id="fixedStipend" <?php if($inputs['stipendType']=='4'){}else{?> style="display: none;"<?php }?>>
					<?php if(!isset($inputs['stipend'])){$inputs['stipend'] = '';}?>
					<label for="stipend" class="form__label">Stipend</label>
					<input type="text" id="stipend" name="stipend" placeholder="Stipend" value = "<?= $inputs['stipend']?>" class="form__input">
					</div>
					<div class="flex">
						<div class="form-group">
							<?php if(!isset($inputs['applicants'])){$inputs['applicants'] = '';}?>
							<label for="applicants" class="form__label">Applicant Type</label>
							<select type="text" id="applicants" name="applicants" placeholder="Applicant Type" class="form__input" required>
								<option value="3" <?php if($inputs['applicants'] == 3){echo "selected";}?>>Anyone can Apply</option>
								<option value="1" <?php if($inputs['applicants'] == 1){echo "selected";}?>>100% Match with Skills</option>
								<option value="2" <?php if($inputs['applicants'] == 2){echo "selected";}?>>Partial Match</option>
							</select>
						</div>
						<div class="form-group">
						<?php if(!isset($inputs['internshipType'])){$inputs['internshipType'] = '';}?>
							<label for="internshipType" class="form__label">Internship Type</label>
							<select type="text" id="internshipType" name="internshipType" placeholder="Applicant Type" class="form__input" required>
								<option value="1" <?php if($inputs['internshipType'] == 1){echo "selected";}?>>Work from Home</option>
								<option value="2" <?php if($inputs['internshipType'] == 2){echo "selected";}?>>In-Office/On-Field</option>
							</select>
						</div>
					</div>
					<div id="skillsDiv" <?php if($inputs['applicants'] == 1 || $inputs['applicants'] == 2){}else{?> style="display:none;"<?php }?>>
					<div class="flex">
						<div class="form-group" style="width: 85%;">
							<label class="form__label">Skills</label>
							<select id="skills" class="form__input">
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
						<?php  if(isset($input['skillInp']) && $input['skillInp'] != NULL){ 
							$skill_name =array_column($input['skillInp'],'skillname');
							$skillID = array_column($input['skillInp'], 'skillID');?>	
						 <?php 
						 $skill = [];
						 for($i = 0; $i < sizeof($skill_name);$i++){
						 	$skill[$i] = ['skillname' => $skill_name[$i], 'skillID' => $skillID[$i]];
						 	?>
						<p class="skill"><?=$skill_name[$i]?><a href="javascript:" data-skill="<?= $skill_name[$i]?>" index="<?=$i?>" skill-id="<?=$skillID[$i]?>"><i class="fa fa-times red" aria-hidden="true"></i></a></p>
						<?php }}else{$skill = [];}?>
						<input type="hidden" name="selected_skills" value = '<?=json_encode($skill)?>'>
					</div>
					</div>
					<div id="cityLocations" <?php if($inputs['internshipType'] == 2){}else{?> style="display:none;"<?php }?>>
					<div class="flex">
						<div class="form-group" style="width: 85%;">
							<label class="form__label">Locations</label>
							<select id="locations" class="form__input">
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
						<?php if(isset($input['cityInp']) && $input['cityInp'] != NULL){
							$city =array_column($input['cityInp'],'city');
							$cityID = array_column($input['cityInp'], 'cityID');?>
						<?php 
						$location = [];
						for($i = 0; $i < sizeof($city);$i++){
							$location[$i] = ['city_name' => $city[$i], 'location_id' => $cityID[$i]];
							?>
						<p class="location"><?= $city[$i]?><a href="javascript:" data-location="<?=$city[$i]?>" index="<?=$i?>" location-id="<?=$cityID[$i]?>"><i class="fa fa-times red" aria-hidden="true"></i></a></p>
						<?php }}else{$location = [];} ?>
						<input type="hidden" name="selected_locations" value = '<?=json_encode($location)?>'>
					</div>
					</div>
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
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
	<script type="text/javascript">

	 $('#stipendType').on('change',function(){
	   if( $(this).val()==="4"){
	     $("#fixedStipend").show()
	   }
	   else{
	     $("#fixedStipend").hide()
	   }
	 });
	 $('#stipendType').on('change',function(){
	   if( $(this).val()==="3"){
	     $("#offeredRange").show()
	   }
	   else{
	     $("#offeredRange").hide()
	   }
	 });
	 $('#internshipType').on('change',function(){
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
		$(document).ready(function(){
			editor = CKEDITOR.replace('internshipOfferDescription');
		});
		</script>

		<script>
  	var skills_arr =[]
  	var selectedSkills = <?php if(isset($skill)){echo json_encode($skill);}else{ echo '[]';}?>;

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
		var selectedLocations = <?php if(isset($location)){echo json_encode($location);}else{ echo '[]';}?>;

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
