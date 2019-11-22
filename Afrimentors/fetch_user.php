

<?php
//fetch_user.php

include('database_connection.php');


?>



  <div class="container-fluid">
  <div class="row">
  <div class="col-sm-2" align ="center"></div>


  <div class="col-sm-7">
  <div class="container-fluid">
  <div class="row">

  <?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "afrimentors");

/* check connection */
if ($mysqli->connect_errno) {
 
   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "
SELECT * FROM login 
WHERE user_id != '".$_SESSION['user_id']."' and category='mentor'";


    $result = $mysqli->query($query);
    for($i=0; $i<=$result->num_rows; $i++) {

      
      while ($row = $result->fetch_assoc()) {



$output = '
    
    <div class="col-sm-3" align="center">
    <div class="row">
    <div class="column" id="demo">
    <div class="card">
<img src=images/'.$row['image'].' style="width: 90px; height: 100px; display: block; margin-left: auto; margin-right: auto; border-radius: 150px">
<div class="container">
<div><b>'.$row['fullname'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</b></div>
<div>'.$row['industry'].'</div>
<div>'.$row['country'].'</div>

<p><button type="button" class="btn btn-info btn-xs start_chat" id="button" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Connect</button></p>
</div>
</div>
</div>
</div>
</div>';

//foreach($result as $row)
//{
 
 //$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 //$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 //$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
 

//$output .= '</div>';
    
//}


echo $output;

}

}
?>
  
</div>
<div class="col-sm-3" align="center"></div>
</div>
</div>