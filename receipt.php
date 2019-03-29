<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Receipt</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/E4A12E83-BB45-584F-943B-B927858EAF3C/main.js" charset="UTF-8"></script><style type="text/css">
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

    <p id = "total_charge">PAID ₹40 at the gate.</p>
    
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
