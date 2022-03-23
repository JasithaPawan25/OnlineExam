<?php
require 'connectiondb.php';
session_start();
// include 'index.php';

// if(isset($_GET['btnfaceExam']))
// {
//   date_default_timezone_set('Asia/Colombo');

// $dateNow = date("Y-m-d H:i:s");;

// echo "Time the button was clicked : ". $dateNow."<br>";

// $date = date("Y-m-d");
// $hour =  date('G');
// echo $hour;
// echo '<br>';
// // CURDATE();

// $today= date('Y-m-d');

// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Paper</title>

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
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
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

        <!-- <li class="nav-item">
          <a class="nav-link " href="examMonitor.php">Monitor</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Dashbord</a>
        </li>
      </ul> -->

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<style>
  .d-flex 
  {
    margin-left: 75%;
  }
</style>

<?php



 date_default_timezone_set('Asia/Colombo');
 
 $dateNow = date("Y-m-d H:i:s");;
 //echo "Time is now :" . $dateNow."<br>";

 $date = date("Y-m-d");
 $hour =  date('G');
//  echo $hour;
//  echo '<br>';
 // CURDATE();
 
 $today= date('Y-m-d');
 
 
 $query="SELECT * FROM `exam` WHERE `Examcol`='Active'";
 $connect =mysqli_query($conn,$query);
 $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
 // $stmt=$conn->prepare($query);
 // $stmt->execute();
 // $result = $stmt-> fetchAll();
 foreach($data as $value)
 {
   $Examid = $value['Eid'];
  
  //  echo "<div class='container' >";
  //      echo "<h1>".$value['ExamName']."</h1>";	
      //  echo ".$value['ExamName']."";
      //  echo ".$value['SDate']."";
      // echo ".$value['Duration']."";
      //  echo ".$value['Examcol']."";
      //   echo"</tr>";
     echo " <br>";
     echo " <div class='container' >";
    //  echo "    <var><h4> Time :" . $dateNow." </h4>";
     echo "    <var><h1> <a href='index.php'> < </a>";
          
     echo "   ".$value['ExamName']."</h1></var>";
     echo "    <var><h4> Time :" . $dateNow." &nbsp&nbsp&nbsp&nbsp&nbsp Exam Time : ".$value['Duration']."mins </h4>";
    //  echo "    <h2>Exam Time : ".$value['Duration']."</h2>";
     echo "    <h2>Time Left : --/--</h2>";
 
 }

echo $Examid;




?>


<?php

$query2="SELECT * FROM `user` WHERE `UserStatus`='student'";
$connect =mysqli_query($conn,$query2);
$data =mysqli_fetch_all($connect,MYSQLI_ASSOC);

foreach($data as $value)
{
  $Userid = $value['Uid'];
  $UserNme = $value['UserName'];
}
echo $Userid;
echo $UserNme;




?>



    

        <style>
          a:link{
            text-decoration: none;
            
          }
        </style>





    <div class="quizpaper">
        <div class="card" id="questions" style="width: 35rem;">
  <!-- <img src="./images/login.png" class="card-img-top" width="10" height="10" alt="..."> -->
  <div class="card-body">

  <?php

    $query="SELECT * FROM `question` WHERE `Exam_Eid`=$Examid ORDER BY Qid ASC";
    $connect =mysqli_query($conn,$query);
    $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);

    //SELECT `Qid`, `Quiz`, `Choice_i`, `Choice_ii`, `
    // Choice_iii`, `Choice_iv`, `Answer`, `Exam_Eid` FROM 
    // `question` WHERE 1

    foreach($data as $value)
    {

    echo  '  <h5 class="card-title">Q."'.$value['Quiz'].'"</h5>
          
        <label class="container">
        <input type="radio" value="one" name="fav_nub" >"'.$value['Choice_i'].'"

        </label>

        <label class="container">
        <input type="radio" value="two" name="fav_nub" >"'.$value['Choice_ii'].'"

        </label>

        <label class="container">
        <input type="radio" value="three" name="fav_nub" >"'.$value['Choice_iii'].'"

        </label>

        <label class="container">
        <input type="radio" value="four" name="fav_nub" >"'.$value['Choice_iv'].'"

        </label>';
    }



  ?>

    <!-- <h5 class="card-title">Q.Who are you?</h5>
  
  <label class="container">
  <input type="radio" value="one" name="fav_nub" >One
  <!-- <span class="checkmark"></span> -->
  <!-- </label>

  <label class="container">
  <input type="radio" value="two" name="fav_nub" >two
  
  </label>

  <label class="container">
  <input type="radio" value="three" name="fav_nub" >Three
  
  </label>

  <label class="container">
  <input type="radio" value="four" name="fav_nub" >four
  
</label> -->


<!-- <h5 class="card-title">Q.Who are you?</h5>
  
  <label class="container">
  <input type="radio" name="fav_numb"  >One
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >two
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >Three
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >four
  <span class="checkmark"></span>
</label> -->


<!-- <h5 class="card-title">Q.Who are you?</h5>
  
  <label class="container">
  <input type="radio" name="fav_numb" >One
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >two
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >Three
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >four
  <span class="checkmark"></span>
</label>

<h5 class="card-title">Q.Who are you?</h5>
  
  <label class="container">
  <input type="radio" name="fav_numb" value="One">One
  <span class=""></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" value="Two" >two
  <span class=""></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" value="Three" >Three
  <span class=""></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" value="Four" >four
  <span class=""></span>
</label> -->


<!-- <h5 class="card-title">Q.Who are you?</h5>
  
  <label class="container">
  <input type="radio" name="fav_numb" >One
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >two
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >Three
  <span class="checkmark"></span>
  </label>

  <label class="container">
  <input type="radio" name="fav_numb" >four
  <span class="checkmark"></span>
</label> --> 









   <!-- <button class="btn btn-primary">Login</button>  -->
  <!-- <br> <br><button class="btn btn-primary">Submit</button>  -->
  <br><br>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Submit
</button>
  </div>
</div>

</div>

    </div>


    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exam Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Exam Completed:
        <var><h1>PASSED</h1></var>
        <h2> A grade - 75</h2>

        <hr>

        Questions : <br><br>

        <pre>Question 1 <em>    Correct</em></pre> 
        <pre>Question 2    <em>Incorrect</em></pre>  
        <pre>Question 3    <em>Incorrect</em></pre>  
        <pre>Question 4    <em>Incorrect</em></pre> 
        <pre>Question 5    <em>Correct</em></pre>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>

<style>
    .quizpaper
    {
        margin-left: 20%;
    }
</style>