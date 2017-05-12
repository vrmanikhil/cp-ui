<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/change-password.css'); ?>" rel="stylesheet">
</head>

<body>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<?php echo $activeUserLeft; ?>
				<div class="card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="change-password__section card">
					<h1 class="change-password__section-title">Messages</h1>
					<div class="notifications">
						<a class="flex media notification" href="javascript:">
							<img src="https://scontent.fdel1-2.fna.fbcdn.net/v/t1.0-1/p160x160/15871847_1187641447950420_5590639677209919525_n.jpg?oh=d4d88d54889e7a4e3546dc6701c0bfe0&amp;oe=5942A6DD" alt="user" class="media-figure notification__feature-img">
							<span class="media-body flex flex--col">
								<span class="notification__message"><strong>Nikhil Verma</strong></span>
								<span class="notification__message">This is a Test message for you.</span>
								<span class="notification__info">
									<span class="notification__date">19 April 2017</span>
								</span>
							</span>
						</a>
						<a class="flex media notification" href="javascript:">
							<img src="https://scontent.fdel1-1.fna.fbcdn.net/v/t1.0-1/p50x50/17626408_935294396507025_1452685277211461461_n.png?oh=167c40084cee66601fa97c302098fd03&oe=598CB4FB" alt="user" class="media-figure notification__feature-img">
							<span class="media-body flex flex--col">
								<span class="notification__message"><strong>Motorola Inc</strong></span>
								<span class="notification__message">This is a Campus Puppy Test Message for you.</span>
								<span class="notification__info">
									<span class="notification__date">14 April 2017</span>
								</span>
							</span>
						</a>
						<a class="flex media notification" href="javascript:">
							<img src="https://scontent.fdel1-1.fna.fbcdn.net/v/t1.0-1/p50x50/13892348_1753977728147689_6287852477235695370_n.jpg?oh=4b8af9537d9b9665b2c61c418d4637c5&oe=598E66EF" alt="user" class="media-figure notification__feature-img">
							<span class="media-body flex flex--col">
								<span class="notification__message"><strong>Riders Music Festival</strong></span>
								<span class="notification__message">This is a Test Message.</span>
								<span class="notification__info">
									<span class="notification__date">5 April 2017</span>
								</span>
							</span>
						</a>
					</div>
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
