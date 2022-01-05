<?php

include("dbase.php");

//Dapatkan Tarikh Dan Masa Masuk
extract( $_POST );
$date = date("d-m-Y", time());
$time = date("H:i:s", time());
$query = "INSERT INTO student (date,time,category,title,announcement) VALUES('$date','$time','$category','$title','$announcement')";

if (mysqli_query($conn, $query)) {
      
   echo "<script type='text/javascript'> window.location='display.php' </script>";
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}




?>