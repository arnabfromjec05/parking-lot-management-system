<?php
  session_start();
 ?>
<?php

  //security feature
  if(!(isset($_SESSION['username'])))
  {
    header('Location:login.php');
  }

  $dbhost = 'localhost:3306';
  $dbuser = 'root';
  $dbpass = 'root';
  $conn = mysql_connect($dbhost,$dbuser,$dbpass);

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db('parking',$conn);

  $sql="select timing_in.regno,timing_in.slot_no,timing_in.floor,timing_in.arrival_time
        from timing_in
        inner join slot
        on timing_in.slot_no=slot.slot_no and timing_in.floor=slot.floor
        where timing_in.exit_time is NULL and slot.slot_type=2 ";

  $two=mysql_query($sql,$conn);

    if(!$two)
    die('Could not get 2 wheelers details: ' . mysql_error());

  $sql="select timing_in.regno,timing_in.slot_no,timing_in.floor,timing_in.arrival_time
        from timing_in
        inner join slot
        on timing_in.slot_no=slot.slot_no and timing_in.floor=slot.floor
        where timing_in.exit_time is NULL and slot.slot_type=4 ";
  $four=mysql_query($sql,$conn);

    if(!$four)
    die('Could not get 4 wheelers details: ' . mysql_error());
 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ticket</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style media="screen">

      table{
        width: 100%;
      }

      .table h3{
        font-family: monospace;
        margin: 10px 10px 10px 10px;
      }

      tr{
        text-align: center;
      }
      tr th{
        background-color: rgb(65, 74, 244);
        height: 50px;
      }

      td button{
        width: 50%;
        margin-left: 25%;
      }

    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $_SESSION['username']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php"><button type="button" class="btn btn-primary" name="button">Home</button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button type="button" class="btn btn-danger" name="button">Logout</button></a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

    <div class="table">
      <h3>2 Wheelers currently present</h2>
      <table border="1">
        <tr>
          <th>RegistrationNumber</th>
          <th>SlotNumber</th>
          <th>FloorNumber</th>
          <th>ArrivalTime</th>
          <th>VehicleDetails</th>
        </tr>

        <?php

          while($row=mysql_fetch_array($two,MYSQL_ASSOC))
          {
            $str="<tr><td>".$row['regno']."</td><td>".$row['slot_no']."</td><td>".$row['floor']."</td><td>".$row['arrival_time']."</td>";
            $str.='<td><button type="button" class="det btn btn-md btn-secondary" name="button">Click</button></td></tr>';
            echo $str;
          }

         ?>
      </table>
    </div>
    <div class="table">
      <h3>4 Wheelers currently present</h2>
      <table border="1">
        <tr>
          <th>RegistrationNumber</th>
          <th>SlotNumber</th>
          <th>FloorNumber</th>
          <th>ArrivalTime</th>
          <th>VehicleDetails</th>
        </tr>

        <?php

          while($row=mysql_fetch_array($four,MYSQL_ASSOC))
          {
            $str="<tr><td>".$row['regno']."</td><td>".$row['slot_no']."</td><td>".$row['floor']."</td><td>".$row['arrival_time']."</td>";
            $str.='<td><button type="button" class="det btn btn-md btn-secondary" name="button">Click</button></td></tr>';
            echo $str;
          }

         ?>
      </table>
    </div>

    <script type="text/javascript">
    var but=document.getElementsByClassName('det');

    for (var i = 0; i < but.length; i++) {
      but[i].addEventListener("click",function(){

        var regno=this.parentNode.parentNode.firstChild.innerHTML;

        window.location.href = "display_veh.php?regno=" + regno;
      })
    }
    </script>

  </body>
</html>
