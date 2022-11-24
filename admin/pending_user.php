<?php
require_once ('admin_nav.php');
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

    <div class="container-fluid">
      <h1 class="text-center">User of System</h1>
      <div class="container shadow ">
    <table class="table table-bordered p-3" >

  <thead>
    <tr class="bg-primary text-white">
      <th>User id</th>
      <th scope="col">User Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Registerd Date</th>
      <th>Approved Students</th>
      
   
    </tr>
  </thead>
  <tbody>
 
  
      <?php
 include "connect.php";
//   $bid=$_REQUEST['bid'];
  $result  = mysqli_query($con,"select * from user where account_type='guide' and status=''");
  while($row = mysqli_fetch_array($result))
  {
    ?>
    <tr>
    <th ><?php echo $row['uid'] ?></th>
      <th ><?php echo $row['uname'] ?></th>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['Login_date'] ?></td>
      <!-- <td> <Button class="btn btn-primary">Enable</Button>
      <Button class="btn btn-primary">Disable</Button></td> -->
      <!-- <td></td> -->
<td> <form action="pending_user.php" method="POST">
            <input type="hidden" name="uid" value="<?php echo $row['uid'];?>" >
           <input type="submit" id="b1" class="btn btn-success"name="approve" value="Approve"/> 
           <input type="submit" id="b2"  class="btn btn-danger" name="deny" value="Deny"/>
            
        </form></td>
    </tr>





 
    <?php
    if(isset($_POST['approve']))
    {
        $uid = $_REQUEST['uid'];
       
        $select ="UPDATE user SET status = 'approved' where uid = '$uid'and account_type='guide'";
        $result = mysqli_query($con,$select);
       
        echo '<script>';
    
        echo 'alert("approved");';
        echo 'window.location.href = "admin_approval.php"';
        echo '</script>';
    
    }
    if(isset($_POST['deny']))
    {
        $uid = $_POST['uid'];
        $select ="UPDATE user set status = 'deny' where uid = '$uid' AND account_type='guide'";
        $result = mysqli_query($con,$select);
        echo '<script>';
    
        echo 'alert("deny");';
        echo 'window.location.href = "admin_deny.php"';
        echo '</script>';
    }
}
?> 
  </tbody>
</table>
    </div>
</div> 
  <script>
    // function approve_reject(val,uid){
    //   $.ajax({
    //     type:'post',
    //     url:'approve_advocate.php',
    //     data:{val:val,id:id},
    //     success:function(result)
    //     {
    //       if(result==1)
    //       {
    //         $('#str'+uid).html('approve');
    //       }
    //       else
    //       {
    //         $('#str'+uid).html('reject');
    //       }
    //     }
    //   })
    // }
  </script>
</body>
</html>