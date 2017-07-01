<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/jobs.css'); ?>" rel="stylesheet">
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
				  <a href="<?php echo base_url('jobs/job-offers'); ?>" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 50.2 50.2" class="briefcase-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#briefcase-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Jobs</span>
				  </a>
				  <a href="<?php echo base_url('internships/internship-offers'); ?>" class="explore-panel__link active flex flex--col flex__item align-center">
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
						<a href="<?php echo base_url('internships/relevant-internships'); ?>" class="nav__link js-nav-link">Relevant Internship Offers</a>
						<a href="<?php echo base_url('internships/internship-offers'); ?>" class="nav__link js-nav-link active">Browse Internship Offers</a>
						<a href="<?php echo base_url('internships/applied-internship-offers'); ?>" class="nav__link js-nav-link">Applied Internship Offers</a>
					</div>
				</div>
				<div class="card card--no-padding search-filter">
					<form action = "<?= base_url('internships/internship-offers')?>" method="POST">
					<div class="card card--no-padding search-filter">
						<div class="search-filter__head">
							<p><strong>Locations</strong></p>
						</div>
						<div class="search-filter__body">
							<div class="search-filter__list js-prevent-body-scroll">
								<table id = "location-list" class = "display" width = "100%"></table>
							</div>
						</div>
					</div>
					<div class="card card--no-padding search-filter">
						<div class="search-filter__head">
							<p><strong>Skills</strong></p>
						</div>
						<div class="search-filter__body">
							<div class="search-filter__list js-prevent-body-scroll">
								<table id = "skill-list" class = " table cell-border" cellspacing="0" width = "100%"></table>
							</div>
						</div>
					</div>
					<input type="hidden" name="filter" value="1">
					<center>
					<a href = "<?= base_url('clear-filter/1/1')?>"  style = "color: var(--midnight-blue); text-decoration: none;"><b>Clear Filters</b></a>
					<input type = "submit" class = "apply-filter" name = "submit" style = "background: var(--midnight-blue); color: white; padding: 7px; border: 1px solid var(--midnight-blue); text-decoration: none; width: 45%" value = "Apply Filter">
					</center>
				</form>
				<div class="post card" style="margin-top: 10px;">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="card">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url('internships/internship-offers'); ?>">Internships</a></li>
						<li class="active">Browse Internship Offers</li>
					</ol>
				</div>
				<?php if(empty($internshipOffers)) { ?>
				<p style="text-align: center"> No Internship Offers Found.</p>
				<?php }else{ foreach ($internshipOffers as $key => $value) { ?>

				<div class="card posting-card">
					<div class="flex media">
						<img src="<?php echo $value['companyLogo']; ?>" alt="user" class="media-figure posting-card__img">
						<div class="media-body flex flex--col">
							<p class="posting-card__title">
								<strong><?php echo $value['companyName']; ?></strong>
							</p>
							<p class="posting-card__desc"><?php echo $value['internshipTitle']; ?></p>
							<p class="posting-card__post-location">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<span><?php if($value['internshipType']=='1'){ echo "Work from Home"; } else { echo $value['cities']; } ?></span>
							</p>
							<p class="posting-card__status" style="font-size: 0.9rem;"><strong>Skills</strong> : <span style="font-size: 0.9rem;"><?php if($value['skillsRequired'] == ''){ echo "No Specific Skills Required"; } else { echo $value['skillsRequired']; } ?></span></p>
							<div class="posting-card__apply">
								<button data-id="<?php echo $value['internshipID']; ?>" class="btn white midnight-blue-bg s-14 view js-view-posting-details"  id = "view<?= $value['internshipID'] ?>">View</button>
							</div>
						</div>
					</div>
				</div>

				<?php } }?>
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
			<h1>Offer <small id = "jobTitle"></small></h1>
			<div class="flex">
			<div class="modal-body__left flex__item">
			<div class="col-md-9">
              <div class="col-sm-12">
                <form class="form-horizontal">

                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Internship Offer Description:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobDescription">Internship Offer Description</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Internship Start Date:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobStart">Internship Start Date</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Application Deadline:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobDeadline">Application Deadline</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Offer:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobOffer">Offer</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Duration:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "duration">Duration</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Number of Openings:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobOpening">Number of Openings</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Part Time Allowed:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobTime">Part Time Allowed</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Skills:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobSkill">Skills</p>
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label col-sm-3"><strong>Internship Offer Location:</strong></label>
                <div class="col-sm-9">
                  <p class="form-control-static" id = "jobType"><?php echo "Work from Home"; ?></p>
                </div>
              </div>
              </form>
              </div>
            </div>
		</div>
					<aside class="modal-body__right flex__item">
						<center><strong>Company Profile</strong></center>
						<br>
						<strong id = "companyName">companyName</strong>
						<br>
						<p id = "companyWebsite">Company Website</p>
						<p id = "companyDescription">Company Description</p>
						<a href = "" id = "apply"><button type="button" class="btn--apply">APPLY</button></a>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/jobs.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.view').click(function(){
				var data = null
				id = this.id
				id = $('#'+id).attr('data-id')
				data = {internshipID : id}
				$.get('<?= base_url('home/getInternshipDetails')?>', data).done(function(res){
					res = JSON.parse(res)
					console.log(res)
					$("#jobTitle").html(res[0].internshipTitle)
					$("#jobDescription").html(res[0].internshipDescription)
					$("#jobStart").html(res[0].startDate)
					$("#jobDeadline").html(res[0].applicationDeadline)
					if(res[0].stipendType == "4"){
						$("#jobOffer").html("INR " + res[0].stipend)
					}
					else if(res[0].stipendType == "3"){
						$("#jobOffer").html('INR ' + res[0].minimumStipend + ' - INR ' + res[0].maximumStipend)
					}else if(res[0].stipendType == "2"){
						$("#jobOffer").html('Expenses Covered')
					}else {
						$("#jobOffer").html('No Stipend')
					}
					if(res[0].durationType == '1'){
						$("#duration").html(res[0].duration + ' months')
					}else{
						$("#duration").html('Flexible')
					}
					$("#jobOpening").html(res[0].openings)
					if(res[0].partTime == "1")
						$("#jobTime").html('YES')
					else
						$("#jobTime").html('NO')
					if(res[0].skillsRequired == null)
						$("#jobSkill").html("No Skills Required")
					else
						$("#jobSkill").html(res[0].skillsRequired)
					if(res[0].internshiptype == "1")
						$("#jobType").html("Work From Home")
					else
						$('#jobType').html(res[0].cities)
					$("#companyName").html(res[0].companyName)
					$("#companyWebsite").html(res[0].companyWebsite)
					$("#companyDescription").html(res[0].companyDescription)
					$('#apply').attr('href',"<?= base_url('apply/apply?internshipID=')?>"+res[0].internshipID)
				}).fail(function(){

				})
			})
		})

	</script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/dataTables.responsive.js'); ?>"></script>

	<script type="text/javascript">
	var skill = [];
	var locate = [];
	var	filterskills = <?= $filterskills?>;
	var filterlocations = <?= $filterlocations?>;
	$(document).ready(function() {
		$.ajax({
			method:'GET',
			url:'/home/getLocationsSkills',
			data:{job : '0' }
		}).done(function(data){
			data = JSON.parse(data)
			locations = data.locations
			skills = data.skills
			for(var i = 0 ; i < skills.length; i++){
				if(filterskills){
					if(filterskills.indexOf(skills[i].skillID) !== -1){
						skill[i] = ["<input type = 'checkbox' class = 'skills' name = 'skill[]' value = "+skills[i].skillID+" checked>" + skills[i].skill_name];
					}else{
						skill[i] = ["<input type = 'checkbox' class = 'skills' name = 'skill[]' value = "+skills[i].skillID+">" + skills[i].skill_name];
					}
				}else{
					skill[i] = ["<input type = 'checkbox' class = 'skills' name = 'skill[]' value = "+skills[i].skillID+">" + skills[i].skill_name];
				}
			}
			for(var i = 0 ; i < locations.length; i++){
				if(filterlocations){
					if(filterlocations.indexOf(locations[i].cityID) !== -1){
						locate[i] = ["<input type = 'checkbox' class = 'locations' name = 'location[]' value = "+locations[i].cityID+" checked>" + locations[i].city];
					}else{
						locate[i] = ["<input type = 'checkbox' class = 'locations' name = 'location[]' value = "+locations[i].cityID+">" + locations[i].city];
					}
				}else{
					locate[i] = ["<input type = 'checkbox' class = 'locations' name = 'location[]' value = "+locations[i].cityID+">" + locations[i].city];
				}

			}

			$('#skill-list').DataTable( {
		    	"oLanguage": {
		  						"sSearch": '<label><strong>Search</strong></label>',
							},
		    	"dom" : '<"form-control"fl><"top">rt<"bottom"ip><"clear">',
		    	"paging" : false,
		    	"retrieve": true,
		      	"info" : false,
		        "data" : skill,
		        "columns" : [
		            { "title": "" }
		        ]
		    });

		    $('#location-list').DataTable( {
		    	"oLanguage": {
		  						"sSearch": '<label><strong>Search</strong></label>',
							},
		    	"dom" : '<"form-control"fl><"top">rt<"bottom"ip><"clear">',
		    	"paging" : false,
		    	"retrieve": true,
		      	"info" : false,
		        "data": locate,
		        "columns"	: [
		            { "title": "" }
		        	]
		    });
		});
		});
	</script>
</body>

</html>
