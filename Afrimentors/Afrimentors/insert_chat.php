<?php

session_start();

//insert_chat.php

include('config.php');

$conn = mysqli_connect($Host, $dbusername, $password, $db_name);


$row = array($to_user_id  = $_POST['to_user_id'],$from_user_id  = $_SESSION['user_id'],$chat_message  = $_POST['chat_message'],$status   = '1');

$sql = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, status) VALUES ('$to_user_id', '$from_user_id','$chat_message','$status')";

$results = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if($row = mysqli_num_row($results))
{
 echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $conn);
}

?>


