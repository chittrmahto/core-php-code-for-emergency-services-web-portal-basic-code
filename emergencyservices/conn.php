<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$database = "emergencyservice"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
?>