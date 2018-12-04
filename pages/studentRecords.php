<?php
  // Start Session
  session_start();
  $advisorID = $_SESSION["advisorID"];
  // call the database config file
  require_once('../config/mysqli_connect.php');

  // Check if the advisor has any students
  // create SQL Query
   $query = "SELECT * FROM StudentProfile WHERE advisorID = '$advisorID'";
   $result = mysqli_query($conn, $query);

   if(mysqli_num_rows($result) < 1){//No Student in the record
     echo '<script type="text/javascript">alert("You have no students in our record.");</script>';
     header("refresh:0; url=../pages/advisorHomepage.php"); 
   }

   // Get the students profile
   $studentsProfile[] = array();

   // While loops through every class
   while ($students = mysqli_fetch_assoc($result)){
     $studentsProfile[] = $students;
   }
?>

<!DOCTYPE html>
<html lang="en">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <head>
      <title>VERTT</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="../asset/js/advisor/submit.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
        .error{
          color: red;
          text-transform: uppercase;
        }
      </style>
    </head>

    <hr>
    <body>
        <div class="container bootstrap snippet" style="color: green;">
            <div class="row">
                <div class="col-sm-10"><h1>VERTT</h1></div>
                <div class="col-sm-2"><a href="#" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
            </div>

            <div class="row">
                <!--left col-->
                <div class="col-sm-3">
                    <!-- Avatar -->
                    <div class="text-center">
                        <img src="../asset/image/main/icon.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    </div><br>

                    <div class="panel panel-default">
                        <div class="panel-heading">Account Information <i class="fa fa-link fa-1x"></i></div>
                        <ul class="list-group">
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span> 
                              <?php 
                                if(isset($_SESSION["email"])){echo $_SESSION["email"];}
                                else{echo "vertt.cis@famu.edu";}
                              ?>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Number</strong></span>
                              <?php 
                                if(isset($_SESSION["advisorNumber"])){echo $_SESSION["advisorNumber"];}
                                else{echo "0000";}
                              ?></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Major</strong></span> CIS</li>
                        </ul>
                    </div>
                </div>
                
                <!--Right col-->
                <div class="col-sm-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">
                          <?php 
                            if(isset($_SESSION["firstName"]) && isset($_SESSION["lastName"])){echo $_SESSION["firstName"]." ".$_SESSION["lastName"];}
                            else{echo "Anonymous";}
                          ?>
                        </a>
                      </li>
                      <li><a href="advisorHomepage.php">Home</a></li>
                    </ul>

                    <!--Questions-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                              <form class="form" method="POST" action="transcript.php" id="form">                              

                                  <div class="form-group row">
                                    <label for="studentID" class="col-xs-6 col-form-label">Select Student<span style="color:red">*</span></label>
                                    <div class="col-xs-6">
                                        <select id="studentID" name="studentID" class="custom-select">
                                          <option value=" ">Select...</option>
                                          <?php
                                              foreach ($studentsProfile as $students):
                                                  if(empty($students)){
                                                    continue;
                                                  }
                                                  echo "<option value='{$students['studentID']}'>{$students['firstName']} {$students['lastName']}</option>";
                                              endforeach;
                                          ?>
                                        </select>
                                        <label class="error" for="studentID" id="studentID_error">This field is required.</label>
                                    </div>
                                  </div>                             
                                  <div class="form-group">
                                     <div class="col-xs-12">
                                          <br>
                                          <button class="btn btn-lg btn-success" id="get_transcript" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Get Transcript</button>
                                      </div>
                                  </div>
                            </form>
                            <hr>
                        </div><!--/tab-pane-->
                    </div><!--/tab-content-->
                </div><!--/col-sm-9-->
            </div><!--/row-->
        </div><!--/container-->
    </body>
</html>