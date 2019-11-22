
<?php
session_start();
$Host = 'localhost';
$dbusername = 'root';
$password = '';
$db_name = 'afrimentors';

$conn = mysql_connect($Host, $dbusername, $password, $db_name) or die(mysql_error()) ;

if(isset($_POST['id'])) {  
   $username = $_POST['username'];
   $password = $_POST['password'];
   $usertype = $_POST['usertype'];
 
   
  
   
if(isset($_SESSION['levelid'])=='1')   
$sql = mysqli_query("SELECT * FROM mentors WHERE `id`='".$_SESSION['id']."' AND `levelid`='1' ");





$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$arr1 = mysqli_fetch_array($query1);
$num1 = mysqli_num_rows($query1); 
if($num1==1)
{

}
}

if(isset($_SESSION['username']))
  $username = $_SESSION['username'];
 
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Tenor Sans' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<title>Administrative Page</title>


<body>

  
  
  
 <!--BOOTSTRAP INPUTS --> 
 
  <div class="container">
  <div class="row">
 
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><h4></h4></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="home"><a href="#"><h4></h4></a></li>
      <li><a href="#"><h4></h4></a></li>
      <li><a href="#"><h4></h4></a></li>
    </ul>
    <form class="navbar-form navbar-left">
      <div class="input-group">
        

      </div>
    </form>
  </div>
</nav>
<div class="alert alert-success alert-dismissable" style="width: 25%"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Successfully logged in as: <?php echo $username; ?></div>
  
 <div class="container">
<div class="row">

<div class="col-md-3">

<div class="list-group">
<a href="mentors.php" class="list-group-item">Mentors</a>
<a href="teams_women.php" class="list-group-item">Teams (Women)</a>
<a href="teams_dleague.php" class="list-group-item">Teams D-League</a>
<a href="team_leaders.php" class="list-group-item">Team Leaders</a>
<a href="registered_players.php" class="list-group-item">RBA Players(Men)</a>
<a href="registered_playerswomen.php" class="list-group-item">RBA Players(Women)</a>
<a href="registered_playersdleague.php" class="list-group-item">D-League Players</a>
<a href="referees.php" class="list-group-item">Registered Referees</a>
<a href="all_users.php" class="list-group-item">View Users</a>
<a href="reports.php" class="list-group-item">Reports</a>
<a href="received_comments.php" class="list-group-item">Comments</a>
<a href="index.php" class="list-group-item">Logout</a>
  

</div>
</div>
<div class="col-md-7">
<div class="jumbotron">
<h5 style="color:#474747; font-family:'Tenor Sans';font-size: 16px; line-height:1.5;"><div style="font-weight:bold">Hello!, This is an administrative page</div> All changes and maintainance concerning association particulars are being done here by authority, nobody should attempt to change anything over the pages unless authorized by Management</h5>

</div>
</div>
<?php

$Host = 'localhost';
$dbusername = 'root';
$password = '';
$db_name = 'afrimentors';


$conn = mysql_connect($Host, $dbusername, $password, $db_name) or die(mysql_error()) ; 
mysql_select_db("afrimentors") or die(mysql_error()) ; 
$result = mysql_query("SELECT * FROM mentors WHERE username='$username'") or die(mysql_error($conn));
while($row = mysql_fetch_array($result)) { 
echo "<div style='float:left'><img src=images/".$row['image']." style='width:110px; height:116px; border-radius: 50px;'></div>";
}
    
?>
<div class="col-md-2"></div>
</div>
</div>

 
 <?php
 if (isset($_POST['logout'])){
 session_destroy(); 
 header('location:index.php');
 }
 ?> 
    
</div>
  
  
  
 </div>
 </div>

</body>
</html>
