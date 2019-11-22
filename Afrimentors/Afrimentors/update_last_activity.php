<?php

//update_last_activity.php

include('config.php');

session_start();

$sql = "UPDATE login_details SET last_activity = now() WHERE login_details_id = '".$_SESSION["login_details_id"]."'";

$results = mysqli_query($conn,$sql);


?>