
<!-- vehicles entry page -->
<?php
session_start();
?>
<?php
  // echo $_SESSION['slot_no'];
  // echo $_SESSION['floor'];
  if (isset($_POST["submit"])) {

    require 'mysql_connecti.php';
    
    $regno=$_POST['regno'];
    $sql="select * from vehicle where regno = '$regno'";
    $ret=mysql_query($sql,$conn);
    if(!$ret)
    {
      die('Could not check availability of vehicle: ' . mysql_error());
    }
    $row=mysql_fetch_array($ret,MYSQL_ASSOC);

    $slot_no=$_SESSION['slot_no'];
    $floor=$_SESSION['floor'];
    $company=$_POST['company'];
    $model=$_POST['model'];
    $color=$_POST['color'];
    $type=4;

    $class=$_POST['class'];

    $owner_name=$_POST['owner_name'];
    $owner_email=$_POST['owner_email'];

    function intfunc($pno)
    {
      $sum=0;
      for ($i=0; $i < strlen($pno); $i++) {
        $sum=($sum*10)+($pno[$i]-'0');
      }
      return $sum;
    }

    $owner_phoneno=intfunc($_POST['owner_phoneno']);

    if (!$row) {

      $sql="insert into vehicle(regno,company,model,color,type) values ('$regno','$company','$model','$color','$type')";
      $ret=mysql_query($sql,$conn);
      if (!$ret) {
        die('Could not insert data into vehicle: '.mysql_error());
      }

      $sql="insert into four_wheeler(regno,class) values ('$regno','$class')";
      $ret=mysql_query($sql,$conn);
      if (!$ret) {
        die('Could not insert data into two_wheeler: '.mysql_error());
      }

      $sql="insert into owner(regno,name,phone_no,email) values ('$regno','$owner_name',$owner_phoneno,'$owner_email')";
      $ret=mysql_query($sql,$conn);
      if (!$ret) {
        die('Could not insert data into owner: '.mysql_error());
      }

    }
    date_default_timezone_set("Asia/Kolkata");
    $now=date("d,M,Y h:i:s A");
    $_SESSION['arrival_time']=$now;
    $sql="insert into timing_in(slot_no,floor,regno,arrival_time) values ('$slot_no','$floor','$regno',NOW())";
    $ret=mysql_query($sql,$conn);
    if (!$ret) {
      die('Could not insert data into timing_in: '.mysql_error());
    }

    //slot gets occupied
    $sql="update slot set status=1 where slot_no='$slot_no' and floor='$floor'";
    $ret=mysql_query($sql,$conn);
    if(!$ret){
      die('Could not update the slot status: '.mysql_error());
    }

    $_SESSION['type']="four wheeler";
    $_SESSION['owner_name']=$_POST['owner_name'];
    $_SESSION['regno']=$_POST['regno'];
    header('Location:ticket.php');
    exit();
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New vehicle entry</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style media="screen">
      body{
        width: 60%;
        margin: 20px auto;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        border: 2px solid black;
        border-radius: 1em;
      }
      #carlogo{
        width: 25%;
        margin-left: 35%;
      }
    </style>

  </head>
  <body>
    <img src="img/car.jpg" id="carlogo" alt="carlogo">
    <hr>
    <form action="<?php $_PHP_SELF ?>" method="post">
      <h2>Vehicle details</h2>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="regno">
            Registration Id : <input type="text" name="regno" onkeyup="this.value = this.value.toUpperCase();" required class="form-control">
          </label>
        </div>
        <div class="form-group col-md-4">
          <label for="company">
            Company : <input type="text" name="company" required class="form-control">
          </label>
        </div>
        <div class="form-group col-md-4">
          <label for="model">
            Model : <input type="text" name="model" required class="form-control">
          </label>
        </div>
      </div>

      <hr>
      <h2>Specifications</h2>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="color">
            Color : <input type="text" name="color" required class="form-control">
          </label>
        </div>
        <div class="form-group col-md-4">
          <label for="class">
            Class :
            <select name="class" class="form-control">
              <option value="Economy">Economy</option>
              <option value="Standard">Standard</option>
              <option value="SUV">SUV</option>
              <option value="PickUp Van">PickUp Van</option>
            </select>
          </label>
        </div>
      </div>

      <hr>
      <h2>Owner details</h2>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="owner_name">
            Name : <input type="text" name="owner_name" pattern="[ a-zA-Z]*" required class="form-control">
          </label>
        </div>
        <div class="form-group col-md-4">
          <label for="owner_email">
            E-Mail : <input type="email" name="owner_email" placeholder="abc@gmail.com" class="form-control">
          </label>
        </div>
        <div class="form-group col-md-4">
          <label for="owner_phoneno">
            Phone No. : <input type="text" name="owner_phoneno" pattern="[0-9]{10}" required class="form-control">
          </label>
        </div>
      </div>

      <input type="submit" name="submit" class="btn btn-primary">
    </form>

  </body>
</html>
