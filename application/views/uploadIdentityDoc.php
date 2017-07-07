<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Identity Document|CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/remodal-default-theme.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/upload-identity-doc.css'); ?>" rel="stylesheet">
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
		<main class="flex main-container">
			<div class="globalContainer flex">
				<div class="main-body flex__item flex flex--col">
					<div class="upload-identity-doc-container">
						<h2>Upload Identity Document</h2>
						<form class="form upload-identity__form" action="<?php echo base_url('web/uploadIdentityDocument'); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="identityDoc" class="form__label">Choose Identity Document for Upload</label>
							<input type="file" name="identityDoc" id="identityDoc" class="form__input">
							<div class="show-instructions">
								<a href="javascript:" class="js-upload-instructions">Instructions</a>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
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
				<li>Maximum Upload Size for the document is 3 MB.</li>
				<li>The allowed format include jpg, jpeg, png, JPG, pdf,doc and docx.</li>
				<li>The upload identity document must clearly mention the firm name, employee name and designation for Employer Accounts. For General Users (or job/internship seekers), the identity document must clearly have college/university name, student name, and course enrolled.</li>
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
