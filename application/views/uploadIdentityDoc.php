<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Identity Doc | CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="/assets/css/upload-identity-doc.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>

	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container">
			<div class="globalContainer flex">
				<div class="main-body flex__item flex flex--col">
					<div class="upload-identity-doc-container">
						<h2>Upload Identity Document</h2>
						<form class="form upload-identity__form" action="" method="post">
						<div class="form-group">
							<label for="identityDoc" class="form__label">Identity Doc</label>
							<input type="file" name="file" id="identityDoc" class="form__input">
							<div class="show-instructions">
								<a href="javascript:" class="js-upload-instructions">Instructions</a>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Upload" class="btn btn--primary">
						</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php echo $footer; ?>
	</div>
	<div class="remodal upload-instruction-modal" data-remodal-id="uploadIns">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div class="modal-body">
			<p><strong>Why should you join FITPASS ?</strong></p>
			<ul>
				<li><strong>Team:</strong> Work with smart and passionate people</li>
				<li><strong>Growth:</strong> We have, in a short span of time, put together a very impressive client list with some of the best names in the industry as our clients</li>
				<li><strong>Start-up Culture:</strong> Working in a start-up environment will give you exposure to multiple fields and you will learn how a business is built from the ground up</li>
				<li><strong>Impact:</strong> FITPASS does not function on a defined hierarchy &amp; everyone's given equal creative freedom to come up with and execute new ideas to further the business. This setup allows employees to take ownership of their ideas.</li>
			</ul>
		</div>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/remodal.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script>
		$(document).ready(function () {
			$(document).on('click', '.js-upload-instructions', showUploadIns);
			function showUploadIns(ev) {
				var modal = $('[data-remodal-id="uploadIns"]').remodal();
				modal.open();
			}
		})
	</script>
</body>
</html>
