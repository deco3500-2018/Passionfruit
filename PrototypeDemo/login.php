<?php

session_start();

if(isset($_SESSION['userid'])){
	header("location: account.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    </style>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width" />
</head>

<body>
    	<div class= "center">
		<div class= "container">
    <div id="contentWrapper">
            <div id="logo"></div>
            <div class="centralLoginText"><h2>UNLOCKED - PARENTS</h2> <h3>Login</h3></div>
            <div id="formWrapper">
                <form id="login" method="post">
                    <div id="status"></div>
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" id="Email" type="text" placeholder="Email" name="Email_Address">
                        
                    </div>
                    <!-- <p id="requiredField"><sup>*</sup>Field Required</p> -->

                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field" type="password" id="Password" name="Password" placeholder="Password">
                        
                    </div>
                    
                    <input class="loginBtn" type="submit" value="Login" >
                </form>
                <div class="registerText">
                    <p>Dont have an account? <br><a href="signup.php">Register Here</a></p></br>
                </div>
            </div>
        </div>
         </div>
        </div>
</body>
<?php
if(isset($_POST['Email_Address'])){
	include_once("includes/connection.php");
    $email = $_POST['Email_Address'];
	$pass = $_POST['Password'];
	if($email == "" || $pass == ""){
		echo 'login failed: please fill out all info';
		//header("location: parentlogin2.php");
        //exit();
	} else {
		$sql = "SELECT uid, EmailAddress, Password FROM user WHERE EmailAddress='$email' LIMIT 1";
        $query = mysqli_query($db_conn, $sql);
        $row = mysqli_fetch_assoc($query);
		$userid = $row['uid'];
		$email = $row['EmailAddress'];
        $password = $row['Password'];
        if(password_verify($pass, $password)){
			$_SESSION['userid'] = $userid;
			$_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
			header("location: account.php");
            exit();
		} else {
		echo "login failed: incorrect info";
		//header("location: parentlogin2.php");
        //exit();
		}
	}
	exit();
}
?>
  <script>
    function emptyElement(field) {
        _(field).innerHTML = "";
    }
    function login() {
        var e = _("Email").value;
        var p = _("Password").value;
        if (e == "" || p == "") {
            _("status").innerHTML = "*Please Fill out the form fields correctly";
        } else {
            //_("loginBtn").style.display = "none";
            _("status").innerHTML = 'Checking';
            var ajax = ajaxObj("POST", "login.php");
            ajax.onreadystatechange = function () {
                if (ajaxReturn(ajax) == true) {
                    if (ajax.responseText == "login_failed") {
                        _("status").innerHTML = 'Login Unsuccessful, Please Try Again.';
                        _("loginBtn").style.display = "block";
                    } else {
                        _("status").innerHTML = "";
						console.log('Login');
						//window.location = "account.php";
                    }
                }
            }
            ajax.send("e=" + e + "&p=" + p);
        }
    }
</script> 
<script src="js/API.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</html>