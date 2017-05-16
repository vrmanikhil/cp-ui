<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/skillTest.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<div class="explore-panel card flex">
				  <a href="javascript:" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 50.2 50.2" class="briefcase-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#briefcase-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Jobs</span>
				  </a>
				  <a href="javascript:" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 31.387 31.386" class="computer-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#computer-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text flex__item">Internships</span>
				  </a>
				  <a href="javascript:" class="explore-panel__link flex flex--col flex__item align-center">
				    <span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 232.7 232.7" class="skills-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#skills-icon"></use>
							</svg>
				    </span>
				    <span class="explore-panel__link-text active flex__item">Skills</span>
				  </a>
				</div>
				<div class="card card--no-padding">
					<div class="nav nav--stacked js-nav--stacked">
						<a href="javascript:" class="nav__link js-nav-link">My Skills</a>
						<a href="javascript:" class="nav__link js-nav-link">Browse Skills</a>
					</div>
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="card">
					<p style="float:left;">Skill Test: <strong>PHP</strong></p>
					<p style="float:right;">Time Remaining: <strong>hh:mm:ss</strong></p>
				</div>
				<div class="card">
					<label style="font-weight: bold;">Question</label>
					<p class="mcq" style="text-align: left;" id="ques-content">This is a test question, which is what is the full form of CSS?</p>

					<div class="options" style="text-transform: none;">
							<div>
									<span class="opt">A</span>
									<input type="radio" name="answer" id="option1" value="0" />
									<label for="option1" style="text-transform: none !important;" class='option-label' data='0'>Cascase Style Sheets Cascase Style Sheets Cascase Style Sheets Cascase Style Sheets</label>
							</div>
							<div>
									<span class="opt">B</span>
									<input type="radio" name="answer" id="option2" value="1" />
									<label for="option2" style="text-transform: none !important;" class='option-label' data='1'>Common Style Sheets</label>
							</div>
							<div>
									<span class="opt">C</span>
									<input type="radio" name="answer" id="option3" value="2" />
									<label for="option3" style="text-transform: none !important;" class='option-label' data='2'>Common Sheet for Style</label>
							</div>
							<div>
									<span class="opt">D</span>
									<input type="radio" name="answer" id="option4" value="3" />
									<label for="option4" style="text-transform: none !important;" class='option-label' data='3'>Cascase Sheet for Style</label>
							</div>
					</div>
					<button class="btn btn-primary">Previous</button>
					<button class="btn btn-primary">Submit</button>
					<button class="btn btn-primary">Next</button>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $activeUser; ?>
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
