<?php
  session_start();
 ?>
<?php

if(!(isset($_SESSION['username'])))
  {
    header('Location:login.php');
  }

$regno=$_GET['regno'];

  $dbhost = 'localhost:3306';
  $dbuser = 'root';
  $dbpass = 'root';
  $conn = mysql_connect($dbhost,$dbuser,$dbpass);

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db('parking',$conn);

  $sql="select * from vehicle where regno='$regno'";
  $det=mysql_query($sql,$conn);
  if(!$det)
  die('Could not get vehicle details: ' . mysql_error());

  $sql="select * from owner where regno='$regno'";
  $own_det=mysql_query($sql,$conn);
  if(!$own_det)
  die('Could not get vehicle owner details: ' . mysql_error());

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vehicle details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    <style media="screen">
      body{
        font-family: fantasy;
      }
      #center_container h1{
        text-align: center;
        background-color: rgb(239, 224, 127);
      }
      #center_container{
        margin: 50px auto;
        width: 50%;
        border: 2px solid rgb(183, 16, 16);
      }
      .table{
          font-family: 'Baloo Chettan';
          padding: 10px;
      }

    </style>
  </head>
  <body>

    <div id="center_container">
      <h1><?php echo "REGISTRATION NO : $regno"; ?></h1>
      <div class="table">
        <h2>Vehicle Details :</h2>
        <?php
        $row=mysql_fetch_array($det,MYSQL_ASSOC);

        foreach ($row as $key => $value) {
          echo "$key : $value <br>";
        }
        ?>
      </div>
      <div class="table">
        <h2>Owner Details :</h2>
        <?php
        $row=mysql_fetch_array($own_det,MYSQL_ASSOC);

        foreach ($row as $key => $value) {
          if($key!='regno')
          echo "$key : $value <br>";
        }

        ?>
      </div>
    </div>

  </body>
</html>
