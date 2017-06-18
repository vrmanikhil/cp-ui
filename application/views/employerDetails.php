<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Education Details | CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="/assets/css/education-details.css" rel="stylesheet">
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
				<div class="main-body flex__item">
					<div class="education-details-container">
						<h2>Company Details</h2>
						<form class="form" action="<?php echo base_url('web/addEmployerDetails'); ?>" method="post">
							<div class="form-group">
								<label class="form__label" for="companyName">College Name</label>
								<input type="text" name="companyName" class="form__input" id="companyName" placeholder="Company Name">
							</div>
							<div class="form-group">
								<label class="form__label" for="position">Position</label>
								<input type="text" name="position" class="form__input" id="position" placeholder="Position">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn--primary" value="Next">
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php echo $footer; ?>
	</div>

	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	</body>
</html>
