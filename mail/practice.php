<?php 

	date_default_timezone_set("Asia/Kolkata");
	$x=date('d-m-Y h:i:sa');
	echo $x;

	$arr=array();
	
	for ($i=0; $i<10 ; $i++) 
	{ 
		$arr[$i]=$i+1;
		# code...
	}
	
	echo $arr[1];


	setcookie("animal","panda",time()+60,"/");
	if(isset($_COOKIE['animal']))
	{
		echo "Has cookie".$_COOKIE['animal'];
	}
	else{
		echo "No cookie available";
	}

 ?>