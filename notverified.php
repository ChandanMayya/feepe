<?php 
session_start();

include("connection.php");
include_once "nav.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <section>
          <div class="container">
          <h1 style="text-align:center;">ALERT!</h1>
      <div style="padding-left:390px;">
             <img src="images/working.png" alt="Avatar" style=" width: 50%;" >
</div>
         <h4 style="text-align:center;">Your account is currently in waiting list for approval.</h4>
         <p style="text-align:center;">We are happy that, you have successfully created an account in our payment management system.<br>But as per our procedures, inorder to make sure that we keep this place secure,<br>we do a cross verification on all the accounts created.<br>Our team is processing your request, once the account have been successfully validated,<br> you can utilize this portal to the max!</p>
          
        <br>
    <p style="text-align:center;">We also do plead you sorry if this procedure is taking too much of waiting time to you.<Br>In mean time, if you want any assistance from us,<br>you are free to contact us in the work time.<br>The following button would lead you to contact us page:</p>
        
</div>
     <center>
 <a href="login.php"><input type="button" class="btn btn-primary" value="contact us"></a>
     </center><br>
</body>
</html>