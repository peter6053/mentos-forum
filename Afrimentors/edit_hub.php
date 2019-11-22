

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


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Libraries CSS Files -->
  <link href="../Basiliment/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../Basiliment/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../Basiliment/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../Basiliment/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../Basiliment/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="../Basiliment/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../Basiliment/css2/style.css" rel="stylesheet">
	<link href="user_profile.css" rel="stylesheet">

  <script>
function myFunction() {
  // Declare variables
  var input, filter, div, h4, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  div = document.getElementById("accordion");
  div = div.getElementsByTagName('div');


  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < div.length; i++) {
    a = div[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      div[i].style.display = "";
    } else {
      div[i].style.display = "none";
    }
  }
}
</script>

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
  width: 20%;
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
	.img {
		margin-left: 200px;
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

#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 55%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
  display: block;
  margin-left: auto;
  margin-right: auto;
}


#accordion {
  list-style-type: none;
  padding: 0;
  margin: 0;
	
}
	
  
	
	
  input[type=text] {
  width: 100%; 
  padding: 12px 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  resize: none;
  border-radius: 7px;
}
	
	
input[type=password] {
  width: 100%;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  resize: none;
  border-radius: 7px;
}
	
	
  textarea {
  width: 100%;
  height: 120px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  resize: none;
  columns: 10;
  rows: 5;
  border-radius: 7px;
  
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
          
          <li><a href="demo_mentors.php">Mentors</a></li>
          <li><a href="demo_mentees">Mentees</a></li>
          <li><a href="hubs.php">Hubs</a></li>
		  <li><a href="hub_profile.php">Home</a></li>
          

          
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
           <br /> 
           <br/>
           <br/>
	
<?php
include('database_connection.php');
$connect = new mysqli("localhost", "root", "", "afrimentors");
	
	

if(isset($_POST['update']))
{ 

  $hub_id = $connect->real_escape_string($_POST['hub_id']); 
  $country = $connect->real_escape_string($_POST['country']);
  $city = $connect->real_escape_string($_POST['city']);
  $industry = $connect->real_escape_string($_POST['industry']);
  $specialization = $connect->real_escape_string($_POST['specialization']);
  $huboffer = $connect->real_escape_string($_POST['huboffer']);
  $project_offer = $connect->real_escape_string($_POST['project_offer']);
  $password = $connect->real_escape_string($_POST['password']);
  $password2 = $connect->real_escape_string($_POST['password2']);

  if(empty($country) || empty($city) || empty($industry) || empty($specialization) || empty($huboffer) || empty($project_offer) || empty($password) || empty($password2)) {  
      
    if(empty($country)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }

     if(empty($city)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }

     if(empty($industry)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }
    
     if(empty($specialization)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
    }
    
     if(empty($huboffer)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
           }
	  
	  if(empty($project_offer)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
           }
	  
	  if(empty($password)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
           }
	  
	  if(empty($password2)) {
      echo "<font color='red'>Name field is empty.</font><br/>";
           }
           
 
    } 

    else {     
//updating the table
         $results = $connect->prepare("UPDATE hubs SET country='$country',city='$city', industry='$industry', specialization='$specialization', huboffer='$huboffer', project_offer='$project_offer', password='$password', password2='$password2' WHERE hub_id=$hub_id");

     //redirecting to the display page.
        header("Location: hub_profile.php");
		echo '<script type="text/javascript"> alert("Information Successfully updated")</script>';
		
         }

    }

    ?>

    <?php
								
if(isset($_GET['hub_id'])) 
$hub_id = $_GET['hub_id'];
				
$query = "SELECT  * FROM hubs WHERE hub_id = $hub_id";

if ($result = $connect->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		
		
    foreach ($result as $row) {
    $country = $row['country'];
    $city = $row['city'];
    $industry = $row['industry'];
    $specialization = $row['specialization'];
    $huboffer = $row['huboffer'];
	$project_offer = $row['project_offer'];
	$password = $row['password'];
	$password2 = $row['password2'];
		
		
		
			  }
				
	}
	
				}

				
		?>	
		

		
	
	<div class="container-fluid">
		<div class="row">
	<div class="col-sm-4">

	</div>
			<div class="col-sm-4">
				
				
	
		
		
		
		
		
	 <form method="post" action="edit_hub.php">
    <label for="country"></label>
    <input type="text" id="country" name="country" value="<?php echo $country; ?>">

    <label for="city"></label>
    <input type="text" id="city" name="city" value="<?php echo $city; ?>">
    
     <label for="industry"></label>
    <input type="text" id="industry" name="industry" value="<?php echo $industry; ?>">
    
    <label for="specialization"></label>
    <input type="text" id="specialization" name="specialization" value="<?php echo $specialization; ?>">
    
    <label for="huboffer"></label>
    <textarea id="huboffer" name="huboffer"><?php echo $huboffer; ?></textarea>
    
    <label for="project_offer"></label>
    <textarea id="project_offer" name="project_offer"><?php echo $project_offer; ?></textarea>
    
    <label for="password"></label>
    <input type="password" id="password" name="password" value="<?php echo $password; ?>">
    
    <label for="password"></label>
    <input type="password" id="password2" name="password2" value="<?php echo $password2; ?>">

    
    
    <label for="hub_id"></label>
    <input type="hidden" id="hub_id" name="hub_id" value="<?php echo $_GET['hub_id'];?>">
    <br>
    <center><input type="submit" value="Update" name="update" class='profile-edit-btn'></center>
  </form>
		
		
				

            </div>
			<div class="col-sm-4"></div>
		</div>
	</div>
           <hr>
   <div><?php
//include 'footer.php';
?></div>
           
            
      </body>  
 </html>  