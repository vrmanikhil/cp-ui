<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home|CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/home.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/jobs.css'); ?>" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
	
	<script type="text/javascript">
	if (screen.width <= 800) { window.location.replace("http://m.campuspuppy.com/"); }
	</script>
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
				<div class="post card" style="margin-top: 10px;">
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
				<div class="feed" id = "feed">
					<div class="card">
						<h2 class="section-title"><b>JOBS AND INTERNSHIPS FEEDS</b></h2>
					</div>

					<?php if(empty($feeds)) { ?>
				<p style="text-align: center"> No Jobs And Internships Feeds Found.</p>
				<?php }else{ $i=0;
					foreach ($feeds as $key => $value) { $i++;?>

					<div class="feed-post card">
						<div class="feed-post__head">
							<div class="flex media">
								<a href="javascript:"><img src="<?php echo $value['profileImage']; ?>" alt="user" class="media-figure feed-post__user-pic"></a>
								<span class="media-body flex flex--col">
									<a href="<?php echo base_url('user-profile/').$value['addedBy']; ?>" class="flex__item"><span class="feed-post__username"><?php echo $value['name']; ?></span></a>
									<span class="feed-post__info flex__item">
										<span class="feed-post__postdate"><?= $value['timestamp'] ?></span>
									</span>
								</span>
							</div>
						</div>
						<div class="feed-post__body">
						<?php if($value['offerType'] == "Job") {?>
							<p>Posted a <?php echo $value['offerType']; ?> Offer <a data-id = "<?= $value['offerID'] ?>" class="link js-view-posting-details view " name = "job" id = "viewjob<?= $value['offerID'] ?>"><b><?php echo $value['title']; ?></b></a></p>
						<?php }else{?>
							<p>Posted a <?php echo $value['offerType']; ?> Offer <a data-id = "<?= $value['offerID'] ?>" class="link js-view-posting-details view" name = "internship" id = "viewinternship<?= $value['offerID'] ?>"><b><?php echo $value['title']; ?></b></a></p>
						<?php } ?>
						</div>
					</div>

					<?php } }?>

				</div>
				<div id = "feeds"></div>
				<center>
						<?php if($more) {?>
						<button type="submit" class="btn btn--primary messages__load-more" onclick = "loadDoc()" id ="load-more" >Load More</button>
						<?php }else{
							} ?>
				</center>
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
						<?php if($_SESSION['userData']['accountType'] != 2){?>
							<a href = "" id = "apply"><button type="button" class="btn--apply">APPLY</button></a>
						<?php } ?>
					</aside>
				</div>
			</div>
		</div>
	</div>
	<script>
	var adBlockEnabled = false;
	var testAd = document.createElement('div');
	testAd.innerHTML = '&nbsp;';
	testAd.className = 'adsbox';
	document.body.appendChild(testAd);
	window.setTimeout(function() {
	if (testAd.offsetHeight === 0) {
		adBlockEnabled = true;
	}
	testAd.remove();
	console.log('AdBlock Enabled? ', adBlockEnabled)
	}, 100);
	</script>

	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/jobs.js'); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('body').on('click', '.view', function(){
				var data = null
				id = this.id
				type = $('#'+id).attr('name')
				id = $('#'+id).attr('data-id')
				console.log(id);
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
						if(<?= $_SESSION['userData']['accountType']?> != 2)
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
						if(<?= $_SESSION['userData']['accountType']?> != 2)
						$('#apply').attr('href',"<?= base_url('apply/apply?internshipID=')?>"+res[0].internshipID)
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
						if(res[0].internshipType == "1")
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
		var offset = <?php echo $i; ?>;
		function loadDoc() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			 if (this.readyState == 4 && this.status == 200) {
				var response = JSON.parse(this.responseText);
				console.log(response);
				var more = response.more;
				var feeds = response.feeds;
				for( i = 0; i < feeds.length; i++){
					offset++;
					if(feeds[i].offerType == 'Internship'){
						var html = "<div class='feed-post card'><div class='feed-post__head'><div class='flex media'><a href='javascript:''><img src='"+ feeds[i].profileImage +"' alt='user' class='media-figure feed-post__user-pic'></a><span class='media-body flex flex--col'><a href='http://www.campuspuppy.com/user-profile/"+ feeds[i].addedBy +"' class='flex__item'><span class='feed-post__username'>"+feeds[i].name+"</span></a><span class='feed-post__info flex__item'><span class='feed-post__postdate'>"+feeds[i].timestamp+"</span></span></span></div></div><div class='feed-post__body'><p>Posted a "+feeds[i].offerType+" Offer <a data-id = '"+ feeds[i].offerID +"' class='link js-view-posting-details view' name = 'internship' id = 'viewinternship"+ feeds[i].offerID +"'><b>"+feeds[i].title+"</b></a></p></div></div>";
						document.getElementById('feeds').innerHTML += html;
					}else{
						var html = "<div class='feed-post card'><div class='feed-post__head'><div class='flex media'><a href='javascript:''><img src='"+ feeds[i].profileImage +"' alt='user' class='media-figure feed-post__user-pic'></a><span class='media-body flex flex--col'><a href='http://www.campuspuppy.com/user-profile/"+ feeds[i].addedBy +"' class='flex__item'><span class='feed-post__username'>"+feeds[i].name+"</span></a><span class='feed-post__info flex__item'><span class='feed-post__postdate'>"+feeds[i].timestamp+"</span></span></span></div></div><div class='feed-post__body'><p>Posted a "+feeds[i].offerType+" Offer <a data-id = '"+ feeds[i].offerID +"' class='link js-view-posting-details view' name = 'job' id = 'viewjob"+ feeds[i].offerID +"'><b>"+feeds[i].title+"</b></a></p></div></div>";
						document.getElementById('feeds').innerHTML += html;
				}
			}
				if(feeds.length == 0 || more === false){
				document.getElementById('load-more').style.display = "none";
			}
			 }
		}
				xhttp.open("GET", "<?php echo base_url('home/getMoreFeeds/');?>"+offset, true);
				xhttp.send();


		};
		</script>
		
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73411066-1', 'auto');
  ga('send', 'pageview');

</script>
</body>

</html>
