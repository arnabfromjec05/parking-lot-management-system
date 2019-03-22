<?php
  session_start();
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Receipt</title>
  </head>
  <body>
    <h1>Receipt :</h1>
    <h2>
      <?php
        echo "Vehicle Registration No. = ".$_SESSION['regno']."<br>";
        echo "Arrival Time = ".$_SESSION['arrival_time']."<br>";
        echo "Exit Time = ".$_SESSION['exit_time']."<br>";
        echo "Parking Charges : 100";  //modify based on parking time
        unset($_SESSION['regno']);
        unset($_SESSION['arrival_time']);
        unset($_SESSION['exit_time']);
      ?>
    </h2>
    <a href="index.php">Home</a>

  </body>
</html>
