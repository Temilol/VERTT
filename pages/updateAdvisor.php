<?php
  //  start session
   session_start();
  
  // redirect back to the login screen if the session is empty
  if(empty($_SESSION)){
     echo '<script type="text/javascript">alert("You need to be logged in");</script>'; 
     header("refresh:0; url=../login.html");
     die();
  }

  // Extract Input
  extract($_POST);

  // Check if the studentID exist in the session
  if(isset($_SESSION["advisorID"])){
    $advisorID = $_SESSION["advisorID"];
  }

  // call the database config file
  require_once('../config/mysqli_connect.php');

  // Check if the students has any transcript record
  // Create SQL query
  $query = "UPDATE advisor SET firstName='$firstName',middleName='$middleName',lastName='$lastName',advisorNumber='$phoneNumber',advisorLocation='$officeLocation' WHERE advisorID='$advisorID'";
  $result = mysqli_query($conn, $query);

  print_r($result);
  if($result < 1){
    echo '<script type="text/javascript">alert("Something went wrong. Please try again");</script>';
    header("refresh:0; url={$_SERVER["HTTP_REFERER"]}");
    die();
  }else{
    //update session information
    $_SESSION['firstName'] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["advisorNumber"] = $phoneNumber;
    echo '<script type="text/javascript">alert("Information updated successfully.");</script>';
    header("refresh:0; url=../pages/advisorHomepage.php");
    die();
  }
?>