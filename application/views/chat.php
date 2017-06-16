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
	<hr>
<?php
	}}
?>
<div id = "chat"></div>
<?php if($more == true){?>
<button type = "submit" id="load-more" onclick = loadDoc(<?php echo $i; ?>)> Load more</button>
<?php } ?>
</body>
<script type="text/javascript">
		function loadDoc($i) {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		   if (this.readyState == 4 && this.status == 200) {
		   	var response = JSON.parse(this.responseText);
		   	var more = response.more;
		   	var chats = response.content;
		   	var i =0;

		    for( i = 0; i < chats.length; i++){
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
		  
  			xhttp.open("POST", "<?php echo base_url('messages/load-more-messages/'). $i.'/'.$usr;?>", true);
  			xhttp.send();
  		};
	</script>
</html>