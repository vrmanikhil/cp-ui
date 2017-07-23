<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Messages|CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/chat.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
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
					<h1 class="messages__section-title"><?php echo $title; ?></h1>
					<div class="load-more-btn__container">
					<?php if($more){?>
						<button type="submit" id="load-more" onclick=loadDoc() class="btn btn--primary">Load More</button>
					<?php } ?>
					</div>
					<div class="messages-container" id ="messages-container">
					<div id="messages"></div>
					<?php
					$i = 0;
					foreach (array_reverse($messages) as $key => $value) {
						$i++;
						if($value['class'] == "sender"){?>
						<div class="flex media user-message chat receiver" id = "message<?= $i ?>">
							<img src="<?php echo $_SESSION['profileImage']?>" alt="user" class="media-figure notification__feature-img">
							<span class="media-body flex flex--col">
								<span class="notification__message"><?php echo $value['message'];?></span>
								<span class="notification__info">
									<span class="notification__date"><?php echo $value['timestamp']?></span>
								</span>
							</span>
						</div>
						<?php
						}else{
						?>
						<div class="flex media user-message chat sender" id =  "message<?= $i ?>">
							<img src="<?php echo $profileImage; ?>" alt="user" class="media-figure notification__feature-img">
							<span class="media-body flex flex--col">
								<span class="notification__message"><?php echo $value['message'];?></span>
								<span class="notification__info">
									<span class="notification__date"><?php echo $value['timestamp']?></span>
								</span>
							</span>
						</div>
						<?php
							}
							}
						?>
					</div>
					<?php if(!empty($connection)){?>
						<div class="horizontal-group">
							<div class="form-group message-input-container">
								<textarea name="message" id="message" required class="form__input" rows="1" placeholder="Type your message here"></textarea>
							</div>
							<div class="form-group">
								<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>" id = 'csrf'>
								<button type="submit" id = 'send' class="btn btn--primary">Send Message</button>
							</div>
						</div>
						<?php } ?>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $activeUser; ?>
			</aside>
		</main>
		<?php echo $footer; ?>
	</div>

	<div class="flex media user-message chat wrap" style = "display: none">
		<img src="" alt="user" class="media-figure notification__feature-img">
		<span class="media-body flex flex--col">
			<span class="notification__message msg"></span>
			<span class="notification__info">
				<span class="notification__date time"></span>
			</span>
		</span>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script type="text/javascript">
var offset = <?= $i ?>;
var userImage = '<?= $_SESSION['profileImage'] ?>';
var chatterImage = '<?= $profileImage ?>';
		function loadDoc() {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		   if (this.readyState == 4 && this.status == 200) {
		   	var response = JSON.parse(this.responseText);
		   	var more = response.more;
		   	var chats = response.content;
		    for( i = 0; i < chats.length; i++){
		    	offset++;
		    	if(chats[i].class === 'sender' ){
		    		var elChild = document.createElement("div");
		    		elChild.innerHTML = "<div class='flex media user-message chat receiver' id = 'message" + offset + "'><img src='"+ userImage +"' alt='user' class='media-figure notification__feature-img'><span class='media-body flex flex--col'><span class='notification__message'>"+ chats[i].message +"</span><span class='notification__info'><span class='notification__date'>"+ chats[i].timestamp +"</span></span></span></div>";
		    		document.getElementById('messages-container').insertBefore(elChild, document.getElementById("messages-container").firstChild);
		    	}else{
		    		var elChild = document.createElement("div");
		    		elChild.innerHTML = "<div class='flex media user-message chat sender' id = 'message" + offset + "'><img src='"+ chatterImage +"' alt='user' class='media-figure notification__feature-img'><span class='media-body flex flex--col'><span class='notification__message'>"+ chats[i].message +"</span><span class='notification__info'><span class='notification__date'>"+ chats[i].timestamp +"</span></span></span></div>";
		    		document.getElementById('messages-container').insertBefore(elChild,document.getElementById("messages-container").firstChild);
		    }
			}
		    if(chats.length == 0 || more === false){
				document.getElementById('load-more').style.visibility = "hidden";
			}
			}
		   }
  			xhttp.open("GET", "<?php echo base_url('messages/load-more-messages/'). $usr.'/';?>" + offset, true);
  			xhttp.send();
  		}

var	lastId = <?php if(isset($messages[0]['messageID'])){ echo $messages[0]['messageID']; } else { echo "0"; } ?>;
  		$(document).ready(function(){
  			$('#send').click(function(){
			msg = $('#message').val().trim();
			i = 0;
			value = $("#csrf").val();
			if(msg != ''){
				$.post('<?php echo base_url('messages/send-message'); ?>', {message: msg, to: <?php echo $usr; ?>, <?= $csrf_token_name?> : value}).done(function(res){
					res = JSON.parse(res)
					new_lastId = res.insert_id
					time = res.time
					value = res.csrf
					res = res.success
					if(res){
						$('#csrf').val(value)
						container = $('.wrap').clone()
						container.removeClass('wrap')
						container.find('.time').html(time)
						container.find('.msg').html(msg)
						container.addClass('receiver')
						container.find('img').attr('src', userImage)
						$('#messages-container').append(container[0])
						container.show()
						$('#message').val('')
						$('#chat').scrollTop($('#chat').prop("scrollHeight"))
						lastId = new_lastId
					}
				}).fail(function(){

				})
			}
		})

		window.setInterval(function(){
			var data = {last_id: lastId, from: <?php echo $usr; ?>}
			$.get('<?= base_url('messages/checkForNewMessages')?>', data).done(function(res){
				res = JSON.parse(res);
				if(res != false){
					for (var i = 0; i < res.length; i++){
						container = $('.wrap').clone()
						container.removeClass('wrap')
						container.find('.time').html(res[i].timestamp)
						container.find('.msg').html(res[i].message)
						console.log(res[i].class)
						if(res[i].class == "receiver"){
							container.find('img').attr('src', chatterImage)
							container.addClass('sender')
						}else{
							container.addClass('receiver')
							container.find('img').attr('src', userImage)
						}
						$('#messages-container').append(container[0])
						container.show()
						$('#message').val('')
						$('#chat').scrollTop($('#chat')
							.prop("scrollHeight"))
					}
					lastId = res[i-1].messageID
					res = 'false';
				}
			})
		}, 5000)

	})

	</script>
</body>

</html>
