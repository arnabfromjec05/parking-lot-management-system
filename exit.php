<?php
  $msg="";
  if (isset($_POST['submit'])) {

    if ($_POST['slot_no']=='S000'||$_POST['floor']=='F00') {
        $msg='invalid slot id';
    }
    else {
      require 'mysql_connecti.php';
      
      $slot_no=$_POST['slot_no'];
      $floor=$_POST['floor'];
      $sql="select * from timing_in where slot_no='$slot_no' and floor='$floor' and exit_time is null";
      $ret=mysql_query($sql,$conn);

      if(!$ret){
         die('Could not get data: ' . mysql_error());
      }

      $row=mysql_fetch_array($ret,MYSQL_ASSOC);

      if (!$row) {
        $msg='Slot is already empty!!';
      }
      else {

          date_default_timezone_set("Asia/Kolkata");
          $now=date("Y-m-d H:i:s");
          $sql="update timing_in set exit_time=NOW() where slot_no='$slot_no' and floor='$floor' and exit_time is null";
          $ret=mysql_query($sql,$conn);

          if(!$ret){
             die('Could not update timing_in: ' . mysql_error());
          }
          $sql="update slot set status=0 where slot_no='$slot_no' and floor='$floor'";
          $ret=mysql_query($sql,$conn);

          if(!$ret){
             die('Could not update slot: ' . mysql_error());
          }

          $regno=$row['regno'];
          $arrival_time=$row['arrival_time'];
          $exit_time=$now;


          $sql="select type from vehicle where regno='$regno'";
          $ret=mysql_query($sql,$conn);
          if(!$ret){
             die('Could not fetch type: ' . mysql_error());
          }
          $row=mysql_fetch_array($ret,MYSQL_ASSOC);
          $type=$row['type'];

          $sql="select name from owner where regno='$regno'";
          $ret=mysql_query($sql,$conn);
          if(!$ret){
             die('Could not fetch type: ' . mysql_error());
          }
          $row=mysql_fetch_array($ret,MYSQL_ASSOC);
          $name=$row['name'];

          session_start();
          $_SESSION['regno']=$regno;
          $_SESSION['arrival_time']=$arrival_time;
          $_SESSION['exit_time']=$exit_time;
          $_SESSION['type']=$type;
          $_SESSION['name']=$name;
          $_SESSION['slot_no']=$slot_no;
          $_SESSION['floor']=$floor;

          //optional to send owner details to the receipt side
          header('Location:receipt.php');

      }
    }

  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Exit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style media="screen">
      body{
        width: 40%;
        margin: 100px auto;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        border: 2px solid black;
        border-radius: 1em;
      }
      #exitlogo{
        width: 25%;
        margin-left: 35%;
      }
      #message{
        color: red;
      }
    </style>

  </head>
  <body>
    <img id="exitlogo" src="img/exit.jpg" alt="exitlogo">
    <form  action="<?php $_PHP_SELF ?>" method="post">
      <div class="form-group">
        <label for="slot_no">
          slot number: <input type="text" name="slot_no" placeholder="SXXX" pattern="S[0-9]{3}" class="form-control">
        </label>
      </div>
      <div class="form-group">
        <label for="floor">
          floor number: <input type="text" name="floor" placeholder="FXX" pattern="F[0-9]{2}" class="form-control">
        </label>
      </div>

      <div id="message" >
        <?php echo $msg; ?>
      </div>
      <input type="submit" name="submit" class="btn btn-lg btn-primary">

    </form>
  </body>
</html>
