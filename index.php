<?php
  session_start();
 ?>

<?php
$msg="No message till now.";
    if(isset($_POST['entry'])){
      //echo "Entry command is working";
       require 'mysql_connecti.php';
       
       $type=NULL;
       if($_POST['type']=="two_wheeler")
       {
         $type=2;
       }
       else {
         $type=4;
       }
       $sql="select slot_no,floor from slot where status=0 and slot_type=$type";
       $ret=mysql_query($sql,$conn);

       if(!$ret){
          die('Could not get data: ' . mysql_error());
       }

       $row=mysql_fetch_array($ret,MYSQL_ASSOC);
       if (!$row) {
         // echo "Sorry, no slot available!!";
          $msg='Sorry, no slot available!!';
       }
       else {

         session_start();

         $_SESSION["slot_no"]=$row['slot_no'];
         $_SESSION["floor"]=$row['floor'];
         // echo "SlotNo = ".$_SESSION["slot_no"]." FloorNo = ".$_SESSION["floor"];

         if ($type==2) {
           header('Location:entry2.php');
         }
         else {
           header('Location:entry4.php');
         }
         exit();
       }

       mysql_close($conn);

    }
    else if (isset($_POST['exit'])) {

      header('Location:exit.php');
      exit();
    }
    else if(isset($_POST['admin'])) {

      header('Location:login.php');
      exit();
    }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Parking lot</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><i class="fa fa-home"> Home</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    </nav>


    <?php require "header.php" ?>
    <marquee>Welcome to parking lot</marquee>

    <form  action="<?php $_PHP_SELF ?>" method="post">
      <div class="container">
        <div class="row" >
          <div class="col">
            <input type="submit" class="btn btn-lg btn-success" name="entry" value="Entry">
            <select name="type">
              <option value="two_wheeler" selected>2-Wheeler</option>
              <option value="four_wheeler">4-Wheeler</option>
            </select>

              Entry of the vehicle
          </div>
          <div class="col">
            <input type="submit" class="btn btn-lg btn-danger" name="exit" value="Exit">
              Exit of the vehicle
          </div>
        </div>
        <div class="row">
          <div class="col">
            <input type="submit" class="btn btn-lg btn-primary" name="admin" value="Admin">
              Click for Parking-Lot view
          </div>
        </div>
        <div class="row">
          <div class="col" style="height:70px">
            <div id="msg" style="color:red;font-family:cursive;padding:20px;">
              Message: <?php echo $msg; ?>
            </div>
          </div>
        </div>
      </div>
    </form>


  </body>
</html>
