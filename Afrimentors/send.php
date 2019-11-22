<?php
session_start();

$Host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$db_name = 'afrimentors';


$conn = mysqli_connect($Host, $dbusername, $dbpassword, $db_name);
mysqli_select_db($conn,$db_name);


$username = $_SESSION['username'];
$chattext = $_POST['chattext'];



$sql = "INSERT INTO chat(username,chattext) VALUES('$username','$chattext')";
$results = mysql_query($conn,$sql);

header("Location:chat.php");





?>