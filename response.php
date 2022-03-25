<?php
session_start();
date_default_timezone_set('Asia/Colombo');
$from_time1=date('Y-m-d H:i:s');
//$to_time1=date("00:00:00");
$to_time1=$_SESSION['end_time'];


$timefirst =strtotime($from_time1);
$timesecond=strtotime($to_time1);


$differenceinseconds=$timesecond-$timefirst;
echo gmdate("H:i:s",$differenceinseconds);
if($differenceinseconds==0)
{   
    echo '<script>alert("Exam Over")</script>';
    echo' <script type="text/javascript">
    window.location.replace="index.php";
  </script> ';
}

?>