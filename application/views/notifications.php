<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/notifications.css'); ?>" rel="stylesheet">
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
				  <a href="javascript:" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 232.7 232.7" class="skills-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#skills-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Skills</span>
				  </a>
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
				<div class="notifications__section card">
					<h1 class="notifications__section-title">Notifications</h1>
					<div class="notifications">
						<?php if(!empty($notifications)) { foreach ($notifications as $key => $value) { ?>

						<a class="flex media notification" href="<?php echo $value['link']; ?>">
							<img src="<?php echo $value['image']; ?>" alt="user" class="media-figure notification__feature-img">
							<span class="media-body flex flex--col">
								<span class="notification__message"><strong><?php echo $value['name']; ?></strong></span>
								<span class="notification__message"><?php echo $value['notification']; ?></span>
								<span class="notification__info">
									<span class="notification__date"><?= $value['timestamp']?></span>
								</span>
							</span>
						</a>

						<?php }} else { echo "No Notifications!"; } ?>
					</div>
					<center>
						<?php if($more) {?>
						<button type="submit" class="btn btn--primary messages__load-more" onclick = "loadDoc()" id ="load-more" >Load More</button>
						<?php } ?>
					</center>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $activeUser; ?>
			</aside>
		</main>
		<?php echo $footer; ?>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script type="text/javascript">
		var offset = 5;
		function loadDoc() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			 if (this.readyState == 4 && this.status == 200) {
				var response = JSON.parse(this.responseText);
				console.log(response);
				var more = response.more;
				var notifications = response.notifications;
				console.log(notifications);	
				for( i = 0; i < notifications.length; i++){
					offset++;
						var html = "<a class='flex media notification' href='"+notifications[i].link+"'><img src='"+ notifications[i].image +"' alt='user' class='media-figure notification__feature-img'><span class='media-body flex flex--co'><span class='notification__message'><strong>"+ notifications[i].name+"</strong></span><span class='notification__message'>"+ notifications[i].notification +"</span><span class='notification__info'><span class='notification__date'>"+ notifications[i].timestamp +"</span></span></span></a>";
						document.getElementById('notifications').innerHTML += html;
					}
				}
			
				if(notifications.length == 0 || more === false){
				document.getElementById('load-more').style.display = "none";
			}
			 }

				xhttp.open("GET", "<?php echo base_url('home/loadMoreNotifications/');?>"+offset, true);
				xhttp.send();
		};
	</script>
</body>

</html>
