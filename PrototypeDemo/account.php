<?php
session_start(); 
include_once("includes/connection.php");

if(isset($_SESSION['userid'])){
	$uid = $_SESSION['userid'];
	$sql = "SELECT FirstName, LastName FROM user WHERE '$uid' = uid";
	$result = mysqli_query($db_conn,$sql);
	while($rows=mysqli_fetch_assoc($result))
		{
		echo 'Logged in as'.' '.$rows['FirstName'].' '.$rows['LastName'];
		}
}

if(!isset($_SESSION['userid'])){
  	$newURL='login.php'; 
	header('Location: '.$newURL);
}
if(isset($_POST['delete'])){
	echo ('set');
	
}
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    	<div class= "center">
		<div class= "container">
<title>Account</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width" />
</head>
    <body>
		<form name="codegen" method="post">
		
		<!--
		<select id="delete">
			<option disabled selected value> - </option>
		</select>
			 <input type="submit" value="RESET DIS 1" ></button> -->
		<input class="codeBtn" type="button" value="Generate Code" onClick="generateCode();"></button>
		<input class="resetBtn" type="button" value="Reset All Codes" onClick="deleteall();"> </button>
		<!-- <input type="button" value="Show Linked Accs" onClick="linked();"></button> -->
		
		<div>
		<input class="signout" type="button" value="Sign Out" onClick="logOut();"></button>
		</div>
		</div>
		<div>
		<input type="text" name="newcode" value="" readonly="readonly" > 
		</div>
		</form>
		<div>
			<table id="info">
				<tr>
					<th style="display: none;">Code ID</th>
					<th>Code</th>
					<th>Name</th>
				</tr>
				<tr>
				<td id="linkedID" style="display: none;"> </td>
				<td id="linked"> </td>
				<td id="linkedname"></td>
				</tr>
			</table>
		</div>
		<div id="testing">
		</div>
		</div>
		</div>
		</body>
<script type="text/javascript">
function generateCode() {
  var randomstring = "";
  var randvalues = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 5; i++){
    randomstring += randvalues.charAt(Math.floor(Math.random() * randvalues.length));
	}
	document.codegen.newcode.value = randomstring;
	console.log(randomstring);
	$.ajax({
		type:'post',
		url:'generate.php',
		data:{newcode:randomstring},
		success:function(data){	
			console.log('Code Generated Boi');
			$("#testing").html(data);
			}
		});
}
function logOut(){
    if(confirm('Log Out?')){ 	
		$.ajax({
            type:'post',
            url:'signout.php',
			dataType: 'html',
            success:function(data){	
                alert('Logged Out');
				window.location.replace("login.php");
				location.reload();					
            }
        });
	}
}

function linked(){
	$.ajax({
        type:'post',
        url:'getlinked.php',
        success:function(data){	
			$("#linked").html(data);			
        }
    });
	$.ajax({
    type:'post',
    url:'getlinkedname.php',
    success:function(data){	
		$("#linkedname").html(data);			
        }
    });
	$.ajax({
    type:'post',
    url:'getlinkID.php',
    success:function(data){	
		$("#linkedID").html(data);			
        }
    });
}

function deleteall(){		
    if(confirm('are you sure you want to delete all?')){ 	
		$.ajax({
        type:'post',			
        url:'deleteall.php',			
        success:function(data){
		console.log('deleted all')
			$('#linked, #linkedname').hide('slow');
			location.reload();	
              }
         });
       }
}


$(document).ready(function(){
	setInterval(function(){
		//$('#linked').load('getlinked.php')
			$.ajax({
        type:'post',
        url:'getlinked.php',
        success:function(data){	
			$("#linked").html(data);			
        }
    });
		$.ajax({
        type:'post',
        url:'getlinkedname.php',
        success:function(data){	
			$("#linkedname").html(data);			
        }
    });
		}, 100);
});

</script>

</html>
