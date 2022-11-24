<?php
require('connection.php');
$sid=$_REQUEST['sid'];
$query = "DELETE FROM student where sid='$sid'" ;
// $querys = "delete from course where cid=$cid"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
// $results = mysqli_query($con,$querys) or die ( mysqli_error());
header("Location: view_student.php"); 
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
    
</body>
</html>