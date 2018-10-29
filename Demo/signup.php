
<?php
    if(isset($_POST["emailCheck"])){
        include_once("includes/connection2.php");
        $email = $_POST['emailCheck'];
        $sql = "SELECT uid FROM user WHERE EmailAddress='$email' LIMIT 1";
        $query = mysqli_query($db_conn, $sql); 
        $email_check = mysqli_num_rows($query);
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo '<strong style="color:#F00;">' . $email . ' is not a valid email address</strong> <br/>';
            exit();
        }else if($email_check < 1 ) {
            echo '<strong style="color:#009900;">' . $email . ' is valid</strong><br/>';
            exit();
        }else {
            echo '<strong style="color:#F00;">' . $email . ' is taken</strong><br/>';
            exit();
        }
    }
?>
<?php
    if(isset($_POST["fn"])){
        include_once("includes/connection2.php");
	    $fName = preg_replace('#[^a-z0-9]#i', '', $_POST['fn']);
        $lName = preg_replace('#[^a-z0-9]#i', '', $_POST['ln']);
        $email = $_POST['email'];
        $pass = $_POST['pass'];
	    $sql = "SELECT uid FROM user WHERE EmailAddress='$email' LIMIT 1";
        $query = mysqli_query($db_conn, $sql); 
	    $e_check = mysqli_num_rows($query);

	    if($fName == "" || $lName == "" || $email == "" || $pass == ""){
			echo "The form submission is missing values. ";
            exit();
	    } else if ($e_check > 0){ 
            echo "The email address you entered is alreay taken.";
            exit();
	    }else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
	    	echo "The email address you have entered is invalid.";
	    	exit();
	    } else {
	    	$cryptpass = password_hash($pass, PASSWORD_BCRYPT);
	    	$sql = "INSERT INTO user (FirstName, LastName, EmailAddress, password)       
	    	        VALUES('$fName','$lName','$email','$cryptpass')";
            $query = mysqli_query($db_conn, $sql); 
	    	echo "signup_success";
	    	exit();
	    }
	exit();
}
?>
<?php 
session_start();
if(isset($_SESSION['userid'])){
	$newURL='account.php'; 
	header('Location: '.$newURL);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width" />
</head>

<body>
    	<div class= "center">
		<div class= "container">
    <div id="contentWrapper">
            <div id="logo"></div>
            <div class="centralLoginText"><h2>UNLOCKED - PARENTS</h2> <h3>Create Account</h3></div>
            <div id="formWrapper">
                <form id="login" onsubmit="return false;">
                    <div id="status"></div>

                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" id="fName" type="text" placeholder="First Name (Required)" name="First Name">
                    </div>
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" id="lName" type="text" placeholder="Last Name (Required)" name="Last Name">
                    </div>
                    <div class="input-container">
                        <i class="fa fa-envelope-square icon"></i>
                        <input class="input-field" type="email" id="email" name="email" placeholder="Email Address (Required)" onblur="checkEmail()">  
                    </div>
                    <div id="emailStatus"></div>
                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field" type="password" id="password" name="password" placeholder="Password (Required)" onblur="checkEmail()">
                    </div>
                    <div class="input-container">
                    <input class="signupBtn" id="signupBtn" name="signupBtn" type="submit" value="Create Account" onclick="signup()">
                    </div>
                </form>
                <div class="registerText">
                    <p id="bottomPageMargin">Already have an account? 
                    <br><a href="login.php">Login Here</a></p></br>
                </div>
            </div>
        </div>
        </div>
        </div>



</body>

<script>
    /**
     * Real time AJAX email check function
     */
    function checkEmail() {
        var e = _("email").value;
        if (e != "") {
            _("emailStatus").innerHTML = 'Checking Email Address';
            var ajax = ajaxObj("POST", "signup.php");
            ajax.onreadystatechange = function () {
                if (ajaxReturn(ajax) == true) {
                    _("emailStatus").innerHTML = ajax.responseText;
                }
            }
            ajax.send("emailCheck=" + e);
        }
    }
    /**
     * AJAX Signup gathers field data and sends them off in an AJAX call
     */
    function signup() {
        var firstName = _("fName").value;
        var lastName = _("lName").value;
        var email = _("email").value;
        var password = _("password").value;
        var status = _("status");
        /**
         * Data error checks - checks to see if any field is empty otherwise
         * Ajax sends the data from the given the data entered.
         */
        if (firstName == "" || lastName == "" || email == "" || password == "") {
            status.innerHTML = "Fill out all of the form data";
        } else {
            console.log(firstName +" " +lastName +" " + email+" ");
            status.innerHTML = " ";
            var ajax = ajaxObj("POST", "signup.php");
            ajax.onreadystatechange = function () {
                if (ajaxReturn(ajax) == true) {
                    if (ajax.responseText != "signup_success") {
                        status.innerHTML = ajax.responseText;
                    } else {
                        window.scrollTo(0, 0);
                        _("status").innerHTML ='Sign Up Successful <a href="login.php">Click here to Log in</a>';;
                        //'<strong style="color:#F00;">' . $email . ' is taken</strong><br/>'
                    }
                }
            }
            ajax.send("fn=" + firstName + "&ln=" + lastName + "&email=" + email + "&pass=" + password);
        }
    }
</script>
<script src="js/API.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</html>