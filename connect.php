<?php
	$username = root;
	$password = root;

	$connect = new PDO('mysql:host=localhost;dbname=gurbanidb', $username, $password);
	if($connect){ 
	   echo "mysql Connected<br>"; 
	} 
	else { 
	   echo "mysql isn't connected<br>"; 
	}
	$connect->exec("set names utf8");
?>
