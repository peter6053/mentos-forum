<?php
session_start();
$Host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$db_name = 'afrimentors';


$conn = mysqli_connect($Host, $dbusername, $dbpassword, $db_name);


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mentors/Mentees Chat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div class="container">

<table class="table table-bordered table-striped">
  	<tr>
  	   <td>Username</td>
  	   <td>Status</td>
  	   <td>Action</td>
  	</tr>
  	</table>
  	<div id="user_details"></div>
  
</div>

</body>

<script>
	$(document).ready(function() {

		fetch_user();

		function fetch_user()
		{
			$.ajax({
				url:"fetch_user.php",
				method:"POST",
				success:function(data){
					$('#user_details').html(data);

				}

		})


  }


</script>
</html>