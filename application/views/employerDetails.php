
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

    <h3>Company Details</h3>
    <form action="<?php echo base_url('web/addEmployerDetails'); ?>" method="post">
    <label>Company Name</label>
    <input type="text" placeholder="Company Name" name="companyName">
    <br><br>
    <label>Position</label>
    <input type="text" placeholder="Position" name="position">
    <button type="submit">Save</button>
    <br><br>
    </form>
  </body>
</html>
