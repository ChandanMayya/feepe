<?php
session_start();

include("functions.php");
include("connection.php");

$user_data=check_login($con);

$uid=$user_data['uid'];

$query="select * from course where uid='$uid'";
$res=$con->query($query);

if($_SERVER['REQUEST_METHOD'] == "POST")
 {
   if(!isset($_POST['bid'])){
     $_SESSION['sname']=$_POST['sname'];
     $_SESSION['age']=$_POST['age'];
     $_SESSION['phone']=$_POST['phone'];
     $_SESSION['address']=$_POST['address'];
     
     $query="select * from course where uid='$uid'";
     $res=$con->query($query);

     if(!isset($_SESSION['cno'])){
       $cno=$_SESSION['cno']=$_POST['cid'];
       $row5=(mysqli_fetch_assoc($con->query("select fees from course where cid='$cno'")));
       $_SESSION['fees']=$row5['fees'];
     }
   }

   if(isset($_POST['bid'])){
     $sname=$_POST['sname'];
     $age=$_POST['age'];
     $phone=$_POST['phone'];
     $address=$_POST['address'];
     //$cno=$_POST['cid'];
     $bid=$_POST['bid'];
     $fees=$_SESSION['fees'];

     $query4="select * from batch where bid='$bid'";
     $res4=$con->query($query4);
     $row4=mysqli_fetch_assoc($res4);

     if(($age<18 && ($row4['category']=='junior'))||($age>17 && ($row4['category']=='senior'))){
       if(strlen($phone)>9){
         $query3="insert into student (sname,age,address,phone,bid,payment_status) values ('$sname','$age','$address','$phone','$bid','$fees')";
         if($con->query($query3))
           {
             unset($_SESSION['sname']);
             unset($_SESSION['age']);
             unset($_SESSION['phone']);
             unset($_SESSION['address']);
             unset($_SESSION['cno']);
             unset($_SESSION['fees']);
             header("Location: view_student.php");
           }
         else  
           echo "SOME ERROR";
       }else{ echo "Phone number must be of 10 characters..";}
     }else{ echo "Student Age and batch category does not hold..";}
   }
 }
if(isset($_SESSION['cno'])){
 $cid=$_SESSION['cno'];
 $query2="select * from batch where cid='$cid'";
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
  <?php require_once "nav.php"; ?>
    <div class="container p-3 mb-5">
<form action="" method="post">
<div class="card mb-3  mx-auto shadow " style="width: 28rem;">

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
<?php require('footer.php');
?>
</body>
</html>