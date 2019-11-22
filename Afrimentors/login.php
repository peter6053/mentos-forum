<!--
//login.php
!-->

<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:user_profile.php');
}

if(isset($_POST["login"]))
{
 $query = "
   SELECT * FROM login 
    WHERE username = :username
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if(password_verify($_POST["password"], $row["password"]))
      {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['user_id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        
        header("location:user_profile.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
 else
 {
  $message = "<label>Wrong Username or password</labe>";
 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Afrimentors | Login</title>
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


<div class="container-fluid">
<div class="row">
<div class="col-sm-4"></div>


<div class="col-sm-4">
<br>
<br>
<br>
<div class="boxbanner">
  <form method = "POST">
  
  <div class="container" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 15px">
          
          <p class="text-danger" align="center"><?php echo $message; ?></p>
      <input type="text" placeholder="Enter username" name="username" required>     
      <input type="password" placeholder="Enter Password" name="password" required>
      <button type="submit" class="btn" name="login"><b>Login</b></button>
      <br>
    <label>
      <input type="checkbox"> Remember me |    Not Registered?, <a href="register.php" style="font-size: 14px">Click here</a>
    </label>


    </div>
    
  </form>
  </div>
  <div class="col-sm-4"></div>

</div>
 </div>
<br>
<br>
<hr>




</body> 

</html>