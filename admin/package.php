<?php
     session_start();
     include("function.php");
     include("connect.php");
   
     $user_data=check_login($con);
   
     $uid=$user_data['uid'];
   

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $pname=$_POST["pname"];
    
  
    
    $query2="select * from package where pname='$pname'  and uid='$uid'";
    if(mysqli_num_rows($con->query($query2))==0){
      $query="INSERT into package  (pname,uid) values ('$pname','$uid')";
      
      if($con->query($query))
      
        header("Location: registration_pay.php") ;
      else  
        echo "NOT INSERTED";
    }else{
      echo"ALready paid";
      header("Location: ../notverified.php");
    }

  }


    
   ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/pack.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<form action="" method="POST" style="width:100%">


  <div class="wrapper">
  
    <div class="table basic">
      <div class="price-section">
        <div class="price-area "  >
          <div class="inner-area" style="background-color:orange">
            <span class="text">Rs.</span>
            <span class="price">1000</span>
          </div>
        </div>
      </div>
      <div class="package-name"></div>
      <ul class="features">
        <li>
          <span class="list-name" >3 months Package</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Unlimited Courses</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Unlimited Batches</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">No Discount Offers</span>
          <span class="icon cross"><i class="fas fa-times"></i></span>
        </li>

        
      </ul>
      <!-- <input type="text" name="pname"> -->
    
      <!-- <input type="text" name="ptype"> -->
      <!-- <div class="btn"> <a class=" button " value="3"  style="text-decoration:none" href="registration_pay.php?uid=<?php echo $row["uid"]; ?>">Purchase</a></div> -->
 <div class="btn"><button class="button" value="3" name="pname">Purchase</button></div>
    </div>
    <div class="table premium">
      <div class="ribbon"><span>Recommend</span></div>
      <div class="price-section">
        <div class="price-area">
          <div class="inner-area">
            <span class="text">Rs.</span>
            <span class="price">1800</span>
          </div>
        </div>
      </div>
      <div class="package-name"></div>
      <ul class="features">
      <li>
          <span class="list-name">6 months Package</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Unlimited Courses</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Unlimited Batches</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Rs.200 Discount </span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
      </ul>
      <!-- <div class="btn"> <a class=" button " style="text-decoration:none" href="registration_pay.php?uid=<?php echo $row["uid"]; ?>">Purchase</a></div> -->
      <div class="btn"><button class="button" value="6" name="pname">Purchase</button></div>
    </div>
    <div class="table ultimate">
      <div class="price-section">
        <div class="price-area">
          <div class="inner-area">
            <span class="text">Rs.</span>
            <span class="price">3300</span>
          </div>
        </div>
      </div>
      <div class="package-name"></div>
      <ul class="features">
      <li>
          <span class="list-name">12 months Package</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Unlimited Courses</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Unlimited Batches</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Rs.700 Discount </span>
      <span class="icon check"><i class="fas fa-check"></i></span>
</li>
      </ul>
      
    
      <!-- <div class="btn"> <a class=" button " style="text-decoration:none" href="registration_pay.php?uid=<?php echo $row["uid"]; ?>">Purchase</a></div> -->
      <div class="btn"><button class="button" value="12" name="pname">Purchase</button></div>
    </div>
  
  </div>
  </form>
</body>
</html>