<?php
require_once('../config/mysqli_connect.php');

$myArray = $_REQUEST['propScheduleArray'];

 foreach($myArray as $key=> $myArray){
   mysqli_query($db,"INSERT INTO proposalSchedule (courseID, courseID1, courseID2, courseID3) VALUES(" . 
    mysql_real_escape_string($myArray) .")");

echo $myArray;

?>