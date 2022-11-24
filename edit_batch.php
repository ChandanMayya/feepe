<?php

session_start();
error_reporting(0);
$errorr="";
include("connection.php");

$bid=$_REQUEST['bid'];
//$cno=$_REQUEST['cid'];

if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $bname=$_POST['bname'];
    $day_frm=$_POST['day_from'];
    $day_to=$_POST['day_to'];
    $time_frm=$_POST['time_from'];
    $time_to=$_POST['time_to'];
    $details=$_POST['details'];

    $query2="select * from batch where bname='$bname' and cid='$cno' and day_from='$day_frm' and day_to='$day_to' and time_from='$time_frm' and time_to='$time_to'";
    if(mysqli_num_rows($con->query($query2))>0)
    $errorr="Batch already Exists";
    else{
      $query="update batch set bname='$bname',details='$details',day_from='$day_frm',day_to='$day_to',time_from='$time_frm',time_to='$time_to' where bid='$bid'";
      if($con->query($query)){
        header("Location: view_batch.php");
      }
      else  
        echo "NOT INSERTED";
    }
  }



$query="select * from batch where bid='$bid'";
if($result=$con->query($query)){
  $row=mysqli_fetch_assoc($result);
  $cno=$row['cid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
  </style> -->
</head>
<body>
  <?php
    require('nav.php');
    ?>
<div class="container p-3">
<form action="" method="post">
<div class="card  shadow mx-auto mb-3 " style="width: 38rem;">

  <div class="card-body">
  <h4 class="card-title mb-3 text-primary">Batch Details</h4>
  
<div class="form-floating mb-3">
  <input type="text" class="form-control" name="bname" min="0" id="floatingInput"  value="<?php echo $row['bname']; ?>" >
  <label for="floatingInput" >Batch name</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" min="0" id="floatingInput"  value="<?php echo $row['category']; ?>" disabled>
  <label for="floatingInput" >Category</label>
</div>
<div class="row">
<div class="col-6">
<div class="form-floating mb-3">
  <input type="Date" class="form-control" name="day_from" required id="floatingPassword"  value="<?php echo $row['day_from']; ?>" >
  <label for="floatingPassword" > From Days</label>
</div>

</div>
<div class="col-6">
<div class="form-floating mb-3">
  <input type="Date" class="form-control" name="day_to"  required id="floatingPassword"  value="<?php echo $row['day_to']; ?>" >
  <label for="floatingPassword" >Upto day</label>
</div>
</div>
</div>
<div class="row">
<div class="col-6">
<div class="form-floating mb-3">
  <input type="Time" class="form-control" name="time_from" required id="floatingPassword"  value="<?php echo $row['time_from']; ?>" >
  <label for="floatingPassword" > From Time</label>
</div>

</div>
<div class="col-6">
<div class="form-floating mb-3">
  <input type="Time" class="form-control" name="time_to"  required id="floatingPassword"  value="<?php echo $row['time_to']; ?>" >
  <label for="floatingPassword" >Upto Time</label>
</div>
</div>
<div class="form-floating mb-3">
  <textarea class="form-control" name="details" min="0" required id="floatingTextarea"><?php echo $row['details']; ?></textarea>
  <label for="floatingTextarea">Batch Details</label>
</div>
</div>
<div class="col col-12">
              <span><p style="color:orangered ;text-align:center"><?php echo $errorr; ?></p></span>
            </div>

<input type="submit" class="btn btn-primary" value="Update Batch" >
</div>
</div>
</form> 
</div> 
<?php
require 'footer.php';
?>
</body>
</html><?php } ?>