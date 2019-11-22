<?php
 
include('database_connection.php');

session_start();

$connect = new mysqli("localhost", "root", "", "afrimentors");

/* check connection */
if ($connect->connect_errno) {
 
   echo "Connect failed ".$connect->connect_error;

   exit();
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Afrimentors | Register</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../Basiliment/img/favicon.png" rel="icon">
  <link href="../Basiliment/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="user_profile.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->




<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">Afri<span>Mentors</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          <li><a href="viewmentors_connect.php"></a></li>
          <li><a href="#services"></a></li>
          <li><a href="#portfolio"></a></li>
          

          
        </ul>
        

      </nav><!-- #nav-menu-container -->

    </div>

  </header><!-- #header -->

            <div class='container emp-profile'>
            <form method='POST' action='edit_user.php?user_id=<?php echo $user_id; ?>'>
            <div class='row'>


            
                                             

<?php


$query = "SELECT  * FROM login WHERE username = '".$_SESSION["username"]."' AND user_id = '".$_SESSION["user_id"]."'";

if ($result = $connect->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {

      


            echo "<div class='col-md-4'>";    
            echo "<div class='user_profile-img'>";
            echo "<img src=images/".$row['image'].">
              </div>";
            echo "</div>";


            echo "<div class='col-md-6'>";
            echo "<div class='profile-head'>";
            echo "<h5>".$row['fullname']."</h5>";
            echo "<br>";
            
            echo "<p class='profile-rating'>RATINGS : 
                 <span class='fa fa-star checked'></span>
                 <span class='fa fa-star checked'></span>
                 <span class='fa fa-star checked'></span>
                 <span class='fa fa-star'></span>
                 <span class='fa fa-star'></span>
                 </p>";

            echo "<ul class='nav nav-tabs' id='myTab' role='tablist'>
            <li class='nav-item'>
            <a class='nav-link active' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>About</a>
                </li>
            <li class='nav-item'>
            <a class='nav-link' id='profile-tab' data-toggle='tab' href='#profile' role='tab' aria-controls='profile' aria-selected='false'></a>
                 </li>
                 </ul>";
                echo "</div>";
                echo "</div>";



            echo "<div class='col-md-2'>"; 

            //echo "<a href='edit_users.php?user_id=" . $row['user_id'] . "'>";
            echo "<button type='submit' class='profile-edit-btn'>Edit Profile</button>";
            //echo "</a>";
           //echo "<input type='submit' class='profile-edit-btn' name='update' value='Edit Profile'/>";
                        
              echo "</div>";
              echo "</div>";



            echo "<div class='row'>";
            echo "<div class='col-md-4'>
            <div class='profile-work'>
            <p><h5>Menu</h5></p>
            <a href='online_users.php'>Mentors</a><br/>
            <a href='online_mentees.php'>Mentees</a><br/>
            <a href=''>Messages</a><br/>
            <a href=''>Hubs</a><br/>
            <a href='logout.php'>Logout</a><br/>
            <a href=''></a><br/>
            <a href=''></a><br/>
            </div>";
            echo "</div>";


            echo "<div class='col-md-8'>";
            echo "<div class='tab-content profile-tab' id='myTabContent'>
            <div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>

            <div class='row'>
            <div class='col-md-6'>
                <label>Full Name</label>
            </div>

                <div class='col-md-6'>
                <p>".$row['fullname']."</p>
                </div>
                </div>

                <div class='row'>
                <div class='col-md-6'>
                <label>Category</label>
                </div>

                <div class='col-md-6'>
                <p>".$row['category']."</p>
                </div>
                </div>

                <div class='row'>
                <div class='col-md-6'>
                <label>Country</label>
                </div>

                <div class='col-md-6'>
                <p>".$row['country']."</p>
                </div>
                </div>


                <div class='row'>
                <div class='col-md-6'>
                <label>City</label>
                </div>

                <div class='col-md-6'>
                <p>".$row['city']."</p>
                </div>
                </div>


                <div class='row'>
                <div class='col-md-6'>
                <label>Industry</label>
                </div>

                <div class='col-md-6'>
                <p>".$row['industry']."</p>
                </div>
                </div>
                </div>   
                <div class='row'>
                <div class='col-md-12'>
                </div>
                </div>
                </div>
                </div>
                </div>";


                }

    /* free result set */
    $result->free();

}

/* close connection */
$connect->close();

?>

</div>
</form>         
</div>
</head>
</html>




