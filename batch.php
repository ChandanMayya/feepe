<?php
  session_start();
  include("functions.php");
   include("connection.php");

   $user_data=check_login($con);
 
   $uid=$user_data['uid'];

   $err1="";

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $bname=$_POST['bname'];
    $category=$_POST['category'];
    $cno=$_POST['cno'];
    $day_frm=$_POST['day_from'];
    $day_to=$_POST['day_to'];
    $time_frm=$_POST['time_from'];
    $time_to=$_POST['time_to'];
    $details=$_POST['details'];


    $query2="select * from batch where bname='$bname' and category='$category' and cid='$cno' and day_from='$day_frm' and day_to='$day_to' and time_from='$time_frm' and time_to='$time_to'";
    if(mysqli_num_rows($con->query($query2))>0)
      $err1= "Batch already exists";
    else{
      $query1="insert into batch (bname,category,cid,day_from,day_to,time_from,time_to,details) values ('$bname','$category','$cno','$day_frm','$day_to','$time_frm','$time_to','$details')";
      if($con->query($query1))
        header("Location: view_batch.php");
      else  
        echo "NOT INSERTED";
    }
   }

  $query1="Select * from course where uid='$uid'";
  $res=$con->query($query1);
  $row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
require('nav.php');
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
  .card{
    margin-left:250px;
  }
  .btn{
  
  }
  
</style>
</head>
<body>
 
<div class="container p-3">
<form action="" method="post">
<div class="card mb-3 shadow mt-4 " style="width: 38rem;">

  <div class="card-body">
  <h4 class="card-title mb-3 text-primary text-center">Batch Details</h4>
  
<div class="form-floating mb-3">
  <input type="text" class="form-control" min="0" id="floatingInput"  name="bname" required>
  <label for="floatingInput">Batch name</label>
</div>
<div class="mb-3">
<select class="form-select" aria-label="Default select example" name="category">
  <option selected>Category</option>
  <option value="junior">Junior</option>
  <option value="senior">senior</option>
</select>
  <!-- <label for="floatingInput" name="bname">Category</label> -->
</div>
<div class="mb-3">
<select class="form-select" aria-label="Default select example" >
<?php
foreach($res as $index){?>
<option>
<?php echo  $index['cid'] .".  ". $index['cname']; ?>
</option>
<?php } ?>
</select>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" name="cno" min="0" id="floatingInput" placeholder="Enter cource number" required>
  <label for="floatingInput">Couse Number   <small>(For confirmation)</small></label>
</div>
<div class="row">
<div class="col-6">
<div class="form-floating mb-3">
  <input type="Date" class="form-control" name="day_from" required id="floatingPassword" >
  <label for="floatingPassword" > From Days</label>
</div>

</div>
<div class="col-6">
<div class="form-floating mb-3">
  <input type="Date" class="form-control" name="day_to"  required id="floatingPassword" >
  <label for="floatingPassword" >Upto day</label>
</div>
</div>
</div>
<div class="row">
<div class="col-6">
<div class="form-floating mb-3">
  <input type="Time" class="form-control" name="time_from" required id="floatingPassword" >
  <label for="floatingPassword" > From Time</label>
</div>

</div>
<div class="col-6">
<div class="form-floating mb-3">
  <input type="Time" class="form-control" name="time_to"  required id="floatingPassword" >
  <label for="floatingPassword" >Upto Time</label>
</div>
</div>
<div class="form-floating mb-3">
  <textarea class="form-control" name="details" min="0" required id="floatingTextarea"></textarea>
  <label for="floatingTextarea">   Batch Details</label>
</div>
</div>
<div class="col col-12">
              <span><p style="color:orangered ;text-align:center"><?php echo $err1; ?></p></span>
    </div>
<input type="submit" class="btn btn-primary" value="Add Batch">
</div>
</div>
</form>
</div> 
<?php
require 'footer.php';
?>
</body>
</html>