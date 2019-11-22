<?php
session_start();
include_once("config.php");


$conn = mysqli_connect($Host, $dbusername, $password, $db_name) or die(mysqli_error()) ; 
mysqli_select_db($conn,"afrimentors") or die(mysqli_error($conn));
$results = mysqli_query($conn,"SELECT * FROM mentors WHERE category = 'mentor'") or die(mysqli_error($conn));


if(isset($_SESSION['username'])) 
$username = $_SESSION['username'];

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

  <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #0c2e8a;
  text-align: center;
  cursor: pointer;
  width: 50%;
  font-size: 18px;

  
}


button:hover, a:hover {
  opacity: 0.7;
}




</style>

</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      
      <div class="social-links float-right">
        <a href="#" class="twitter">About us</a>
        <a href="#" class="facebook">Services</a>
        <a href="#" class="instagram">Contacts</a>
        
        
      </div>
    </div>
  </section>

  
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">Afri<span>Mentors</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          <li><a href="#about">Mentors</a></li>
          <li><a href="#services">Mentees</a></li>
          <li><a href="#portfolio">Hubs</a></li>
          
        </ul>

       
      </nav> 
    </div>
  </header>

  <div class="alert alert-info alert-dismissable" style="width: 9%; float: right;">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

<?php 
echo $_SESSION['username']; 
?>

</div>
  <div class="container">

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
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
 <p><button>Connect</button></p>
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


<div class="col-sm-3">
      </div>
</div>
</div>
 <div>
    
  <!--==========================
    Footer
  ============================-->
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
