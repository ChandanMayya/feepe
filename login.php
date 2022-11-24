
<?php 

session_start(); 

include("connection.php");

$errormsg="";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $mail = $_POST['email'];
  $pass = $_POST['psw'];

  if(!empty($mail) && !empty($pass)){
    $query1="select * from user where email='$mail' and password='$pass'";
    $res=$con->query($query1);
    if(mysqli_num_rows($res)<1)
      $errormsg= "Wrong email or passord!";
    else{
      $row=mysqli_fetch_assoc($res);
      if($row["account_type"] =='admin')
        header("Location: admin/index.php");
      else {
        $_SESSION['uid']=$row['uid'];
        if($row['status']=="approved")
          header("Location: index.php");
        else{
          if($row['package']=='paid')
            header("Location: notverified.php");
          else          
            header("Location: admin/package.php");
        }
      }
    }
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
  
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
      <style> 
      .form-control{
border:none;
border-bottom:2px solid black;
     
    }
    .form-control:hover{
box-shadow:none;
padding:none;
    }
  </style>

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


  <link rel="stylesheet" href="css/custom.css">
</head>
<body style="display:block">

<?php
require_once 'header.php';
?>
<div class="container shadow bg-white mx-auto" style="width: 400px;margin-top:100px;margin-bottom:100px" >

<div class="forms " >
    <div class="form login">
        <span class="title">Login</span>

        <form action="" method="post">
        <!-- <div class="form-floating mt-3 mb-3">
  <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Email address</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" name="psw" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div> -->
<div class="input-field">
                  <input type="email" name="email" placeholder="Enter your email" required>
                  <i class="uil uil-envelope icon"></i>
              </div>
              <div class="input-field">
                  <input type="password" name="psw" class="password" placeholder="Enter your password" required>
                  <i class="uil uil-lock icon"></i>
                  <!-- <i class="uil uil-eye-slash showHidePw"></i> -->
              </div>
            <div class="col col-12"><br>
              <span><p style="color:orangered ;text-align:center"><?php echo $errormsg; ?></p></span>
            </div>
           

            <div class="input-field button">
                <!-- <input type="button" value="Login"> -->
                <button type="submit" style="background-color:blue;color:white;font-size:20px" >Login</button>
            </div>
        </form>

        <div class="login-signup">
            <span class="text" style="font-size:16px">Not a member?
                <a  class="text signup-link" style="font-size:17px" a href="register.php"> Register </a>
            </span>
        </div>
    </div>
  </div>
  </div>
 

  <div class=" margin-top:250px">
  <?php
require 'foot.php';
?>
  </div>
  

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->



</body>
</html>