<!-- advisorReview.php -->
<!-- VERTT Copyright 2018 -->

<?php
  // start session
  session_start();

  // Extract Input
  extract($_POST);

  // call the database config file
  require_once('../config/mysqli_connect.php');

  //Get the student name
  $query = "SELECT firstName, lastName FROM StudentProfile WHERE studentID = '$studentID'";
  $result = mysqli_query($conn, $query);
  $stud = mysqli_fetch_assoc($result);
  $firstName = $stud['firstName'];
  $lastName = $stud['lastName'];
  // Check if the students has submitted any proposalSchedule
  // Create SQL query
  $query = "SELECT * FROM proposalSchedule WHERE studentID = '$studentID'";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) < 1){//No Student Transcript in the record
    echo '<script type="text/javascript">alert("Student have not submitted a request.");</script>';
    header("refresh:0; url={$_SERVER["HTTP_REFERER"]}");
    die();
  }

  $proposalSchedule = mysqli_fetch_assoc($result);
  //extract the fields
  $recomScheduleStr = $proposalSchedule['recommendedCourses'];
  $propScheduleStr = $proposalSchedule['proposedSchedule'];
  $sysCommentsStr = $proposalSchedule['comments'];
  $studentDecision = $proposalSchedule['studentDecision'];
// print_r($studentDecision);
// die();
  //CONVERTS STRING BACK TO ARRAY
  $recomScheduleArray = explode(",", $recomScheduleStr);
  $propScheduleArray = explode(",", $propScheduleStr);
  $sysComments = explode(";", $sysCommentsStr);

  //Get the proposedSchedule Course details
  foreach($propScheduleArray as $propSchClassCode):
    // Check for the details of the courses
    // Create SQL query
    $query = "SELECT * FROM courses WHERE courseCode = '$propSchClassCode'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) < 1){ //If no course is found, omit the course
      continue;
    }
    $propCourses[] = mysqli_fetch_assoc($result);
  endforeach;

  //Get the recommendedSchedule Course details
  foreach($recomScheduleArray as $recomSchClassCode):
    // Check for the details of the courses
    // Create SQL query
    $query = "SELECT * FROM courses WHERE courseCode = '$recomSchClassCode'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) < 1){ //If no course is found, omit the course
      continue;
    }
    $recomCourses[] = mysqli_fetch_assoc($result);
  endforeach;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="VERTT">
    <link rel="icon" href="favicon.ico">
    
    <title>VERTT - Final Verdict</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        .navbar-brand {
          transform: translateX(-40%);
          left: 50%;
          position: absolute;
        }
        .navbar-brand1 {
          transform: translateX(-200%);
          left: 50%;
          position: absolute;
        }
        .jumbotron1 {
          background-image: linear-gradient(to bottom,#2ba70a 0,orange 100%);
          border-color: orange;
		  
		 
        }
        .jumbotron2 {
          background-color: #D3D3D3;
          padding-top: 20px;
          padding-bottom: 25%;
          padding-left:30%;
          border-color: orange;
          max-height: auto;
          border: 2px solid #FFA500;
			  
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-edited{
          background-image: linear-gradient(to bottom,#238f07 0,orange 100%);
          border-color: orange;
          color: black;
          padding-left: 5%;
          padding-right: 5%;
        }
        .footer {
          position: absolute;
          bottom: 0;
          width: 100%;
          height: 50px; /* Set the fixed height of the footer here */
          line-height: 50px; /* Vertically center the text there */
          background-color: #f5f5f5;
        }

        .footer > .con {
          padding-right: 15px;
          padding-left: 15px;
        }

              .dual-list .list-group {

              margin-top: 8px;
          }

          .list-left li, .list-right li, list-end li {
              cursor: pointer;
          }

          .list-arrows {

          }

          .list-arrows button {
                  margin-bottom: 20px;
          }
		
          .well {
              background-image: linear-gradient(to bottom,#238f07 0,orange 100%);
              border-color: orange;
              color: black;
              padding-left: 5%;
              padding-right: 5%;
              height: 300px;
          }
			
			
          .list-group{
              max-height: 250px;
              min-height: 200px;
              margin-bottom: 10px;
              overflow:scroll;
              -webkit-overflow-scrolling: touch;
              overflow-y:auto; 
              overflow-x:auto;	
          }
		
	
          .list-group-item.active {
              z-index: 2;
              color: #red;
              background-color: #red;
              border-color: #255A31;
          }

    </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-default" style="border-color: orange;">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
            <a class="navbar-brand1"><img src="../asset/image/main/Famu_logo.png" alt="logo" style="width:40px;"></a>
            <a class="navbar-brand">VERTT</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="">Home<span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a>Welcome
                <?php 
                  if(isset($_SESSION["firstName"]) && isset($_SESSION["lastName"])){echo " ".$_SESSION["firstName"]." ".$_SESSION["lastName"];}
                    else{echo " Anonymous";}
                ?>
              </a></li>
              <li><a href="logOut.php">Log Out</a></li>
              <li><img src="../asset/image/main/icon.png" alt="logo" style="width:40px;"></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="container ">
      <div class="clear"></div>
      <div class="well jumbotron1" style="height: 40px;" ></div>
      <div class="jumbotron jumbotron2">
        <div class="well jumbotron1" style="height: 60px;" >
          <?php
            if($studentDecision == "accept"){
              echo"<p style='text-align: center'> {$firstName} {$lastName} have decided to go with VERTT recommeded schedule</p>";
            }else if($studentDecision == "reject"){
              echo"<p style='text-align: center'> {$firstName} {$lastName} have decided to go with their schedule</p>";
            }
          ?>
        </div>
        <div class="container" >
          <br />
          <div class="row-middle">

            <div id="tempProposedCourses" class="dual-list list-left col-md-4">
              <h3 style="text-align: center;"><?php echo"{$firstName} {$lastName}\n"; ?>Courses</h3>
                <div class="well ">
                  <div class="list-group-el">
                    <ul class="list-group">
                       <?php
                          foreach($propCourses as $propCourse):
                            echo "<li class='list-group-item'>{$propCourse['courseCode']} - {$propCourse['courseName']}</li>";
                          endforeach;
                       ?>
                    </ul>
                  </div>
                </div>
            </div>

            <div id="tempRecomdCourses"  class="dual-list list-right col-md-4">
              <h3 style="text-align: center;">VERTT Recommended Courses</h3>
              <div class="well">
                <ul class="list-group recommendedCourse">
                   <?php
                      foreach($recomCourses as $recomCourse):
                        echo "<li class='list-group-item'>{$recomCourse['courseCode']} - {$recomCourse['courseName']}</li>";
                      endforeach;
                   ?>
                </ul>
              </div>
            </div>

            <div class="dual-list list-end col-md-4">
              <h3 style="text-align: center;">VERTT Comments</h3>
                <div class="well">
                  <textarea class="form-control" rows="12" id="comment" readonly>
                   <?php
                      foreach($sysComments as $sysComment):
                        echo "\n{$sysComment}\n";
                      endforeach;
                   ?>
                  </textarea>
                </div>
            </div>
          </div>
        </div>
        
        <input name = "studentDecision" id = "studentDecision" type="hidden" value="<?php echo "{$studentDecision}"; ?>">
        <input name = "studentID" id = "studentID" type="hidden" value="<?php echo "{$studentID}"; ?>">

        <div class="list-arrows" style="margin-left: 38%;">
          <div class="clear"></div>
          <button type="button" id="btn-accept" class="btn btn-lg btn-success move-right btn-edited" name="Add">Accept</button>
          <button type="button" id="btn-reject" class="btn btn-lg btn-success move-left btn-edited" name="Remove" >Reject</button>
        </div>
      </div>
    </div>
	
    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
      $("#btn-accept").click(function(){
        var retVal = confirm("Are you sure you want to accept the student schedule?");
        if(retVal == true){
          var studentDecision = document.getElementById("studentDecision").value; //Get the student decision
          var studentID = document.getElementById("studentID").value; //Get the student decision
          var tempPropScheduleArray = []; // Array that will temporary hold the proposed schedule classes
          var propScheduleArray = []; // Array that will hold the finalised proposed schedule classes
          var temprecomScheduleArray = []; // Array that will hold the temporary proposed schedule classes
          var recomScheduleArray = []; // Array that will hold the finalised proposed schedule classes

          //Proposed Courses
          $("#tempProposedCourses li").each(function() { tempPropScheduleArray.push($(this).text()) }); // Add every class to the array
          for ( var x = 0; x < tempPropScheduleArray.length; x++){	
            tempPropScheduleArray[x] = tempPropScheduleArray[x].replace(/[\n\t\r]/g,"").trim(); // Remove all special characters and spaces from the list to array conversion
            var i = 0;
            propScheduleArray[x] = "";
            while(tempPropScheduleArray[x][i] != " "){ //Extract the course code from the string
              propScheduleArray[x] = propScheduleArray[x] + tempPropScheduleArray[x][i];
              i++;
            }
          }

          //Recommended Courses
          $("#tempRecomdCourses li").each(function() {temprecomScheduleArray.push($(this).text()) }); // Add every class to the array
          for(var x = 0; x < temprecomScheduleArray.length; x++){	
            temprecomScheduleArray[x] = temprecomScheduleArray[x].replace(/[\n\t\r]/g,"").trim(); // Remove all special characters and spaces from the list to array conversion
            var i = 0;
            recomScheduleArray[x] = "";
            while(temprecomScheduleArray[x][i] != " "){ //Extract the course code from the string
              recomScheduleArray[x] = recomScheduleArray[x] + temprecomScheduleArray[x][i];
              i++;
            }
          }
          
          var data = {'recomScheduleArray': recomScheduleArray, 'propScheduleArray': propScheduleArray, 'studentDecision': studentDecision, 'advisorDecision': 'accept', 'studentID': studentID};
          console.log(data);
          $.ajax({
            url: 'checkPreq.php', //Reference to the checkPreq.php page
            type: "POST", //References it after (post)
            dataType: 'json', //The type of data being used
            data: {"instStudScd": data}, //Call the function and use the array variable to execute
            async: false,
          });
          alert('Your response have been saved. A mail have been sent to the student');
          window.location.href = "advisorHomepage.php";
        }else{
          return false;
        }
      });
      
      
      $("#btn-reject").click(function(){
        var retVal = confirm("Are you sure you want to reject the student schedule?");
        if(retVal == true){
          var studentDecision = document.getElementById("studentDecision").value; //Get the student decision
          var studentID = document.getElementById("studentID").value; //Get the student decision
          var tempPropScheduleArray = []; // Array that will temporary hold the proposed schedule classes
          var propScheduleArray = []; // Array that will hold the finalised proposed schedule classes
          var temprecomScheduleArray = []; // Array that will hold the temporary proposed schedule classes
          var recomScheduleArray = []; // Array that will hold the finalised proposed schedule classes

          //Proposed Courses
          $("#tempProposedCourses li").each(function() { tempPropScheduleArray.push($(this).text()) }); // Add every class to the array
          for ( var x = 0; x < tempPropScheduleArray.length; x++){	
            tempPropScheduleArray[x] = tempPropScheduleArray[x].replace(/[\n\t\r]/g,"").trim(); // Remove all special characters and spaces from the list to array conversion
            var i = 0;
            propScheduleArray[x] = "";
            while(tempPropScheduleArray[x][i] != " "){ //Extract the course code from the string
              propScheduleArray[x] = propScheduleArray[x] + tempPropScheduleArray[x][i];
              i++;
            }
          }

          //Recommended Courses
          $("#tempRecomdCourses li").each(function() {temprecomScheduleArray.push($(this).text()) }); // Add every class to the array
          for(var x = 0; x < temprecomScheduleArray.length; x++){	
            temprecomScheduleArray[x] = temprecomScheduleArray[x].replace(/[\n\t\r]/g,"").trim(); // Remove all special characters and spaces from the list to array conversion
            var i = 0;
            recomScheduleArray[x] = "";
            while(temprecomScheduleArray[x][i] != " "){ //Extract the course code from the string
              recomScheduleArray[x] = recomScheduleArray[x] + temprecomScheduleArray[x][i];
              i++;
            }
          }
          
          var data = {'advisorDecision': 'reject', 'studentID': studentID};
          console.log(data);
          $.ajax({
            url: 'checkPreq.php', //Reference to the checkPreq.php page
            type: "POST", //References it after (post)
            dataType: 'json', //The type of data being used
            data: {"delStudScd": data}, //Call the function and use the array variable to execute
            async: false,
          });
          alert('Your response have been saved. A mail have been sent to the student');
          window.location.href = "advisorHomepage.php";
        }else{
          return false;
        }
      });
    </script>
  </body>
</html>

