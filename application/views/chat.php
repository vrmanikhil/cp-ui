<!DOCTYPE html>
<html>
<head>
	<title>chat</title>
</head>
<body>
<?php 
	echo($usr."<br>");
	echo($title."<br>");
	$i = 0;
	?>
	<img src ="<?php echo $profile_image;?>">
	<br><br><br>
	<div id = "chat">
	<?php
	foreach ($messages as $key => $value) {
		$i++;
		if($chatter_id === $value['sender']){
			?>
			<div>
			<?php
		
		echo($value['message']."     " .$value['timestamp']. "<br><br>");

		?>
		<hr>
		</div>
		<?php
	}else{?>
	<div style = "float: right; font-weight: bold">
		<?php 
		echo($value['message']."     " .$value['timestamp']."<br><br>");
		?>
	</div>
	</div>
	<hr>
<?php
	}}
?>
<?php if($more == true){?>
<button type = "submit" id="load-more" onclick = "loadDoc()"> Load more</button>
<?php } ?>
<div class="col-md-12" style="margin-top:20px;">
									<div class="form-group">
										<label style="font-size:1.2em;margin-bottom:20px;">Message</label>
										<textarea class="form-control" name="message" style="padding-left:15px;" id="message" required></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<button id="send" class="login-button register-button" style="margin-top:20px;">Send Message</button>
									</div>
								</div>
								<div class="col-md-12 wrap" id="receiver" style="display:none;" tabindex='1'>
		<p class="msg"></p>
		<p class="time" style="margin-bottom:0px;font-family:'quick-b' !important;font-weight:900;font-size:1.1em !important;text-transform:capitalize;">12:50 p.m.</p>
	</div>
</body>
<script type="text/javascript">
var offset = <?php echo $i; ?>;
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
		    		var html = "<a class='flex media notification chat' chatter-id='" + chats[i].sender + "' style = 'float:right; font-weight:bold'><span class='notification__message'>" + chats[i].message + "</span><span class='notification__info'><span class='notification__date'>" + chats[i].timestamp + "</span></span></span></a>";
		    		document.getElementById('chat').innerHTML += html;
		    	}else{
		    		if(chats[i].read  != 0){
		    		var html = "<a class='flex media notification chat' chatter-id='" + chats[i].reciever + "'><span class='notification__message'><i class = 'fa fa-reply'>	</i>" + chats[i].message + "</span><span class='notification__info'><span class='notification__date'>" + chats[i].timestamp + "</span></span></span></a>";
		    		document.getElementById('chat').innerHTML += html;
		    	}else{
		    		var html = "<a class='flex media notification chat' chatter-id='" + chats[i].chatter_id + "'><span class='notification__message' style = 'background-color:#f05f40'><i class = 'fa fa-reply'></i>" + chats[i].message + "</span><span class='notification__info'><span class='notification__date'>" + chats[i].timestamp + "</span></span></span></a>";
		    		document.getElementById('chat').innerHTML += html;
		    	}
		    }
			}
		    if(chats.length == 0 || more === false){
				document.getElementById('load-more').style.visibility = "hidden";
			}
		}
		   }
		  
  			xhttp.open("POST", "<?php echo base_url('messages/load-more-messages/'). $usr.'/';?>" + offset, true);
  			xhttp.send();
  		};
</script>
<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
<script type="text/javascript">
var	lastId = <?php echo $messages[0]['messageID']; ?>;
  		$(document).ready(function(){
  			$('#send').click(function(){
			msg = $('#message').val().trim();
			data = {message: msg, to: <?php echo $usr; ?>}
			if(msg != ''){
				$.post('<?php echo base_url('messages/send-message'); ?>', data).done(function(res){
					console.log(res);
					res = JSON.parse(res)
					new_lastId = res.insert_id
					time = res.time
					res = res.success
					if(res){
						container = $('.wrap').clone()
						container.removeClass('wrap')
						container.find('.time').html(time)
						container.find('.msg').html(msg)
						container.attr('id', 'sender')
						$('#chat').append(container)
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
				console.log(res);
				res = JSON.parse(res)
				if(res){
					for (var i = 0; i < res.length; i++){
						container = $('.wrap').clone()
						container.removeClass('wrap')
						container.find('.time').html(res[i].created_at)
						container.find('.msg').html(res[i].message)
						container.attr('id', res[i].class)
						$('#chat').append(container)
						container.show()
						$('#message').val('')
						$('#chat').scrollTop($('#chat')
							.prop("scrollHeight"))
					}
					lastId = res[i-1].id
				}
			})
		}, 5000)

	})

	</script>
</html>