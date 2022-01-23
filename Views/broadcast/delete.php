<?php
require_once "dbase.php";
$Count = count($_POST["student"]);
for($i=0;$i<$Count;$i++) {
mysqli_query($conn, "DELETE FROM student WHERE id='" . $_POST["student"][$i] . "'");
}
header("Location:index.php");

mysqli_close($conn);
?>