
<?php 
session_start();

include("functions.php");
include("connection.php");

$user_data=check_login($con);

$uid=$user_data['uid'];
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
    <?php require "nav.php"; ?>
    <div class="container mb-4 mt-5 bg-white" >
       <div class="row mb-4">
        <div class="col-6">
        <h2>Payment Tables</h2>
        </div>
        
       </div> 

<table class="table  table-hover">
  <thead>
    <tr>
      <th >SID</th>
      <th >Student Name</th>
      <th >Course Name</th>
      <th >Batch name</th>
      <th>Total Fees</th>
      <th>Paid Amount</th>
      <th>Remaining amount</th>
      <!-- <th>Edit Paymet</th> -->
    </tr>
  </thead>
  <tbody>
    
   
   <div class="row">

<?php
require_once "connection.php";
$result  = mysqli_query($con,"select student.sid,student.sname,student.payment_status,course.cname,batch.bname,course.fees from student,batch,course where student.bid=batch.bid and batch.cid=course.cid and course.uid='$uid' ");
while($row = mysqli_fetch_array($result))
{
?>
    <tr>
        <td><?php echo $row['sid'] ?></td>
        <td><?php echo $row['sname'] ?></td>
        <td><?php echo $row['cname'] ?></td>
        <td><?php echo $row['bname'] ?></td>
        <td><?php echo $row['fees'] ?></td>
        <td><?php echo $row['fees']-$row['payment_status']; ?></td>
        <td><?php echo $row['payment_status'] ?></td>
<!-- <td> -->
       <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Edit
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Update Payment</h4>
        <br>
        <label for="inputPassword" class=" col-form-label">Remaining Amount</label>
      
        <input class="form-control form-control-lg mb-2" type="number" placeholder="" name="rem_amt" value="<?php echo $row['sname'] ?>" aria-label=".form-control-lg example">
        <label for="inputPassword" class=" col-form-label">Enter Amount</label>
        <input class="form-control form-control-lg mb-4" type="number" placeholder="" name="pay_amt"  aria-label=".form-control-lg example">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
</td>
<?php
}
?>
    </tr>
    
    
  </tbody>
</table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
require('footer.php');
?>
</body>
</html>