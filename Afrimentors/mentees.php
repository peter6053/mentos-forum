<?php

include_once("config.php");

$conn = mysqli_connect($Host, $dbusername, $password, $db_name); 



$sql = "SELECT * FROM mentees"; 

$results = mysqli_query($conn,$sql);
$count = mysqli_num_rows($results);


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="includes/style.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/..css'>
  

<style>
table {
    font-family: arial, sans-serif;
	border-color:#dddddd;	
    width: 70%;
	border-style:dashed;
}

td, th {
    border: 1px #dddddd;
    text-align: left;
  
}

tr:nth-child(even) {
    background-color: #dddddd;
}


form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
    float: left;
    width: 20%;
    padding: 13.5px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}

.rowscount {
  width: 100%;
  border-style: hidden;
  padding: 20px;

}



</style>
<title>All Mentors</title>
</head>

<body style="height:700%">
<div class="container">

<div class="row">
<br />
<br />

<div><h2>All Mentors |</h2>
<hr />
<form class="example" action="/action_page.php">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form> 
</div>

 <br />
<br />
<br />
<br />

<div class="col-md-12">

<table class="table table-striped" cellpadding="0" cellspacing="0" border="1" align="center" id="myTable">
<tr>
<th>IDno</th>
<th>Full name</th>
<th>Username</th>
<th>Country</th>
<th>City</th>
<th>Industry</th>
<th></th>
<th></th>
<th></th>
</tr>


 





<?php
  while($row = mysqli_fetch_array($results)) {
	  echo "<tr>";
	        echo "<td>".$row['id']."</td>";
           echo "<td>".$row['fullname']."</td>";
	  echo "<td>".$row['username']."</td>";
	  echo "<td>".$row['country']."</td>";
	  echo "<td>".$row['city']."</td>";
	  echo "<td>".$row['industry']."</td>";
	  
	  
	  echo '<td><a href="edit_players.php?id=' . $row['id'] . '"><button type="button" class="btn btn-success btn-xs">Edit</button></a></td>';
    echo "<td><a href=\"delete_players.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button type='button' class='btn btn-danger btn-xs'>Delete</button></a></td>";
	  echo '<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">View</button></a></td>';

	  
	
	  
	  

	  
	  
  }
	  
	  
?>


</table>
<table class="rowscount">
<tr>

<td></td>
<td></td>
<td><?php echo $count." rows"; ?></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>


<script>
function myFunction() {
  var input, filter, table, tdata, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td");
  for (j = 0; j < td.length; j++)
     {
      tdata = td[j];
      if (tdata) {
      if (tdata.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        break
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
  }
}
</script>

<br />
<br />



</div>

</div>
</div>



 

<div class="container">
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mentor`s Profile</h4>
        </div>
        <div class="modal-body">
 
            
  <table class="table table-bordered table table-responsive-sm" width="150">
  
  <tr>
    <td>ID</td>
    <td><?php echo $id; ?></td>
    <td rowspan="8">
    <form method="POST" action="upload.php" enctype="multipart/form-data">
    <label>Image:</label>
    <input type="file" name="image">
    <input type="submit" name="Upload" value="Upload">
    </td>
  </tr>
  <tr>
    <td>FN</td>
    <td><?php echo $fullname; ?></td>
  </tr>
  
  <tr>
    <td>USN</td>
    <td><?php echo $username; ?></td>
  </tr>
  <tr>
    <td>CNTY</td>
    <td><?php echo $country; ?></td>
  </tr>
  <tr>
    <td>City</td>
    <td><?php echo $city; ?></td>
  </tr>
  
  <tr>
    <td>Industry</td>
    <td><?php echo $industry; ?></td>
  </tr>
  
</table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</body>
</html>
