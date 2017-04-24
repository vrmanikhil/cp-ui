<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/home.css'); ?>" rel="stylesheet">

	<style type="text/css">
	input[type=password], select {
	    width: 100%;
	    padding: 10px;
	    margin: 8px 0;
	    display: inline-block;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    box-sizing: border-box;
	}

	input[type=submit] {
	    width: 100%;
	    background-color: #283e4a;
	    color: white;
	    padding: 14px 20px;
	    margin: 8px 0;
	    border: none;
	    border-radius: 4px;
	    cursor: pointer;
	}

	input[type=submit]:hover {
	    background-color: #283e4a;
	}

	input,
	input::-webkit-input-placeholder {
    font-size: 14px;
	}

	label{
		font-size: 15px;
		font-weight: bold;
	}

	</style>

</head>

<body>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<?php echo $activeUserLeft; ?>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="post card">
					<p style="font-size: 15px;">Home / Change Password</p>
				</div>

				<div class="post card">
					<center><b style="font-size: 15px;">CHANGE PASSWORD</b></center>

					<form style="margin-top: 15px;">
			    <label for="currentPassword">Current Password</label>
			    <input type="password" id="currentPassword" placeholder="Current Password">
					<label for="newPassword">New Password</label>
			    <input type="password" id="newPassword" placeholder="New Password">
					<label for="confirmNewPassword">Confirm New Password</label>
			    <input type="password" id="confirmNewPassword" placeholder="Confirm New Password">

			    <input type="submit" value="Change Password">
			  </form>

				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $userNavigation; ?>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
		</main>
		<?php echo $footer; ?>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
</body>

</html>
