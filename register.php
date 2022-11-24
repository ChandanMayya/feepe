<?php
session_start();

  include("connection.php");
  $error_msg="";


  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $uname=$_POST["name"];
    $pass=$_POST["pass"];
    $rpass=$_POST["rpass"];
    $mail=$_POST["email"];
    $phone=$_POST["phone"];
    // $role = $_POST["role"];
    $query1="select * from user where uname='$uname' or email='$mail'";
    $res=$con->query($query1);
    if(mysqli_num_rows($res) == 0){
      if(!empty($uname) && !empty($pass) && !is_numeric($uname)){
        if(strlen($pass)>5){
          if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $pass) ) { 
            if($pass==$rpass){
              if(strlen($phone)>9&& strlen($phone)<11){
                $query2="insert into user (uname,password,email,phone,account_type) values ('$uname','$pass','$mail','$phone','guide')";
                if($con->query($query2))
                  header("Location: login.php");
                else  
                  echo"NOT INSERTED";
              }else $error_msg="Phone number must have 10 numbers";
            }else $error_msg="Password does not match";
          }else $error_msg="Password must be more than 5 characters!";
        }else $error_msg="Password must be alpha-numeric!";
      }else $error_msg="Invalid user name or password";
  }
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/custom.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  i{
    color:blue;
    font-size:16px;
    font-weight:600;
  }
  .size{
    background-image: url('images/g1.jpg');
    background-repeat: no-repeat;
    background-size:cover;
    overflow: hidden;
    
    
  }
  body{
    background:#fff;
  }
</style>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>

<body style="background-color:white">
<?php
require 'header.php';
?>
 <form method="post">
    <div class="container w-100 p-3 mt-4">
    
    <div class="  card w-100 forms shadows bg-white" >
  
    
 
  <div class="card-body">
    <div class="container">    
      <div class="row">
      <div class="col-sm-7 ">
    
      
      <img src="images/g1.jpg" class=" img-responsive h-100 w-100" alt="..."  >
      </div>
      <div class="col-sm-5 " >
    
                <span class="title mb-4" style="font-size:24px;border-bottom:2px solid blue">Registration</span>
      <!-- <center><h2 class="heading"  style="font-family:calibri;">Sign Up</h2></center> -->
  <div class="form-floating mt-4  mb-2" >
  <input type="text" class="form-control" name="name" id="floatingInput" placeholder="name@example.com" required>
  <label for="floatingInput"><i class="fa fa-user" aria-hidden="true"></i> User Name <small style="color:orange ;">*</small></label>
</div>


<div class=" form-floating mb-2 input-field">
  <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password" required>
  <label for="floatingPassword"> <i class="fa fa-lock" aria-hidden="true"></i> Password <small style="color:orange ;">*</small></label>
</div>
<div class="form-floating mb-2">
  <input type="password" class="form-control" name="rpass" id="floatingPassword" placeholder="Password" required>
  <label for="floatingPassword"><i class="fa fa-lock" aria-hidden="true"></i> Confirm Password <small style="color:orange ;">*</small></label>
</div>
<div class="form-floating mb-2">
  <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
  <label for="floatingInput"><i class="fa fa-envelope" aria-hidden="true"></i> Email address <small style="color:orange ;">*</small></label>
</div>
<div class="form-floating mb-2">
  <input type="number" class="form-control" name="phone" id="floatingInput" placeholder="name@example.com" required>
  <label for="floatingInput"><i class="fa fa-phone" aria-hidden="true"></i> Phone Number <small style="color:orange ;">*</small></label>
</div>
<!-- <select class="form-select" name="role" required aria-label="Default select example">
  <option >Choose role</option>
  <option value="admin">admin</option>
  <option value="guide">Guide</option>
  
</select> -->
<div class="row mt-4">

</div>
<div class="col-12 mb-3">
    <span><p style="color:orangered"><?php echo $error_msg; ?></p></span>
  </div>
  <div class="row" >
    <div class="col-4 mb-2">
    <button type="submit" class="btn btn-primary " name="register">Register</button>
  </div>
  <div class="col-8">
    <p><small >Already Registered?<small><a class="btn btn-outline-primary" style="margin-left:40px;" href="login.php" >Login</a></p>
</div></div>
<small style="color:red;">Note: * indicates required</small>
  </div>
</div>
  </div>
</div>
</div>
    </div>
 </form> 
<div class="container-fluid">
<?php
require 'footer.php';
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>