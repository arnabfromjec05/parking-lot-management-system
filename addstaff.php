<?php 
session_start();

		//security feature
		if(!(isset($_SESSION['username'])))
	  {
	    header('Location:login.php');
	  }

	require "mysql_connecti.php";

	$sql = "select staff_id from staff";

	$ret=mysql_query($sql,$conn);

	if(!$ret)
	{
		die("couldn't retrieve staffid :".mysql_error());
	}

	$arr=array();
	while($row=mysql_fetch_array($ret))
	{
		$arr[]=$row['staff_id'];
	}

	sort($arr);

	$last=$arr[count($arr)-1];

	function increase($last)
	{
		$num=explode("W", $last);
		$num=(int)$num[1]+1;
		$last[strlen($last)-1]=(string)$num;
		return $last;
	}

	$last=increase($last);


	//adding new staff to the database
	if (isset($_POST['submit'])) {

		$staff_id=$last;
		$name=$_POST['name'];

		function intfunc($pno)
	    {
	      $sum=0;
	      for ($i=0; $i < strlen($pno); $i++) {
	        $sum=($sum*10)+($pno[$i]-'0');
	      }
	      return $sum;
	    }

		$phone_no=intfunc($_POST['phone_no']);
		$address=$_POST['address'];
		$role=$_POST['role'];
		$floor=(int)$_POST['floor'];

		$sql="insert into staff values('$staff_id','$name',$phone_no,'$address','$role',$floor)";
		
		$ret=mysql_query($sql,$conn);

		if(!$ret)
		{
			die("couldn't retrieve staffid :".mysql_error());
		}

		header('Location:staff.php');

	}
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Staff</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<style type="text/css">
 		
 		form{
 			width: 60%;
 			border: 2px solid black;
 			border-radius: 2px;
 			margin: 20px auto;
 			padding: 20px;
 		}

 	</style>
 </head>
 <body>
 	 
 	 <?php require "admin_navbar.php" ?>

 	<form action="<?php $_PHP_SELF ?>" method="post">

 		<h3>ASSIGNED WORKER ID : <?php echo $last ?></h3>

		  <div class="form-group">
			<p>Name: <input type="text" name="name" class="form-control" required></p>  	
		  </div>
		  <div class="form-group">
			<p>Phone number: <input type="number" name="phone_no" min="7000000000" max="9999999999" class="form-control" required></p>  	
		  </div>
		  <div class="form-group">
			<p>Address: <input type="text" name="address" class="form-control" required></p>  	
		  </div>
		  <div class="form-group">
			<p>Role: 
 			<select name="role" class="form-control" >
 				<option>Manager</option>
 				<option>Cleaner</option>
 			</select> 
 			</p>  	
		  </div>
 		<div class="form-group" class="form-control">
 			<p>Floor: <input type="number" name="floor" min="1" max="3" class="form-control" required></p>	
 		</div>

 		<input type="submit" name="submit" class="btn btn-lg btn-primary">

 	</form>
 </body>
 </html>
