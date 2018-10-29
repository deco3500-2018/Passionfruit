<?php
	include_once("includes/connection.php");
	session_start();
	$id = $_SESSION['userid'];
    $sql = "DELETE FROM code WHERE idparent ='$id'";
    $result = mysqli_query($db_conn,$sql);
?>