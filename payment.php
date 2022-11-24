<?php

  session_start();

 include("functions.php");
 include("connection.php");

 $user_data=check_login($con);

 $uid=$user_data['uid'];
 
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  if(!isset($_POST['bid'])){
    $sname=$_POST['sname'];

    $res1=$con->query("select * from student where sname='$sname'");
    if(mysqli_num_rows($res1)<1)
      echo "Student does not exists";
    else{ 
      $row=mysqli_fetch_assoc($res1);
      $_SESSION['sname']=$sname;
      $_SESSION['cno']=$_POST['cid'];
      $_SESSION['sid']=$row['sid'];
    }
    if(!isset($_SESSION['cno']))
      $_SESSION['cno']=$_POST['cid']; 
  }else{
      $sname=$_SESSION['sname'];
      $sid=$_SESSION['sid'];
      $amt=$_POST['amt'];
      $remarks=$_POST['remarks'];
      $bid=$_POST['bid'];

      if(mysqli_num_rows($con->query("select sid from student where sname='$sname' and bid='$bid'"))>0){
        if($con->query("insert into fees (amount,remarks,sid) values ('$amt','$remarks','$sid')")){
          $row5=mysqli_fetch_assoc($con->query("select payment_status from student where sid='$sid'"));
          $rem=$row5['payment_status']-$amt;
          if($rem>=0){
            if($con->query("update student set payment_status='$rem' where sid='$sid'")){
              echo"Inserted and updated";
              unset($_SESSION['sname']);
              unset($_SESSION['cno']);
              unset($_SESSION['sid']);            
            }else 
              echo"error in updating payment status";
          }else echo"Payment amount exceeded.. Remaining pay amount is: ". $row5['payment_status'];
        }else echo"error in inserting to fees";
      }else echo"student name or batch may be wrong!";
  }
}
if(isset($_SESSION['cno'])){
  $cid=$_SESSION['cno'];
  $query2="select * from batch where cid='$cid'";
  $res2=$con->query($query2);
}

$res=$con->query("select * from course where uid='$uid'");

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
</head>
<body>
  <?php
    require('nav.php');
    ?>
<div class="container p-3">
<form action="" method="post">
<div class="card mb-3 " style="width: 38rem;">

  <div class="card-body">
  <h4 class="card-title mb-3 text-primary">ADD PAYMENT</h4>
<!--   
<div class="form-floating mb-3">
  <input type="text" class="form-control" min="0" id="floatingInput"  name="sid" required>
  <label for="floatingInput">student id</label>
</div> -->

<div class="form-floating mb-3">
<input type="text" class="form-control" min="0" id="floatingInput"  name="sname" required  <?php if(isset($_SESSION['cno'])){ ?> value="<?php echo $_SESSION['sname']; ?>" <?php } ?>>
  <label for="floatingInput">student Name</label>
</div><!-- <label for="floatingInput" name="bname">Category</label> -->
</div>
<div class="mb-3 " style="margin-left:15px;margin-right:15px;">
<select class="form-select ml-2 mr-2 h-75" aria-label="Default select example" > <?php if(isset($_SESSION['cno'])){ ?>disabled <?php } ?>>
<?php
foreach($res as $index){?>
<option>
<?php echo  $index['cid'] .".  ". $index['cname']; ?>
</option>
<?php } ?>
</select>
</div>
<div class="form-floating mb-3 "style="margin-left:15px;margin-right:15px;">
  <input type="text" class="form-control" name="cid" id="floatingInput" placeholder="Enter cource number" required <?php if(isset($_SESSION['cno'])){ ?>value="<?php echo $_SESSION['cno']; ?>" disabled <?php } ?>>
  <label for="floatingInput">Couse Number   <small>(For confirmation)</small></label>
</div>
<div class="mb-3" style="margin-left:15px;margin-right:15px;">
<select class="form-select" aria-label="Default select example" <?php if(!isset($_SESSION['cno'])){ ?> disabled <?php } ?>>
<?php
foreach($res2 as $index2){?>
<option>
<?php echo  $index2['bid'] .".  ". $index2['bname']; ?>
</option>
<?php } ?>
</select>
</div>
<div class="form-floating mb-3 "style="margin-left:15px;margin-right:15px;">
  <input type="text" class="form-control" min="0" id="floatingInput"  name="bid" required <?php if(!isset($_SESSION['cno'])){ ?> disabled <?php } ?>>
  <label for="floatingInput">Batch Number <small>(For Confirmation)</small></label>
</div>
<!-- <div class="form-floating mb-3 "style="margin-left:15px;margin-right:15px;">
  <input type="text" class="form-control" min="0" id="floatingInput"  name="sid" required>
  <label for="floatingInput">Amount</label>
</div> -->


<div class="form-floating mb-3" style="margin-left:15px;margin-right:15px;">
  <input type="number" class="form-control" name="amt" min="0" id="floatingInput" placeholder="Enter cource number" required <?php if(!isset($_SESSION['cno'])){ ?> disabled <?php } ?>   >
  <label for="floatingInput">Paying Amount in Rupees  </label>
</div>
<div class="form-floating mb-3" style="margin-left:15px;margin-right:15px;">
  <input type="text" class="form-control" name="remarks" min="0" id="floatingInput" placeholder="Enter cource number" required <?php if(!isset($_SESSION['cno'])){ ?> disabled <?php } ?>   >
  <label for="floatingInput">Remarks </label>
</div>

<input type="submit" class="btn btn-outline-primary mb-5" style="margin-left:15px;margin-right:15px" <?php if(!isset($_SESSION['cno'])){ ?> value="Next" <?php  } else { ?> value="Submit" <?php } ?>>
</div>
</div>
</form>
</div> 
<?php
require('footer.php');
?>
</body>
</html>