
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="includes/style.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/..css'>


  <body>
  
  <div class="col-md-12">
  <br>
  <br>
  <br>
  <table class="table table-bordered table-striped">
 <tr>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>



 

 <?php
include('config.php');
session_start();





$conn = mysqli_connect($Host, $dbusername, $password, $db_name);
$results = mysqli_query($conn,"SELECT * FROM mentors WHERE user_id != '".$_SESSION['user_id']."'");










//Foreach starting here........

foreach($results as $row)
{
	
 //$status = $_GET['status'];
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['user_id'], $conn);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success">Online</span>';
 }
 else
 {
  $status = '<span class="label label-danger">Offline</span>';
 }


//Foreach ends here........

while($row = mysqli_fetch_array($results)) 

{

 
 echo "<tr>";
 echo "<td>".$row['username']."</td>";
 echo "<td></td>";
 echo "<td>";
 echo "<button type='button' class='btn btn-info btn-xs start_chat' data-touserid=".$row['user_id']." data-tousername=".$row['username'].">Connect</button>";
  	   "</td>";
 echo "</tr>";

  //echo "</table>";
  	
          }    

// Foreach curly bracket
}

   
?>
  	
  </div>
  
  	
  </body>





