<?php

$Host = 'localhost';
$dbusername = 'root';
$password = '';
$db_name = 'afrimentors';

$conn = mysqli_connect($Host, $dbusername, $password, $db_name); 

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	
}


date_default_timezone_set('Africa/Nairobi');

function fetch_user_last_activity($user_id, $conn)
{
 $sql = "SELECT * FROM login_details WHERE user_id = '$user_id' ORDER BY last_activity DESC LIMIT 1";

 $results = mysqli_query($conn,$sql);
  mysqli_fetch_all($results,MYSQLI_ASSOC);
 

if(mysqli_num_rows($results) == 1) {
	
  while($row = mysqli_fetch_array($results)) {

    echo $row['last_activity'];
 }
}
}


function fetch_user_chat_history($from_user_id, $to_user_id, $conn)
{
 $sql = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."') ORDER BY timestamp DESC";

 $results = mysqli_query($conn,$sql);
mysqli_fetch_all($results,MYSQLI_ASSOC);
 
 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {
  $user_name = '';
  if($row['from_user_id'] == $from_user_id)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $conn).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row['chat_message'].'
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 echo $output;
}

function get_user_name($user_id, $conn)
{
 $sql = "SELECT username FROM mentors WHERE user_id = '$user_id'";
 $results = mysqli_query($conn,$sql);
 mysqli_fetch_all($results,MYSQLI_ASSOC);

 foreach($result as $row)
 {
  echo $row['username'];
 }
}

function count_unseen_message($from_user_id, $to_user_id, $conn)
{
 $sql = "
 SELECT * FROM chat_message 
 WHERE from_user_id = '$from_user_id' 
 AND to_user_id = '$to_user_id' 
 AND status = '1'
 ";
 $results = mysqli_query($conn,$sql);

 $count=mysqli_num_rows($results);
 
 $output = '';
 if($count > 0)
 {
  $output = '<span class="label label-success">'.$count.'</span>';
 }
 echo $output;
}




?>