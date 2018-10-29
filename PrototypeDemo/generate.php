<?php
	include_once("includes/connection.php");
	session_start();
	$id = $_SESSION['userid'];
	$gencode = $_POST['newcode'];
	$sql = "INSERT INTO code (codevalue, idparent) VALUES ('$gencode', '$id')";
	$result = mysqli_query($db_conn,$sql);
	exit();
?>