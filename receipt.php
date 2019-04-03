<?php
  session_start();

  if(!isset($_SESSION['floor'])||!isset($_SESSION['slot_no']))
	{
		header('Location:index.php');
		exit();
	}


 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Receipt</title>
		<meta charset="utf-8">
		<style type="text/css">
			body{
				text-align: center;
				border-style: solid;
				border-width: 5px;
				border-radius: 15px;
				background: #66ccff;
				width: 500PX;
				margin: auto;
			}

			h1{
				text-decoration: underline;
			}

		</style>
	</head>
	<body>
		<h1>RECEIPT</h1>
		<h2>FLOOR NO.</h2>
			<p><?php echo $_SESSION['floor']; ?></p>

			<h2>SLOT NO.</h2>
			<p><?php echo $_SESSION['slot_no']; ?></p>

			<table border="3" align="center">
			<tr>
				<th>Customer name</th>
				<td><?php echo $_SESSION['name']; ?></td>
			</tr>

			<tr>
				<th>Arrival time.</th>
				<td><?php echo $_SESSION['arrival_time']; ?></td>
			</tr>

			<tr>
				<th>Exit time.</th>
				<td><?php echo $_SESSION['exit_time']; ?></td>
			</tr>

			<tr>
				<th>Vehicle no</th>
				<td><?php echo $_SESSION['regno']; ?></td>
			</tr>

			<tr>
				<th>Vehicle type</th>
				<td><?php echo $_SESSION['type']; ?></td>
			</tr>

		</table>

		

    <p id = "total_charge">
    	<?php
    		$charge_msg="";

			function charges($arrival,$exit)
			{
				$arrival=explode(" ", $arrival);
				$exit=explode(" ", $exit);

				if($arrival[0]!=$exit[0])
				{
					$charge_msg="Penalty imposed 5000₹ as u have delayed parking";
				}
				else
				{
					$time1=explode(":", $arrival[1]);
					$time2=explode(":", $exit[1]);

					if((int)$time2[0]-(int)$time1[0]>4||((int)$time2[0]-(int)$time1[0]==4&&(int)$time2[1]>=(int)$time1[0]))
						$charge_msg=80;
					else if((int)$time2[0]-(int)$time1[0]>3||((int)$time2[0]-(int)$time1[0]==3&&(int)$time2[1]>=(int)$time1[0]))
						$charge_msg=50;
					else if((int)$time2[0]-(int)$time1[0]>2||((int)$time2[0]-(int)$time1[0]==2&&(int)$time2[1]>=(int)$time1[0]))
						$charge_msg=40;
					else 
						$charge_msg=30;
					$charge_msg="PAID ".$charge_msg."₹ at the gate";
				}
				echo $charge_msg;
			} 
    		charges($_SESSION['arrival_time'],$_SESSION['exit_time']);
    	?>
    		
    </p>
    
    <table border="2" align="center">
			<h4>PARKING CHARGES</h4>

			<tr>
				<td>0-2 hours</td>
				<td>₹30</td>
			</tr>

			<tr>
				<td>2-3 hours</td>
				<td>₹40</td>
			</tr>

			<tr>
				<td>3-4 hours</td>
				<td>₹50</td>
			</tr>

			<tr>
				<td>4+ hours</td>
				<td>₹80</td>
			</tr>
		</table>

    <a href="index.php">Home</a>
	</body>
</html>

<?php 
	unset($_SESSION['slot_no']);
	unset($_SESSION['floor']);
	unset($_SESSION['name']);
	unset($_SESSION['arrival_time']);
	unset($_SESSION['exit_time']);
	unset($_SESSION['regno']);
	unset($_SESSION['type']);
 ?>