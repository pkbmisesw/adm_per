<?php

session_start();
date_default_timezone_set("Asia/Makassar");

$host = "localhost";
$user = "root";
$pass = ""; 
$db   = "buat"; 

try {
	$conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}
?>
