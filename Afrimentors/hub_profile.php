<?php

include('config_hub.php');

session_start();

$connect = new mysqli("localhost", "root", "", "afrimentors");

/* check connection */
if ($connect->connect_errno) {
 
   echo "Connection failed ".$connect->connect_error;

   exit();
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
			<li><a href="logout.php">Logout</a></li>
          

          
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
<?php
				
$query = "SELECT  * FROM hubs WHERE hub_email = '".$_SESSION["hub_email"]."'";

if ($result = $connect->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		
  echo "<table  class='table table-striped'>";
  echo "<tbody>";
		echo "<th style='font-size: 60px; background-color: whitesmoke'>".$row['hubname']."</th>";
  echo "<tr>";
  echo "<td class='img' width='45%' rowspan='8' style='vertical-align:middle'>";
	  echo "<img src=images/".$row['image']." style='width:215px; height:215px; border-radius:25px;'></td>";
  echo "<td></td>";
  echo "<td><a href='edit_hub.php?hub_id=" . $row['hub_id'] . "'><button type='button' class='profile-edit-btn'>Update</button></a></td>";
    echo "</tr>";
				
    echo "<tr>";
    echo "<td><b>Country :</b></td>";
    echo "<td>".$row['country']."</td>";
    echo "<td></td>";
    echo "</tr>";
		
		
    echo "<tr>";
    echo "<td><b>City :</b></td>";
    echo "<td>".$row['city']."</td>";
    echo "<td></td>";
    echo "</tr>";
				
    echo "<tr>";
    echo "<td><b>Industry :</b></td>";
    echo "<td>".$row['industry']."</td>";
    echo "<td></td>";
    echo "</tr>";
		  
		  
    echo "<tr>";
    echo "<td><b>Specialization:</b></td>";
    echo "<td>".$row['specialization']."</td>";
    echo "<td></td>";
    echo "</tr>";
		  
		  
    echo "<tr>";
    echo "<td><b>Hub`s Offer :</b></td>";
    echo "<td>".$row['huboffer']."</td>";
    echo "<td></td>";
    echo "</tr>";
		  
    echo "<tr>";
    echo "<td><b>Project Offer :</b></td>";
    echo "<td>".$row['project_offer']."</td>";
    echo "<td></td>";
    echo "</tr>";
		  
  echo "</tbody>";
  echo "</table>";
				
	}
				/* free result set */
    $result->free();

}

/* close connection */
$connect->close();

				
				?>
</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
           <hr>
   <div><?php
//include 'footer.php';
?></div>
           
            
      </body>  
 </html>  