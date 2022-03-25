<?php
require 'connectiondb.php';
session_start();



echo "Hey !!! User";


    if(isset($_POST['submit']))
    {
        if(!empty($_POST['quizcheck']))
        {
           // echo $_POST['quizcheck'];

            echo  $quizID;
            $count = count($_POST['quizcheck']);

            echo "You have anwsered".$count.",questions"; 

            $selected =$_POST['quizcheck'];
            print_r($selected);

            // $q = "SELECT * from `question` Where `Answer`=$selected";
            // $connect =mysqli_query($conn,$q);
            //     $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
            //     foreach($data as $value)
            //     {
            //         print_r ($value['Answer']);
            //     }

        

            // foreach($data as $value)
            //     {
                 
            // print_r ($value['Qid']);
            //     }

            // $query2="SELECT * FROM `question` Where `Examcol`='Active'";
            //     $connect =mysqli_query($conn,$query2);
            //     $data =mysqli_fetch_all($connect,MYSQLI_ASSOC);
            //     foreach($data as $value)
            //     {
            //         print_r ($value['Qid']);
            //     }




        }
        // echo "Error";
    }

?>