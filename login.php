<?php
	session_start();
 ?>

<?php

$msg='';

function chk_session_active()
{
	if(isset($_SESSION['username']))
	return 1;
	else {
		return 0;
	}
}

$chk=chk_session_active();  //checking whether session is set

if($chk==1)
{
	header('Location: det.php');
	exit();
}
else {
	if (isset($_POST['login'])) {

		$dbhost = 'localhost:3306';
		$dbuser = 'root';
		$dbpass = 'root';
		$conn = mysql_connect($dbhost,$dbuser,$dbpass);

		if(! $conn ) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('parking',$conn);

		$sql="select * from login";
		$ret=mysql_query($sql,$conn);
		if(!$ret)
		{
			die('Could not retrive login data: ' . mysql_error());
		}
		while($row=mysql_fetch_array($ret,MYSQL_ASSOC))
		{
			if($row['username']==$_POST['username'] && $row['password']==$_POST['password'])
			{
				$_SESSION['username']=$row['username'];
				header('Location: det.php');
				exit();
			}
		}

		$msg='invalid username or password';
	}
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login form.</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Nanum+Gothic'>
<body>

	<div class = "background-wrap">
		<video id="video-background-element" preload="auto" loop="loop" muted="muted" autoplay="autoplay">
			<source src="video/car_background.mp4" type="video/mp4">
				Video not supported.
		</video>
	</div>


	<div class="signin-box">
			<h1>Sign in</h1>

			<form action="<?php $_PHP_SELF ?>" method="post">

				<div class="textbox">
					<i class="fas fa-user"></i>
					<input type="text" placeholder="Username" name="username">
				</div>

				<div class="textbox">
					<i class="fas fa-lock"></i>
					<input type="password" placeholder="Password" pattern="[a-zA-Z0-9]{8,}" name="password">
				</div>

				<input class="btn" type="submit" value="Sign in." name="login">
				<div style="color:red;" class="message">
					<?php echo "$msg"; ?>
				</div>
			</form>
	</div>

</body>
</html>
