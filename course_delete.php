<?php
require('connection.php');
$cid=$_REQUEST['cid'];
$query = "DELETE FROM batch where cid in (select cid from course WHERE cid=$cid)" ;
$querys = "delete from course where cid=$cid"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
$results = mysqli_query($con,$querys) or die ( mysqli_error());
header("Location: view_course.php"); 
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