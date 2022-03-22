<?php
  require_once "connectiondb.php";
  
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php

$message = '';
$status ="";
if(isset($_POST["btnlogin"]))
{
  $username = $_POST["username"];
  $password = $_POST["userpw"];

 // echo $username;
  //$message = 'Invalid UserName or Password';
  $query = "SELECT * FROM user WHERE UserEmail = '$username' AND UserPw = '$password' ";
  $result =mysqli_query($conn,$query);

  if(mysqli_num_rows($result)>0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $status = $row["UserStatus"];

      if($row["UserStatus"]=="admin")
      {
          $_SESSION['LoginUser'] = $row["UserName"];
        //  $_SESSION['loginUser'] = $row["UserName"];
        header('location:admin.php');

      }
      else
      {
          $_SESSION['LoginUser'] = $row["UserName"];
        //  $_SESSION['loginUser'] = $row["UserName"];
        header('location:index.php');

      }

    }
  }
  else
  {
    $message = 'Invalid UserName or Password';
  }


}
echo $status;

?>









  <div class="container"> 
 <h1 class="h1">Welcome to School Online Exam Application</h1>


<div class="card" id="login" style="width: 35rem;">
  <!-- <img src="./images/login.png" class="card-img-top" width="10" height="10" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">LOGIN</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <form action="" method="post">
    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" name="username" class="form-control" id="inputEmail">
    </div>
    </div>
    
    <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-8">
      <input type="password" name="userpw" class="form-control" id="inputPassword">
    </div>
  </div>
  <p><?php echo $message ?> </p>
   <button name="btnlogin" class="btn btn-primary">Login</button> 
   <!-- <a href="signup.php"><button class="btn btn-primary">Register</button></a>  -->
 
   </form>
  </div>
</div>

</div>

<!-- <?php

// if(isset($_POST["btnlogin"]))
// {
//   $username = $_POST["username"];
//   $password = $_POST["userpw"];

//  // echo $username;
//   $message = 'Invalid UserName or Password';
// }

//?>
 -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

<style>
#login {
  margin-left: 25%;
  margin-top: 15%;
}
.h1
{
  margin-left: 20%;
  margin-top: 5%;
  font-family: 'Times New Roman', Times, serif;
  font: bolder;
}
body
{
  background-color: #e3f1f9;
}

</style>