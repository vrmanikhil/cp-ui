<html>
<head>
  <title>Nikhil Verma|Curriculam Vitae</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="all">
  <link href="<?php echo base_url('/assets/css/resume.css'); ?>" type="text/css" rel="stylesheet" media="all">
</head>
<body>
  <div class="container sectionA4">
    <div class="cv-head">
        <p><center><b>CURRICULAM VITAE</b><br>powered by <b>CampusPuppy</b></center></p>
    </div>
    <div class="resume-section">
        <p class="details">&#9742;<b><?=$userDetails['name']?></b></p>
        <p class="details">&#9742;<?=$userDetails['mobile']?></p>
        <p class="details">&#9993;<?=$userDetails['email']?></p>
        <p class="details">&#127760;<?= $userDetails['city']?>, <?= $userDetails['state']?>, India</p>
    </div>
    <hr>
    <div class="resume-section">
      <p class="details"><b>Career Objective:</b></p>
      <p class="details"><?php if(!isset($careerObjective) || $careerObjective == NULL){ echo "Carrer Objective not Available";}else{echo $careerObjective[0]['careerObjective'];} ?></p>
    </div>
    <hr>
    <div class="resume-section">
      <p class="details"><b>Education Qualification:</b></p>
      <table class="table education">
        <thead class="thead-inverse head-background">
          <tr>
            <th style="width: 4%;">#</th>
            <th style="width: 40%;">Qualification/Degree</th>
            <th style="width: 15%;">Year</th>
            <th style="width: 15%;">Score</th>
            <th style="width: 26%;">School/College/Education Board/University</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; 
          if(!isset($educationalDetails) || $educationalDetails == NULL){ 
                echo "<tr>Educational Details Not Available.</tr>";
            }else
                foreach($educationalDetails as $details){ $i++;?>
          <tr>
            <td scope="row"><?= $i?></td>
            <td><?php if($details['educationType'] == 1){echo "High School";}elseif($details['educationType'] == 2){echo "Senior Secondary or Equivalent";}elseif($details['educationType'] == 3){echo "Graduation";}else{ echo "Post-Graduation";}?></td>
            <td><b>Year:</b><?= $details['year']?></td>
            <td><b>Score:</b><?= $details['score']?></td>
            <td><?=$details['description']?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <hr>
    <div class="resume-section">
        <p class="details"><b>Work Experience</b></p>
        <br>
        <p class="details">
          <?php
          if(!isset($workExperiences) || $workExperiences == NULL){ 
                echo "Work Experiences Not Available.";
            }else{ ?>
            <ol>
              <?php foreach($workExperiences as $work){ ?>
          
            <li><b><?= $work['companyName']?></b></li>
            <br>
            <p class="details"><b>Position: </b><?= $work['position']?></p>
            <p class="details"><i><?php echo $work['startMonth'].', '.$work['startYear'].' - '.$work['endMonth'].', '.$work['endYear']; ?></i></p>
            <br>
            <p class="details"><?= $work['description']?></p>
            <?php } ?>
          </ol>
          <?php } ?>
        </p>
    </div>
    <hr>
    <div class="resume-section">
        <p class="details"><b>Achievement</b></p>
        <br>
        <p class="details">
          <?php
          if(!isset($achievements) || $achievements == NULL){ 
                echo "Achievements Not Available.";
            }else{ ?>
            <ol>
              <?php foreach($achievements as $achievement){ ?>
          
            <li><b><?=$achievement['achievementTitle']?></b></li>
            <br>
            <p class="details"><?=$achievement['achievementDescription']?></p>
            <?php } ?>
          </ol>
          <?php } ?>
        </p>
    </div>
    <hr>
    <div class="resume-section">
        <p class="details"><b>Skills</b></p>
        <p class="details">
          <ul>
            <?php if(!isset($skills) || $skills == NULL){
                echo "Skills Not Available.";
            }else
                foreach($skills as $skill){?>
                    <li><?=$skill['skill_name']?></li>
                <?php } ?>
          </ul>
        </p>
    </div>
    <hr>
    <div class="resume-section">
      <?php date_default_timezone_set('Asia/Kolkata'); ?>
      <p class="details"><b>Date: </b><?= date('d F Y', time())?></p>
      <br><br><br>
      <p class="details"><b>Signature: </b></p>
    </div>
    <hr>
  </div>
</body>
</html>
