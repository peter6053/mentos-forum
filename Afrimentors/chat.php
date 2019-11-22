<?php

session_start();

$Host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$db_name = 'afrimentors';

$conn = mysqli_connect($Host, $dbusername, $dbpassword, $db_name);

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<!DOCTYPE html><html class=''>
<head>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link rel="stylesheet" type="text/css" href="chat.css">
<body>
    <div id="main">
    <h1 style="background-color: #6495ed; color: white;"><?php echo $_SESSION['username'];?>-online</h1>
       <div class="output">

       <?php

        $sql = "SELECT * FROM chat";
        $result = mysqli_query($conn,$sql);


    if(mysqli_num_rows($result) > 0) {
    
         while($row = mysqli_fetch_assoc($result)) {

            echo "" .$row['username']. " " .":: " .$row['chattext']. " --" .$row['chattime']. "<br>";
            echo "<br>";

        }
        } else {
            echo "0 results";

        }

?>
           
       </div>

       <form method="POST" action="send.php">
       <textarea name="chattext" placeholder="Type to send message" class="form-control"></textarea><br>
       <button type="submit" value="send" name="send">Send</button></form><br><br>
       <form action="logout.php">
       <input style="width: 100%; background-color: #6495ed; color: white; font-size: 20px;" type="submit" value="logout">
       </form>
        



</body>
