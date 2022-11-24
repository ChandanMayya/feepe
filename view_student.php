<?php
 session_start();
 include("functions.php");
 include("connection.php");

 $user_data=check_login($con);

 $uid=$user_data['uid'];


 $querry2="select * from student where bid in(select bid from batch where cid in (select cid from course where uid ='$uid'))";
 $result2=$con->query($querry2);
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=t, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btns{
  background: #667db6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
    </style>
</head>

<?php
require('nav.php');
?>
<body>
    
    <div class="row  mt-5 mb-5 bg-warning" style="margin-left:20px ; margin-right:20px" >
    <div class="col-6 ">   <h3 class="float-end" style="font-family: Brush Script MT;font-size:3rem;" >Student</h3></div>
    <div class="col-6 "><a class="nav-link btn btns  w-25 mt-2 p-2  float-end mr-5 " style="color:white;"
    href="student.php">Add Student <i class="fa fa-plus" aria-hidden="true"></i></a></div>
   </div>
   
<div class="container mt-5">

<table class="table table-striped table-hover rounded border-light">
<tr style="text-align:center ;">
    <th>ID</th>
    <th>NAME</th>
    <th>AGE</th>
    <th>PHONE</th>
    <th>ADDRESS</th>
    <th>COURSE NAME</th>
    <th>BATCH NAME</th>
    <th>DELETE </th>
</tr>
<?php
foreach($result2 as $index){

?>
<tr>
    <td>
<?php echo $index['sid'];?>
    </td>
    <td>
<?php echo $index['sname'];?>
    </td>
    
    <td>
<?php echo $index['age'];?>
    </td>
    
    <td>
<?php echo $index['phone'];?>
    </td>
    <td>
<?php echo $index['address'];?>
    </td>
    
    <td>
<?php
$bid=$index['bid'];
$query3="Select * from batch where bid='$bid'";
$res3=$con->query($query3);
$row3=mysqli_fetch_assoc($res3);
$cid=$row3['cid'];
$query4="select * from course where cid='$cid'";
$res4=$con->query($query4);
$row4=mysqli_fetch_assoc($res4);

echo $row4['cname'];?>
    </td>
    
    <td>
<?php echo $row3['bname'];?>
    </td>
    
    <td>
    
      <a class="btn btn-danger nav-link " href="student_delete.php?sid=<?php echo $index["sid"]; ?>">Delete</a>
      
   
    </td>
</tr>
<?php } ?>

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
<?php
require('footer.php');
?>
</body>
</html>