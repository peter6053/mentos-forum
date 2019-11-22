<?php

session_start();
include_once("config.php");


$conn = mysqli_connect($Host, $dbusername, $password, $db_name) or die(mysqli_error()) ; 
mysqli_select_db($conn,"afrimentors") or die(mysqli_error($conn));
$results = mysqli_query($conn,"SELECT * FROM mentors WHERE category = 'mentor'") or die(mysqli_error($conn));


if(isset($_SESSION['username'])) 
$username = $_SESSION['username'];


if(isset($_SESSION['user_id']))
$user_id = $_SESSION['user_id']

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Afrimentors | Mentees</title>
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
  <link href="snackbar.css" rel="stylesheet">

  <style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    float: right;

}

.title {
    color: grey;
    font-size: 18px;
}

button {
  font-family: "Raleway", sans-serif;
  font-size: 15px;
  font-weight: bold;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 32px;
  border-radius: 2px;
  transition: 0.5s;
  margin: 10px;
  color: #fff;
  background: #0c2e8a;
  border: 2px solid #0c2e8a;
}

a {
    text-decoration: none;
    font-size: 22px;
    color: blue;
}

button:hover, a:hover {
    background: none;
  color: #0c2e8a;
}

  </style>
</head>

<body id="body">

  
  

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
          
          <li><a href="viewmentors_connect.php">Mentors</a></li>
          <li><a href="#services">Mentees</a></li>
          <li><a href="#portfolio">Hubs</a></li>
          <li><a href="index.php">Logout</a></li>

          
        </ul>
        <?php
        include_once("config.php");

        if(isset($_SESSION['username']))  {
          $username = $_SESSION['username'];


            

//$conn = mysql_connect($Host, $dbusername, $password, $db_name) or die(mysql_error()) ; 
//mysql_select_db("afrimentors") or die(mysql_error()) ; 
//$result = mysql_query("SELECT * FROM mentors WHERE username='$username'") or die(mysql_error($conn));
  //while($row = mysql_fetch_array($result)) {

       // echo "<div style='float: right;'>";
       // echo "<img src=images/".$row['image']."  style='border-radius: 50%; width: 50px; height: 57px'>";
        //echo "</div>";

      //}

    }
  
        ?>
      </nav><!-- #nav-menu-container -->

    </div>

  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  

    
    </div>

<div class="container">
<div class="row">
<div class="col-sm-3"></div>
<div class="col-6">
  <?php
  

  if(mysqli_num_rows($results) > 0) {
  
  while($row = mysqli_fetch_array($results)) {
  
echo "<div style='overflow-x:auto'>";

echo "<table class='table'>";
  echo "<tbody>";
    echo "<tr>";
    echo "<td class='img' width='45%' rowspan='6'>";
    echo "<img src=images/".$row['image']." style='width:120px; height:120px; border-radius:50px'>
    <br>
    <br>
    <div>
 <p><button onclick='myFunction()' name='button'>Connect</button></p>
 <div id='snackbar'>You are now connected with..<a href='one_one_connect.php' style='font-size: 16px'>Click here to message</a></div>
</div>

    </td>";
      echo "<td width='23%'>Full Name:</td>";
      echo "<td width='32%'>".$row['fullname']."</td>";
      
    
    
    
    echo "</tr>";
    
    echo "<tr>";
      echo "<td>Country:</td>";
      echo "<td>".$row['country']."</td>";
      echo "</tr>";
    echo "<tr>";
      echo "<td>City:</td>";
      echo "<td>".$row['city']."</td>";
      echo "</tr>";
    echo "<tr>";
      echo "<td>Industry:</td>";
      echo "<td>".$row['industry']."</td>";
      echo "</tr>";
    
    echo "<tr>";
      echo "<td></td>";
      echo "<td></td>";
     
    echo "</tr>";
  echo "</tbody>";
echo "</table>";
echo "</div>";
  
   }
}
 else {
    echo "0 results";
  
}



mysqli_close($conn);
  ?>

  <br />
<br />





</div>
<script>
  function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function() { x.className = x.className.replace("show", ""); }, 5000);


  }

  
</script>



<div class="col-sm-3" style="width:100%">

<?php

if(isset($_SESSION['fullname'])) {
  $fullname = $_SESSION['fullname'];
}
  else if (isset($_SESSION['country'])) {
    $country = $_SESSION['country'];
  }

  else if(isset($_SESSION['image'])) {
    $image = $_SESSION['image'];
  }
else {



  $conn = mysql_connect($Host, $dbusername, $password, $db_name) or die(mysql_error()) ; 
mysql_select_db("afrimentors") or die(mysql_error()) ; 
$result = mysql_query("SELECT * FROM mentors WHERE username='$username'") or die(mysql_error($conn));
  while($row = mysql_fetch_array($result)) {

        echo "<div class='card'>";
        echo "<img src=images/".$row['image']."  style='width: 100%'>";
        echo "<p class='title'>".$row['fullname']."</p>";
        echo "<p>".$row['country']."</p>";
        echo "</div>";


}

}
?>
</div>   
  </div>
</div>


  <main id="main">

    

    
    

    
    
    
  </main>

  
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Afrimentors</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
        Designed by <a href=""></a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../Basiliment/lib/jquery/jquery.min.js"></script>
  <script src="../Basiliment/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../Basiliment/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Basiliment/lib/easing/easing.min.js"></script>
  <script src="../Basiliment/lib/superfish/hoverIntent.js"></script>
  <script src="../Basiliment/lib/superfish/superfish.min.js"></script>
  <script src="../Basiliment/lib/wow/wow.min.js"></script>
  <script src="../Basiliment/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../Basiliment/lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="../Basiliment/lib/sticky/sticky.js"></script>
  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->

  <!-- Contact Form JavaScript File -->
  <script src="../Basiliment/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../Basiliment/js/main.js"></script>

  

  

</body>
</html>
