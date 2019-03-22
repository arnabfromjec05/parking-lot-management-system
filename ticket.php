<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ticket</title>
  </head>
  <body>
    <h1>Ticket</h1>
    <hr>
    <h2>
      <?php
      echo $_SESSION['slot_no'].'<br>';
      echo $_SESSION['floor'].'<br>';
      echo $_SESSION['type'].'<br>';
      echo $_SESSION['arrival_time'].'<br>';

      unset($_SESSION['slot_no']);
      unset($_SESSION['floor']);
      unset($_SESSION['type']);
      unset($_SESSION['arrival_time']);
      ?>
      <a href="index.php">Home</a>
    </h2>
  </body>
</html>
