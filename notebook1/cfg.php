<?php
		

	$user="root";
	$pass="walerafire";
	$dbname="notebook";
	$server="localhost";

	try {

			$connect = new PDO("mysql:host=$server;dbname=$dbname",$user,$pass);
			//echo "OK";
		
	} catch (Exception $e) {
		echo "lalka azazazaza";
	}

?>
