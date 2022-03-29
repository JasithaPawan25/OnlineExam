<?php
require 'connectiondb.php';
session_start();

?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">




    <!-- <div class="container">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-50" src="images\OIP.jpg" alt="First slide">
      <h1>tltlflflflflf</h1>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-50" src="images\cat.jpg" alt="Second slide">
      <h1>llllllllll</h1>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-50" src="images\view.jpg" alt="Third slide">
      <h1>ooooooo</h1>
    </div>
    </div> -->

   

  <!-- </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->


<?php


$query="SELECT * FROM `question` WHERE `Exam_Eid`=36 ORDER BY Qid ASC";
    $connect =mysqli_query($conn,$query);
    $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);

    //SELECT `Qid`, `Quiz`, `Choice_i`, `Choice_ii`, `
    // Choice_iii`, `Choice_iv`, `Answer`, `Exam_Eid` FROM 
    // `question` WHERE 1
    

   // $r=0;
  // ['.$value['Qid'].']
    foreach($data as $value)
    {
       $quizID= $value['Qid'];
    //   $Examid = $value['Exam_Eid'];

    // echo '  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    // <div class="carousel-inner">
    //   <div class="carousel-item active">
    //     <img class="d-block w-100 h-50" src="images\OIP.jpg" alt="First slide">';
  
    echo '<div id="sliderset">';
    echo'<div class="slideshow-container">

<div class="mySlides">';
  // <q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
  // <p class="author">- John Keats</p>';


    echo  '  <h5 class="card-title">Q.'.$value['Quiz'].'</h5>
          
        <label class="container">';
     echo '   <input type="radio"  name="quizcheck['.$quizID.']" value="'.$value['Choice_i'].'"'; 
     
    
    // if($answ==$value['Choice_i'])
    // {
    //  echo 'checked';
    // }  
     
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

        // echo '  <a class="prev" onclick="plusSlides(-1)">❮</a>
        // <a class="next" onclick="plusSlides(1)">❯</a>';

        echo'</div>';
      


       

//         echo '
//   <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
//     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
//     <span class="sr-only">Previous</span>
//   </a>
//   <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
//     <span class="carousel-control-next-icon" aria-hidden="true"></span>
//     <span class="sr-only">Next</span>
//   </a>
// </div>';



      //   if ($_POST[$quizID] == $value["Answer"])
      //   {
      //  echo 'Got it';
      //   }

  //  echo '  <a class="prev" onclick="plusSlides(-1)">❮</a>
  //     <a class="next" onclick="plusSlides(1)">❯</a>';

      echo'</div>';
        
        // <?php echo"'. $value['Qid'].'" 
       //name="quizcheck['.$quizID.']"
        // echo $value['Answer'];

      //   echo $value['Qid'];

   //   $r++;
  
    }

    echo '  <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>';

    


   




    
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

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->

<!-- <div class="container"> -->




<script>

var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
setInterval(setTime, 1000);

function setTime() {
  ++totalSeconds;
  secondsLabel.innerHTML = pad(totalSeconds % 60);
  minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
}

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}

</script>

<label id="minutes">00</label>:<label id="seconds">00</label>






<script>
      var sec = 0;
    function pad ( val ) { return val > 9 ? val : "0" + val; }
    setInterval( function(){
        $("#seconds").html(pad(++sec%60));
        $("#minutes").html(pad(parseInt(sec/60,10)));
    }, 1000);

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<span id="minutes"></span>:<span id="seconds"></span>




<script>
var timerVar = setInterval(countTimer, 1000);
var totalSeconds = 0;
function countTimer() {
           ++totalSeconds;
           var hour = Math.floor(totalSeconds /3600);
           var minute = Math.floor((totalSeconds - hour*3600)/60);
           var seconds = totalSeconds - (hour*3600 + minute*60);
           if(hour < 10)
             hour = "0"+hour;
           if(minute < 10)
             minute = "0"+minute;
           if(seconds < 10)
             seconds = "0"+seconds;
           document.getElementById("timer").innerHTML = hour + ":" + minute + ":" + seconds;
        }


        </script>

<div id="timer"></div>
<div id ="stop_timer" onclick="clearInterval(timerVar,1*60)">Stop time</div>





<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}

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
</head>
<body>

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

</body>
</html> 






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>





