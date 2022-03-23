<?php
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
    
</body>
</html>