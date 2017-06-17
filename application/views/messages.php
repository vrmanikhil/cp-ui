<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/messages.css'); ?>" rel="stylesheet">
	<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
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
				<div class="messages__section card">
					<h1 class="messages__section-title">Messages</h1>
					<a href = "<?php echo base_url('messages/compose');?>"><button class="btn btn-primary" class="messages__load-more" style="float:right;"><i class="fa fa-pencil" aria-hidden="true"></i> Compose New</button></a>
					<div class="notifications" id = "notifications">
					<?php
					if(empty($latest_chats)){?>
						You do not have sent or recieved any message.
					<?php } ?>
					<?php 
					$i = 0;
					foreach($latest_chats as $chat){
						$i++;
						?>
						<a class="flex media notification chat" chatter-id="<?= $chat['chatter_id']?>" href="<?php echo base_url('messages/chats/').$chat['chatter_id'];?>">
							<img src="<?php echo $chat['profile_image'];?>" alt="user" class="media-figure notification__feature-img">
							<span class="media-body flex flex--col">
								<span class="notification__message"><strong><?php echo $chat['chatter']?></strong></span>
								<?php if($chat['chatter_id'] !== $chat['sender']) {?>
									<span class="notification__message"><?php echo $chat['message'];?></span>
								<?php }else{ 
									if($chat['read'] == 1){?>
									<span class="notification__message"><i class = "fa fa-reply"></i>  <?php echo $chat['message'];?></span>
								<?php }else{?>
									<span class="notification__message" style = "background-color:#f05f40"><i class = "fa fa-reply"></i>  <?php echo $chat['message'];}?></span>
								<?php	} ?>
								<span class="notification__info">
									<span class="notification__date"><?php echo $chat['timestamp'];?></span>
								</span>
							</span>
						</a>
						<?php } ?>
					</div>
					<center>
						<?php if($more) {?>
						<button type="submit" class="btn btn--primary messages__load-more" onclick = "loadDoc()" id ="load-more" >Load More</button>
						<?php }else{
							} ?>
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
			   	var offset = <?php echo $i; ?>;
		function loadDoc() {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		   if (this.readyState == 4 && this.status == 200) {
		   	var response = JSON.parse(this.responseText);
		   	var more = response.more;
		   	var chats = response.latest_chats;
		    for( i = 0; i < chats.length; i++){
		    	offset++;
		    	if(chats[i].chatter_id !== chats[i].sender ){
		    		var html = "<a class='flex media notification chat' chatter-id='" + chats[i].chatter_id + "' href='<?php echo base_url('messages/chats/');?>" + chats[i].chatter_id + "'><img src='" + chats[i].profile_image + "' alt='user' class='media-figure notification__feature-img'><span class='media-body flex flex--col'><span class='notification__message'><strong>" + chats[i].chatter + "</strong></span><span class='notification__message'>" + chats[i].message + "</span><span class='notification__info'><span class='notification__date'>" + chats[i].timestamp + "</span></span></span></a>";
		    		document.getElementById('notifications').innerHTML += html;
		    	}else{
		    		if(chats[i].read  != 0){
		    		var html = "<a class='flex media notification chat' chatter-id='" + chats[i].chatter_id + "' href='<?php echo base_url('messages/chats/');?>" + chats[i].chatter_id + "'><img src='" + chats[i].profile_image + "' alt='user' class='media-figure notification__feature-img'><span class='media-body flex flex--col'><span class='notification__message'><strong>" + chats[i].chatter + "</strong></span><span class='notification__message'><i class = 'fa fa-reply'>	</i>" + chats[i].message + "</span><span class='notification__info'><span class='notification__date'>" + chats[i].timestamp + "</span></span></span></a>";
		    		document.getElementById('notifications').innerHTML += html;
		    	}else{
		    		var html = "<a class='flex media notification chat' chatter-id='" + chats[i].chatter_id + "' href='<?php echo base_url('messages/chats/');?>" + chats[i].chatter_id + "'><img src='" + chats[i].profile_image + "' alt='user' class='media-figure notification__feature-img'><span class='media-body flex flex--col'><span class='notification__message'><strong>" + chats[i].chatter + "</strong></span><span class='notification__message' style = 'background-color:#f05f40'><i class = 'fa fa-reply'></i>" + chats[i].message + "</span><span class='notification__info'><span class='notification__date'>" + chats[i].timestamp + "</span></span></span></a>";
		    		document.getElementById('notifications').innerHTML += html;
		    	}
		    }
			}
		    if(chats.length == 0 || more === false){
				document.getElementById('load-more').style.visibility = "hidden";
			}
		   }
		}
		  
  			xhttp.open("GET", "<?php echo base_url('messages/load-more-chats/');?>"+offset, true);
  			xhttp.send();
  		};
  		$(document).ready(function(){
  			$('.chat').click(function(){
				chatter = $(this).attr('chatter-id')
				window.location.replace('<?= base_url('messages/chats')?>/'+chatter)

			})
  		})
	</script>
</body>

</html>
