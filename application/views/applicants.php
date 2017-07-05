<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Applicants|CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/applicants.css'); ?>" rel="stylesheet">
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
				<div class="card card--no-padding search-filter">
					<form action = "<?= base_url('home/applicants/'.$offerType.'/'.$offerID)?>" method="POST">
					<div class="card card--no-padding search-filter">
						<div class="search-filter__head">
							<p><strong>Filters</strong></p>
						</div>
						<div class="search-filter__body filters">
							<div class="search-filter__list">
								<input type="checkbox" name="filter[]" value='4' class="filters4"> Hired<br>
								<input type="checkbox" name="filter[]" value='3' class="filters3"> Shortlisted<br>
								<input type="checkbox" name="filter[]" value='2' class="filters2"> Rejected<br>
							</div>
						</div>
					</div>
					<input type="hidden" name="applyfilter" value="1">
					<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
					<button class = "clear-filter apply-filter" style = "color: var(--midnight-blue); font-weight: bold; background: var(--white); padding: 7px; border:none">Clear Filters</button>
					<input type = "submit" class = "apply-filter" name = "submit" style = "background: var(--midnight-blue); color: white; padding: 7px; border: 1px solid var(--midnight-blue); text-decoration: none; width: 45%" value = "Apply Filter">
				</form>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
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
										<p><?php if(empty($value['userSkills'])){ echo "<b>Skills: </b>No Skills Added"; } else { echo "<b>Skills: </b>".$value['userSkills']; } ?></p>
										<p><b>Status: </b>
											<?php if($value['status']=='1') { echo '<span>Applied</span>'; } ?>
											<?php if($value['status']=='2') { echo '<span style="color: var(--red);">Rejected</span>'; } ?>
											<?php if($value['status']=='3') { echo '<span style="color: var(--yellow);">Short-Listed</span>'; } ?>
											<?php if($value['status']=='4') { echo '<span style="color: var(--green);">Selected</span>'; } ?>
										</p>
										<p style="margin-top: 8px; float:right;"><a href="<?php echo base_url('user-profile/').$value['userID']."?download=1"; ?>" class="btn" style="color: white; background: var(--midnight-blue);"><i class="fa fa-download" aria-hidden="true"></i></a><a target="_blank" href="<?php echo base_url('user-profile/').$value['userID']; ?>" class="btn" style="margin-left: 5px; color: white; background: var(--midnight-blue);"><i class="fa fa-eye" aria-hidden="true"></i></a></p>
										<p style="margin-top: 8px; float: right;">
											<?php if($value['status']=='1' || $value['status']=='3') { ?>
											<a href="<?php echo base_url('apply/changeApplicantStatus/'.$value['userID'].'/'.$offerType.'/'.$offerID.'/4'); ?>" style="color: var(--green);"><b>Hire</b></a>
											<?php } ?>
											<?php if($value['status']=='1') { ?>
											<a href="<?php echo base_url('apply/changeApplicantStatus/'.$value['userID'].'/'.$offerType.'/'.$offerID.'/3'); ?>" style="color: var(--yellow); margin-left: 8px;"><b>Shortlist</b></a>
											<?php } ?>
											<?php if($value['status']=='1' || $value['status']=='3') { ?>
											<a href="<?php echo base_url('apply/changeApplicantStatus/'.$value['userID'].'/'.$offerType.'/'.$offerID.'/2'); ?>" style="color: var(--red); margin-left: 8px;"><b>Reject</b></a>
											<?php } ?>
										</p>

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
							<?php
							if($offerType == '1') {?>
								<center><button data-id="<?php echo $offerData['jobID']; ?>" name = "job" class="btn btn-primary view js-view-posting-details" id = "viewjob<?= $offerData['jobID'] ?>">View More</button></center>
							<?php }else{?>
								<center><button data-id="<?php echo $offerData['internshipID']; ?>" name = "internship" class="btn btn-primary view js-view-posting-details" id = "viewinternship<?= $offerData['internshipID'] ?>">View More</button></center>
						<?php } ?>
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
                  <label class="control-label col-sm-3"><strong>Offer Description:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobDescription">Offer Description</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Start Date:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobStart">Start Date</p>
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
                <div class="form-group duration">
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
                <label class="control-label col-sm-3"><strong>Location:</strong></label>
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
				type = $('#'+id).attr('name')
				id = $('#'+id).attr('data-id')
				if(type == 'job'){
					url = '<?= base_url('home/getJobDetails')?>';
					data = {jobid : id}
				}
				else{
					url = '<?= base_url('home/getInternshipDetails')?>';
					data = {internshipID : id}
				}
				$.get(url, data).done(function(res){
					res = JSON.parse(res)
					console.log(res)
					if(type == 'job'){
						$(".duration").hide();
						$("#jobTitle").html(res[0].jobTitle)
						$("#jobDescription").html(res[0].jobDescription)
						$("#jobStart").html(res[0].startDate)
						$("#jobDeadline").html(res[0].applicationDeadline)
						if(res[0].offerType == "2")
							$("#jobOffer").html("INR " + res[0].offer + " lakhs")
						else
							$("#jobOffer").html('INR ' + res[0].minimumOffer + ' lakhs - INR ' + res[0].maximumOffer + ' lakhs')
						$('#apply').attr('href', "<?= base_url('apply/apply?jobID=')?>"+res[0].jobID)
					}else{
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
						$(".duration").show();
						if(res[0].durationType == '1'){
							$("#duration").html(res[0].duration + ' months')
						}else{
							$("#duration").html('Flexible')
						}
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
					if(type == 'job'){
						if(res[0].jobType == "1")
							$("#jobType").html("Work From Home")
						else
							$('#jobType').html(res[0].cities)
					}else{
						if(res[0].internshiptype == "1")
							$("#jobType").html("Work From Home")
						else
							$('#jobType').html(res[0].cities)
					}
					$("#companyName").html(res[0].companyName)
					$("#companyWebsite").html(res[0].companyWebsite)
					$("#companyDescription").html(res[0].companyDescription)
				}).fail(function(){

				})
			})
		})

	</script>

	<script type="text/javascript">
	var filter = <?= $filter ?>;
	console.log(filter);
		$(document).ready(function(){
			for (var i = 4; i > 0;i--) {
				if(filter.indexOf(i.toString()) != -1){
					$('.filters'+i).prop('checked', 'true')
				}
			}
		});
		$('.clear-filter').click(function(){
		$('.search-filter').empty();
		window.location.href = "<?= base_url('applicants/').$offerType.'/'.$offerID?>";
	})
	</script>
</body>
</html>
