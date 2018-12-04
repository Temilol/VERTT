<?php
  // Start the session
  session_start();

  // call the database config file
  require_once('../config/mysqli_connect.php');

  // The if and else are used by ajax to call the corresponding function
  if (isset($_POST['callFunc'])) {
    $test = $_POST['callFunc'];
    $query = "SELECT prerequisiteID FROM prerequisites WHERE courseID = '$test'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) < 1){//Class has no prerequisites
        $grade = 'P';
    }else{
      $prerequisites = mysqli_fetch_assoc($result);
      
      $prerequisiteID = $prerequisites['prerequisiteID'];
      $query = "SELECT courseGrade FROM transcript WHERE courseCode = '$prerequisiteID'";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) < 1){//If the student has taken no prerequisites
        $grade = 'F';
      }else{//If the student has taken the prerequisites
        $data = mysqli_fetch_assoc($result);
        $courseGrade = $data['courseGrade'];
        $grade = 'F';
        switch ($courseGrade) {
          case "A":
            $grade = 'P';
            break;
          case "B":
            $grade = 'P';
            break;
          case "C":
            $grade = 'P';
            break;
          default:
        }
     }
    }
    echo json_encode($grade);
  }
  else if (isset($_POST['intelSchd'])) {
    $propSchd = $_POST['intelSchd'];
    $studentID = $_SESSION['studentID'];
    
    //Query questionnaire record
    $query = "SELECT * FROM questionnaire WHERE studentID = '$studentID'";
    $result = mysqli_query($conn, $query);
    $questRecord = mysqli_fetch_assoc($result);
    $coding = $questRecord['code']; //get coding value
    $studyHour = $questRecord['studyHour'];
    $comments[] = "Check the courses the system recommends in the Recommedation catalog.";
    
    $totalScore = $questRecord['totalScore']; //get the student questionnaire score
    if($totalScore > 15 && $totalScore <= 19){
      $suggestedHour = 6;
    }else if($totalScore > 12 && $totalScore <= 14){
      $suggestedHour = 9;
    }else if($totalScore > 8 && $totalScore <= 11){
      $suggestedHour = 12;
    }else{
      $suggestedHour = 15;
    }
    $comment1 = "Based on your response in the questionnaire, you are recommended to take ".$suggestedHour." credit hours for this semsester.";
    $comments[] = $comment1;
    
    // Set concetration course comments
    if($coding == "Yes"){
      $comment2 = "Since you like coding, we recommend you taking WEB DESIGN classes or PROGRAMMING/CODING classes";
    }else{
      $comment2 = "Since you don't like coding, we recommend you taking CYBERSECURITY classes";
    }
    $comments[] = $comment2;
    
    // Set student study comments
    if(($studyHour == 'Full Time') && ($suggestedHour < 12)){
      $comment3 = 'We recommend you switching to PART-TIME instead of FULL-TIME';
    }
    $comments[] = $comment3;
    
    // Get the curriculum records.
    $query = "SELECT * FROM courses WHERE {$_SESSION['semester']} = 1";
    $result = mysqli_query($conn, $query);
    
    // While loops through every course
    while ($curriculum = mysqli_fetch_assoc($result)){
     $curriculumCode[] = $curriculum['courseCode'];
     $curriculums[] = $curriculum;
    }
    
    // Check if the students has any transcript record
    // Create SQL query
    $query = "SELECT * FROM transcript WHERE studentID = '$studentID'";
    $result = mysqli_query($conn, $query);

    // Get the students profile
     // While loops through every class
     while ($transcript = mysqli_fetch_assoc($result)){
       $transcriptCode[] = $transcript['courseCode'];
       $transcripts[] = $transcript;
     }
    
     if(mysqli_num_rows($result) < 1){
       $courseCodeRemaining = $curriculumCode;
       $courseRemaining = $curriculums;
     }else if(mysqli_num_rows($result) == 1){
       $courseCodeRemaining = array_diff($curriculumCode, $transcriptCode);
       $courseRemaining = array_diff($curriculums, $transcripts);
     }else{
       $courseCodeRemaining = array_diff($curriculumCode, $transcriptCode);
       $courseRemaining = array_diff($curriculums, $transcripts);
     }
         
    // Generate the course based on the number of hours we suggested
     $totalUnit = 0;
     foreach($courseCodeRemaining as $courseCode):
      // Create SQL query
      $query = "SELECT * FROM courses WHERE courseCode = '$courseCode'";
      $result = mysqli_query($conn, $query);
      $courses = mysqli_fetch_assoc($result);
      $totalUnit = $totalUnit + $courses['courseUnit'];
      if($totalUnit > $suggestedHour){//if the total unit is more than the suggested unit then break the loop
        break;
      }
      $suggestedCourses[] = $courses;
     endforeach;
//      print_r($comments);
     $response['comments'] = $comments;
     $response['courses'] = $suggestedCourses;
    echo json_encode($response);
  }
?>