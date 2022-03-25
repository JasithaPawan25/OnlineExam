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
    <title>Home</title>

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
          <a class="nav-link active" aria-current="page" href="admin.php">Exams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="makingExams.php">Make Paper</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="examMonitor.php">Monitor</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="dashboard.php">Dashbord</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="addUsers.php">Users</a>
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

      <?php


      if(isset($_POST['btnlogOut']))
      {
      unset($_SESSION['LoginUser']);
          header("location:login.php");
      }
      ?>




<main>
    <div class="container">
    <br><br><h2>Search Result</h2>
    </div>
    <div class="container">
    <table class="table">
    
  <thead>
    <tr>
      <th scope="col">ExamID</th>
      <th scope="col">Exam</th>
      <th scope="col">Last Updated</th>
      <th scope="col">Status</th>
      <th scope="col">Active Exam</th>
      <th scope="col">Close Exam</th>
    </tr>
  </thead>
  <tbody>

  <?php

if(($_GET['searchExam']))
{
 //echo $_GET['searchExam'];
  $SearchID =$_GET['searchExam'];



//   $query="SELECT `PID`, `pCode`, `pName`, `pCategory`,
//                      `pPrice`, `pCover`, `pDescription` FROM `product`
//                       WHERE(`pName` LIKE '%".$SearchID."%') 
//                       OR (`pDescription` LIKE '%".$SearchID."%')";
$queryy ="SELECT `Eid`, `ExamName`, `SDate`, `Duration`, `Examcol`
 FROM `exam` WHERE (`ExamName` LIKE '%".$SearchID."%')";


//$query="SELECT * FROM `exam` ORDER BY Eid DESC";
$connect =mysqli_query($conn,$queryy);
$data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
// $stmt=$conn->prepare($query);
// $stmt->execute();
// $result = $stmt-> fetchAll();


foreach($data as $value)
{ 
     $Activeid=$value['Eid'];
     $DeActiveid=$value['Eid'];
  //$value['Eid'] =$Activeid;
  echo "<tr>";
      echo"	<td>".$value['Eid']."</td>";	
			echo"	<td>".$value['ExamName']."</td>";
			echo"	<td>".$value['SDate']."</td>";
			// echo"	<td>".$value['Duration']."</td>";
			echo"	<td>".$value['Examcol']."</td>";
      // echo"	<td>".$value['Examcol']."</td>";
      echo "<td><form method='POST'>
      <button name='btnActive' class='btn btn-primary' value='".$Activeid."'>Open</button></td>;
      <td><button name='btnDeActive' class='btn btn-primary' value='".$DeActiveid."'>Close</button></form></td>";
      echo"</tr>";

      //  echo $Activeid;
     
       

}


}
?>

<?php


?>
   
  </tbody>
</table>

    </div>
</main>
<?php



if(isset($_POST['btnActive']))
{
  echo $_POST['btnActive'];
  $Acid =$_POST['btnActive'];
    $query="UPDATE `exam` SET `Examcol`='Active' WHERE Eid =".$Acid."";
$connect =mysqli_query($conn,$query);
// echo '<script>alert("Exam Activate")</script>';

echo '<script>alert("Exam Activate")</script>';
        echo' <script language="Javascript">';
        echo'  window.location = "admin.php";';
        echo'  </script>';

}
?>

<?php
if(isset($_POST['btnDeActive']))
{
  echo $_POST['btnDeActive'];
  $DeAcid =$_POST['btnDeActive'];
    $query="UPDATE `exam` SET `Examcol`='Closed' WHERE Eid =".$DeAcid."";
$connect =mysqli_query($conn,$query);
// echo '<script>alert("Exam Activate")</script>';

echo '<script>alert("Exam Closed")</script>';
        echo' <script language="Javascript">';
        echo'  window.location = "admin.php";';
        echo'  </script>';

}

?>
   

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>

<style>
.table 
{
    margin-top: 3%;
}
</style>