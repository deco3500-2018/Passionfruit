<?php
	include_once("includes/connection.php");
	if (isset($_POST['fname'], $_POST['lname'], $_POST['lcode']))
	{
		$lcode = $_POST['lcode'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sqlcheck = "SELECT * FROM code WHERE codevalue = '$lcode'";
		$resultcheck = mysqli_query($db_conn, $sqlcheck);
		$num_rows = mysqli_num_rows($resultcheck);
		if($num_rows == '0'){
			echo 'Code'.' '.$lcode.' '.'does not exist or is incorrect';
		}
		else if($num_rows == '1'){
			while($rows=mysqli_fetch_assoc($resultcheck)){
				if($rows['cFirstName'] == '' AND $rows['cLastName'] == ''){
					$sql = "UPDATE code SET cFirstName = '$fname' , cLastName = '$lname' WHERE codevalue = '$lcode'";
					$result = mysqli_query($db_conn,$sql);
					echo "Linked Accounts!";
					}
				else{
					echo $lcode.' '.'has already been linked to an account';

				}
				//else if($rows['FirstName'] != '' || $rows['LastName'] != ''){

				}
			}
		}

		//echo "<meta http-equiv='refresh' content='0'>";	//Refreshes page
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<title>Link Accounts</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width" />
</head>
    <body>
        <div class= "center">
		<div class= "container">
		<div>
			<div class="centralLoginText"><h2>UNLOCKED - CHILD</h2> <h3>Enter Code to Link Account</h3></div>
		</div>
		<form name="linkacc" method="post" id="linkacc">
		<div>
		<i class="fa fa-user icon"></i>
		<input class="input-field" type="text" id="fname" name="fname" placeholder="First Name">
		</div>
		<div>
		<i class="fa fa-user icon"></i>
		<input class="input-field" type="text" id="lname" name="lname" placeholder="Last Name">
		</div>
		<div>
		<i class="fa fa-lock icon"></i>
		<input class="input-field" type="text" id="lcode" name="lcode" placeholder="Code"> 
		<div>
		<i class="fa fa-link icon"></i>
		<input class="linkbutton" type="submit" value="Link Account" onClick="linkCode();">
		</form>
		<div>
		</div>
		</div>
		</div>
    </body>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</html>
