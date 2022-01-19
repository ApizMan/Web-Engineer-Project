<?php

include("dbase.php");

//Dapatkan Tarikh Dan Masa Masuk
extract( $_POST );

$student=$_POST['student'];

foreach($student as $cloneStd)  
   {  
      $std .= $cloneStd.",";  
   }
 
   $stdfinal .= rtrim($std, ',');

   $student=$_POST['supervisor'];

foreach($supervisor as $cloneSuper)  
   {  
      $super .= $cloneSuper.",";  
   } 

   $superfinal .= rtrim($super, ',');

   $evaluator=$_POST['evaluator'];

foreach($evaluator as $cloneEva)  
      {  
         $Eva .= $cloneEva.",";  
      } 
   
      $Evafinal .= rtrim($Eva, ',');

$date = date("Y-m-d", time());
$time = date("H:i:s", time());

if($query=mysqli_query($conn,"INSERT INTO userclass (date, time, supervisor, student, evaluator, faculty, className) VALUE ('$date','$time','$superfinal', '$stdfinal', '$Evafinal', '$faculty', '$className')")){
      
   echo "<script type='text/javascript'> window.location='index.php' </script>";
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}