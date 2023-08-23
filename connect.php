<?php
	$user = 'root';
	$pass = '';
	$connect = new PDO( 'mysql:host=localhost;dbname=pdo_database', $user, $pass );
	if(!$connect){
		die("Failed to connect!");
	}
?>