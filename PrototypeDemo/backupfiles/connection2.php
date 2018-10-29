<?php
    $username = "root";
    $password = "";
    $hostname = "localhost"; 
    $dbname = "unlocked";
    $db_conn = mysqli_connect($hostname, $username, $password,$dbname) or die("Could not connect to db");   
?>