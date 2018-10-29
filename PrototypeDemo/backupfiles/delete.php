<?php
	include_once("includes/connection2.php");
	session_start();
	$id = $_SESSION['userid'];
    $delid = $_POST['delete_id'];
    //$sql = "DELETE * FROM code WHERE codevalue='$delid' AND uid ='$id'";
    //$result = mysqli_query($db_conn,$sql);
	echo $delid;
?>