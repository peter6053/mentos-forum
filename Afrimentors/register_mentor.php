

<?php
session_start();
$Host = 'localhost';
$dbusername = 'root';
$password = '';
$db_name = 'afrimentors';


// Create connection
$conn = mysqli_connect($Host, $dbusername, $password, $db_name) or die(mysqli_error($conn));
mysqli_select_db($conn,$db_name);


if ( isset( $_FILES["image"] ) && !empty( $_FILES["image"]["name"] ) ) {

$target = "images/"; 
$target = $target . basename( $_FILES['image']['name']);



if (isset($_POST['register'])) {
   
   $fullname = trim($_POST['fullname']);
   $username = trim($_POST['username']);
   $country = trim($_POST['country']);
   $city = trim($_POST['city']);
   $category = trim($_POST['category']);
   $industry = trim($_POST['industry']);
   $password = trim($_POST['password']);
   $password2 = trim($_POST['password2']);
   $image = ($_FILES['image']['name']);
   
   
  
if($category == 'Mentor') {
     mysqli_query($conn,"INSERT INTO mentors(fullname,username,country,city,category,industry,password,password2,image) VALUES('$fullname','$username','$country','$city','$category','$industry','$password','$password2','$image')"); 
   }
   else  {
          mysqli_query($conn,"INSERT INTO mentors(fullname,username,country,city,category,industry,password,password2,image) VALUES('$fullname','$username','$country','$city','$category','$industry','$password','$password2','$image')");

   
  
   
   
   if(move_uploaded_file($_FILES['image']['tmp_name'],$target)) 
{


echo '<script type="text/javascript"> alert("Successfully added Information and Image as well")</script>'; 
   
 } 
 else { 
 
echo "Sorry, there was a problem uploading your file."; 
 } 
      
     
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

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
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

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 13px;
}

input[type=password]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 13px;
  
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

input[type=submit]:hover {
    background-color: #329AFB;
}

div {
    padding: 2px;
}

h3 {
  color:#1D7903;
}

.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color:#E1E0E0;
    color: white;
    text-align: center;
}



</style>
</head>
<body>


  
  
   
<br>
<br>

  
    <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
      <div>
<div style="width:100%; color: grey" align="center">
  <strong><h3>Register Here:.</h3></strong>
</div>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    
    <input type="text" id="fullname" name="fullname" placeholder="Full name" required>
    <br>
   
    <input type="text" id="username" name="username" placeholder="User name" required>
    <br>
    
    <input type="text" id="country" name="country" placeholder="Country" required>
    <br>
     
    <input type="text" id="city" name="city" placeholder="City" required>
     <br> 
   

     
    <select id="category" name="category">
      <option value="Select Category">Select Category</option>
      <option value="Mentor">Mentor</option>
      <option value="Mentee">Mentee</option>
      
    </select> 


    
    <input type="text" id="industry" name="industry" placeholder="Industry" required>
    
    <br>
    
    <input type="password" id="password" name="password" placeholder="Password" required>
    <br>
     
    <input type="password" id="password2" name="password2" placeholder="Repeat Password" required>
    <br>
    <label for="image"><i class="fa fa-picture-o"></i> Image</label>
            <input type="file" id="image" name="image" placeholder="Upload image">  
      <input type="submit" value="Register" class="btn btn-danger" name="register" id="register"> 
    
    </form>

     </div>
      <div class="col-sm-4"></div>
    </div>
   </div>
  
  


</body>
</html>





<!--- END FOR CODE REGISTRATION -->

  
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
