<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Education Details|CampusPuppy</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/education-details.css'); ?>" rel="stylesheet">
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
					<div class="education-details-container">
						<h2>Latest Educational Details</h2>
						<form class="form" action="<?php echo base_url('web/addEducationalDetails'); ?>" method="post">
							<div class="form-group">
								<label class="form__label" for="college-name">College Name</label>
								<select name="collegeID" class="select" id="college-name">
									<?php foreach ($colleges as $key => $value) { 
										if($value['college_id'] != 1156){?>
										<option value="<?php echo $value['college_id']; ?>"><?php echo $value['college']; ?></option>
									<?php } }?>
								</select>
							</div>
							<div class="horizontal-group">
								<div class="form-group">
									<label for="course" class="form__label">Course</label>
									<select name="courseID" class="select" id="course">
										<?php foreach ($courses as $key => $value) { ?>
											<option value="<?php echo $value['course_id']; ?>"><?php echo $value['course']; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="batch" class="form__label">Batch</label>
									<input type="text" maxlength="4" placeholder="Batch" id="batch" class="form__input" name="batch">
								</div>
							</div>
							<div class = "horizontal-group" style="width:100%">
							<div class="form-group" style = "width:100%; text-align: right" class="nocollege">
									<input type="checkbox" id="nocollege" name="" value="1156" >&nbsp;College Not listed
							</div>
							</div>
							<div class="form-group">
								<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
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
	<script type="text/javascript">
		$(document).ready(function(){
			$("#nocollege").change(function(){
				if($("#nocollege").is(":checked")){	
					$("#college-name").prop('disabled',true);
					$("#college-name").prop('name',"")
					$("#nocollege").prop("name","collegeID")
				}else{
					$("#college-name").prop('disabled',false);
					$("#college-name").prop('name',"collegeID")
					$("#nocollege").prop("name","")
				}
			});
		});
	</script>
	</body>
</html>
