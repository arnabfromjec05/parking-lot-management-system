<?php
  session_start();
 ?>
<?php

  echo "welcome to details page<br>";
  echo "session for ".$_SESSION['username']."<br>";

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="logout.php">Logout</a>
    <a href="index.php">Home</a>
  </body>
</html>
