<?php
require('connection.php');
$bid=$_REQUEST['bid'];
// $query="select * from student where bid='$bid'";
// if($res=($con->query($query))){
//     foreach($res as $index){
        
//     }
// }
    


// $query = "DELETE FROM batch where cid in (select cid from course WHERE cid=$cid)" ;
$query = "delete from batch where bid=$bid"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: view_batch.php"); 
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