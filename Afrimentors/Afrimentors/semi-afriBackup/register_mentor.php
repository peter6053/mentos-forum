<?php
session_start();
$Host = 'localhost';
$dbusername = 'root';
$password = '';
$db_name = 'afrimentors';


// Create connection
$conn = mysqli_connect($Host, $dbusername, $password, $db_name);
mysqli_select_db($conn,$db_name);


if ( isset( $_FILES["image"] ) && !empty( $_FILES["image"]["name"] ) ) {

$target = "images/"; 
$target = $target . basename( $_FILES['image']['name']);



if (isset($_POST['register'])) {
   
   $fullname = mysql_real_escape_string($_POST['fullname']);
   $username = mysql_real_escape_string($_POST['username']);
   $country = mysql_real_escape_string($_POST['country']);
   $city = mysql_real_escape_string($_POST['city']);
   $industry = mysql_real_escape_string($_POST['industry']);
   $password = mysql_real_escape_string($_POST['password']);
   $password2 = mysql_real_escape_string($_POST['password2']);
   $image = ($_FILES['image']['name']);
   
   
  

     mysqli_query($conn,"INSERT INTO mentors(fullname,username,country,city,industry,password,password2,image) VALUES('$fullname','$username','$country','$city','$industry','$password','$password2','$image')"); 


  
   
   if(move_uploaded_file($_FILES['image']['tmp_name'],$target)) 
{


echo '<script type="text/javascript"> alert("Successfully added Information and Image as well")</script>'; 
	 
 } 
 else { 
 
echo "Sorry, there was a problem uploading your file."; 
 } 
      
     
     } 
   
}



 ?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Register Mentor/Mentee</title>
<style>

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password]{
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
}

input[type=date]{
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
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
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

h3 {
	color:#1D7903;
}
</style>
</head>
<body>

<?php
	
	if(isset($_SESSION['category'])) {
    $category = $_SESSION['category'];
	
	if($category == 'mentor'){
		include 'mentors.php';
	}
	else {
		include 'mentees.php';
	}
	}
	?>
	 


  
    <div class="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
      <div>
<div class="alert alert-info" style="width:100%" align="center">
  <strong><h3>User Registration Form:.</h3></strong>
</div>
  <form method="POST" action="index.php" enctype="multipart/form-data">
    <label for="fullname">Full name</label>
    <input type="text" id="fullname" name="fullname" placeholder="Full name" required>
    
   <label for="username">User Name</label>
    <input type="text" id="username" name="username" placeholder="User name" required>
    
    <label for="country">Country</label>
    <input type="text" id="country" name="country" placeholder="Country" required>
    
     <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="City" required>
	  	  
    
    <label for="industry">Industry</label>
    <input type="text" id="industry" name="industry" placeholder="Industry" required>
    
    
    <label for="password">Password</label><br>
    <input type="password" id="password" name="password" placeholder="Password" required>
    <br>
     <label for="password2">Password</label><br>
    <input type="password" id="password2" name="password2" placeholder="Repeat Password" required>
    <br>
    <label for="image"><i class="fa fa-picture-o"></i> Image</label>
            <input type="file" id="image" name="image" placeholder="Upload image">  
		  <input type="submit" value="Register" class="btn btn-danger" name="register" id="register"> 
    
    </form>

		 </div>
			<div class="col-sm-2"></div>
    </div>
	 </div>
  
  


</body>
</html>
