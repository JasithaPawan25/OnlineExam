<?php
require 'connectiondb.php';
session_start();


if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page =1;
}

    $num_per_page=1;
    $start_from=($page -1)*1;
    echo $start_from;
 
    // $query="SELECT * FROM `question` limit 0,5";
    // $result=mysqli_query($conn,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Document</title>
</head>
<body>

<?php

$query="SELECT * FROM `question`  WHERE `Exam_Eid`=38 
    ORDER BY Qid ASC limit $start_from,$num_per_page";
// WHERE `Exam_Eid`=38 ORDER BY Qid ASC";
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
?>
  
  <?php
  
    $pr_query="SELECT * FROM `question` WHERE `Exam_Eid`=38";
    $pr_result =mysqli_query($conn,$pr_query);
    $total_records=mysqli_num_rows($pr_result);
 //   echo $total_records;

    $total_page= $total_records/$num_per_page;
//    echo '<br>'.$total_page.'<br>';

    if($page>1)
    {
        echo "<a href='example.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>";

    }

    for($i=1;$i<$total_page;$i++)
    {
      //  echo "<a href='example.php?page=".$i."' class='btn btn-primary'>".$i."</a>";
    }

    if($i>$page)
    {
        echo "<a href='example.php?page=".($page+1)."' class='btn btn-primary'>Next</a>";

    }
    
    
  
  
  
  ?>

<!-- Display the countdown timer in an element -->
<p id="demo"></p>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
</body>
</html>