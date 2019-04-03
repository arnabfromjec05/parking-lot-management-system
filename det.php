<?php
  session_start();
 ?>
<?php

  //security feature
  if(!(isset($_SESSION['username'])))
  {
    header('Location:login.php');
  }

  require 'mysql_connecti.php';

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

  <?php require "admin_navbar.php" ?>

    <div class="table">
      <h3>2 Wheelers currently present</h3>
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
      <h3>4 Wheelers currently present</h3>
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
