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
		<title>Ticket.</title>
		<meta charset="utf-8">

		<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/E4A12E83-BB45-584F-943B-B927858EAF3C/main.js" charset="UTF-8"></script><style type="text/css">
			body{
				text-align: center;
				border-style: solid;
				border-width: 5px;
				border-radius: 15px;
				background: #fbb;
				width: 500PX;
				margin: auto;
			}

			h1{
				text-decoration: underline;
			}


		</style>
	</head>


	<body>
		<h1>TICKET</h1>

		<h2>FLOOR NO.</h2>
		<p><?php echo $_SESSION['floor'] ?></p>

		<h2>SLOT NO.</h2>
		<p><?php echo $_SESSION['slot_no'] ?></p>

		<table border="3" align="center">
			<tr>
				<th>Customer name</th>
				<td><?php echo $_SESSION['owner_name'] ?></td>
			</tr>

			<tr>
				<th>Arrival time.</th>
				<td><?php echo $_SESSION['arrival_time'] ?></td>
			</tr>

			<tr>
				<th>Vehicle no</th>
				<td><?php echo $_SESSION['regno'] ?></td>
			</tr>

			<tr>
				<th>Vehicle type</th>
				<td><?php echo $_SESSION['type'] ?></td>
			</tr>

		</table>
		<br>

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

		<h1>INSTRUCTIONS</h1>
		<div>
			<p>1. Losing the parking ticket is chargeable with ₹300 fine. <br>
		   2. Overnight parking is not allowed and the vehicle will be towed to the police station. <br>3. Parking must be done in only the alloted slot. <br>
		4. Vehicles must not be present in the parking lot after 2 AM.</p>
		</div>
    <a href="index.php">Home</a>

	</body>
</html>

<?php 
	unset($_SESSION['slot_no']);
	unset($_SESSION['floor']);
	unset($_SESSION['owner_name']);
	unset($_SESSION['arrival_time']);
	unset($_SESSION['regno']);
	unset($_SESSION['type']);
 ?>