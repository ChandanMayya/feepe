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
<body class="">

<nav class="navbar navbar-expand-lg  shadow-sm p-1 ms-2 bg-secondary rounded navbar-light ">
  <div class="container-fluid">
  <a class="navbar-brand  ms-2" href="#" style="color:orange; font-family:cursive;font-size:3rem" >Feepe</a>
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
        <!-- <li class="nav-item">
          <a class="nav-link " aria-current="page" href="view_student.php">Student</a>
        </li> -->
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
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Student
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="student.php">Add Student</a></li>
            
            <li><a class="dropdown-item" href="view_student.php">View Students</a></li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="view_student.php">Student</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Payment
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="payment.php">New Payment</a></li>
            <!-- <li><a class="dropdown-item" href="edit_pay.php">Edit amt</a></li> -->
            
            <li><a class="dropdown-item" href="view_payment.php">View payments</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">LogOut   <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>
</body>
</html>