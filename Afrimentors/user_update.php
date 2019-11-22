<?php

include('database_connection.php');

session_start();
$mysqli = new mysqli("localhost", "root", "", "afrimentors");

//check connection 

if($mysqlic->connect_errno) {

	echo "connection failed".$mysqli_connect_error;

	exit();

}

if(isset($_POST["user_id"]))
{
 $value = mysqli_real_escape_string($conn, $_POST["value"]);
 $query = "UPDATE login SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Updated';
 }
}
?>