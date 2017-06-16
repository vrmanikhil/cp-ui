<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us|CampusPuppy</title>
	<link href="/assets/css/content.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<?php
	if($message['content']!=''){?>
	<div class="message <?=$message['class']?>"><p><?=$message['content']?></p></div>
	<?php }?>
    <h3>Verify E-Mail</h3>
    <form action="<?php echo base_url('web/addEducationalDetails'); ?>" method="post">
    <label>E-Mail Address</label>
    <input type="email" name="email">
    <label>Token</label>
    <input type="email" name="email">
    <br><br>
    <label>Course</label>
    <select name="courseID">
      <?php foreach ($courses as $key => $value) { ?>
        <option value="<?php echo $value['course_id']; ?>"><?php echo $value['course']; ?></option>
      <?php } ?>
    </select>
    <br><br>
    <label>Batch</label>
    <input type="text" placeholder="Batch" name="batch">
    <br><br>
    <button type="submit">Save</button>
    </form>
  </body>
</html>
