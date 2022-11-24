<?php
  //  require_once ('nav.php');
  session_start();
  include("functions.php");
  include("connection.php");

  $user_data=check_login($con);

  $uid=$user_data['uid'];


  $querry="select cid from course where uid='$uid'";
  $result=$con->query($querry);



    
   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body{
  font-family: 'Nunito', sans-serif;
padding:10px;
background:#F5F5F5;
}
/* .card{
    border-radius: 4px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
      transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
  padding: 14px 80px 18px 36px;
  cursor: pointer;
}

.card:hover{
     transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
}

.card h3{
  font-weight: 600;
} */


/* .btn {
    margin: 10%;
    text-align: center;
}

.btn:hover {
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 55px;
    text-align:center;
    border: none;
    background-size: 300% 100%;

    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;

} */


.card {
  position: relative;
  min-width: 300px;
  height: auto;
  overflow: hidden;
  border-radius: 15px;
  margin: 0 auto;
  padding: 40px 20px;
  box-shadow: 0 10px 15px rgba(0,0,0,0.3);
  transition: .5s;
  height:400px;
  width:200px;
}
.card:hover {
  transform:scale(1.1);
 
}
.card{
  background: #FDC830;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #F37335, #FDC830);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #F37335, #FDC830); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.card p {
  font-size:22px;
}
.card h5{
  color:#fff;
  font-weight:600;
  opacity: 1;
  font-size:20px;
  font-family:calibri;

}

.card:before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40%;
  background: rgba(255, 255, 255, .1);
  z-index: 1;
  transform: skewY(-5deg) scale(1.5);
}

.title .fa {
  color: #fff;
  font-size: 60px;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  text-align: center;
  line-height: 100px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, .1);
}
.title h2 {
  position: relative;
  margin: 20px 0 0;
  padding: 0;
  color: #fff;
  font-size: 28px;
  z-index: 2;
}
.price {
  position: relative;
  z-index: 2;
}
.price h4 {
  margin: 0;
  padding: 20px 0;
  color: #fff;
  font-size: 60px;
}
.option {
  position: relative;
  z-index: 2;
}
.option ul {
  margin: 0;
  padding: 0;
}
.option ul li {
  margin: 0 0 10px;
  padding: 0;
  list-style: none;
  color: #fff;
  font-size: 16px;
}
.card a {
  display: block;
  position: relative;
  z-index: 2;
  background-color: #fff;
  color: #000;
  width: 150px;
  height: 40px;
  text-align: center;
  margin: 20px auto 0;
  line-height: 40px;
  border-radius: 20px;
  font-size: 20px;
  cursor: pointer;
  text-decoration: none;
  /* box-shadow: 0 5px 10px rgba(0,0,0, .1); */
}
.card a:hover {
  color:#fff;

}
.btns{
  background: #667db6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

                          
    </style>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            
</head>
<body >
<?php
require('nav.php');
?>   
   <div class="container-fluid   p-3 mt-5 mb-5 rounded" style="margin-right:20px">
   <!-- <div class="container bg-light">
     <h3>Course of you</h3> 
   </div> -->
   <div class="row mb-5 bg-warning">
    <div class="col-6 ">   <h3 class="float-end" style="font-family: Brush Script MT;font-size:3rem;" > Batches</h3></div>
    <div class="col-6 "><a class="nav-link btn btns  w-25 mt-2 p-2  float-end mr-5 " style="color:white;"
    href="batch.php">Add Batch <i class="fa fa-plus" aria-hidden="true"></i></a></div>
   </div>

   
   <div class="row">

    <?php
  require_once "connection.php";
  // $cid=$_REQUEST['cid'];
  foreach($result as $index){
    $cid=$index['cid'];
  $result  = mysqli_query($con,"select * from batch where cid='$cid'");
  while($row = mysqli_fetch_array($result))
  {
    
  
  ?>
 
 <div class="col-3 " id="cols">
    <div class="card shadow w-100" style="height:auto;  border-top-left-radius: 15px;border-bottom-right-radius:15px">
  <div class="card-body"> 
<h5 class=" text-center mb-5" style="text-transfrom:uppercase; tex-capitalize" > <span style="color:#000;font-size:26px;border-bottom:2px solid #fff;font-family:sans-serif "> <?php echo $row['bname'] ?></span></h5>
 
    <p class="text-capitalize">Category: <?php echo $row['category'] ?></p>
   
   <h5>Start Date: <i><?php echo $row['day_from'] ?></i></h5>
    
 
    <h5 style="">End Date: <i></i> <?php echo $row['day_to'] ?></i></h5>
    <h5>Start Time: <i><?php echo $row['time_from'] ?></i></h5>
    
 
    <h5 style="">End Time: <i><?php echo $row['time_to'] ?></i></h5> 
    <h5 class="text-capitalize">Details: <i><?php echo $row['details'] ?></i></h5>
   
    
    
    <br>
    <br>
    <div class="row " style="color:black">
      <div class="col-6">

      <a class="btn btn-info nav-link w-75" href="edit_batch.php?bid=<?php echo $row["bid"]; ?>">Edit</a>
      </div>
      <div class="col-6">
      <a class="btn btn-danger nav-link w-75" href="batch_delete.php?bid=<?php echo $row["bid"]; ?>" onclick="alert('All the students in this batch will also be deleted')">Delete</a>
      </div>
    </div>
    
    
    </div>
</div>
  </div>
  <?php
  }}
  ?>
  
    </div>
</div>
</div>
<?php
require 'footer.php';
?>
</body>
</html>
<?php ?>