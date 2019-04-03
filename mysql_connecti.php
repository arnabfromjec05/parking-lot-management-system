<?php 

  $dbhost = 'localhost:3306';
  $dbuser = 'root';
  $dbpass = 'root';
  $conn = mysql_connect($dbhost,$dbuser,$dbpass);

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }
  mysql_select_db('parking',$conn);

  
 ?>