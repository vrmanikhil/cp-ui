<!DOCTYPE html>
<html>
<head>
	<title>Compose Message|CampusPuppy</title>
</head>
<body>
<?php echo $title;?>
<form method="post" action = "<?php echo base_url('messages/composeMessage');?>">
	<label>Recipient : </label>
	<input type="text" name="to" id = "recipient" placeholder="Recipient"><br>
	<input type="hidden" id="userId" name="data[userID]" value = "data[userID]">
	<div class="ui-front" id="conn-grp" style="background:#efefef">
	</div>
	<label>Compose Message : </label>
	<textarea name="message"></textarea><br>
	<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
	<input type="Submit" value="submit">
</form>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.min.js')?>" type="text/javascript"></script>
	<script type="text/javascript">
		var data = <?php echo json_encode($connections)?>;
		data.forEach(function(x, i){
			x.label = x['name'];
		});

		$("#recipient").autocomplete({
			autoFocus : true,
			source: function(req, res){
						var matcher = new RegExp($.ui.autocomplete.escapeRegex(req.term), "i");
						var r = $.grep(data, function(value) {
							return matcher.test(value.userID) || matcher.test(value.name);
						})
						if(r.length == 0){
							console.log('empty');
						}
						return res(r.slice(0,5));
					},
			appendTo: "#conn-grp",
			select: function(e, u){
						$('#userId').val(u.item.userID);
						console.log(u);
					},
		});

	</script>
</body>
</html>
