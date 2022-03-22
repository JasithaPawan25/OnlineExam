<?php
require "connectiondb.php";
session_start();



// unset($_SESSION['quiz']);

if(!isset($_SESSION['LoginUser']))
{
  header("location:login.php");

}


if(isset($_POST['btnlogOut']))
{
 unset($_SESSION['LoginUser']);
    header("location:login.php");
   
}




if(isset($_SESSION['quiz']))
{
  $quiz = $_SESSION['quiz'];
  $choice_i =  $_SESSION['choice_i'];
  $choice_ii =  $_SESSION['choice_ii'];
  $choice_iii =  $_SESSION['choice_iii'];
  $choice_iv =  $_SESSION['choice_iv'];
  $correct = $_SESSION['correct'];
}
else
{
  $quiz =[];
  $choice_i =[];
  $choice_ii =[];
  $choice_iii =[];
  $choice_iv =[];
  $correct = [];

}

if(isset($_POST['btnsave']))
{
  $quiz[] = $_POST['quiz'];
  $choice_i[] = $_POST['choice_i'];
  $choice_ii[] = $_POST['choice_ii'];
  $choice_iii[] = $_POST['choice_iii'];
  $choice_iv[] = $_POST['choice_iv'];
  $correct[] = $_POST['correct'];
}

 $_SESSION['quiz'] = $quiz;
 $_SESSION['choice_i'] = $choice_i;
 $_SESSION['choice_ii'] = $choice_ii;
$_SESSION['choice_iii'] = $choice_iii ;
$_SESSION['choice_iv'] = $choice_iv;
 $_SESSION['correct'] = $correct;



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Making</title>

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
          <a class="nav-link active" href="makingExams.php">Make Paper</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="examMonitor.php">Monitor</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="dashboard.php">Dashbord</a>
        </li>

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

<aside>
<div class="card" id="examQuiz" style="width: 35rem;">
  <!-- <img src="./images/login.png" class="card-img-top" width="10" height="10" alt="..."> -->
  <form action="" method="post">
  <div class="card-body">
    <h5 class="card-title"> <var> Type the Questions and Answers</var></h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    
    <div class="mb-3 row">
    <label for="inputText" class="col-sm-2 col-form-label">Question</label>
    <div class="col-sm-8">
      <input type="text" name="quiz" class="form-control" id="inputText">
    </div>
    </div>

    <div class="mb-3 row">
    <label for="inputAnswer" class="col-sm-2 col-form-label">Answers</label>
    <div class="col-sm-8">
      <input type="text" name="choice_i"  placeholder="Choice_1" class="form-control" id="inputAnswer">
      <input type="text" name="choice_ii" placeholder="Choice_2"  class="form-control" id="inputAnswer">
      <input type="text" name="choice_iii" placeholder="Choice_3"  class="form-control" id="inputAnswer">
      <input type="text" name="choice_iv" placeholder="Choice_4"  class="form-control" id="inputAnswer">
      <input type="text" name="correct" placeholder="Correct Answer"  class="form-control" id="inputAnswer">
    </div>
    </div>
    
   
   <button type="submit" name="btnsave" value="submit" class="btn btn-primary">Save</button> 
   <button  type="submit" name="btnClear" class="btn btn-primary">Clear</button>
  </div>

  <?php

// if(isset($_POST['btnsave'])) 
{
 
    # code...
    $r=0;
    $count=0;
    foreach($quiz as $key=>$value)
    {
     $count++;
     print "<br>$count: $quiz[$key],
      $choice_i[$key], $choice_ii[$key],
      $choice_iii[$key]
     , $choice_iv[$key], $correct[$key]";
     $r++;
    }

  }
// $count =0;
// foreach($quiz as $key=>$value)
// {
//  $count++;
//  print "<br>$count:$quiz[$key],$choice_i[$key],$choice_ii[$key],$choice_iii[$key]
//  ,$choice_iv[$key],$correct[$key]";
// }
?>


  </form>
</div>

<h2>

<?php

// if($correct == $choice_i || $correct == $choice_ii|| $correct == $choice_iii||
//  $correct == $choice_iv)
//  {



//   $count =0;
//  $r=0;
//   foreach($quiz as $key=>$value)
//     {
//       $count++;
  
//         echo "<br>* $quiz[$key],$choice_i[$key],$choice_ii[$key],$choice_iii[$key]
//     ,$choice_iv[$key],$correct[$key]";

//     $r++;
//     }
  
//  else
//  {
//    echo "Please Put Correct answer in Answer box";
//  }
 






// echo "</h2>";




if(isset($_POST['btnClear']))
{
  
  unset($_SESSION['quiz']);
 
   
}
?>






</aside>

<main>
<form action="" method="post">
<table class="table" id="exampaper">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Question</th>
      <th scope="col">Answers</th>
      <!-- <th scope="col">Handle</th> -->
    </tr>
  </thead>
  <tbody>
  

    <h2>

<?php






    $r=0;
    $count =0;
    foreach($quiz as $key=>$value)
    {
      $count++;


      echo "<tr>";
    echo '<th scope="row">'.$count.'</th>';
    echo "<td>".$quiz[$key]."</td>";
    echo "<td>".$choice_i[$key]."
      <br>".$choice_ii[$key]."
      <br>".$choice_iii[$key]."
    <br>".$choice_iv[$key]."
    <br>".$correct[$key]."(Correct Answer)</td>";

    echo "</tr>";
    
      


    $r++;
    }
 
 

?>



  
    

     
  </tbody>
  
  <td>  <input type="text" name="ExName" class="form-control" placeholder="Exam Name" id="inputAnswer"></td>
  <td>  <input type="datetime-local" name="doe" class="form-control" id="inputAnswer"></td>
  <td>  <input type="timer" name="timer" placeholder="time" class="form-control" id="inputAnswer"></td><br>
  <td colspan="3">   <button type="submit" name="btnPublish" class="btn btn-primary">Publish the Paper</button> </td>
</table>

</form>

<?php

if (isset($_POST['btnPublish']))
{
  // if(isset($_SESSION['quiz']))

  // {



  $EName = $_POST['ExName'];
  $EDate =$_POST['doe'];
  $ETimer =$_POST['timer'];

  $query1 = "INSERT INTO `exam`(`ExamName`, `SDate`, `Duration`, `Examcol`)
   VALUES ('$EName','$EDate',' $ETimer ','Active')";



  //  $query=mysqli_query($conn,$insert) or die (mysqli_error($conn));

   $stmt=$conn->prepare($query1);



   if($conn->query($query1))
   {
     $lastId = $conn->insert_id;
      $r=0;
      $ins='';
     foreach($quiz as $key=>$value)
     {
      $ins .="INSERT INTO `question`(`Quiz`, `Choice_i`,
      `Choice_ii`, `Choice_iii`, `Choice_iv`, `Answer`, `Exam_Eid`)
      VALUES ('".$quiz[$key]."' , 
            '".$choice_i[$key]."' ,
            '".$choice_ii[$key]."' ,
            '".$choice_iii[$key]."' ,
            '".$choice_iv[$key]."' ,
            '".$correct[$key]."' ,
                ".$lastId.");";
      $r++;
     }
     if($conn->multi_query($ins))
     {
       echo 'Record Saved';
     }
     else
     {
      echo 'Record not Saved';
     }


   }

// }

}
    



     
  

      
      
    

    
            //  if($mysqli->multi_query($ins))
            //  {
            //    echo 'Record Saved';
            //  }
            //  else
            //  {
            //   echo 'Record not Saved';
   


       

     
   




?>


<!-- $_SESSION['quiz'] = $quiz;
 $_SESSION['choice_i'] = $choice_i;
 $_SESSION['choice_ii'] = $choice_ii;
$_SESSION['choice_iii'] = $choice_iii ;
$_SESSION['choice_iv'] = $choice_iv;
 $_SESSION['correct'] = $correct; -->



</main>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>

<style>
    #examQuiz
    {
        width: 10%;
        
    }
    #exampaper
    {
        width: 50%;
        margin-top: -300px;
        margin-left: 45%;
    }

</style>