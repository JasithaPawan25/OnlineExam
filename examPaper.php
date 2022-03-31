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
  $Examidi = $value['Eid'];
  $ExamDuration= $value['Duration'];
}

 //T

// $ExamDuration;

// $examMinutes=$ExamDuration*60;
// $examMinutes;
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
    <!-- <meta http-equiv="refresh" content="<?php echo $examMinutes?>,url=http://localhost/OnlineExam/index.php"> -->
   <!-- php echo $examMinutes -->

    <!-- url=http://localhost/OnlineExam/index.php" --> 
    <title>E-Paper</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">ONLINE EXAM APP</a>
    
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
echo $Examidi;


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

 if($ExamDuration!=0)
 {
    echo 'fdfdf';
 
 
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


$ExamDurations=$ExamDuration*60*1000;

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



  function redirectpage()
  {
    window.location="index.php";
    <?php
    // $query="UPDATE `exam` SET `Examcol`='Closed' WHERE `Examcol`='Active'";
    // $connect =mysqli_query($conn,$query);
    ?>
  }
  setTimeout('redirectpage()',<?php echo $ExamDurations; ?>);

 








</script>





<?php 




    $examMinutes=$ExamDuration*60*1000;
    echo $examMinutes;


?>



<script>
  //  function redirectpage()
  //  {
  //     window.location="index.php";
  //  }setTimeout(redirectpage(),$end_time)
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

<?php




 ?>

 

<form action="newpage.php?rowid=<?php echo $Examidi?>" method="POST">
    <div class="quizpaper">
        <div class="card" id="questions" style="width: 35rem;">
  <!-- <img src="./images/login.png" class="card-img-top" width="10" height="10" alt="..."> -->
  <div class="card-body">

  <?php
  

    $query="SELECT * FROM `question` WHERE `Exam_Eid`=$Examid ORDER BY Qid ASC ";
    $connect =mysqli_query($conn,$query);
    $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);

    //SELECT `Qid`, `Quiz`, `Choice_i`, `Choice_ii`, `
    // Choice_iii`, `Choice_iv`, `Answer`, `Exam_Eid` FROM 
    // `question` WHERE 1
    $r=0;
  // ['.$value['Qid'].']
    foreach($data as $value)
    {
      $quizID= $value['Qid'];
      $Examid = $value['Exam_Eid'];


      echo '<div id="sliderset">';
      echo'<div class="slideshow-container">
  
            <div class="mySlides">';
    

    echo  '  <h5 class="card-title">Q.'.$value['Quiz'].'</h5>
          
        <label class="container">';
     echo '   <input type="radio"  name="quizcheck['.$quizID.']" value="'.$value['Choice_i'].'" onclick="radioclick(this.value, echo '.$quizID.')" '; 
     
    
     
     
    echo ' >'.$value['Choice_i'].' ';

       


     echo '    </label>
      
        <label class="container">
        <input type="radio"  name="quizcheck['.$quizID.']" value="'.$value['Choice_ii'].'"  ';
      
        echo ' >'.$value['Choice_ii'].'

        </label>';

        echo '     <label class="container">
        <input type="radio"  name="quizcheck['.$quizID.']" value="'.$value['Choice_iii'].'" ';
  
        echo '>'.$value['Choice_iii'].'

        </label>

        <label class="container">
        <input type="radio" name="quizcheck['.$quizID.']"  value="'.$value['Choice_iv'].'"  ';
    
        echo '    >  '.$value['Choice_iv'].'
        
        </label>';

        echo'</div>';
        echo'</div>';

      //   if ($_POST[$quizID] == $value["Answer"])
      //   {
      //  echo 'Got it';
      //   }


        
        // <?php echo"'. $value['Qid'].'" 
       //name="quizcheck['.$quizID.']"
        // echo $value['Answer'];

      //   echo $value['Qid'];

      $r++;
  
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

echo '  <a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>';







  ?>

  <style>
    #radio1
    {
    display:none}
  </style>

 





<!-- <button type="submit" name="btnsave" value="submit" class="btn btn-primary">Submit</button>  -->


 <button type="submit" name="submit" value="submit"  class="btn btn-primary">
 
<a href="newpage.php?rowid=<?php echo $Examidi?>"></a>Submit </button>
   
   <?php
  
   
//    $pr_query="SELECT * FROM `question` WHERE `Exam_Eid`=$Examid";
//    $pr_result =mysqli_query($conn,$pr_query);
//    $total_records=mysqli_num_rows($pr_result);
//  //   echo $total_records;
 
//    $total_page= $total_records/$num_per_page;
//     echo '<br>'.$total_page.'<br>';
 
//    if($page>1)
//    {
   //  echo '<div class="container"><label id="Back" class="container">';
      //  echo " <form method='POST'><button type='submit' name='btn_next'> <a href='examPaper.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>  </button>";
    //   echo '</form></div></div>';
  //  }

   
 
  //  for($i=1;$i<$total_page;$i++)
  //  {
  //      echo "<a href='examPaper.php?page=".$i."' class='btn btn-primary'>".$i."</a>";
  //  }
 
  //  if($i>$page)
  //  { 
    // echo '<div class="container"><label id="Next" class="container">';
      //  echo "<form method='POST'><button type='submit' name='btn_next'><a href='examPaper.php?page=".($page+1)."' class='btn btn-primary'>Next</a></button>";
    //   echo '</form></div></div>';
  //  }
   
   
   ?>

  
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





    <?php
  
  // $pr_query="SELECT * FROM `question` WHERE `Exam_Eid`=$Examid";
  // $pr_result =mysqli_query($conn,$pr_query);
  // $total_records=mysqli_num_rows($pr_result);
//   echo $total_records;

  // $total_page= $total_records/$num_per_page;
//    echo '<br>'.$total_page.'<br>';

  // if($page>1)
  // {
  //  echo '<div class="container"><label id="Back" class="container">';
   //   echo " <form method='POST'><button type='submit' name='btn_next'> <a href='examPaper.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>  </button>";
   //   echo '</form></div></div>';
  // }

  // for($i=1;$i<$total_page;$i++)
  // {
    //  echo "<a href='example.php?page=".$i."' class='btn btn-primary'>".$i."</a>";
  // }

  // if($i>$page)
  // { 
  //  echo '<div class="container"><label id="Next" class="container">';
    //  echo "<form method='POST'><button type='submit' name='btn_next'><a href='examPaper.php?page=".($page+1)."' class='btn btn-primary'>Next</a></button>";
   //   echo '</form></div></div>';
  // }

//  echo '<form method="POST"><button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button></form>'; 




?>

<style>
  #Next
  {
    margin-left: 50%;
    margin-top: 50px;
  }

  #Back
  {
    margin-top: 50px;
    
    margin-left: 10%;
  }
</style>












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
  echo '<br>Your marks'.$toTotal.'%<br>';
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
     <?php echo $loginUser?> Exam Completed:
        <var><h1>PASSED
          <?php
          if($toTotal>40)
          {
            echo 'PASSED';
          }
          else{
            echo 'FAIL';
          }
          ?>
        </h1></var>
        <h2><?php echo $toTotal ?></h2>

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

<?php
 }
 else
 {
   echo '<div class="container"><h1>No Exam </h1></div>';
 }
?>






 

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


<style>
* {box-sizing: border-box}
body {margin:0}

#sliderSet
{
  margin-top: 200px;
}

/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;

}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}
</style>


<!-- <div class="slideshow-container">

<div class="mySlides">
  <q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
  <p class="author">- John Keats</p>
</div>

<div class="mySlides">
  <q>But man is not made for defeat. A man can be destroyed but not defeated.</q>
  <p class="author">- Ernest Hemingway</p>
</div>

<div class="mySlides">
  <q>I have not failed. I've just found 10,000 ways that won't work.</q>
  <p class="author">- Thomas A. Edison</p>
</div> -->

<!-- <a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div> -->

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>




