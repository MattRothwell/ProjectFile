<?php
$inputfname = $_POST["firstName"];
$inputlname = $_POST["lastName"];
$inputemail = $_POST["email"];
$inputuname= $_POST["username"];
$inputpassword = $_POST["password"];
$inputpassword = md5($inputpassword);

require_once("ad_config.php");

$insertNew = "INSERT INTO `User` (`First Name`, `Last Name`, `Email`, `Username`, `Password`) VALUES ('$inputfname','$inputlname','$inputemail','$inputuname','$inputpassword')";

echo $insertNew;
$insertResult = mysqli_query($connectDB, $insertNew) or die("no database");

header('Location: Home.html');
?>