<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Added Job Offer|CampusPuppy</title>
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
						<a href="<?php echo base_url('jobs/add-job-offer'); ?>" class="nav__link js-nav-link">Add Job Offer</a>
						<a href="<?php echo base_url('jobs/added-job-offer'); ?>" class="nav__link js-nav-link active">Added Job Offers</a>
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
						<li class="active">Added Job Offer</li>
					</ol>
				</div>
				<?php if(empty($addedJobOffers)){?>
				<p style="text-align: center"> You Have Added No Job Offer. </p>
				<?php }else{
				 foreach ($addedJobOffers as $key => $value) { ?>
				<div class="card posting-card">
					<div class="flex media">
						<img src="<?php echo $_SESSION['companyLogo']; ?>" alt="company logo" class="media-figure posting-card__img">
						<br>

						<div class="media-body flex flex--col">
							<p class="posting-card__title" style="margin-bottom: 10px;">
								<strong><?php echo $value['jobTitle']; ?></strong>
							</p>
							<p class="posting-card__status"><strong>Skills</strong> : <span><?php if($value['skillsRequired'] == ''){ echo "No Specific Skills Required"; } else { echo $value['skillsRequired']; } ?></span></p>
							<p class="posting-card__status"><strong>Status</strong> : <?php if($value['status']=='1' && ($value['active']=='1')) { ?><span style="color: var(--yellow);"><b>Under Verification</b></span> <?php } ?><?php if($value['status']=='2' && $value['active']=='1') { ?><span style="color: var(--green);"><b>Active</b> </span><a href="<?php echo base_url('web/closeOffer/1/'.$value['jobID']); ?>" style="font-size: 0.9rem">Close Job Offer</a> <?php } ?><?php if($value['status']=='3' && empty($value['active'])) { ?><span style="color: var(--red);"><b>Rejected</b></span> <?php } ?><?php if($value['status']=='2' && empty($value['active'])) { ?><span style="color: var(--red);"><b>Closed</b></span> <?php } ?></p>
							<p class="posting-card__status"><strong>Application Deadline</strong> : <?php echo $value['applicationDeadline']; ?></p>
							<div class="posting-card__apply">
								<a href=<?php echo base_url('applicants/1/').$value['jobID']; ?> class="btn white midnight-blue-bg s-14">View Applicants</a>
								<button data-id="<?php echo $value['jobID']; ?>" class="btn white midnight-blue-bg s-14 js-view-posting-details view" id = "view<?= $value['jobID'] ?>">View</button>
								<?php if($value['status']=='1' && empty($value['active'])) { ?>
								<button data-id="<?php echo $value['jobID']; ?>" class="btn white midnight-blue-bg s-14 js-view-posting-details view" id = "view<?= $value['jobID'] ?>">Edit</button>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php }} ?>
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
                  <label class="control-label col-sm-3"><strong>Job Offer Description:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobDescription">Job Offer Description</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3"><strong>Job Start Date:</strong></label>
                  <div class="col-sm-9">
                    <p class="form-control-static" id = "jobStart">Job Start Date</p>
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
                <label class="control-label col-sm-3"><strong>Job Offer Location:</strong></label>
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
						<a href = "" id = "apply">
							<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
							<button type="button" class="btn--apply">APPLY</button></a>
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
				data = {jobid : id}
				$.get('<?= base_url('home/getJobDetails')?>', data).done(function(res){
					res = JSON.parse(res)
					$("#jobTitle").html(res[0].jobTitle)
					$("#jobDescription").html(res[0].jobDescription)
					$("#jobStart").html(res[0].startDate)
					$("#jobDeadline").html(res[0].applicationDeadline)
					if(res[0].offerType == "2")
						$("#jobOffer").html("INR " + res[0].offer + " lakhs")
					else
						$("#jobOffer").html('INR ' + res[0].minimumOffer + ' lakhs - INR ' + res[0].maximumOffer + ' lakhs')
					$("#jobOpening").html(res[0].openings)
					if(res[0].partTime == "1")
						$("#jobTime").html('YES')
					else
						$("#jobTime").html('NO')
					$("#jobSkill").html(res[0].skillsRequired)
					if(res[0].jobType == "1")
						$("#jobType").html("Work From Home")
					else
						$('#jobType').html(res[0].cities)
					$("#companyName").html(res[0].companyName)
					$("#companyWebsite").html(res[0].companyWebsite)
					$("#companyDescription").html(res[0].companyDescription)
				}).fail(function(){

				})
			})
		})

	</script>
</body>

</html>
