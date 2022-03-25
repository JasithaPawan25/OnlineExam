<?php
require 'connectiondb.php';
session_start();

if(isset($_SESSION['name']))
{
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];

}else{
    $name =[];
    $age =[];
}

if (isset($_POST['name']))
{
    $name[] = $_POST['name'];
    $age[] = $_POST['age'];
}

$_SESSION['name'] =$name;
$_SESSION['age'] = $age;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    name - <input type="text" name="name"><br>
    age - <input type="number" name="age"><br>
    <input type="submit" value="submit"><br>

    <?php
        $count=0;
        foreach($name as $key=>$value)
        {
            $count++;
            print "<br>$count: $name[$key] , $age[$key]";
        }

    ?>


    </form>
<?php
    if(isset($_POST['btnActive']))
{

  $query="UPDATE `exam` SET `Examcol`='Active' WHERE Eid =".$Activeid."";
$connect =mysqli_query($conn,$query);


//   try
//   {
  // echo '.$Activeid.';
// } catch (Exception $th) {
//   echo $th;
//   }
 // echo $r;
}
?>

<!-- Display the countdown timer in an element -->
<p id="demo"></p>

<?php

?>

<script>
// Set the date we're counting down to
// var countDownDate = new <?
// php echo strtotime("15:37:25")
?>;

// // Update the count down every 1 second
// var x = setInterval(function() {

//   // Get today's date and time
//   var now = new Date().getTime();

//   // Find the distance between now and the count down date
//   var distance = countDownDate - now;

//   // Time calculations for days, hours, minutes and seconds
//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   // Display the result in the element with id="demo"
//   document.getElementById("demo").innerHTML = days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";

//   // If the count down is finished, write some text
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("demo").innerHTML = "EXPIRED";
//   }
// }, 1000);
// </script>
    
</body>
</html>