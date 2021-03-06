<?php

session_start();

if(isset($_SESSION['userid'])){
	header("location: account.php?".$_SESSION["userid"]);
    exit();
}

if(isset($_POST["e"])){
	include_once("includes/connection2.php");
    $email = $_POST['e'];
	$pass = $_POST['p'];
    
	if($email == "" || $pass == ""){
		echo "login_failed";
        exit();
	} else {
		$sql = "SELECT uid, EmailAddress, Password FROM user WHERE EmailAddress='$email' LIMIT 1";
        $query = mysqli_query($db_conn, $sql);
        $row = mysqli_fetch_object($query);
		$userid = $row['uid'];
		$email = $row['EmailAddress'];
        $password = $row['Password'];
        if(password_verify($pass, $password)){
			$_SESSION['userid'] = $userid;
			$_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            echo $userid;
            exit();
		} else {
		echo "login_failed";
            exit();
		}
	}
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width" />
</head>

<body>
    <div id="contentWrapper">
            <div id="logo"></div>
            <div class="centralLoginText"><h2>Unlocked - Login</h2></div>
            <div id="formWrapper">
                <form id="login" onsubmit="return false;">
                    <div id="status"></div>
                    <div class="centralLoginText"><h2>Email Address</h2></div>
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" id="Email" type="text" placeholder="Email" name="Email Address">
                        
                    </div>
                    <!-- <p id="requiredField"><sup>*</sup>Field Required</p> -->

                    <div class="centralLoginText"><h2>Password</h2></div>
                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field" type="password" id="Password" name="password" placeholder="Password">
                        
                    </div>
                    
                    <input id="loginBtn" type="submit" value="Login" onclick="login()">
                </form>
                <div class="registerText">
                    <p>Dont have an account? <a href="signup.php">Register Here</a></p>
                </div>
            </div>
        </div>

</body>
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
<script src="js/Mediroo_API.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</html>