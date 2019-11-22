<!--
//register.php
!-->

<?php

include('database_connection.php');

session_start();

if ( isset( $_FILES["image"] ) && !empty( $_FILES["image"]["name"] ) ) {

$target = "images/"; 
$target = $target . basename( $_FILES['image']['name']);

//Image loader
}
$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:index.php');
}

if(isset($_POST["register"]))
{
 $fullname = trim($_POST["fullname"]);
 $username = trim($_POST["username"]);
 $country = trim($_POST["country"]);
 $city = trim($_POST["city"]);
 $category = trim($_POST["category"]);
 $industry = trim($_POST["industry"]);
 $password = trim($_POST["password"]);
 $password2 = trim($_POST["password2"]);
 $image = ($_FILES['image']['name']);




 $check_query = "
 SELECT * FROM login 
 WHERE username = :username
 ";
 $statement = $connect->prepare($check_query);
 $check_data = array(
  ':username'  => $username
 );
 if($statement->execute($check_data)) 
 {
  if($statement->rowCount() > 0)
  {
   $message .= '<p><label>Username already taken</label></p>';
  }
  else
  {
   if(empty($username))
   {
    $message .= '<p><label>Username is required</label></p>';
   }
   if(empty($password))
   {
    $message .= '<p><label>Password is required</label></p>';
   }
   else
   {
    if($password2 != $_POST['password2'])
    {
     $message .= '<p><label>Password not match</label></p>';
    }
   }
   if($message == '')
   {
    $data = array(
     ':fullname'  => $fullname,
     ':username'  => $username,
     ':country'  => $country,
     ':city'  => $city,
     ':category'  => $category,
     ':industry'  => $industry,
     ':password'  => password_hash($password, PASSWORD_DEFAULT),
     ':password2'  => password_hash($password, PASSWORD_DEFAULT),
     ':image'  => $image
    );

    $query = "
    INSERT INTO login 
    (fullname, username, country, city, category, industry, password, password2, image) 
    VALUES (:fullname, :username, :country, :city, :category, :industry, :password, :password2, :image)
    ";

     if(move_uploaded_file($_FILES['image']['tmp_name'],$target)) 
{


echo '<script type="text/javascript"> alert("Successfully added Information and Image as well")</script>'; 
   
 } 
 else { 
 
echo "Sorry, there was a problem uploading your file."; 
 } 

    $statement = $connect->prepare($query);
    if($statement->execute($data))
    {
     $message = "<label>Registration Completed</label>";
    }
   }
  }
 }
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
  <link href="register.css" rel="stylesheet">

  <style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    float: right;

}

.title {
    color: white;
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
        <h1><a href="index.php" class="scrollto">Afri<span>Mentors</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          <li><a href="viewmentors_connect.php">Mentors</a></li>
          <li><a href="#services">Mentees</a></li>
          <li><a href="#portfolio">Hubs</a></li>
          

          
        </ul>
        

      </nav><!-- #nav-menu-container -->

    </div>

  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  

    
    </div>
  </section>
    <body> 


<br>
<br> 
         <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 15px">
      <div>
<div style="width:100%; color: grey" align="center">
  <strong><h3>Register:.</h3></strong>
</div>
  <form method="POST" enctype="multipart/form-data" id="imageform">
  <span class="text-danger"><?php echo $message; ?></span>
    
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
    <br> 

      
      <button type="submit" class="btn" name="register" id="register" style="color: white"><b>Register</b></button>
      <br>
      <label style="text-align: center;">
      If Registered Yet, <a href="login.php" style="font-size: 12px">Click here to Login</a>
      </label> 
    
    </form>

     </div>
      <div class="col-sm-4"></div>
    </div>
   </div>
   <br>
   <br>
   <hr>
   <div><?php
include 'footer.php';
?></div>
    </body>  
   
    
</html>



