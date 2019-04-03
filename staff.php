<?php 
	session_start();
 	
 	//security feature
	if(!(isset($_SESSION['username'])))
	  {
	    header('Location:login.php');
	  }

	require("mysql_connecti.php");

  if(isset($_POST['floor']))
  {
    if ($_POST['floor']=="All") {
      header('Location: staff.php');
      # code...
    }
    $floor=(int)$_POST['floor'];
    $sql="select * from staff where floor=$floor";
    $ret=mysql_query($sql,$conn);

    if(!$ret)
    {
      die("Couldn't retrieve the staff details :".mysql_error());
    }    
  }
  else
  {
    $sql="select * from staff order by 'Staff Id' asc";

    $ret=mysql_query($sql,$conn);

    if(!$ret)
    {
      die("Couldn't retrieve the staff details :".mysql_error());
    } 
  }
	
  ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Staff
 	</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 	<style type="text/css">
 		
    #inputGroupSelect04{
      margin: 0 auto;
      width: 500px;
    }

    #search{
      width: 50%;
      margin:0 auto;
    }

 	  table{
        width: 80%;
        margin: 10px auto;
      }
      #table h3{
      	text-align: center;
      }

      tr{
        text-align: center;
      }
      tr th{
        background-color: #E9ECEF;
        height: 50px;
      }

 	</style>
 </head>
 <body>
 	
 	<?php require "admin_navbar.php" ?>

 <div class="jumbotron" id="jumbotron-div" style="text-align: center;">
	  <h1 class="display-4" style="color: black; font-size: 57px; font-color:black">Staff</h1>
	  <hr class="my-4" style="width: 60%;font-color: black;">
	  <a class="display-4" style="color: black; font-size: 30px; font-color:black; border: 2px solid; border-radius: 3px; padding: 5px" href="addstaff.php" >Add worker
	  </a>
</div>

<div id="search" class="input-group">
    <form action="staff.php" method="post">
      
      <select class="custom-select" id="inputGroupSelect04" name="floor">
        <option>All</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
        <input class="btn btn-outline-secondary" type="submit" name="submit" value="select">
    </form>
  </div>
 	<div id='table'>
      <table border="1">
        <tr>
          <th>Staff ID</th>
          <th>Name</th>
          <th>Phone no.</th>
          <th>Address</th>
          <th>Role</th>
          <th>Floor</th>
        </tr>

        <?php

          while($row=mysql_fetch_array($ret,MYSQL_ASSOC))
          {
            $str="<tr><td>".$row['staff_id']."</td><td>".$row['name']."</td><td>".$row['phone_no']."</td><td>".$row['address']."</td><td>".$row['role']."</td><td>".$row['floor']."</td></tr>";
           
            echo $str;
          }

         ?>
      </table>
  </div>
 </body>
 </html>

