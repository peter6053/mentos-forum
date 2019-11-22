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

if(isset($_SESSION['hub_id']))
{
 header('location:index.php');
}

if(isset($_POST["register"]))
{
 $hubname = trim($_POST["hubname"]);
 $hub_email = trim($_POST["hub_email"]);
 $country = trim($_POST["country"]);
 $city = trim($_POST["city"]);
 $industry = trim($_POST["industry"]);
 $password = trim($_POST["password"]);
 $password2 = trim($_POST["password2"]);
 $image = ($_FILES['image']['name']);
 $specialization = trim($_POST["specialization"]);
 $huboffer = trim($_POST["huboffer"]);
 $project_offer = trim($_POST["project_offer"]);
 

 $check_query = "
 SELECT * FROM hubs 
 WHERE hub_email = :hub_email
 ";
 $statement = $connect->prepare($check_query);
 $check_data = array(
  ':hub_email'  => $hub_email
 );

 if($statement->execute($check_data)) 
 {
  if($statement->rowCount() > 0)
  {
   $message .= '<p><label>Hub name Exists</label></p>';
  }
  
   if($message == '')
   {
    $data = array(
     ':hubname'  => $hubname,
     ':hub_email'  => $hub_email,
     ':country'  => $country,
     ':city'  => $city,
     ':industry'  => $industry,
     ':password'  => $password,
     ':password2'  => $password2,
     ':image'  => $image,
     ':specialization'  => $specialization,
     ':huboffer'  => $huboffer,
     ':project_offer'  => $project_offer
    );


    $query = "
    INSERT INTO hubs 
    (hubname,hub_email, country, city, industry, password, password2, image, specialization, huboffer, project_offer) 
    VALUES (:hubname, :hub_email, :country, :city, :industry, :password, :password2, :image, :specialization, :huboffer, :project_offer)
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
  

  <style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}



input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}


input[type=email] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=password] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #0c2e8a;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #0c2e8a;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}



input[type=textarea] {
  width: 100%;
  height: 30%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
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
          <li><a href="hubs.php">Hubs</a></li>
          

          
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
      
      
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" enctype="multipart/form-data" id="imageform">
      <span class="text-danger"><?php echo $message; ?></span>
      
        <div class="row">
          <div class="col-50">
            
          
            <label for="hubname"><i></i> Hub`s Name</label>
            <input type="text" id="hubname" name="hubname" placeholder="Hub`s name" required="">

            <label for="hub_email"><i></i> Hub`s E-mail</label>
            <input type="email" id="hub_email" name="hub_email" placeholder="Hub`s Email" required="">


            <label for="country"><i></i> Country</label>
            <input type="text" id="country" name="country" placeholder="E.g, Uganda" required="">


            <label for="city"><i></i> City</label>
            <input type="text" id="city" name="city" placeholder="E.g, Kampala">
            
            <label for="industry"><i></i> Industry</label>
            <input type="text" id="industry" name="industry" placeholder="E.g, Social Work, Business, Health" required="">


            <label for="password"><i></i> Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required="">


            <label for="password"><i></i> Retype Password</label>
            <input type="password" id="password2" name="password2" placeholder="Retype your Password" required="">
            
            <label for="image"><i></i> Upload Logo</label>
            <input type="file" id="image" name="image" placeholder="Upload Image" required="">

            
          </div>

          <div class="col-50">
            
            
            <label for="specialization"><i class="fas fa-user-graduate"> Specialization</i></label>
            <input type="text" id="specialization" name="specialization" placeholder="E.g, Business, Health etc" required="">
            <label for="huboffer">What the hub can offer?</label><br>
            <textarea id="huboffer" name="huboffer" placeholder="Type here" rows="6" cols="73" maxlength="200" required=""></textarea><br>
            <label for="project_offer">Projects or Programmes the hub offers</label><br>
            <textarea id="project_offer" name="project_offer" placeholder="Type here" rows="6" cols="73" maxlength="200" required=""></textarea>
            
          
        </div>
        
        <input type="submit" value="Register" class="btn" name="register">
      </form>
    </div>
  </div>
  <div class="col-25">
    
   
 
   </div>
   <br>
   <br>
   <hr>
   <div><?php
include 'footer.php';
?></div>
    </body>  
   
    
</html>



