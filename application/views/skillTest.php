<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Skill Test|CampusPuppy</title>
	<link href="<?php echo base_url('/assets/css/skillTest.css'); ?>" rel="stylesheet">
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
					<div class="col-sm-12 well">
              			<center><b>Test Time</b></center>
              			<div><b><center id = 'timer' style= "font-size: 2em"></center></b></div>
            		</div>

            		<div class="col-sm-12 well">
             			<center><b>Skips Left:</b></center>
              			<div><b><center id = 'skipsLeft' style= "font-size: 2em"><?= $skips?></center></b></div>
            		</div>
            		<div class="col-sm-12 well" >
              			<center><b>Question Time </b>
                			<div><b><center id = 'questionTimer' class = "svg-test" style= "font-size: 2em"></center></b></div>
              			</center>
            		</div>
            		<div class="col-sm-12 well">
           				<center><button class="btn btn-lg finishTest" style="background-color: #3d464d; color: #fff;">FINISH TEST</button></center>
            		</div>
				</div>
				<div class="post card">
					<img src="/assets/img/showcase/CP1.png" alt="" style="width: 100%;">
				</div>
			</aside>
			<div class="main-body flex__item">
				<div class="card flex">
					<p class="skill-name" style = "font-weight: 800">Skill Test: <strong style="font-weight: 600"><?php echo $skillData['skillName']; ?></strong></p>
				</div>
				<div class="card">
					<div class="col-sm-12">
                            <p class="mcq skipQuestion" style="float: right;"><?php if($skips > 0){?><a href = "javascript:">Skip Question</a><?php }else{}?></p>
                            
    						<p class="mcq"><strong>Question</strong></p>
    						<div class="mcq" id = "question"><?=$questionData[0]['question']?></div>
                            <div class="options">
    							<div class = 'option'>
    								<span class="opt">A</span>
    								<input type="radio" name="answer" id="optionA" value="1" />
    								<label for="optionA" class = "option-label" id = 'option1'><?=$questionData[0]['option1']?></label>
    							</div>
    							<div class = 'option'>
    								<span class="opt">B</span>
    								<input type="radio" name="answer" id="optionB" value="2" />
    								<label for="optionB" class = "option-label" id = 'option2'><?=$questionData[0]['option2']?></label>
    							</div>
    							<div class = 'option'>
    								<span class="opt">C</span>
    								<input type="radio" name="answer" id="optionC" value="3" />
    								<label for="optionC" class = "option-label" id = 'option3'><?=$questionData[0]['option3']?></label>
    							</div>
    							<div class = 'option'>
    								<span class="opt">D</span>
    								<input type="radio" name="answer" id="optionD" value="4" />
    								<label for="optionD" class = "option-label" id = 'option4'><?=$questionData[0]['option4']?></label>
    							</div>
    						</div>
    					</div>
                       
    					<center>
                            <button id="reset" class="btn btn-default" style="background-color: #3d464d; color: #fff; margin-top: 10px;">RESET</button>
                            <button class="btn btn-default submitAns" style="background-color: #3d464d; color: #fff; margin-top: 10px;">SUBMIT</button>
                        </center>

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
		<?php echo $footer;?>
	</div>
	<script src="<?php echo base_url('/assets/js/jquery-3.2.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/common.js'); ?>"></script>
	<script type="text/javascript">
		var timePassed= 0;

var totalTime = <?php echo $totalTime; ?>;
// var totalTime = 90;
var questionTime = <?= 2*$questionData[0]['expert_time']?>;
var interval = null;
(function ( $ ) {
    $.fn.svgTimer = function(options) {
        
        return this.each(function() {
          var qtime = questionTime,r=document.getElementById('questionTimer'),temp=qtime;
            interval = setInterval(function () {
                var tt = temp--,hr = (tt/3600)>>0,min=((tt-hr*3600)/60)>>0,sec=(tt-min*60-hr*3600)+'';
                console.log('tt'+tt);
                console.log('sec'+sec);
                if(min>0){
                    questionTimer.textContent= min+' : '+(sec.length>1?'':'0')+sec
                }else{
                    questionTimer.textContent= (sec.length>1?'':'0')+sec
                }
                if (tt<1) {
                    submitAnswers('0',--questionTime,tmp);
                }

            },1000);
    
        });
    };

   
}(jQuery));

$(function () {
  $('.svg-test').svgTimer();
});

var time = totalTime,r=document.getElementById('timer'),tmp=time;
setInterval(function () {
    var c = tmp--,h = (c/3600)>>0,m=((c-h*3600)/60)>>0,s=(c-m*60-h*3600)+'';
    if(h>0){
        timer.textContent= h+' : '+m+' : '+(s.length>1?'':'0')+s
    }else{
        timer.textContent= m+' : '+(s.length>1?'':'0')+s
    }
    if (c<1) {
        finishTest();
    }

},1000);



var ans = 0;
var selected = null;
$('.option').on('click', function(){
    selected = $(this).find("input[name = answer]").attr('id');
    ans = $("#"+selected).val();
});    

$('.skipQuestion').on('click', function(){
    data = {answer: '0', timeConsumed: totalTime-tmp, totalTime:tmp};
   $.post('<?= base_url('homeFunctions/skipQuestion')?>', data).done(function(res){
        res = JSON.parse(res);
        if(res.skips!=false)
            populate(res);
        else{
            populate(res);
            $('.skipQuestion').hide();
        }
   })
});

$('#reset').on('click', function() {
   $('input[type=radio]').prop('checked', function () {
       return this.getAttribute('checked') == 'checked';
   });
})

$('.submitAns').on('click', function(){
    $(this).hide();
    $('#reset').hide();
    submitAnswers(ans, totalTime-tmp, tmp);
});

$('.finishTest').on('click', function(){
    finishTest();
});
function submitAnswers(ans, timePassed, tmp){   
   data = {answer: ans, timeConsumed: timePassed, totalTime:tmp};
   $.post('<?= base_url('homeFunctions/nextQuestion')?>', data).done(function(res){
        if(res == 'false'){
            window.location = "<?= base_url('skill-tests')?>";
        }
        console.log(res);
        res = JSON.parse(res);
        if(res.skips!=false){
            populate(res);
            $('.skipQuestion').show();
        }
        else{
            populate(res);
            $('.skipQuestion').hide();
        }
   })
}

function finishTest(){
    clearInterval(interval);
    window.location = "<?= base_url('homeFunctions/endTest')?>";
}

function populate(res){
    if(res.questionData == null){
        finishTest();
    }else{
    $('.submitAns').hide()
    $('#reset').hide();
    $('#question').empty();
    $("#"+selected).prop("checked", false);
    $('#question').html(res.questionData.question);
    $('#option1').html(res.questionData.option1);
    $('#option2').html(res.questionData.option2);
    $('#option3').html(res.questionData.option3);
    $('#option4').html(res.questionData.option4);
    $(document).find('#skipsLeft').html(res.skipsLeft);
    $('.skipQuestion').show();
    questionTime = 2*res.questionData.expert_time;
    totalTime = res.totalTime;
    clearInterval(interval);
    $('.svg-test').empty();
    $('.svg-test').svgTimer();
        var hey = setInterval(function () {
            var nc = 0;
            if (nc<=0) {
                clearInterval(hey);
                $('.submitAns').show()
                $('#reset').show()   
                }
        },1000);
} 
}

		
	</script>
</body>
</html>
