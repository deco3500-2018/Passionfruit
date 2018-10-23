<?php
	include_once("includes/connection2.php");
	//$link = $_POST['link_code'];
	$link = $_POST['link_code'];
	echo $link;
	$sql = "UPDATE code SET idchild = '69' WHERE codevalue = '$link' ";
	$result = mysqli_query($db_conn,$sql);
?>
