<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Skill Test|CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/skillTest.css'); ?>" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>

	<div class="layout-container flex flex--col">
		<?php echo $header; ?>
		<main class="flex main-container globalContainer">
			<aside class="flex__item left-pane">
				<div class="explore-panel card flex">
					<a href="<?php if($_SESSION['userData']['accountType']=='1') { echo base_url('jobs/job-offers'); } else { echo base_url('jobs/add-job-offer'); } ?>" class="explore-panel__link flex flex--col flex__item align-center">
						<span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 50.2 50.2" class="briefcase-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#briefcase-icon"></use>
							</svg>
						</span>
						<span class="explore-panel__link-text flex__item">Jobs</span>
					</a>
					<a href="<?php if($_SESSION['userData']['accountType']=='1') { echo base_url('internships/internship-offers');} else { echo base_url('internships/add-internship-offer'); } ?>" class="explore-panel__link flex flex--col flex__item align-center">
						<span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 31.387 31.386" class="computer-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#computer-icon"></use>
							</svg>
						</span>
						<span class="explore-panel__link-text flex__item">Internships</span>
					</a>
					<a href="<?php echo base_url('skills'); ?>" class="explore-panel__link flex active flex--col flex__item align-center">
						<span class="explore-panel__link-icon-container">
							<svg version="1.1" width="45" height="45" x="0" y="0" viewBox="0 0 232.7 232.7" class="skills-icon">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/assets/img/svg-sprite.svg#skills-icon"></use>
							</svg>
						</span>
						<span class="explore-panel__link-text flex__item">Skills</span>
					</a>
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="contact us" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="card flex">
					<p class="skill-name">Skill Test: <strong><?php echo $skill_data['skill_name']; ?></strong></p>
					<div id="timer"></div>
				</div>
				<div class="card">
					<label><strong>Question : <sec id = "ques-no"></sec></strong></label>
					<p class="mcq" id="ques-content"></p>
					<div class="options">
							<div class="option flex">
								<span class="opt">A</span>
								<input type="radio" name="answer" id="option1" value="1" />
								<label for="option1" class='option-label' data='1'></label>
							</div>
							<div class="option flex">
								<span class="opt">B</span>
								<input type="radio" name="answer" id="option2" value="2" />
								<label for="option2" class='option-label' data='2'></label>
							</div>
							<div class="option flex">
								<span class="opt">C</span>
								<input type="radio" name="answer" id="option3" value="3" />
								<label for="option3" class='option-label' data='3'></label>
							</div>
							<div class="option flex">
								<span class="opt">D</span>
								<input type="radio" name="answer" id="option4" value="4" />
								<label for="option4" class='option-label' data='4'></label>
							</div>
					</div>
					<div class="flex">
					<button class="btn btn-primary testButton" id="previous-button">Previous</button>
					<button class="btn btn-primary testButton" id="next-button">Next</button>
					</div>
					<div class="<!-- submitButton -->" id="submitButton">
						<input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
						<button class="btn btn-primary testButton" id="final-submit">Submit</button>
					</div>
				</div>
			</div>
			<aside class="flex__item right-pane">
				<?php echo $activeUser; ?>
				<div class="post card">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- CampusPuppy -->
					<ins class="adsbygoogle"
							 style="display:block"
							 data-ad-client="ca-pub-2273757004475004"
							 data-ad-slot="7062717170"
							 data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</aside>
		</main>
		<?php echo $footer; ?>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script type="text/javascript">
		questions = JSON.parse(atob("<?php echo $question_string; ?>"));
		var eventKey = "<?php echo $skill_data['skill_name']?>_test";
		time = <?php echo $test_settings[0]['timeAllowed']; ?>,r=document.getElementById('timer'),tmp=time;
		setInterval(function () {
			var c = tmp--,m=(c/60)>>0,s=(c-m*60)+'';
			timer.textContent='Time Remaining: '+m+':'+(s.length>1?'':'0')+s
			if (c<1) {
				submitAnswers(eventKey);
			}

		},1000);
		var currentId = 1;
		$('#next-button').click(function () {
			var current = +getCurrent(eventKey);
			populateQuestion(eventKey, current + 1);
		})

		$('#previous-button').click(function () {
			var current = +getCurrent(eventKey);
			populateQuestion(eventKey, current - 1);
		})

		$('.option-label').click(function () {
			var option = $(this).attr('data');
			var current = +getCurrent(eventKey);
			saveAns(eventKey, current, option);
		})

		$('#final-submit').click(function () {
			submitAnswers(eventKey);
		})

		function init(eventKey) {
			if (alreadyInit(eventKey)) {
				reinitialise(eventKey)
			} else {
				localStorage.clear();
				ans = [];
				for (i = 0; i < questions.length; i++) {
						ans[i] = {ques_id: questions[i].question_id, ans: ''};
				}
				// console.log(ans);
				localStorage.setItem(eventKey+'_length', questions.length);
				localStorage.setItem(eventKey+'_answers', JSON.stringify(ans));
				populateQuestion(eventKey, 0);
			}
		}


		function alreadyInit(eventKey) {
			return !!localStorage.getItem(eventKey+'_current');
		}

		function reinitialise(eventKey) {
			populateQuestion(eventKey, +getCurrent(eventKey));
		}

		function populateQuestion(eventKey, index) {
			var ques = getQuestion(eventKey, index);
			var opts = [ques.option1,ques.option2,ques.option3,ques.option4];
			$('#ques-content').html(ques.ques);
			$('#ques-no').html(+getCurrent(eventKey)+1);
			populateOptions(opts, ques.ans);
			disableButtons(eventKey);
		}

		function populateOptions(options, ans) {
			var opts = $('.option-label');
			opts.each(function (index) {
				$(this).html(options[index]);
			});
			markAnswer(ans);
		}

		function markAnswer(ans) {
			var ans = +ans;
			if (ans != 4 || ans != 3|| ans != 2 || ans != 1 )
				$('input[name=answer]').prop('checked', false);
			$('#option'+ans).prop('checked', true);
		}

		function disableButtons(eventKey) {
			var index = getCurrent(eventKey);
			if (index == 0)
				$('#previous-button').attr('hidden', 'hidden');
			else if(index == questions.length -1)
				$('#next-button').attr('hidden', 'hidden');
			else {
				$('#previous-button').removeAttr('hidden');
				$('#next-button').removeAttr('hidden');
			}
		}

		function getCurrent(eventKey) {
			return localStorage.getItem(eventKey+'_current')
		}

		function getAnswers(eventKey) {
			return JSON.parse(localStorage.getItem(eventKey+'_answers'));
		}

		function getQuestion(eventKey, index) {
			var ans = getAnswers(eventKey);
			// console.log(index);
			localStorage.setItem(eventKey+'_current', index);
			return {
				ques: questions[index].question,
				option1: questions[index].option1,
				option2: questions[index].option2,
				option3: questions[index].option3,
				option4: questions[index].option4,
				ans: ans[index].ans || ''
			};
		}

		function saveAns(eventKey, current, option) {
			var ans = getAnswers(eventKey);
			ans[current].ans = option;
			localStorage.setItem(eventKey+'_answers', JSON.stringify(ans));
		}

		function submitAnswers(eventKey) {
			var data =JSON.stringify(getAnswers(eventKey));
			document.cookie = "data = " + data;
			if (data) {
				localStorage.clear();
				window.location.replace('<?php echo base_url('skills/submit-answers');?>');
			} else {
				alert('Some error occured');
			}
		}

		$(document).ready(function () {
			$(document).on("contextmenu", function (e) {
				return false;
			});
			init(eventKey);
		});

		document.onkeydown = function (e) {
			if (event.keyCode == 123) {
				return false;
			}

			if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
				return false;
			}

			if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
				return false;
			}

			if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
				return false;
			}

			if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
				return false;
			}
		}
	</script>
</body>
</html>
