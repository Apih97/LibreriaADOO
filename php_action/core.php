<?php 

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];
//
if(!$_SESSION['user_id']) {
	header('location: http://localhost:8080/Libreria-2.0-master/home.php');	
} 



?>