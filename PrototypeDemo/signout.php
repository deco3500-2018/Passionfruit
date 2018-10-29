<?php
	session_start();
	// Set Session data to an empty array
	$_SESSION = array();
	// remove the session variables
	session_destroy();
	if(isset($_SESSION['email'])){
		header("location: 1login.php");
	} else {
		header("location: 1login.php");
		exit();
	} 
?>