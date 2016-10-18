<?php
session_start();
$inputuser = $_POST["user"];
$inputpass = $_POST["password"];
$inputpass = md5($inputpass);

require_once("ad_config.php"); //get the user admin name and password once to connect to sql database

//set queries to get data from user database to check with the username and password 
$queryuser = "SELECT * FROM `User` WHERE `Username` = '$inputuser'";
$querypass = "SELECT * FROM `User` WHERE `Password` = '$inputpass'";

//check queries are valid sql and match results in database - if not 'die' messages will output
$resultuser = mysqli_query($connectDB, $queryuser) or die("no database");
$resultpass = mysqli_query($connectDB, $querypass) or die("no password db");

//**Remove on implementation** check the correct data has been picked
$row = mysqli_fetch_array($resultuser);
	var_dump($row);
	echo "<hr />";

$serveruser = $row["Username"];
$serverpass = $row["Password"];
$userID = $row["ID"];

$_SESSION['username'] = $serveruser;
$_SESSION['id'] = $userID;

if($serveruser&&$serverpass){
	if(!$resultuser){
		die("Username or Password is invalid");
	}
	mysqli_close($connectDB);
	
if($inputpass==$serverpass){
	
	header('Location: Home.html');
}
else{
	header('Location: Login.html');
}
}
?>


