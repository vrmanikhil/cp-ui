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
    <h3>Latest Educational Details</h3>
    <form>
    <label>College Name</label>
    <select>
      <?php foreach ($colleges as $key => $value) { ?>
        <option value="<?php echo $value['college_id']; ?>"><?php echo $value['college']; ?></option>
      <?php } ?>
    </select>
    <br><br>
    <label>Course</label>
    <select>
      <?php foreach ($courses as $key => $value) { ?>
        <option value="<?php echo $value['course_id']; ?>"><?php echo $value['course']; ?></option>
      <?php } ?>
    </select>
    <br><br>
    <label>Batch</label>
    <input type="text" placeholder="Batch">
    <br><br>
    <button>Save</button>
    </form>
  </body>
</html>
