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
    $totalScore = $questRecord['totalScore'];
    if($totalScore > 15 && $totalScore <= 19){
      echo "6 hrs";
    }else if($totalScore > 12 && $totalScore <= 14){
      
    }
    print_r($totalScore);
    die();
    echo json_encode($result);
//     echo intelSchdule($_POST['intelSchd']);
  }

  // This function takes a class from the transcript table and returns its grade
  function checkPreReq($classCode) {
		ob_start();
    //Query prerequisites record
    $query = "SELECT prerequisiteID FROM prerequisites WHERE courseID = '$classCode'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) < 1){//Class has no prerequisites
        $grade = 'P';
    }else if(mysqli_num_rows($result) == 1){
      $prerequisites = mysqli_fetch_assoc($result);
      return json_encode("Here");
      die();
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
    }else{//if prerequisites
			//store the code in an array
      while ($prerequisites = mysqli_fetch_assoc($result)){
        $prerequisites[] = $prerequisite['prerequisiteID'];
      }
      
      foreach($prerequisites as $prerequisiteID):
        //Query student transcript
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
        if($grade == 'F'){//Student failed one of the prerequisites, stop checking for other prerequisites
          break;
        }
      endforeach;
    }
    ob_end_clean();
      header('Content-Type: application/json');
        return json_encode($grade);	 // Return the grade
          exit();
  }

  // This function takes the proposed classCodes and performs Intelligent Analysis
  function intelSchdule($classCode){
// 		ob_start();
    $studentID = $_SESSION['studentID'];
    //Query questionnaire record
    $query = "SELECT * FROM questionnaire WHERE studentID = '$studentID'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) >= 1){//Student have not filled the prerequisites
        echo '<script type="text/javascript">alert("Student have not filled the questionnaire");</script>';
//         die();
    }else{
        echo '<script type="text/javascript">alert("Here");</script>';
    }
  }
?>