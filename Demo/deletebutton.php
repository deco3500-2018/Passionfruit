<?php
	include_once("includes/connection2.php");
	session_start();
	$id = $_SESSION['userid'];
	$sqllink = "SELECT * FROM code WHERE idparent = '$id'";
	$resultlink = mysqli_query($db_conn,$sqllink);
	$html = "";
	while($rows=mysqli_fetch_assoc($resultlink))
	{
	$r = "<option>";
	$r .= $rows['codevalue'];
	$r .= "</option>";
	$html .= $r;
	}
echo $html;
?>
