<?php

  session_start();
 // include_once "nav.php";
  include("connection.php");
  include("functions.php");

  $err1="";

  $user_data=check_login($con);

  $uid=$user_data['uid'];

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $cname=$_POST["cname"];
    $details=$_POST["details"];
    $fees=$_POST["fees"];
    $duration=$_POST["dura"];

    $query2="select * from course where cname='$cname' and duration='$duration' and fees='$fees' and uid='$uid'";
    if(mysqli_num_rows($con->query($query2))==0){
      $query="insert into course (cname,details,duration,fees,uid) values ('$cname','$details','$duration','$fees','$uid')";
      if($con->query($query))
        header("Location: batch.php");
      else  
        echo "NOT INSERTED";
    }else{
      $err1="Course already exists";}

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" href="css/style.css"> -->
<style>
  .nav-link{
    font-size:20px;
    color:#fff;
  }

</style>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            
</head>
<nav class="navbar navbar-expand-lg  shadow-sm p-1 ms-2 bg-secondary rounded navbar-light ">
  <div class="container-fluid">
  <a class="navbar-brand  ms-2" href="#" style="color:orange; font-family: Brush Script MT;font-size:3rem" >Feepe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid collapse navbar-collapse text-white  justify-content-end " style="width:120%" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto ms-0 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="view_course.php">Course</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Course
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="course.php">Add course</a></li>
            <div class="dropdown-divider"></div><li><a class="dropdown-item" href="edit_course.php">Edit Course</a></li>
            
            <div class="dropdown-divider"></div><li><a class="dropdown-item" href="view_course.php">View course</a></li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="view_batch.php">Batches</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Batch
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="batch.php">Add Batch</a></li>
            <li><a class="dropdown-item" href="edit_batch.php">Edit Batch</a></li>
            
            <li><a class="dropdown-item" href="view_batch.php">View Batch</a></li>
          </ul>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Student
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="student.php">Add Student</a></li>
            <li><a class="dropdown-item" href="edit_student.php">Edit Students</a></li>
            
            <li><a class="dropdown-item" href="view_student.php">View Students</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Payment
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="payment.php">Add Paid amt</a></li>
            <li><a class="dropdown-item" href="edit_pay.php">Edit amt</a></li>
            
            <li><a class="dropdown-item" href="view_pay.php">View amt</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">LogOut   <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>
<body>
    <div class="container p-3">
<form action="" method="post">
<div class="card mb-3 mx-auto w-50" style="">

  <div class="card-body ">
  <h4 class="card-title mb-3 text-primary mx-auto">Course Details</h4>
  
<div class="form-floating mb-3">
  <input type="text" name="cname" class="form-control" min="0" id="floatingInput" required>
  <label for="floatingInput">Course name <label style="color:orangered ;">*</label></label>
</div>
<div class="form-floating mb-3">
  <textarea class="form-control" name="details" min="0" required id="floatingTextarea"></textarea>
  <label for="floatingTextarea">Course Details  <label style="color:orangered ;">*</label></label>
</div>
<div class="form-floating mb-3">
  <input type="number" name="fees" class="form-control" min="0" required id="floatingPassword" >
  <label for="floatingPassword" >Fees  <label style="color:orangered ;">*</label></label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" name="dura" min="0" required id="floatingPassword" >
  <label for="floatingPassword">Duration  <label style="color:orangered ;">*</label></label>
</div>
<div class="col col-12">
              <span><p style="color:orangered ;text-align:center"><?php echo $err1; ?></p></span>
            </div>
<input type="submit" class="btn btn-outline-primary" value="Add Course"> 
</div>
</div>
</form> 
</div>
</body>
</html>