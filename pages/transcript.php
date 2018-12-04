<?php

  // start session
  session_start();

  // Extract Input
  extract($_POST);

  // Check if the studentID exist in the session
  if(isset($_SESSION["studentID"])){
    $studentID = $_SESSION["studentID"];
  }

  // call the database config file
  require_once('../config/mysqli_connect.php');

  // Check if the students has any transcript record
  // Create SQL query
  $query = "SELECT * FROM transcript WHERE studentID = '$studentID'";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) < 1){//No Student Transcript in the record
    echo '<script type="text/javascript">alert("No transcript record found in our database.");</script>';
    header("refresh:0; url={$_SERVER["HTTP_REFERER"]}");
    die();
  }
  
  // Get the students profile
   // While loops through every class
   while ($transcript = mysqli_fetch_assoc($result)){
     $transcripts[] = $transcript;
   }

  // Get student Information
  $query = "SELECT * FROM StudentProfile WHERE studentID = '$studentID'";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) < 1){//No Student Record in the database
    echo '<script type="text/javascript">alert("No student record found in our database.");</script>';
    header("refresh:0; url={$_SERVER["HTTP_REFERER"]}");
    die();
  }
  
  $stud = mysqli_fetch_assoc($result);
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
    
    <title>VERTT</title>
    
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
              <li class="active"><a href="javascript:history.go(-1)">Go Back<span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a>
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
    <div class="container">
      <div class="clear"></div>
      <div class="well jumbotron1"></div>
      <div class="container" style="margin-left: -13px;">
        <h3 style="text-align:center; color:green"><?php echo"{$stud["firstName"]} {$stud["lastName"]} "?>Transcript</h3>
        <table class="table table-hover">
          <thead style="background-color:#2ba70a; color:white">
            <tr>
              <th scope="col">Course Code</th>
              <th scope="col">Course Name</th>
              <th scope="col">Course Unit</th>
              <th scope="col">Course Grade</th>
              <th scope="col">Semester</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($transcripts as $transcript):
                  if(empty($transcript)){
                    continue;
                  }
                  echo "<tr>
                          <th scope='row'>{$transcript["courseCode"]}</th>
                          <td>{$transcript["courseName"]}</td>
                          <td>{$transcript["courseUnit"]}</td>
                          <td>{$transcript["courseGrade"]}</td>
                          <td>{$transcript["Semester"]}</td>
                        </tr>";
              endforeach;
            ?>
          </tbody>
        </table>
      </div>
      
    </div>

    <footer class="footer">
      <div class = "con">
        <p>Copyright &copy VERTT 2018</p>
      </div>
    </footer>
  </body>
</html>