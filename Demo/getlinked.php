<?php
	include_once("includes/connection2.php");
	session_start();
	if(isset($_SESSION['userid'])){
	$id = $_SESSION['userid'];
	$sqllink = "SELECT * FROM code WHERE idparent = '$id'";
	$resultlink = mysqli_query($db_conn,$sqllink);
	$html = "";
	while($rows=mysqli_fetch_assoc($resultlink))
	{
	$fname = $rows['cFirstName'];
	$lname = $rows['cLastName'];
/* 	if ($fname == "" || $lname == ""){
		unset($fname);
		unset($lname);
		exit();
	} */
	if($fname != "" || $lname != ""){
	$r =  "<tr>" . "<td>". $rows["codevalue"] . "</td>" . "</tr>";
	$html .= $r;
	echo $html;
	unset ($html);
			}
		}

	}
	if(!isset($_SESSION['userid'])){
		echo '<meta http-equiv="refresh" content="0">';
		exit();
	}
?>
