<?php
error_reporting(0);
require 'connectiondb.php';
session_start();






$query="SELECT * FROM `exam` WHERE `Examcol`='Active'";
$connect =mysqli_query($conn,$query);
$data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
// $stmt=$conn->prepare($query);
// $stmt->execute();
// $result = $stmt-> fetchAll();
foreach($data as $value)
{
  $Examid = $value['Eid'];
  $ExamDuration= $value['Duration'];
}
 //T

$ExamDuration;

$examMinutes=$ExamDuration*60;
$examMinutes;
// if($examMinutes=0)
// {
//   echo 'good';
// }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="
   php echo $examMinutes -->

    <!-- url=http://localhost/OnlineExam/index.php" --> 
    <title>E-Paper</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ONLINE EXAM APP</a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     

    <form method="GET" action="search.php" class="d-flex">
      <input class="form-control me-2" type="text" name="searchExam" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit" value="search">Search</button>
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

$loginUser = $_SESSION['LoginUser'];
echo $loginUser;
?>




<?php

 
// if($examMinutes=0){
//   $query="UPDATE `exam` SET `Examcol`='Closed' WHERE `Examcol`='Active'";
// $connect =mysqli_query($conn,$query);
// }

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
   $ExamDuration= $value['Duration'];
   $ExamName =$value['ExamName'];
  //Time :" . $daateNow." &nbsp&nbsp&nbsp&nbsp&nbsp
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
     echo "   <h2>Student Name - ".$loginUser."</h2></var>";
     echo "    <var><h4>  Exam Time : ".$value['Duration']."mins </h4>";
    //  echo "    <h2>Exam Time : ".$value['Duration']."</h2>";
     echo "    <h2>Time Left :<div id=response> </div></h2>";
 
 }

// echo $Examid;
// echo $ExamDuration;

date_default_timezone_set('Asia/Colombo');

 $_SESSION['duration']=$ExamDuration;
echo $ExamDuration;
$_SESSION['start_time']=date("Y-m-d H:i:s");
 $end_time= date('Y-m-d H:i:s', strtotime("+".$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));
$_SESSION['end_time']=$end_time;


// $end_time= date('Y-m-d H:i:s', strtotime("+".$_SESSION['duration'].'minutes'));
//  $end_time=($_SESSION['duration']);

?>



<h2><div id=response></div></h2>
<script type="text/javascript">
setInterval(function()
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","response.php",false);
    xmlhttp.send(null);
    document.getElementById("response").innerHTML=xmlhttp.responseText;
  },1000);




</script>


<?php

// $query2="SELECT * FROM `user` WHERE `UserStatus`='student'";
// $connect =mysqli_query($conn,$query2);
// $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);

// foreach($data as $value)
// {
//   $Userid = $value['Uid'];
//   $UserNme = $value['UserName'];
// }
// echo '<br>
// <br>
// <br><br>';
// echo $Userid;
// echo $UserNme;




?>



    

        <style>
          a:link{
            text-decoration: none;
            
          }
        </style>




<form action="" method="POST">
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
  // ['.$value['Qid'].']
    foreach($data as $value)
    {
      $quizID= $value['Qid'];
      $Examid = $value['Exam_Eid'];
    

    echo  '  <h5 class="card-title">Q.'.$value['Quiz'].'</h5>
          
        <label class="container">';
     echo '   <input type="radio"  name="quizcheck['.$quizID.']" value="'.$value['Choice_i'].'"    >'.$value['Choice_i'].' ';

     echo '    </label>
      
        <label class="container">
        <input type="radio"  name="quizcheck['.$quizID.']" value="'.$value['Choice_ii'].'">'.$value['Choice_ii'].'

        </label>';

        echo '     <label class="container">
        <input type="radio"  name="quizcheck['.$quizID.']" value="'.$value['Choice_iii'].'">'.$value['Choice_iii'].'

        </label>

        <label class="container">
        <input type="radio" name="quizcheck['.$quizID.']"  value="'.$value['Choice_iv'].'" >  '.$value['Choice_iv'].'
        
        </label>';


      //   if ($_POST[$quizID] == $value["Answer"])
      //   {
      //  echo 'Got it';
      //   }


        
        // <?php echo"'. $value['Qid'].'" 
       //name="quizcheck['.$quizID.']"
        // echo $value['Answer'];

      //   echo $value['Qid'];

  
    }

    

    
// if(isset($_POST['submit']))
//     {
//         if(!empty($_POST['quizcheck']))
//         {
//             $count = count($_POST['quizcheck']);

//             echo "Error";
//             echo "Out of 5, You have anwsered".$count.",questions"; 
//         }
//         echo "Error";
//     }



  ?>

  <style>
    #radio1
    {
    display:none}
  </style>

 







   <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button> 
  <!-- <br> <br><button class="btn btn-primary">Submit</button>  -->
  <br><br>
  <!-- <button type="button" name="submit"  value="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Submit
</button> -->
  </div>
</div>

</div>

</form>

    </div>








    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->

<?php







if(isset($_POST['submit']))
{
  echo $ExamName;
  print_r($_POST['quizcheck']);


  // echo $quizID;
 

  $query="SELECT * FROM `question` WHERE `Exam_Eid`=$Examid ORDER BY Qid ASC";
  $connect =mysqli_query($conn,$query);
 
  $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);

  $i=0;
  $quizCounter=0;
  $NumofQs=0;
  // $result=0;
  // $CorrectAns = 0;
  // $WrongAns = 0;
  // $count =0;
  
  foreach($data as $value)
  {
    $result=0;
    $CorrectAns = 0;
  	$WrongAns = 0;
    $count =0;
    

    echo '<br> '.$value['Qid'].'  '.$value['Answer'].'  <br>  ';
    //  echo ' '.$value['Answer'].'<br>'; 
   // $numbOfQiz = count($value['Qid']);



    // echo ($numbOfQiz);




        if ($_POST['quizcheck']!=NULL)
        {



    //       $CorrectAns = 0;
  	// $WrongAns = 0;
    // $count =0;
          //  $checked =$_POST['quizcheck'][$value['Qid']][$i] == $value['Answer'];

    // if($checked)
    // {
    //   $result++;
    // }
    // $i++;
  
    
    

          // while ($count <= 3) {

            $countt=count($_POST['quizcheck']);


           


            // while ($count <= 3) {

                            if ($_POST['quizcheck'][$value['Qid']] == $value['Answer'])
                            {
                             echo 'Correct Answer';
                              $CorrectAns++;

                               $i++;
                            }
                            else
                            {
                             echo 'Wrong Answer';
                              $WrongAns ++;	

                              $quizCounter++;
                            }
                          
                          //   $count++;

                          // }




                        //   $NumofQs = $CorrectAns + $WrongAns;
                        // $Total = ($CorrectAns / $NumofQs) * 100;
                        // echo $Total;

        //$count++;

         
        





        }
        else
        {
          echo '<script>alert("Please Select the Answers")</script>';
            echo' <script language="Javascript">';
            // echo'  window.location = "admin.php";';
            echo'  </script>';
        }






    // $count++;

  //    $count;
    
  //  $NumofQs = $CorrectAns + $WrongAns;
  //  $Total = ($CorrectAns / $NumofQs)*100;
  //  echo $Total;
  //  $TotalArr=array($Total);
  //  print_r(array_count_values($TotalArr));

 
   

  //  for ($CorrectAns = 0; $CorrectAns <= 3; $CorrectAns++) {
  //   echo "The number is: $CorrectAns <br>";
  // }

  //  echo '<br>'.$NumofQs.'';



  //  echo $i;
    // echo $CorrectAns;


   

  }

  // $NumofQs = $CorrectAns + $WrongAns;
  // $Total = ($CorrectAns / $NumofQs)*100;
  // echo $Total;
  // $TotalArr=array($Total);
  // print_r(array_count_values($TotalArr));

 // print_r(array_count_values($TotalArr));
// print_r(count($TotalArr));

    $NumofQss = $i + $quizCounter;
    $toTotal = ($i / $NumofQss)*100;

echo ($NumofQs);
  echo '<br>Your marks'.$toTotal.'<br>';
  echo '<br>Quiz Counter'.$NumofQss.'<br>';

  echo 'your Score is '.$i.'';
  echo '<br>your have answered'.$countt.'';

  // $NumofQs = $CorrectAns + $WrongAns;
  // $Total = ($CorrectAns / $NumofQs);
  // echo $Total;
  // echo '<br>'.$NumofQs.'';

  // echo $result;

  // echo $CorrectAns;
  // $countAllMarks=count($CorrectAns) ;
  // $countAllMarks=count($tTotal);
 // echo sizeof($tTotal);


  // $NumofQs = $CorrectAns + $WrongAns;
  //   $Total = ($CorrectAns / $NumofQs) * 100;
  //   echo $Total;



  // $NumofQs = $CorrectAns + $WrongAns;
  // $Total = ($CorrectAns / $NumofQs) * 100;
  //echo $Total;


}





?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <?php echo $ExamName;?></h5>
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
<?php
// $ss='http-equiv';
// if ($sss="refresh")
// {
//     $query="UPDATE `exam` SET `Examcol`='Closed' WHERE `Examcol`='Active'";
// $connect =mysqli_query($conn,$query);

// }


?>