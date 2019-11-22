<?php
include('database_connection.php');

session_start();

if(!isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
 header("location:user_profile.php");
}


?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Afrimentors | Mentoring Platform</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../Basiliment/img/favicon.png" rel="icon">
  <link href="../Basiliment/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <!--<script type="text/javascript" src="chat_popup.js"></script> -->

  <!-- Bootstrap CSS File -->
  <link href="../Basiliment/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../Basiliment/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../Basiliment/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../Basiliment/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../Basiliment/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../Basiliment/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="../Basiliment/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->

  <link href="../Basiliment/css2/style.css" rel="stylesheet">
  <link href="chat_popup.css" rel="stylesheet">


  <style>
   html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
  box-sizing: 30px;
}

/* Three columns side by side */
.column {
  float: left;
  width: 100%;
  margin-bottom: 6px;
  padding: 0 8px;
  font-size: 12px;
  text-align: center;
}

/* Display the columns below each other instead of side by side on small screens */
@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

/* Add some shadows to create a card effect */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

}

/* Some left and right padding inside the container */
.container {
  padding: 0 16px;

}

/* Clear floats */
.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.card-title {
  color: white;
  font-size: 12px;
  line-height: 0.1;
}

  .button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 4px;
  color: white;
  background-color: #0c2e8a;
  text-align: center;
  cursor: pointer;
  width: 100%;
  margin-bottom: -15px;
}



p.card-text {

  line-height: 1.5;
  color: white;
}

  </style>
 


</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
 

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">Afri<span>Mentors</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          <li><a href="connected_to_mentors.php">Mentors</a></li>
          <li><a href="connected_to_mentors.php">Mentees</a></li>
          <li><a href="hubs.php">Hubs</a></li>
          <li><a href="user_profile.php" alt="Click to go back to your profile">
            <?php
           $mysqli = new mysqli("localhost", "root", "", "afrimentors");

/* check connection */
if ($mysqli->connect_errno) {
 
   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "SELECT  * FROM login WHERE user_id = '".$_SESSION["user_id"]."'";

            if ($result = $mysqli->query($query)) {
              while($row = $result->fetch_assoc())

         // echo "<div style='float: right;'>";
          echo "<img src=images/".$row['image']."  style='border-radius: 50%; width: 45px; height: 45px'>";
          //echo "</div>";


            }
            ?>

          </a></li>
          </div>
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
<body>
<br>
<br>
<br>
<div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-3" align="center">
    	<div class="card border-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Notifications</div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Some contents here..</h5>
    <p class="card-text">Some quick contents if applicable text to build on the card title and make up the bulk.Some quick contents if applicable text to build on the card title and make up the bulkSome quick contents if applicable text to build on the card title and make up the bulkSome quick contents if applicable text to build on the card title and make up the bulkSome quick contents if applicable text to build on the card title and make up the bulk</p>
  </div>
</div>
<div class="card border-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">News</div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Secondary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
    </div>
    <div class="col-sm-6">

    <div class="container-fluid">
    <div class="row">

    <?php
    	$mysqli = new mysqli("localhost", "root", "", "afrimentors");

/* check connection */
if ($mysqli->connect_errno) {
 
   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "SELECT  * FROM login WHERE category='mentor'";

//f ($result = $mysqli->query($query)) {

    /* fetch associative array */
    //while ($row = $result->fetch_assoc()) { 

    $result = $mysqli->query($query);
    for($i=0; $i<=$result->num_rows; $i++) {

    	//$row = $result->fetch_assoc();

      while ($row = $result->fetch_assoc()) {
    
    //echo "<div class='container-fluid'>";
   // echo "<div class='row'>";

    echo "<div class='col-sm-3' align='center'>";
    echo "<div class='row'>";
    echo "<div class='column' id='demo'>";
    echo "<div class='card'>";
    echo "<img src=images/" .$row['image']." style='width: 90px; height: 100px; display: block; margin-left: auto; margin-right: auto; border-radius: 150px'>";
    
    echo "<div class='container'>";
    echo "<div><b>".$row['fullname']."</b></div>";
    echo "<div>".$row['industry']."</div>";
    echo "<div>".$row['country']."</div>";
    echo "<div>".$row['city']."</div>";
    //echo "<p><button onclick='myFunction()' class='button'><b>Connect</b></button></p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    //echo "</div>";
    //echo "</div>";

    }
    

}
    
    ?>


    

     </div>
    </div>

    </div>
    <div class="col-sm-3" align="center">
    <div id='chat-sidebar'>
    <div class='100'>	
        


   <?php
           $mysqli = new mysqli("localhost", "root", "", "afrimentors");

/* check connection */
if ($mysqli->connect_errno) {
 
   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "SELECT  * FROM login";

    if ($result = $mysqli->query($query)) {
              while($row = $result->fetch_assoc()) {





echo "<table class='table_chat' id='sidebar-user-box'>";  
  echo "<tr>";
    echo"<td class='img' width='20%'>";
     echo "<img src=images/".$row['image']."  style='border-radius: 50%; width: 35px; height: 35px'>
    </td>";
    echo "<td class='all_names'  width='80%'>".$row['fullname']."</td>";
    
  echo "</tr>";
echo "</table>";

 

    }

 /* free result set */
    $result->free();

}

$mysqli->close();
 
?>
 
</div>
</div>

</div>
</div>
</div>
<div></div>
<br>
</body>
</html>
