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
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="card">
					<p style="float:left;">Skill Test: <strong><?php echo $skill_data['skill_name']; ?></strong></p>
					<div id="timer" style="float:right;"></div>
				</div>
				<div class="card">
					<label style="font-weight: bold;">Question</label>
					<p class="mcq" style="text-align: left;" id="ques-content"></p>

					<div class="options" style="text-transform: none;">
							<div>
								<span class="opt">A</span>
								<input type="radio" name="answer" id="option1" value="1" />
								<label for="option1" style="text-transform: none !important;" class='option-label' data='1'></label>
							</div>
							<div>
								<span class="opt">B</span>
								<input type="radio" name="answer" id="option2" value="2" />
								<label for="option2" style="text-transform: none !important;" class='option-label' data='2'></label>
							</div>
							<div>
								<span class="opt">C</span>
								<input type="radio" name="answer" id="option3" value="3" />
								<label for="option3" style="text-transform: none !important;" class='option-label' data='3'></label>
							</div>
							<div>
								<span class="opt">D</span>
								<input type="radio" name="answer" id="option4" value="4" />
								<label for="option4" style="text-transform: none !important;" class='option-label' data='4'></label>
							</div>
					</div>
					<div style="margin-top: 15px;">
					<button class="btn btn-primary testButton" id="previous-button" style="float:left;">Previous</button>
					<button class="btn btn-primary testButton" id="next-button" style="float:right;">Next</button>
					</div>
					<br>
					<div id="submitButton" style="margin-top: 20px;">
						<center><button class="btn btn-primary testButton" id="final-submit">Submit</button></center>
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
	<script>
				time=<?php echo $test_settings['timeAllowed']; ?>,r=document.getElementById('timer'),tmp=time;
				setInterval(function(){
					var c=tmp--,m=(c/60)>>0,s=(c-m*60)+'';
					timer.textContent='Time Remaining: '+m+':'+(s.length>1?'':'0')+s
					tmp!=0||(tmp=time);
				},1000);
	</script>
<script type="text/javascript">
	questions = JSON.parse(atob("<?= $question_string?>"));

var eventKey = "<?php echo $skill_data['skill_name']?>_test";
var time = <?php echo $test_settings['timeAllowed']; ?>;

var currentId = 1;

$('#next-button').click(function(){
    var current = +getCurrent(eventKey)
    populateQuestion(eventKey, current + 1)
})

$('#previous-button').click(function(){
    var current = +getCurrent(eventKey)
    populateQuestion(eventKey, current - 1)
})

$('.switch-question').click(function(){
    var index = +($(this).html()) - 1
    populateQuestion(eventKey, index)
})

$('.option-label').click(function(){
    var option = $(this).attr('data')
    var current = +getCurrent(eventKey)
    saveAns(eventKey, current, option)
})

$('#final-submit').click(function(){
    clock.stop()
})

function init(eventKey, clock){
    if(alreadyInit(eventKey)){
        clock.setTime(getSavedTime(eventKey));
        reinitialise(eventKey)
    }else{
        clock.setTime(time * 60)
        ans = [];
        for (i = 0; i < questions.length; i++){
            ans[i] = {ques_id: questions[i].id, ans: ''};
        }
        localStorage.setItem(eventKey+'_length', questions.length)
        localStorage.setItem(eventKey+'_answers', JSON.stringify(ans))
        populateQuestion(eventKey, 0)
    }
    clock.start()
}

function alreadyInit(eventKey){
    return !!localStorage.getItem(eventKey+'_length');
}

function reinitialise(eventKey){
    init_gems(eventKey)
    populateQuestion(eventKey, +getCurrent(eventKey))
}

function getSavedTime(eventKey){
    return localStorage.getItem(eventKey+'_time');
}

function populateQuestion(eventKey, index){
    var ques = getQuestion(eventKey, index)
    var opts = JSON.parse(ques.options)
    $('#ques-content').html(ques.ques)
    $('#ques-no').html(+getCurrent(eventKey)+1)
    populateOptions(opts, ques.ans)
    disableButtons(eventKey)
}

function populateOptions(options, ans){
    var opts = $('.option-label')
    opts.each(function(index){
        $(this).html(options[index]);
    })
    markAnswer(ans)
}

function markAnswer(ans){
    var ans = +ans
    if(ans != 4 || ans != 3|| ans != 2 || ans != 1 )
    $('input[name=answer]').prop('checked', false)
    $('#option'+ans).prop('checked', true)
}

function disableButtons(eventKey){
    var index = getCurrent(eventKey)
    if(index == 0)
    $('#previous-button').attr('disabled', 'disabled')
    else if(index == questions.length -1)
    $('#next-button').attr('disabled', 'disabled')
    else {
        $('#previous-button').removeAttr('disabled')
        $('#next-button').removeAttr('disabled')
    }
}

function getCurrent(eventKey){
    return localStorage.getItem(eventKey+'_current')
}

function getAnswers(eventKey){
    return JSON.parse(localStorage.getItem(eventKey+'_answers'))
}

function getQuestion(eventKey, index){
    var ans = getAnswers(eventKey)
    localStorage.setItem(eventKey+'_current', index)
    return {
        ques: questions[index].question,
        options: questions[index].options,
        ans: ans[index].ans || ''
    }
}

function saveAns(eventKey, current, option){
    var ans = getAnswers(eventKey)
    ans[current].ans = option
    localStorage.setItem(eventKey+'_answers', JSON.stringify(ans))
    enableGem(eventKey, current)
}

function enableGem(eventKey, current){
    $('#ques-'+current).addClass('answered')
}

function init_gems(eventKey){
    var ans = getAnswers(eventKey)
    var gems = $('.switch-question')
    for (var i = 0; i < gems.length; i++) {
        var curr_ans = +ans[i].ans
        if(curr_ans < 5 && curr_ans >0 ){
            enableGem(eventKey, i)
        }
    }
}

function submitAnswers(eventKey){
    var data = {answers: getAnswers(eventKey), <?php echo $csrf_token_name?>: "<?php echo $csrf_token?>"}
    $.post('/web/submit_answers', data, function(res){
    }).done(function(){
        localStorage.clear()
        window.location.replace('<?= base_url('skills')?>')
    }).fail(function(){
        alert('failed')
    })
}


$(document).ready(function(){
    clock = $('.your-clock').FlipClock({
        autoStart: false,
        countdown: true,
        clockFace: 'MinuteCounter',
        callbacks: {
            interval: function(){
                localStorage.setItem(eventKey+'_time', clock.getTime().time)
            },

            init: function(){
                if(!alreadyInit(eventKey)){
                    localStorage.setItem(eventKey+'_time', 0)
                }
            },

            stop: function(){
                submitAnswers(eventKey, clock)
            }
        }
    });


    $(document).on("contextmenu",function(e){
        alert('right click disabled');
        return false;
    });

    init(eventKey, clock);

});
</script>
</body>

</html>
