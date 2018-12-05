<?php

  // Start session
    session_start();

  // Extract Input
      extract($_POST);

  // Set student ID
    $studentID = $_SESSION['studentID'];

  // Validate the information and replace the empty with NULL
    if($working_hour == " "){
      $working_hour = "NULL";
    }
    if($children_number == " "){
      $children_number = "NULL";
    }
    if($children_age == " "){
      $children_age = "NULL";
    }
    if($children_help == " "){
      $children_help = "NULL";
    }

  // call the database config file
    require_once('../config/mysqli_connect.php');

  // perform the total calculation by calling a funtion
    $totalScore = performIntel($_POST);
    
  // Check if the student already exist in the database
  // Create SQL query;
   $query = "SELECT * FROM questionnaire WHERE studentID = '$studentID'";
   $result = mysqli_query($conn, $query);

   if(mysqli_num_rows($result) > 0){//The record already exists, update the existing record
     $query = "UPDATE questionnaire SET studyHour='$full_time',currentlyWorking='$working',workingHours='$working_hour',planningChildren='$children',numberOfChildren='$children_number',ageOfLastChild='$children_age',helpWithChildren='$children_help',expectedGraduationDate='$graduation_date',selfMotivated='$self_motivation',code='$coding_interest',needToImproveGPA='$improve_gpa',athlete='$athlete',extracurricular='$extra_cirricular',totalScore='$totalScore' WHERE studentID='$studentID'";
     $result = mysqli_query($conn, $query);
   }else{//The record doesn't exist, create a new record
      $query = "INSERT INTO questionnaire (questionID, studentID, concentration, studyHour, currentlyWorking, workingHours, planningChildren, numberOfChildren, ageOfLastChild, helpWithChildren, expectedGraduationDate, selfMotivated, code, needToImproveGPA, athlete, extracurricular, totalScore) VALUES ('', '$studentID', 'cyber-security', '$full_time', '$working', '$working_hour', '$children', '$children_number', '$children_age', '$children_help', '$graduation_date', '$self_motivation', '$coding_interest', '$improve_gpa', '$athlete', '$extra_cirricular', '$totalScore')";
      $result = mysqli_query($conn, $query);
   }

   if($result > 0){//The query was Successful
     $query = "UPDATE StudentProfile SET firstTime = '0' WHERE studentID = '$studentID'";
     $response = mysqli_query($conn, $query);
     if($response > 0){
         echo '<script type="text/javascript">alert("Your response has been saved");</script>'; 
         header("refresh:0; url=../pages/homepage.php");
     }else{
         echo '<script type="text/javascript">alert("Something went wrong. Please try again");</script>';
         header("refresh:0; url=../pages/questionnaire.php");
     }
   }else{//The query was Failed
         echo '<script type="text/javascript">alert("Cannot submit your questionnaire. Please try again");</script>';
         header("refresh:0; url=../pages/questionnaire.php"); 
   }

//This function calculates the total score of the student based on the questionnaire answered
  function performIntel($data){
    extract($data);
    //Set total score to 0
    $totalScore = 0;
    
    //Calculate working score
    if($working == "Yes"){ //working
      if($working_hour == "Yes"){ //working less than 20 hours
        $totalScore += 2;
      }else{ //working more than 20 hours
        $totalScore += 3;
      }
    }else{ //not working
      $totalScore += 0;
    }
    
    //Calculate children score
    if($children == "Yes"){ //have children
      $totalScore += 2;
      if($children_number == "Less than 5"){ //have less than 5 children
        $totalScore += 2;
      }else{ //have 5 and more children
        $totalScore += 5;
      }
      
      if($children_age == "0 - 12"){ //last child is between 0 and 12 years
        $totalScore += 5;
      }else{ //last child is above 12 years
        $totalScore += 3;
      }
      
      if($children_help == "Yes"){ //have help with child
        $totalScore += -1;
      }else{ //have no help with child
        $totalScore += 1;
      }
    }else{ //have no children
      $totalScore += 0;      
    }
    
    //Calculate self motivation score
    if($self_motivation == "Yes"){ //have self Motivation
      $totalScore += -1;
    }else{ //have no self Motivation
      $totalScore += 1;
    }
    
    //Calculate GPA improvement score
    if($improve_gpa == "Yes"){ //wants to improve GPA
      $totalScore += 2;
    }else{ //doesn't wants to improve GPA
      $totalScore += 0;
    }
    
    //Calculate athlete score
    if($athlete == "Yes"){//An athlete
      $totalScore += 3;
    }else{//Not an athlete
      $totalScore += 0; 
    }
    
    //Calculate extra curricular score
    if($extra_cirricular == "Yes"){//involved in extra curricular activities
      $totalScore += 2;
    }else{//not involved in extra curricular activities
      $totalScore += 0;
    }
    
    return $totalScore;
  }
?>