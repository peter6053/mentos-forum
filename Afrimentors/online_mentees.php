<!--
//index.php
!-->

<?php

include('database_connection.php');

session_start();

if(!isset($_SESSION['user_id']))
{
 header("location:login.php");
}

?>

<html>  
    <head>  
        <title>Afrimentors-Mentors</title> 

        <link href="../Basiliment/img/favicon.png" rel="icon">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">


        <link href="../Basiliment/css2/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>


    </head>
    <style>
   html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
  box-sizing: 30px;
}

/* Three columns side by side */
.column {
  float: left;
  width: 100%;
  margin-bottom: 6px;
  padding: 0 8px;
  font-size: 12px;
  text-align: center;
}

/* Display the columns below each other instead of side by side on small screens */
@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

/* Add some shadows to create a card effect */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

}

/* Some left and right padding inside the container */
.container {
  padding: 0 16px;

}

/* Clear floats */
.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.card-title {
  color: white;
  font-size: 12px;
  line-height: 0.1;
}

  #button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 4px;
  color: white;
  background-color: #0c2e8a;
  text-align: center;
  cursor: pointer;
  width: 100%;
  margin-bottom: -15px;
}



p.card-text {

  line-height: 1.5;
  color: white;
}

  .modal.left .modal-content,
  .modal.right .modal-content {
    height: 100%;
    overflow-y: auto;
  }

  </style>  
    <body id="body">  
        <div class="container">
   <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">Afri<span>Mentors</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
          <li><a href="connected_to_mentors.php">Mentors</a></li>
          <li><a href="connected_to_mentors.php">Mentees</a></li>
          <li><a href="hubs.php">Hubs</a></li>
          <li><a href="user_profile.php" alt="Click to go back to your profile">
            <?php
           $mysqli = new mysqli("localhost", "root", "", "afrimentors");

/* check connection */
if ($mysqli->connect_errno) {
 
   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "SELECT  * FROM login WHERE user_id = '".$_SESSION["user_id"]."'";

//$query = "SELECT  * FROM login WHERE category='mentee'";

            if ($result = $mysqli->query($query)) {
              while($row = $result->fetch_assoc())

         // echo "<div style='float: right;'>";
          echo "<img src=images/".$row['image']."  style='border-radius: 50%; width: 45px; height: 45px'>";
          //echo "</div>";


            }
            ?>

          </a></li>
          </div>
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
   
   <div class="table-responsive">
    <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>
  </div>
<br>
<br>
<br>
<br>
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Afrimentors</strong>. All Rights Reserved
      </div>
      <div class="credits">

      <a href=""></a>
      </div>
    </div>
  </footer><!-- #footer -->
    </body>  
</html>  




<script>  
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_mentee.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You are connected with '+to_user_name+'">';
  modal_content += '<div style="height:350px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
  $('#chat_message_'+to_user_id).emojioneArea({
   pickerPosition:"top",
   toneStyle: "bullet"
  });
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    //$('#chat_message_'+to_user_id).val('');
    var element = $('#chat_message_'+to_user_id).emojioneArea();
    element[0].emojioneArea.setText('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });

 $(document).on('focus', '.chat_message', function(){
  var is_type = 'yes';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message', function(){
  var is_type = 'no';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    
   }
  })
 });
 
});  
</script>
