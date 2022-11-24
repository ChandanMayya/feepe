<?php

  session_start();



  include_once "nav.php";
  include("connection.php");
  $cid=$_SESSION['cid'];
  $query="select * from course where uid ='$uid'";
 $res=$con->query($query);

  if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      if(!isset($_POST['bid'])){
        $_SESSION['sname']=$_POST['sname'];
        $_SESSION['age']=$_POST['age'];
        $_SESSION['phone']=$_POST['phone'];
        $_SESSION['address']=$_POST['address'];
        
        if(!isset($_SESSION['cno'])){
          $cno=$_POST['cid'];
           $query4="selct *  from course where cid='$cno' ";   ///sql error...?
          if(mysqli_num_rows($con->query($query4))>0)
            $_SESSION['cno']=$_POST['cid'];
          else
            echo "Course Does not exists..";
        }
      }

      if(isset($_POST['bid'])){
        $sname=$_POST['sname'];
        $age=$_POST['age'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        //$cno=$_POST['cid'];
        $bid=$_POST['bid'];

        $query3="insert into student (sname,age,address,phone,bid) values ('$sname','$age','$address','$phone','$bid')";
        if($con->query($query3)){
          echo "INSERTEFD";
          unset($_SESSION['name']);
          unset($_SESSION['age']);
          unset($_SESSION['phone']);
          unset($_SESSION['address']);
          unset($_SESSION['cno']);
          unset($_SESSION['bid']);
        }
        else  
          echo "SOME ERROR";
      }
    }
  if(isset($_SESSION['cid'])){
    $cid=$_SESSION['cno'];
    
     $query2="select bname from batch where cid='$cid'";
   $res2=$con->query($query2);

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container p-3">
<form action="" method="post">
<div class="card mb-3 " style="width: 28rem;">

  <div class="card-body">
  <h4 class="card-title mb-3 text-primary">Student Details</h4>
  
<div class="form-floating mb-3">
  <input type="text" class="form-control" min="0" id="floatingInput" name="sname"  <?php if(isset($_SESSION['cno'])){ ?> value="<?php echo $_SESSION['sname']; ?>" <?php } ?>>
  <label for="floatingInput">Student name</label>
</div>
<div class="form-floating mb-3">
  <input type="number" class="form-control" min="0" required id="floatingPassword" name="age" <?php if(isset($_SESSION['cno'])){ ?> value="<?php echo $_SESSION['age']; ?>" <?php } ?>>
  <label for="floatingPassword" >Age</label>
</div>
<div class="form-floating mb-3">
  <input type="number" class="form-control" min="0" max-length="10" required id="floatingPassword" name="phone" <?php if(isset($_SESSION['cno'])){ ?> value="<?php echo $_SESSION['phone']; ?>" <?php } ?>>
  <label for="floatingPassword" >Phone</label>
</div>
<div class="form-floating mb-3">
  <textarea class="form-control" min="0" required id="floatingTextarea" name="address"><?php if(isset($_SESSION['cno'])){ echo $_SESSION['address'];  } ?></textarea>
  <label for="floatingTextarea">Address</label>
</div>

<div class="mb-3">
<select class="form-select" aria-label="Default select example" <?php if(isset($_SESSION['cno'])){ ?>disabled <?php } ?>>
<?php
foreach($res as $index){?>
<option>
<?php echo  $index['cid'] .".  ". $index['cname']; ?>
</option>
<?php } ?>
  
</select>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" name="cid" id="floatingInput" placeholder="Enter cource number" required <?php if(isset($_SESSION['cno'])){ ?>value="<?php echo $_SESSION['cno']; ?>" disabled <?php } ?>>
  <label for="floatingInput">Couse Number   <small>(For confirmation)</small></label>
</div>

<div class="mb-3">
<select class="form-select" aria-label="Default select example" <?php if(!isset($_SESSION['cno'])){ ?> disabled <?php } ?> >
<?php
foreach($res2 as $index2){?>
<option>
<?php echo  $index2['bid'] .".  ". $index2['bname']; ?>
</option>
<?php } ?>
</select>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" min="0" id="floatingInput" placeholder="Enter cource number" required name="bid"  <?php if(!isset($_SESSION['cno'])){ ?> disabled <?php } ?>>
  <label for="floatingInput">Batch Number   <small>(For confirmation)</small></label>
</div>

<input type="submit" class="btn btn-outline-primary"<?php if(!isset($_SESSION['cno'])){ ?> value="Next" <?php  } else { ?> value="Add Student" <?php } ?>>
</div>
</div>
</form> 
</div>
</body>
</html>