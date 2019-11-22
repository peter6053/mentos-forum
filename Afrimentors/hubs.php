 <?php

$mysqli = new mysqli("localhost", "root", "", "afrimentors");

/* check connection */
if ($mysqli->connect_errno) {
 
   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "SELECT * FROM hubs";

$result = $mysqli->query($query);

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
           <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Hub..">
           <div class="container" id="hubs-container" style="width: 700px">  
                <div align="center">Not registered?, <a href="register_hub.php">Click Here to register your Hub | <a href="login_hub.php">Login to Hub</a></a></div> 
                 
                <div class="panel-group" id="accordion">  
                <?php  
                while ($row = $result->fetch_array()) 

                

                {  
                ?>  
                     <div class="panel panel-default">  
                          <div class="panel-heading">  
                               <h4 class="panel-title">  
                                    <a href="#<?php echo $row["hub_id"]; ?>" data-toggle="collapse" data-parent="#accordion">
                                    <?php 
                                    echo "<img src=images/".$row['image']." width='65' height='60' border-radius='15px'>"; 
                                    ?>
                                    <?php 
                                    echo $row["hubname"]; 
                                    ?>
                                      
                                    </a>  
                               </h4>  
                          </div>  
                          <div id="<?php echo $row["hub_id"]; ?>" class="panel-collapse collapse">  
                               <div class="panel-body" id="panbody">  
                               <?php 
                               echo "<table class='table table-bordered table-sm'>";

  echo "<tbody>";
  echo "<tr>";
  echo"<td>Hub name</td>";
  echo "<td>".$row['hubname']."</td>";
  echo "</tr>";

  echo "<tr>";
  echo"<td>Hub`s E-mail</td>";
  echo "<td>".$row['hub_email']."</td>";
  echo "</tr>";    

  echo "<tr>";
  echo "<td>Country</td>";
  echo "<td>".$row['country']."</td>";
  echo "</tr>";

  echo "<tr>";
  echo "<td>City</td>";
  echo "<td>".$row['city']."</td>";
  echo "</tr>";
      
  echo "<tr>";
  echo "<td>Industry</td>";
  echo "<td>".$row['industry']."</td>";
  echo "</tr>";
      
  echo "<tr>";
  echo "<td>Specialization</td>";
  echo "<td>".$row['specialization']."</td>";
  echo "</tr>";
      
  echo "<tr>";
  echo "<td>Hub`s offer</td>";
  echo "<td>".$row['huboffer']."</td>";
  echo "</tr>";
      
  echo "<tr>";
  echo "<td>Project Offer</td>";
  echo "<td>".$row['project_offer']."</td>";
  echo "</tr>";
      
      
  echo "</tbody>";
  echo "</table>";
  echo "<a href='#' class='btn btn-primary'>Connect</a>";
                               ?>  
                               </div>  
                          </div>  
                     </div>  
                <?php  
                }  
                ?>  
                </div>  
           </div>  
           <br /> 
           <br/>
           <hr>
   <div><?php
//include 'footer.php';
?></div>
           
            
      </body>  
 </html>  