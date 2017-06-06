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

  <h3>Login</h3>
  <form>
    <input type="email" placeholder="E-Mail Address">
    <input type="password" placeholder="Password">
    <button type="submit">LOGIN</button>
  </form>
  <h3>Register</h3>
  <form method="post" action="<?php echo base_url('web/register'); ?>">
    <input type="text" name="name" placeholder="Full Name"><br>
    <input type="email" name="email" placeholder="E-Mail Address"><br>
    <input type="text" name="mobile" placeholder="Mobile Number" maxlength="10"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <label>Are you an Employer?</label>
    <select name="accountType">
      <option value="1">No</option>
      <option value="2">Yes</option>
    </select><br>
    <input type="submit" value="Register">
  </form>

</body>
</html>
