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
<!-- <link rel="stylesheet" href="css/cred.css"> -->
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
          <a class="nav-link" aria-current="page" href="pending_user.php">Pending User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin_approval.php">Approved Users</a>

        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="admin_deny.php">Deny Users</a>

        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="package.php">Package</a>
        </li>
        <li class="nav-item">
          <a href="../logout.php" class="nav-link">LogOut   <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
        
      </ul>
     
    </div>
  </div>
</nav>
</body>
</html>