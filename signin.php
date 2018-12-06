<!-- Signin.php -->
<!-- Validates your login credentials -->
<!-- VERTT Copyright 2018 -->
<?php

// Start Session
	session_start();

// Extract Input
  extract($_POST);

// Set the current semester
// Use the following values for its respective semester
// fallSem, springSem, summerSem.
  $_SESSION['semester'] = "fallSem";
    
// call the database config file
  require_once('config/mysqli_connect.php');

// Format Input
	$email = stripcslashes($email);
	$password = stripcslashes($password);
	$email = mysqli_real_escape_string($conn, $email);
	$password = mysqli_real_escape_string($conn, $password);

// Create SQL query;
   $query = "SELECT * FROM users WHERE username = '$email' AND password = '$password'";

   $result = mysqli_query($conn, $query);

   // Validate credentials
    if(mysqli_num_rows($result) < 1){//If no record found, print error and go back to login page
        echo '<script type="text/javascript">alert("Incorrect username or password");</script>';
        header( "refresh:0; url=login.html" );
        die();
    }

// If credentials are found
// Get session information from the database

// Check the user type
    $row = mysqli_fetch_assoc($result);

    $userType = $row["userType"];

// Check if the user is a student or advisor
    if($userType == "student"){//if student
      $query = "SELECT * FROM StudentProfile WHERE campusEmail = '$email'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) < 1){ //If no record found, print error and go back to login page
          echo '<script type="text/javascript">alert("Record Not Found");</script>';
          header( "refresh:0; url=login.html" );
          die();
      }
      $profile = mysqli_fetch_assoc($result);
      $_SESSION["firstName"] = $profile["firstName"];
      $_SESSION["lastName"] = $profile["lastName"];
      $_SESSION["email"] = $profile["campusEmail"];
      $_SESSION["studentID"] = $profile["studentID"];
      $_SESSION["advisorID"] = $profile["advisorID"];
     
    // Check if it is the student first time      
       $firstTime = $profile["firstTime"];
       if($firstTime == 0){ //Not First time Redirect to Student Homepage
          header("refresh:0; url=pages/homepage.php");
       }else if($firstTime == 1){
          echo '<script type="text/javascript">alert("You have to fill out the questionniare");</script>';
          header("refresh:0; url=pages/questionnaire.php");
       }
    }else if($userType == "advisor"){//if advisor
      $query = "SELECT * FROM advisor WHERE advisorEmail = '$email'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) < 1){ //If no record found, print error and go back to login page
          echo '<script type="text/javascript">alert("Record Not Found");</script>';
          header( "refresh:0; url=login.html" );
      }
      $profile = mysqli_fetch_assoc($result);
      $_SESSION["firstName"] = $profile["firstName"];
      $_SESSION["lastName"] = $profile["lastName"];
      $_SESSION["email"] = $profile["advisorEmail"];
      $_SESSION["advisorID"] = $profile["advisorID"];
      $_SESSION["advisorNumber"] = $profile["advisorNumber"];
      
      //Redirect to Advisor Homepage
      header("refresh:0; url=pages/advisorHomepage.php");
    }
?>