<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/home.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<?php echo $userNavigation; ?>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="create-post card">
					<form class="flex flex--col">
						<textarea name="" rows="3" required class="textarea margin-m-10" placeholder="Share Update"></textarea>
						<button type="submit" class="btn create-post__submit-button white midnight-blue-bg s-14">Post</button>
					</form>
				</div>
				<div class="feed">
					<div class="feed-post card">
						<div class="feed-post__head">
							<div class="flex media">
								<a href="javascript:"><img src="https://scontent.fdel1-2.fna.fbcdn.net/v/t1.0-1/p160x160/15871847_1187641447950420_5590639677209919525_n.jpg?oh=d4d88d54889e7a4e3546dc6701c0bfe0&oe=5942A6DD" alt="user" class="media-figure feed-post__user-pic"></a>
								<span class="media-body flex flex--col">
									<a href="javascript:" class="flex__item"><span class="feed-post__username">Nikhil Verma</span></a>
									<span class="feed-post__info flex__item">
										<span class="feed-post__postdate">8 Aug 2016</span>
										<span class="feed-post__posttime">8:30pm</span>
									</span>
								</span>
							</div>
						</div>
						<div class="feed-post__body">
							<p>Posted a new offer <a href="javascript:" class="link">Link</a> for candidate with skills PHP, HTML and CSS</p>
						</div>
					</div>
					<div class="feed-post card">
						<div class="feed-post__head">
							<div class="flex media">
								<a href="javascript:"><img src="https://scontent.fdel1-2.fna.fbcdn.net/v/t1.0-1/p160x160/15871847_1187641447950420_5590639677209919525_n.jpg?oh=d4d88d54889e7a4e3546dc6701c0bfe0&oe=5942A6DD" alt="user" class="media-figure feed-post__user-pic"></a>
								<span class="media-body flex flex--col">
									<a href="javascript:" class="flex__item"><span class="feed-post__username">Nikhil Verma</span></a>
									<span class="feed-post__info flex__item">
										<span class="feed-post__postdate">8 Aug 2016</span>
										<span class="feed-post__posttime">9:00pm</span>
									</span>
								</span>
							</div>
						</div>
						<div class="feed-post__body">
							<p>Posted a new offer <a href="javascript:" class="link">Link</a> for candidate with skills JS, HTML and CSS</p>
						</div>
					</div>
					<div class="feed-post card">
						<div class="feed-post__head">
							<div class="flex media">
								<a href="javascript:"><img src="https://scontent.fdel1-2.fna.fbcdn.net/v/t1.0-1/p160x160/15871847_1187641447950420_5590639677209919525_n.jpg?oh=d4d88d54889e7a4e3546dc6701c0bfe0&oe=5942A6DD" alt="user" class="media-figure feed-post__user-pic"></a>
								<span class="media-body flex flex--col">
									<a href="javascript:" class="flex__item"><span class="feed-post__username">Nikhil Verma</span></a>
									<span class="feed-post__info flex__item">
										<span class="feed-post__postdate">8 Aug 2016</span>
										<span class="feed-post__posttime">9:30pm</span>
									</span>
								</span>
							</div>
						</div>
						<div class="feed-post__body">
							<p>Posted a new offer <a href="javascript:" class="link">Link</a> for candidate with skill Ruby</p>
						</div>
					</div>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $activeUserLeft; ?>
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
