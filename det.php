<?php
  session_start();
 ?>
<?php

  echo "welcome to details page<br>";
  echo "session for ".$_SESSION['username']."<br>";

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
    <title>ticket</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

  </head>
  <body>
    <a href="logout.php">Logout</a>
    <a href="index.php">Home</a>

    <h2>2 Wheelers currently present</h2>
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
          $str.='<td><button type="button" class="det" name="button">Click</button></td></tr>';
          echo $str;
        }

       ?>
    </table>

    <h2>4 Wheelers currently present</h2>
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
          $str.='<td><button type="button" class="det" name="button">Click</button></td></tr>';
          echo $str;
        }

       ?>
    </table>

    <!-- <script type="text/javascript" src='js/det.js'>
    </script> -->
    <script type="text/javascript">

    function passVal(para){
            var data = {
                regno : para
            };
            console.log(data['regno']);
            $.post("display_veh.php", data);
        }

        var but=document.getElementsByClassName('det');

    for (var i = 0; i < but.length; i++) {
      but[i].addEventListener("click",function(){
        console.log("hello");
        var regno=this.parentNode.parentNode.firstChild.childNodes[0];

        passVal(regno);
      })
    }

    </script>


  </body>
</html>
