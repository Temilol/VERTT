<?php
  // start the session
  session_start();

  // call the database config file
  require_once('../config/mysqli_connect.php');
  
  // redirect back to the login screen if the session is empty
  if(empty($_SESSION)){
     echo '<script type="text/javascript">alert("You need to be logged in");</script>'; 
     header("refresh:0; url=../login.html");
     die();
  }

// echo isset($_SESSION["propClass"]);
// die();
  // Get the propCourses from the session vaiable
  if(!isset($_SESSION["propClass"])){//if it doesn't exist
     echo '<script type="text/javascript">alert("You need to build a class");</script>'; 
     header("refresh:0; url=buildSchedule.php");
     die();
  }

  $propSchClasses = $_SESSION["propClass"];

  foreach($propSchClasses as $propSchClassCode):
    // Check for the details of the courses
    // Create SQL query
    $query = "SELECT * FROM courses WHERE courseCode = '$propSchClassCode'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) < 1){ //If no course is found, omit the course
      continue;
    }
    $propCourses[] = mysqli_fetch_assoc($result);
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
        <div class="container" >
          <br />
          <div class="row-middle">

            <div class="dual-list list-left col-md-4">
              <h3 style="text-align: center;">Your Courses</h3>
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

            <div class="dual-list list-right col-md-4">
              <h3 style="text-align: center;">Recommended Courses</h3>
              <div class="well">
                <ul class="list-group recommendedCourse">
                </ul>
              </div>
            </div>

            <div class="dual-list list-end col-md-4">
              <h3 style="text-align: center;">Comments</h3>
                <div class="well">
                  <textarea class="form-control" rows="12" id="comment" readonly></textarea>
                </div>
            </div>
          </div>
        </div>

        <div class="list-arrows" style="margin-left: 34%;">
          <div class="clear"></div>
          <button type="button" class="btn btn-lg btn-success move-right btn-edited" onclick="alert('Coming Soon');" name="Add">Accept</button>
          <button type="button" class="btn btn-lg btn-success move-middle btn-edited" onclick="alert('Coming Soon');" name="Finish" >Modify</button>
          <button type="button" class="btn btn-lg btn-success move-left btn-edited" onclick="alert('Coming Soon');" name="Remove" >Reject</button>
        </div>
      </div>
    </div>
	
    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        var myArry  = sessionStorage.getItem('propScheduleArray');
        var propScheduleArray = JSON.parse(myArry);
        $.ajax({
            url: 'checkPreq.php', //Reference to the checkPreq.php page
            type: "POST", //References it after (post)
            dataType: 'json', //The type of data being used
            data: {"intelSchd": JSON.stringify(propScheduleArray)}, //Call the function and use the array variable to execute
            async: false,
            success: function(response) {//ajax call successful
              for(var x = 0; x < response['courses'].length; x++){
                $("<li class='list-group-item'>"+response['courses'][x]['courseCode']+" - "+response['courses'][x]['courseName']+"</li>").appendTo('.recommendedCourse');
              }
              for(var x = 0; x < response['comments'].length; x++){
                document.getElementById('comment').value += response['comments'][x] + '\n\n';
              }
            },
        });
      });
    </script>
  </body>
</html>