<?php
$username = "your_username";
$password = "your_password";
$database = "your_database";
$studentId = "studentId";
$creditHours = "creditHours";
$mysqli = new mysqli("localhost", $username, $password, $database);
@mysql_select_db($database) or die( "Unable to select database");
$query = "select creditHours from transcript where studentId = '$studentId' )";
/*(- need to add a field for courseHoursTaken)  or select (sum)courseUnit AS "$creditHours" where studentID ='$studentID'; */
$mysqli->query($query);
$mysqli->close();
?>