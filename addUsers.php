<?php
require 'connectiondb.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ONLINE EXAM APP - ADMIN</a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="admin.php">Exams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="makingExams.php">Make Paper</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="examMonitor.php">Monitor</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="dashboard.php">Dashbord</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="addUsers.php">Users</a>
        </li>

        <form action="" method="POST">
        <li><button name="btnlogOut" class="btn btn-primary">LogOut</button></li></form>
      </ul>
      <form method="GET" action="searchExamU.php" class="d-flex">
      <input class="form-control me-2" type="text" name="searchExam" placeholder="Search Exam" aria-label="Search">
      <button class="btn btn-outline-success" type="submit" value="search">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container"> 
 <h1 class="h1">Add Users</h1>


<div class="card" id="login" style="width: 35rem;">
  <!-- <img src="./images/login.png" class="card-img-top" width="10" height="10" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Add Users</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <form action="" method="post">

    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">User Name</label>
    <div class="col-sm-8">
      <input type="text" name="username" class="form-control" id="inputEmail">
    </div>
    </div>

    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-8">
      <input type="text" name="password" class="form-control" id="inputEmail">
    </div>
    </div>

    <div class="mb-3 row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" name="useremail" class="form-control" id="inputEmail">
    </div>
    </div>
    
    <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-8">
    <select name="Statusx" class="form-control">
      <option value="admin">Admin</option>
      <option value="student">student</option>
</select>
      <!-- <input type="text" name="userStatus" class="form-control" id="inputPassword"> -->
    </div>
  </div>
  <!-- <p></p> -->
   <button  name="btnAdd" class="btn btn-primary">Add</button> 
  
 
   </form>
  </div>
</div>

</div>



<?php
//php echo $message 
if(isset($_POST['btnAdd']))
{

  $iddName = mysqli_real_escape_string($conn,$_POST['Statusx']);

    $Username = $_POST['username'];
    $UserEmail = $_POST['useremail'];
    $UserPW = $_POST['password'];
    // $UserStatus= $_POST['userStatus'];


    $query = "INSERT INTO `user`(`UserName`, `UserPw`, `UserEmail`, `UserStatus`) 
    VALUES ('$Username','$UserPW','$UserEmail ','$iddName')";
    $statement = $conn ->prepare($query); 

    $statement ->execute();
    echo '<script>alert("User Added")</script>';
		
}
else
{

}


?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>