
<?php
session_start();

include_once("config.php");

if(isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $id = $_SESSION['id'];
   $levelid = $_SESSION['levelid'];
   
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Mentor Login</title>
</head>
<style>

</style>


<body>

  
  
  
 <!--BOOTSTRAP INPUTS --> 
 
  <div class="container">
  <div class="row">
 
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="home"><a href="#"><h4></h4></a></li>
       
    </ul>
    <form class="navbar-form navbar-left">
      <div class="input-group">
      </div>
    </form>
  </div>
</nav>
  <div class="alert alert-info alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Successfully logged in as: <?php echo $username; ?></div>
 <div class="container">
<div class="row">

<div class="col-md-3">

<div class="list-group">
<a href="" class="list-group-item" style="height: 450px"></a>
</div>
</div>
	
<div class="col-md-7">
<!--<div class="jumbotron">-->
<?php
$Host = 'localhost';
$dbusername = 'root';
$password = '';
$db_name = 'afrimentors';


$conn = mysql_connect($Host, $dbusername, $password, $db_name) or die(mysql_error()) ; 
mysql_select_db("afrimentors") or die(mysql_error()) ; 
$result = mysql_query("SELECT * FROM mentors WHERE username='$username'") or die(mysql_error($conn));
	while($row = mysql_fetch_array($result)) {
		echo "<div style='overflow-x:auto'>";

echo "<table class='table table-responsive table-hover'>";
  echo "<tbody>";
    echo "<tr>";
      echo "<td width='23%'><b>Full Name:</b></td>";
      echo "<td width='32%'>".$row['fullname']."</td>";
      echo "<td class='img' width='45%' rowspan='8' style='vertical-align:middle'>";
	  echo "<img src=images/".$row['image']." style='width:215px; height:215px; border-radius:25px'></td>";
	  
	  
	  
    echo "</tr>";
    echo "<tr>";
      echo "<td><b>Username:</b></td>";
      echo "<td>".$row['username']."</td>";
      echo "</tr>";
    echo "<tr>";
      echo "<td><b>Country:</b></td>";
      echo "<td>".$row['country']."</td>";
      echo "</tr>";
    echo "<tr>";
      echo "<td><b>City:</b></td>";
      echo "<td>".$row['city']."</td>";
      echo "</tr>";
    echo "<tr>";
      echo "<td><b>Industry:</b></td>";
      echo "<td>".$row['industry']."</td>";
      echo "</tr>";
  echo "</tbody>";
echo "</table>";
echo "</div>";

echo "<br>";
	
	 }
	
	?>
<!--</div>-->
</div>
<?php
//
//$Host = 'localhost';
//$dbusername = 'root';
//$password = '';
//$db_name = 'afrimentors';
//
//
//$conn = mysql_connect($Host, $dbusername, $password, $db_name) or die(mysql_error()) ; 
//mysql_select_db("afrimentors") or die(mysql_error()) ; 
//$result = mysql_query("SELECT * FROM mentors WHERE username='$username'") or die(mysql_error($conn));
//while($row = mysql_fetch_array($result)) { 
//echo "<div style='float:left'><img src=images/".$row['image']." style='width:110px; height:116px; border-radius: 50px;'></div>";
//}
// 
session_destroy();   
?>



	<div align="center"><a href="">Edit Profile</a> | <a href="index.php">LogOut</a></div>

<div class="col-md-2"></div>
</div>
</div>
 <!--<form class="myform" action="index.php" method="post">
 <input type="submit" id="logout_btn" value="Log Out"/><br />
 </form>-->
 

</div>
  
  
  
 </div>
 </div>
</body>
</html>
