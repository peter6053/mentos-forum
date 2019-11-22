<?php

include('database_connection.php');

session_start();

if(!isset($_SESSION['user_id']))
{
 header("location:login.php");
}

?>

<!DOCTYPE html>
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
  <link href="mentee_profile.css" rel="stylesheet">
 


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
        <h1><a href="#body" class="scrollto">Afri<span>Mentors</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          <li><a href="viewmentors.php">Mentors</a></li>
          <li><a href="#services">Mentees</a></li>
          <li><a href="#portfolio">Hubs</a></li>
          
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
<body>

<div class="container-fluid">
  <br>
  <br>
  <br>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <div class="container">
  <ul class="list-group">
    <li class="list-group-item"><a href="">Notifications</a></li>
    <li class="list-group-item"><a href="">Messages</a></li>
    <li class="list-group-item"><a href="">Chats</a></li>
    <li class="list-group-item"><a href="indexing.php">View mentors</a></li>
  </ul>
</div>
      </div>
      <div class="col-sm-6">

      <ul class="list-group">
    <li class="list-group-item">
    <table class="table table-borderless">

  <tr>
    <th rowspan="5"><img src="images/1.jpg" style="border-radius: 50%; width: 130px; height: 150px"></th>
   
  </tr>
  <tr>
    <td><button class="btn success">Edit Profile</button>
  </td>

  </tr>
  <tr>
    <td><h4>Agapiti Manday</h4>
    </td>

  </tr>
  <tr>
    <td>Psychology</td>
  </tr>
  <tr>
    <td>Tanzania</td>
  </tr>
  
  </table>
    </li>
   
  </ul>

      </div>
      <div class="col-sm-3">
        <div>Hi, Agapiti | <a href="indexing.php">Logout</a></div>
      </div>
    </div>  
  </div>
</div>

</body>
</html>
