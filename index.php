<?php
require 'connectiondb.php';
session_start();
if(!isset($_SESSION['LoginUser']))
{
  header("location:login.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExamSchedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ONLINE EXAM APP - STUDENT</a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link" aria-current="page" href="exams.php">Exams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="makingExams.php">Make Paper</a>
        </li> -->

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
          <a class="nav-link " href="examPaper.php"><h5>Face Exam&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></a>
        </li>
 <!--
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Dashbord</a>
        </li>-->
      

      <form action="" method="POST">
        <li><button name="btnlogOut" class="btn btn-primary">LogOut</button></li></form>
        </ul> 

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<?php


if(isset($_POST['btnlogOut']))
{
 unset($_SESSION['LoginUser']);
    header("location:login.php");
}
?>


<style>
  .d-flex 
  {
    margin-left: 45%;
  }
</style>




<div class="container">
    <br><br>
    <h2><var>Exam Table</var></h2>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Exam</th>
      <th scope="col">Start Time</th>
      <th scope="col">Duration(Minutes)</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

  <?php


date_default_timezone_set('Asia/Colombo');

$dateNow = date("Y-m-d H:00:00");
$date = date("Y-m-d");
$hour =  date('G');
echo $hour;
echo '<br>';
// CURDATE();

$today= date('Y-m-d');


$query="SELECT * FROM `exam` WHERE `SDate`='$dateNow' ORDER BY Eid DESC";
$connect =mysqli_query($conn,$query);
$data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
// $stmt=$conn->prepare($query);
// $stmt->execute();
// $result = $stmt-> fetchAll();
foreach($data as $value)
{
  echo "<tr>";
      echo"	<td>".$value['Eid']."</td>";	
			echo"	<td>".$value['ExamName']."</td>";
			echo"	<td>".$value['SDate']."</td>";
		 echo"	<td>".$value['Duration']."</td>";
			echo"	<td>".$value['Examcol']."</td>";
       echo"</tr>";

}
?>


  </tbody>
</table>

</div>
 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>