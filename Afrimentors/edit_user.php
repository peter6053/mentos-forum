

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

  <style>
  input[type=text] {
  width: 60%;
  padding: 4px;
  border: 1px solid #ccc;
  border-radius: 6px;
  
}
</style>


<?php

include('database_connection.php');

session_start();

$connect = new mysqli("localhost", "root", "", "afrimentors");

if(isset($_POST['user_id'])) {
 $user_id = $_SESSION['user_id'];



if(isset($_POST['update']))
{ 

  $user_id = $connect->escape_string($_POST['user_id']); 
  $fullname = $connect->escape_string($_POST['fullname']);
  $username = $connect->escape_string($_POST['username']);
  $country = $connect->escape_string($_POST['country']);
  $city = $connect->escape_string($_POST['city']);
  $industry = $connect->escape_string($_POST['industry']);

  if(empty($fullname) || empty($username) || empty($country) || empty($city) || empty($industry)) {  
      
    if(empty($fullname)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }

                if(empty($username)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }

                if(empty($country)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }
    
     if(empty($city)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }
    
     if(empty($industry)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
           }
           
 
    } 

    else {

     
//updating the table
         $results = $connect->prepare("UPDATE login SET fullname='$fullname',username='$username', country='$country', city='$city', industry='$industry' WHERE user_id=$user_id");

         //var_dump($results);

     //redirecting to the display page.
        header("Location: edit_user.php");      
         }

    }

}

?>


<?php
//getting id from url
if(isset($_GET['user_id'])) 
$user_id = $_GET['user_id'];


$query = "SELECT  * FROM login WHERE user_id = '".$_SESSION["user_id"]."'";

//selecting data associated with this particular id
 if($results = $connect->query($query)) {

  while ($row = $results->fetch_assoc()) {

    foreach ($results as $row) {
    $fullname = $row['fullname'];
    $username = $row['username'];
    $country = $row['country'];
    $city = $row['city'];
    $industry = $row['industry'];

            }

        }

     }



?>

<div class="container emp-profile">
            <form method='POST' action='edit_user.php'>
                <div class="row">

    
            <div class='col-md-4'>   
            <div class='user_profile-img'>
            </div>
            </div>


            <div class='col-md-6'>
            <div class='profile-head'>
            <h5><?php echo $fullname; ?></h5>
            <h6>
            </h6>
            <br>
            <p class='profile-rating'>RATINGS : 
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star'></span>
             <span class='fa fa-star'></span>
                 </p>
            <ul class='nav nav-tabs' id='myTab' role='tablist'>
            <li class='nav-item'>
            <a class='nav-link active' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>About</a>
                </li>
            <li class='nav-item'>
            <a class='nav-link' id='profile-tab' data-toggle='tab' href='#profile' role='tab' aria-controls='profile' aria-selected='false'></a>
            </li>
            </ul>
            </div>
            </div>

            
            <div class='col-md-2'>
            <input type='submit' class='profile-edit-btn' name='update' value='Update'/>

                 </div>
                  </div>

                <div class="row">
                    <div class="col-md-4">
                    <div class="profile-work">
                            <p><h5>Menu</h5></p>
                            <a href="">View Mentors</a><br/>
                            <a href="">Messages</a><br/>
                            <a href="">Hubs</a><br/>
                            <a href="logout.php">Logout</a><br/>
                            <a href=""></a><br/>
                            <a href=""></a><br/>                            
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                            </div>
                                            <div class="col-md-6">
                    <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                            </div>
                                            <div class="col-md-6">
                    <input type="text" id="country" name="country" value="<?php echo $country; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>City</label>
                                            </div>
                                            <div class="col-md-6">
                    <input type="text" id="city" name="city" value="<?php echo $city; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Industry</label>
                                            </div>
                                            <div class="col-md-6">
                    <input type="text" id="industry" name="industry" value="<?php echo $industry; ?>">
                                            </div>

                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>
      
    </head>
    </html>

