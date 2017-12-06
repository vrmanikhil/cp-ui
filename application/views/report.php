<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Report|COAT</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

		<style type="text/css">

    div.sectionA4{
			height:305mm;
		  width:210mm;
		}
		</style>

  </head>

  <body>



    <div class="container sectionA4">

      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <center><img class="img-fluid rounded mb-4" src="<?php echo base_url('assets/logo.PNG'); ?>" style="margin-top:100px;" alt=""></center>
        </div>
				<br>
        <div class="col-lg-12">
					<center style="margin-top:20px;"><h3>REPORT</h3></center>
					<center style="margin-top:40px;"><h2>CampusPuppy Online Assessment Test</h2></center>
          <center><h2>(COAT)</h2></center>
          <?php $date = date('m/d/Y h:i:s a', time()); ?>
          <p style="margin-top:25px; float:right;">Generated as, on <?php echo $date; ?></p>
        </div>
				<div class="col-lg-12" style="margin-top: 100px;">
					<hr>
					<b>Name:</b> <?php echo $userDetails['firstName']." ".$userDetails['lastName']; ?><br>
					<b>E-Mail:</b> <?php echo $userDetails['email']; ?><br>
					<b>Mobile:</b> <?php echo $userDetails['mobile']; ?><br>
					<b>College:</b> <?php echo $userDetails['collegeName']; ?><br>
					<b>Course:</b> <?php echo $userDetails['course']; ?><br>
					<b>Batch:</b> <?php echo $userDetails['batch']; ?><br>
					<hr>
				</div>

      </div>


    </div>

		<div class="container sectionA4">

      <div class="row">
        <div class="col-lg-12">
					<center><p style="font-size: 35px;"><b>Letter from the Founder</b></p></center>
					<p>Dear <?php echo $userDetails['firstName'] ?></p>
					<br>
          <p dir="ltr">When you come in graduation, you have a lot of questions wherein what all skills you are good at, what kind of job is perfect for you and what all companies one should target. Everyone has some skills which they possess and want to excel in it. On parallel lines everyone has a dream company in mind where they want to work in, this dream company is the best company taking people having skills that you possess. The foremost solution to these questions is COAT(CampusPuppy Online Assessment Test). COAT is a robust system made on machine learning for, automated evaluation of your skill sets. COAT is the assessment exam that gives students the option to choose the particular skill set in which they want to specialize in and not focusing on a predefined set or course specific sets.</p>

<p dir="ltr">It goes beyond and provides industry recognized credentials and connects you to opportunities from across the spectrum. It further connects you to leading organizations with jobs in the specific skill sets that the candidate possesses.</p>

<p>COAT helps in the following ways:<br />
<br />
<strong>1. Self Improvement-</strong> Testing one&rsquo;s knowledge in specific skills. COAT does the analysis and gives you the exact level that you possess in that particular skill, categorised as begginer, intermediate and expert. After appearing for the test, you know exactly where you lack and what are your strong points which gradually helps you to work on the weak areas and gives a chance to improve.<br />
<br />
<strong>2. Recognition-</strong> Getting recognised for specific skill sets among the fellow colleagues. The analysis gives you the level that you possess in a particular skill set which adds up value to your profile. The analysis also gives you details of how others have performed in that skill, and some intricate details such as, how was your performance compared to the others in your institute and everyone who has appeared for COAT till date.<br />
<br />
<strong>3. Application-</strong> You can apply for internships/jobs for the skill that you possess. No more compromising on your career path, now you have the chance to get a job/internship in the skill that you already possess. This will give you more worth and make you content.<br />
<br />
The score generated through COAT is exactly according the knowledge that you have in the particular skill. The skills wherein you lack, you can improve on it and re-appear for COAT within a period of 90 days.<br />
<br />
Our motive of COAT is to map the best suitable candidate to his/her dream company. We have a motive that every candidate should do what he/she loves and not compromise on job/internship.<br />
As we are CampusPuppy, puppy being the symbol of loyalty, we will be loyal throughout your campus life and we inculcate trust through our bridging techniques with the help of COAT and make you reach your dream job</p>


<p><b>Thanks</b></p>
<br>
<p><b>Itishri Singh</b><br><b>Co-Founder|CampusPuppy Private Limited</b></p>
        </div>
      </div>

    </div>
    <?php $counter = 1;  foreach ($skillsUser as $key => $value) { ?>

		<div class="container sectionA4">

      <div class="row">
        <div class="col-lg-12">
          <center style="font-size: 32px;"><b>Skill Report</b></center>
          <center style="font-size: 25px;"><b>(<?php echo $value['skill']; ?>)</b></center>
          <hr>
        </div>

        <div class="col-md-12">
          <?php if($value['badge']=="1") { ?>
          <img src="<?php echo base_url('assets/badges/3.png'); ?>" style="width: 20%; float:right;">
          <?php } ?>
          <?php if($value['badge']=="2") { ?>
          <img src="<?php echo base_url('assets/badges/2.png'); ?>" style="width: 20%; float:right;">
          <?php } ?>
          <?php if($value['badge']=="3") { ?>
          <img src="<?php echo base_url('assets/badges/1.png'); ?>" style="width: 20%; float:right;">
          <?php } ?>


					<b>Score:</b> <?php echo $value['score']; ?><br>
					<b>Badge Awarded:</b> <?php if($value['badge']=="1") echo "Beginner"; if($value['badge']=="2") echo "Intermediate"; if($value['badge']=="3") echo "Expert"; if($value['badge']=="4") echo "Not Applicable"; ?><br>
					<b>Average Score (Others):</b> <?php echo $value['averageScore']; ?><br>
					<b>Number of Attempts:</b> <?php echo $value['attempts']; ?><br>
					<b>Number of Average Attempts (Others):</b> <?php echo $value['averageAttempts']; ?><br>
					<b>Number of Correct Attempts:</b> <?php echo $value['correctAttempts']; ?><br>
					<b>Number of Average Correct Attempts (Others):</b> <?php echo $value['averageCorrectAttempts']; ?><br><hr>
          <p style="margin-top: 20px;"><b>CampusPuppy Says:</b><br>
            <?php
              foreach ($reportContent as $key => $content) {
                if($content['skillID']==$value['skillID']){
                  if($value['score']<10){
                    echo $content['noBadge'];
                  }
                  if($value['score']>10 && $value['score']<35){
                    echo $content['beginner'];
                  }
                  if($value['score']>35 && $value['score']<60){
                    echo $content['intermediate'];
                  }
                  if($value['score']>35 && $value['score']<60){
                    echo $content['expert'];
                  }
                }
              }
             ?>
          </p>
          <hr>
        </div></div></div>
          <div class="container sectionA4">
            <div class="row">
              <div class="col-lg-12">
                <hr>
          <p><b>Graphical Analysis for Number of Attepts with respect to Difficulty of Questions</b></p>
          <?php $userResponsesArray = json_encode($value['userResponsesArray']); ?>
          <br>
          <?php $otherUserResponsesArray = json_encode($value['otherUserResponsesArray']); ?>

          <div id="myDiv<?php echo $counter; ?>"><!-- Plotly chart will be drawn inside this DIV --></div>

          <script>
          var you = {
           x: [1, 2, 3, 4, 5, 6, 7, 8],
           y: <?php echo $userResponsesArray; ?>,
           name: 'YOU',
           type: 'scatter'
          };
          var others = {
           x: [1, 2, 3, 4, 5, 6, 7, 8],
           y: <?php echo $otherUserResponsesArray; ?>,
           name: 'OTHERS',
           type: 'scatter'
          };
          var data = [you, others];
          var layout = {
            title: 'Analysis Graph',
          xaxis: {
            title: 'Difficulty Level',
            titlefont: {
              family: 'Courier New, monospace',
              size: 18,
              color: '#7f7f7f'
            }
          },
          yaxis: {
            title: 'Number of Attempts',
            titlefont: {
              family: 'Courier New, monospace',
              size: 18,
              color: '#7f7f7f'
            }
          }
        };
          Plotly.newPlot('myDiv<?php echo $counter; ?>', data, layout);
          </script>


          <hr>
          <p><b>Graphical Analysis for Number of Correct Attepts with respect to Difficulty of Questions</b></p>
          <?php $userResponsesArrayCorrect = json_encode($value['userResponsesArrayCorrect']); ?>
          <br>
          <?php $otherUserResponsesArrayCorrect = json_encode($value['otherUserResponsesArrayCorrect']); ?>

          <div id="myDiv<?php echo $counter.$counter; ?>"><!-- Plotly chart will be drawn inside this DIV --></div>

          <script>
          var you = {
           x: [1, 2, 3, 4, 5, 6, 7, 8],
           y: <?php echo $userResponsesArrayCorrect; ?>,
           name: 'YOU',
           type: 'scatter'
          };
          var others = {
           x: [1, 2, 3, 4, 5, 6, 7, 8],
           y: <?php echo $otherUserResponsesArrayCorrect; ?>,
           name: 'OTHERS',
           type: 'scatter'
          };
          var data = [you, others];
          var layout = {
            title: 'Analysis Graph',
          xaxis: {
            title: 'Difficulty Level',
            titlefont: {
              family: 'Courier New, monospace',
              size: 18,
              color: '#7f7f7f'
            }
          },
          yaxis: {
            title: 'Number of Correct Attempts',
            titlefont: {
              family: 'Courier New, monospace',
              size: 18,
              color: '#7f7f7f'
            }
          }
        };
          Plotly.newPlot('myDiv<?php echo $counter.$counter; ?>', data, layout);
          </script>

          <hr>

        </div>

        </div></div>
      </div>

    </div>


    <?php $counter++; } ?>



  </body>



</html>
