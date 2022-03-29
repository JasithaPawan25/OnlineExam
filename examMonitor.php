<?php
require 'connectiondb.php';
 error_reporting(0);
session_start();




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ONLINE EXAM APP</a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="admin.php">Exams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="makingExams.php">Make Paper</a>
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
          <a class="nav-link active" href="examMonitor.php">Monitor</a>
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

<?
 $quy="SELECT * FROM `exam` WHERE `Examcol` ='Active' ORDER BY Eid DESC";
 $connect =mysqli_query($conn,$quy);
 $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
 foreach($data as $value)
 { 
  $Examid=$value['Eid'];
  $ExamDurationss=$value['Duration'];
 }

 echo $Examid;
 echo $ExamDurationss;

 if($ExamDurationss!=0)
 {
   echo 'sdsd';
 }


?>





<?php



 $query="SELECT * FROM `exam` WHERE `Examcol` ='Active' ORDER BY Eid DESC  ";
 $connect =mysqli_query($conn,$query);
 $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
 // $stmt=$conn->prepare($query);
 // $stmt->execute();
 // $result = $stmt-> fetchAll();


 
 foreach($data as $value)
 { 
  $ExamDuration= $value['Duration'];
      $Activeid=$value['Eid'];
      $DeActiveid=$value['Eid'];
      $ExamName =$value['ExamName'];
      $startTime = $value['SDate'];
   //$value['Eid'] =$Activeid;
  //  echo "<tr>";
  //      echo"	<td>".$value['Eid']."</td>";	
  //      echo"	<td>".$value['ExamName']."</td>";
  //      echo"	<td>".$value['SDate']."</td>";
  //      // echo"	<td>".$value['Duration']."</td>";
  //      echo"	<td>".$value['Examcol']."</td>";
  //      // echo"	<td>".$value['Examcol']."</td>";
  //      echo "<td><form method='POST'>
  //      <button name='btnActive' class='btn btn-primary' value='".$Activeid."'>Open</button></td>;
  //      <td><button name='btnDeActive' class='btn btn-primary' value='".$DeActiveid."'>Close</button></form></td>";
  //      echo"</tr>";
 
       //  echo $Activeid;
      
        
 
 }
 ?>



<?php

date_default_timezone_set('Asia/Colombo');

 $_SESSION['duration']=$ExamDuration;
// echo $ExamDuration;
$_SESSION['start_time']=date("Y-m-d H:i:s");
 $end_time= date('Y-m-d H:i:s', strtotime("+".$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));
$_SESSION['end_time']=$end_time;


?>

<?php

if($ExamDuration!=0)
{
   $ExamDurations=$ExamDuration*60*1000;

?>

<h2><div id=reponse></div></h2>
<script type="text/javascript">
setInterval(function()
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","response.php",false);
    xmlhttp.send(null);
    document.getElementById("response").innerHTML=xmlhttp.responseText;
  },1000);


  function redirectpage()
  {
    window.location="admin.php";
    <?php
    $query="UPDATE `exam` SET `Examcol`='Closed' WHERE `Examcol`='Active'";
    $connect =mysqli_query($conn,$query);
    ?>
  }
  setTimeout('redirectpage()',<?php echo $ExamDurations ?>);


</script>


<?php


$queryAllstudent="SELECT `Uid` FROM `user` WHERE `UserStatus` ='student'";

  $connect =mysqli_query($conn,$queryAllstudent);
  $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
  foreach($data as $value)
 { 
  //  echo $value['Uid'];
  

 }

 $rowcount = mysqli_num_rows($connect);
//  printf("Total rows in this table :  %d\n", $rowcount);


  // if( $connect =mysqli_query($conn,$queryAllstudent))
  // {
  //   $rowcount = mysqli_num_rows($connect);

  //   printf("Total rows in this table :  %d\n", $rowcount);
    
  // }

//  $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);

// $Allstudents= count(mysqli_num_rows($data))



// $sql = "SELECT * from building";

// if ($result = mysqli_query($con, $sql)) {

    // Return the number of rows in result set
    // $rowcount = mysqli_num_rows( $result );
    
    // Display result
    // printf("Total rows in this table :  %d\n", $rowcount);
 

?>

<?php

$queryExamdidstudent="SELECT  `User_Uid` FROM `user_exam` WHERE `Exam_Eid` ='$Activeid'";


  $connect =mysqli_query($conn,$queryExamdidstudent);
  $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
  foreach($data as $value)
 { 
    $studentfinished=$value['User_Uid'];
    echo $studentfinished;
  

 }

 $rowcountExamdidstudent = mysqli_num_rows($connect);
//  printf("Total rows in this table :  %d\n", $rowcountExamdidstudent);



?>



<div class="container">
    <br>
    <h1><?php echo  $ExamName ?></h1>

<div class="form1">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Exam Completed</label>
  <!-- <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> -->
    <h2><?php echo $rowcountExamdidstudent?>/<?php echo $rowcount ?></h2>
</div>


<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Time Left</label>
  <!-- <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder"> -->
    <h2><div id=response></div></h2>

    <!-- <script type="text/javascript">
setInterval(function()
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","response.php",false);
    xmlhttp.send(null);
    document.getElementById("response").innerHTML=xmlhttp.responseText;
  },1000);


</script> -->
</div>

</div>

<div class="form1">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Satrt Time</label>
  <!-- <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"> -->
  <h2><?php echo $startTime?></h2>
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Duration(Mins)</label>
  <!-- <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder"> -->
    <h2><?php echo $ExamDuration?></h2>
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">End Time</label>
  <!-- <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder"> -->
    <h2>--/--</h2>
</div>

</div>

<?php

echo $studentfinished;
echo $Activeid;
echo ' <div class="form2">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label"><h2>Student Attendance</h2></label>';
 
      

$queryStudentFinished="SELECT  `User_Uid` FROM `user_exam` WHERE `Exam_Eid` =".$Activeid."";
$connect =mysqli_query($conn,$queryStudentFinished);
$data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
foreach($data as $value)
{

  // echo '<label class="container"><h3><em>'.$value['User_Uid'].'</em></h3></label>';

  $studentfinishedd=$value['User_Uid'];

$queryStudentFinished="SELECT  `UserName` FROM `user` WHERE `Uid` =".$studentfinishedd."";

// echo ' <div class="form2">
// <div class="mb-3">
//   <label for="formGroupExampleInput" class="form-label"><h2>Student Attendance</h2></label>';
 
      
 
 
  $connect =mysqli_query($conn,$queryStudentFinished);
  $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
  foreach($data as $value)
 {
   // echo $value['UserName'];
// echo'<input type="readonly" class="form-control" value="'.$value['UserName'].'" id="formGroupExampleInput" placeholder="Example input placeholder">';
echo '<label class="container"><h3><em>'.$value['UserName'].'</em></h3></label>';

 }
}

 echo '</div>';

 echo '<form method="POST"> <button class="btn btn-outline-success" type="submit">End the Exam</button>
 </button></div>';


 if(isset($_POST['submit']))
 {
  echo '<script>alert("Exam End:)")</script>';
  echo' <script language="Javascript">';
  echo'  window.location = "index.php";';
  echo'  </script>';

  
      $query="UPDATE `exam` SET `Examcol`='Closed' WHERE `Examcol`='Active'";
      $connect =mysqli_query($conn,$query);
 }





?>


<!-- <div class="form2">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Student Attendance</label>
  <input type="readonly" class="form-control" value="sdsdsd" id="formGroupExampleInput" placeholder="Example input placeholder">
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">

</div>

<button class="btn btn-outline-success" type="submit">End the Exam</button>
</div>

</div> -->
  
<?php
}
else
{
  echo '<div class="container"><h1>No Exam to Mointor</h1></div>';
}
?>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
<style>
.form1
{
    padding: 10px;
    margin-top: 5%;    
    width: 25%;
    border-style: double ;
    border-color: #d7dee2;
}

.form2
{
    padding: 10px;
    margin-top: -40.5%;   
    margin-left: 30%; 
    width: 25%;
    height: 400px;
    border-style: double ;
    border-color: #d7dee2;
}
</style>