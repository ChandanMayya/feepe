
<?php
  //  require_once ('nav.php');
  session_start();
  include("functions.php");
  include("connection.php");

  $user_data=check_login($con);

  $uid=$user_data['uid'];


  $querry="select cid from course where uid='$uid'";
  $result=$con->query($querry);
  


    
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 <style>
    .container-fluid{
	
        margin-right: 20px;
}
.card{
background:red;}
 </style>
</head>
<body style="background-color:white">
<?php
include_once "nav.php"

?>
    <div class="analytics">

<div class="card " style="background:#ff6600" >
<div class="card-head">
<h2 class="text-white font-weight-bold" >Students
</h2>
<p class="text-white mt-3"style="font-size:28px"><?php 
        require "connection.php";
        $result  = mysqli_query($con,"select count(*) as total from student where bid in(select bid from batch where cid in (select cid from course where uid ='$uid'))");
        while($row = mysqli_fetch_array($result)) 
        echo $row['total'];

        ?> <i class="fa fa-graduation-cap" aria-hidden="true"></i>
        </p>
        
    </div>
   
</div>

<div class="card bg-success">
    <div class="card-head">
        <h2 class="text-white font-weight-bold mt-1">Course</h2>
        
        <p class="mt-3 text-white" style="font-size:28px"><?php 
        require "connection.php";
        $result  = mysqli_query($con,"select count(cid) as total from course where uid ='$uid'");
        while($row = mysqli_fetch_array($result)) 
        echo $row['total'];
        ?>
        <i class="fa fa-book" aria-hidden="true"></i></p>
    </div>
    
</div>

<div class="card bg-primary">
    <div class="card-head">
        <h2 class="text-white font-weight-bold mt-1">Total Batches</h2>
        <p class="mt-3 text-white" style="font-size:28px"> <?php 
        require "connection.php";
        $result  = mysqli_query($con,"select count(bid) as total from batch where cid in (select cid from course where uid ='$uid')");
        while($row = mysqli_fetch_array($result)) 
        echo $row['total'] ;
        ?> <i class="fa fa-users" aria-hidden="true"></i></p>
    </div>
    
</div>



</div>
<div class="container">
<div class=" row">
    <div class="col-6">
    <img src="images/ban.png" alt="" srcset="" >

    </div>
    <div class="col-6">
    <img src="images/ban1.jpeg" alt="" srcset="" style="width:800px" >
    </div>
</div>
</div>
<!-- footer -->
<?php
require 'footer.php';
?>

</body>
</html>