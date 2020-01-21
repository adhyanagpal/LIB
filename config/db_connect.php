<?php 
   // MySQLi or PDO 
   // connect to database
	$conn = mysqli_connect('127.0.0.1:3300','tester', 'test', 'projectdb');
	// check connection
	if(!$conn) {
		echo 'Connection Failed <br/>' .mysqli_connect_error();
	} else {
		// echo "Connected <br/>";
	}


 ?>