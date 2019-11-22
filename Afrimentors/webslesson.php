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
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>  

 


      <body>


           <br />  
           <div class="container" id="hubs-container" style="width: 700px">  
                <h3 align="center"></h3><br />  
                <br />  
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
                               <div class="panel-body">  
                               <?php 
                               echo "<table class='table table-bordered table-sm'>";

  echo "<tbody>";
  echo "<tr>";
  echo"<td>Hub name</td>";
  echo "<td>".$row['hubname']."</td>";
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
      </body>  
 </html>  