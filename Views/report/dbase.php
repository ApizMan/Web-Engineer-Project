<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$db_broadcast = "broadcast"; /* Database broadcast */
$db_userclass = "class"; /* Database User Class */
$db_calendar = "calendar"; /* Database Calendar */

$con_broadcast = mysqli_connect($host, $user, $password,$db_broadcast);
$con_userclass = mysqli_connect($host, $user, $password,$db_userclass);
$con_calendar = mysqli_connect($host, $user, $password,$db_calendar);

// Check connection
if ((!$con_broadcast) && (!$con_userclass) && (!$con_calendar)){
 die("Connection failed: " . mysqli_connect_error());
}