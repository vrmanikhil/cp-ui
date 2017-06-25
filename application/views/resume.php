<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title></title>
     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; color: #283e4a; line-height: 24px}
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; width: 250px; height: 250px}
        #logo {float: right; margin: -30px 0 0 0; width: 150px; height: 80px}
        #logo img{width: 150px; height: 70px}
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>
</head>
<body>
    <div id="page-wrap">
        <img src="<?=$userDetails['profileImage']?>" id="pic">
        <div id="contact-info" class="contact">
            <h1 class="name"><?=$userDetails['name']?></h1>
            <p>
                Mobile: <span class = "mobile"><?=$userDetails['mobile']?></span><br>
                Email: <a class="email" href="<?=$userDetails['email']?>"><?=$userDetails['email']?></a>
            </p>
        </div>
        <div class="clear"></div>
        <br>
        <dl>
            <dt>Education</dt>
            <dd><?php if(!isset($educationalDetails) || $educationalDetails == NULL){
                echo "No Educational Detail Added.";
            }else
                foreach($educationalDetails as $details){?>
                <?=$details['description']?>                
                <b>Year of Passing :</b><?= $details['year']?>
                <p><strong>Score : </strong><?= $details['score']?></p> 
                <?php } ?>
            </dd>
            <dd class="clear"></dd>
            <dt>Projects</dt>
            <dd><?php if(!isset($projects) || $projects == NULL){
                echo "No Project Added.";
            }else
                 foreach($projects as $project){?>
                    <li><b><?=$project['projectTitle']?></b></li>
                    <a href="<?=$project['projectLink']?>"><?=$project['projectLink']?></a>
                    <p><?=$project['projectDescription']?></p>
                <?php } ?>
            </dd>
            <dd class="clear"></dd>
            <dt>Skills</dt>
            <dd><?php if(!isset($skills) || $skills == NULL){
                echo "No Skill Added.";
            }else
                foreach($skills as $skill){?>
                    <li><?=$skill['skill_name']?></li>
                <?php } ?>
            </dd>
            <dd class="clear"></dd>
            <dt>Work Experience</dt>
            <dd><?php if(!isset($workExperiences) || $workExperiences == NULL){
                echo "No Work Experience Added.";
            }else
                foreach($workExperiences as $work){?>
                    <?= $work['companyName']?><br>
                    <?= $work['position']?>
                    <?= $work['description']?>
                    <?php 
                    echo $work['startMonth'].', '.$work['startYear'].' - '.$work['endMonth'].', '.$work['endYear'];
                    }?>             
            </dd>
            <dd class="clear"></dd>
            <dt>Achievements</dt>
            <dd><?php if(!isset($achievements) || $achievements == NULL){
                echo "No Achievement Added.";
            }else
               foreach($achievements as $achievement){?>
                <ul>
                    <li><b><?=$achievement['achievementTitle']?></b></li>
                    <p><?=$achievement['achievementDescription']?></p>
                </ul>
                <?php } ?>
            </dd>
            <dd class="clear"></dd>
            <dd  id="logo" style="text-align: center">
                <b>Powered By</b><br>
                <img src="<?= $campusPuppy?>" id = "logopic">
            </dd>
        </dl>
        <div class="clear"></div>
    </div>
</body>
</html>