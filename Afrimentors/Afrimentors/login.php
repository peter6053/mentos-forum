

<?php
session_start();
include_once("config.php");


$conn = mysqli_connect($Host, $dbusername, $password, $db_name); 

$error = "";

if(isset($_POST['login'])) {  
   $username = $_POST['username'];
   $password = $_POST['password'];
  

   
$sql = "SELECT * FROM mentors WHERE username='$username' and password='$password'";

$results = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($results);
$_SESSION['user_id']=$row['user_id'];
$_SESSION['levelid']=$row['levelid'];


if(isset($_SESSION['category']))
$category = $_SESSION['category'];



$count = mysqli_num_rows($results);
if($count==1)
{
      if ($row['levelid']=="1")
      { 
                $_SESSION['username'] = $username;
                 header ("location: user_login.php"); 
                             
      }
      else if ($row['levelid']=="0")
      { 
                 $_SESSION['levelid']=$row['levelid'];
                 $_SESSION['username'] = $username;             
                 header ("location: chatindex.php");           
                              
      } 

     
else if (password_verify($_POST["password"], $row["password"]))
{

     $_SESSION['user_id'] = $row['user_id'];
     $_SESSION['username'] = $row['username'];

     $sub_query = "INSERT INTO login_details(user_id) VALUES('".$$row['user_id']."')";
     $results = mysqli_query($conn,$sub_query);
     $_SESSION['login_details_id'] = $login_details_id;
     header ("location: chatindex.php");
   }
   else {

echo '<script type="text/javascript"> alert("invalid username or password")</script>';
    }

}
  
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Register Mentor/Mentee</title>

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

 
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      
      <div class="social-links float-right">
        <a href="index.php" class="twitter">Home</a>
        <a href="#" class="twitter">login</a>
        <a href="#" class="facebook">Services</a>
        <a href="#" class="instagram">Contacts</a>
        
        
      </div>
    </div>
  </section>


<!--- CODE FOR REGISTRATION -->



<style>

body, html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;  
    font-size: 13px;

}


  

* {
    box-sizing: border-box;
}


.bg-img {
    /* The image used */
  background-image: url();
  width: 90%;
  height: auto;
  border-radius: 25px;
  min-height: 380px;/* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}


input[type=submit] {
    width: 100%;
    background-color:#329AFB;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn {
    background-color: #329AFB;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;  
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

  }

  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color:#E1E0E0;
    color: white;
    text-align: center;
    padding: 1000px;
}


</style>


</head>
<body>

<br>
<br>
<br>
<br>
<br>
<br>

<div class="container-fluid">
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">

<div class="boxbanner">
  <form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="container" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
          <h4 align="center"><strong></strong></h4>

      
      <input type="text" placeholder="Username" name="username" required>

     
      <input type="password" placeholder="Password" name="password" required>

      <button type="submit" class="btn" name="login">Login</button>
      <br>
    <label>
      <input type="checkbox"><font color="grey"> Remember me |    Not Registered?,</font> <a href="register_mentor.php">Click here</a>
    </label>


    </div>
    
  </form>
  <br><br>
  
  </div>
  <div class="col-sm-4"></div>

</div>
 </div>

</html>





<!--- END FOR CODE REGISTRATION -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



  
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Afrimentors</strong>. All Rights Reserved
      </div>
      <div class="credits">
        
        
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
