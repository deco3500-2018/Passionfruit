<?php
	include_once("includes/connection2.php");
	echo "connected";
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
		<div>
			<p>Enter Code to Link Account</p>
		</div>
		<form name="linkacc" method="post" id="linkacc">
		<div>
		<label>First Name: </label><input type="text" id="fname" name="fname">
		</div>
		<div>
		<label>Last Name: </label><input type="text" id="lname" name="lname">
		</div>
		<div>
		<label>Code: </label><input type="text" id="lcode" name="code"> 
		<div>
		<input type="button" value="Link Account" onClick="linkCode();">
		</form>
		<div>
		<a href="account.php">Generate Code</a>
		</div>
    </body>
<script type="text/javascript">
function linkCode() {
	var l_code = $("form").serialize().replace("code=", "").replace("fname=", "").replace("lname=", "");
	$.ajax({
		type:'post',
		url:'link.php',
		data: $("linkacc").serialize().replace("code=", "").replace("fname=", "").replace("lname=", ""),
		success:function(data){	
			//alert('Account Linked');
			//console.log(l_code)
			document.linkacc.reset();
			}
		});
}
</script>
</html>
