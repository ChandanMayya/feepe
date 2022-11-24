<?php

session_start();

 
include("functions.php");
include("connection.php");

$user_data=check_login($con);
$err1="";
$uid=$user_data['uid'];

$cid=$_REQUEST['cid'];

if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $cname=$_POST["cname"];
    $details=$_POST["details"];
    $fees=$_POST["fees"];
    $duration=$_POST["dura"];

    $query2="select * from course where cname='$cname' and duration='$duration' and fees='$fees' and uid='$uid'";
    if(mysqli_num_rows($con->query($query2))==0){
      $query="update course set cname='$cname',details='$details',fees='$fees',duration='$duration' where cid='$cid'";
      if($con->query($query))
        header("Location: view_course.php");
      else  
        echo "NOT INSERTED";
    }else{
      $err1="Course already exists";}

  }

$query="select * from course where cid='$cid'";
if($result=$con->query($query)){
  $row=mysqli_fetch_assoc($result);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     
       
        </style>
</head>
<body>
<?php
    require('nav.php');
    ?>
    <div class="container p-3 mt-5 justify-content-center">
<form action="" method="post">
<div class="card mb-3 w-50 mx-auto shadow rounded "  style="">

  <div class="card-body">
  <h4 class="card-title mb-3 text-primary">Course Details</h4>
  
<div class="form-floating mb-3">
  <input type="text" class="form-control" name="cname" min="0" id="floatingInput" value="<?php echo $row['cname']; ?>" >
  <label for="floatingInput">Course name</label>
</div>
<div class="form-floating mb-3">
  <textarea class="form-control" min="0" name="details" required id="floatingTextarea"  value="<?php echo $row['details']; ?>" ></textarea>
  <label for="floatingTextarea">Course Details</label>
</div>
<div class="form-floating mb-3">
  <input type="number" class="form-control" name="fees" min="0" required id="floatingPassword"  value="<?php echo $row['fees']; ?>" >
  <label for="floatingPassword" >Fees</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" min="0" name="dura" required id="floatingPassword"  value="<?php echo $row['duration']; ?>" >
  <label for="floatingPassword">Duration</label>
</div>
<div class="col col-12">
              <span><p style="color:orangered ;text-align:center"><?php echo $err1; ?></p></span>
            </div>
<input type="submit" class="btn btn-outline-primary" value="Update Course">
</div>
</div>
</form> 
</div>
<br>
<br>
<br>
<?php
require "footer.php";
?>
</body>
</html>

<?php 

  }else{
    echo "RECRD NT FND!";
  } 
  
?>