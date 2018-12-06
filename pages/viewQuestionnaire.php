<!-- viewQuestionnaire.php -->
<!-- view the student questionnaire response -->
<!-- VERTT Copyright 2018 -->

<?php 
  session_start();

  $studentID = $_SESSION["studentID"];

  // call the database config file
  require_once('../config/mysqli_connect.php');

   // Check if the advisor has any students
   // create SQL Query
   $query = "SELECT * FROM questionnaire WHERE studentID = '$studentID'";
   $result = mysqli_query($conn, $query);

   if(mysqli_num_rows($result) < 1){//No Advisor in the record
     echo '<script type="text/javascript">alert("No questionnaire answered yet");</script>';
     header("refresh:0;  url=questionnaire.html");
     die();
   }

   $questionnaire = mysqli_fetch_assoc($result);  
?>

<!DOCTYPE html>
<html lang="en">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <head>
      <title>Vertt - View Questionnaire</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                        </a></li>
                    </ul>

                    <!--Questions-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                                <div class="form-group row">
                                    <label for="full_time" class="col-xs-6 col-form-label">Are you currently enrolled as full time or part time? <span style="color:red">*</span></label>
                                    <div class="col-xs-6">
                                      <input value="<?php echo $questionnaire['studyHour']; ?>" class="form-control" readonly>
                                    </div>
                                </div>                              

                                <div class="form-group row">
                                    <label for="working" class="col-xs-6 col-form-label"><h5></h5>Are you currently working? <span style="color:red">*</span></label>
                                    <div class="col-xs-6">
                                      <input value="<?php echo $questionnaire['currentlyWorking']; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                              <?php if($questionnaire['currentlyWorking'] == 'Yes') {?>

                                <div class="form-group row" id="working1">
                                    <label for="working_hour" class="col-xs-6 col-form-label">Do you work less than 20 hours a week? <span style="color:red">*</span></label>
                                    <div class="col-xs-6">
                                      <input value="<?php echo $questionnaire['workingHours']; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                              <?php } ?>                     

                                <div class="form-group row">
                                    <label for="children" class="col-xs-6 col-form-label">Do you have any children or planning? <span style="color:red">*</span></label>
                                    <div class="col-xs-6">
                                      <input value="<?php echo $questionnaire['planningChildren']; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                              <?php if($questionnaire['planningChildren'] == 'Yes') {?>            

                                <div class="form-group row" id="children1">
                                    <label for="children_number" class="col-xs-6 col-form-label">How many children do you have? <span style="color:red">*</span></label>
                                    <div class="col-xs-6">
                                      <input value="<?php echo $questionnaire['numberOfChildren']; ?>" class="form-control" readonly>
                                    </div>
                                </div>                              

                                <div class="form-group row" id="children2">
                                    <label for="children_age" class="col-xs-6 col-form-label">How old is your youngest child? <span style="color:red">*</span></label>
                                    <div class="col-xs-6">
                                      <input value="<?php echo $questionnaire['ageOfLastChild']; ?>" class="form-control" readonly>
                                    </div>
                                </div>                              

                                <div class="form-group row" id="children3">
                                    <label for="children_help" class="col-xs-6 col-form-label">Do you have help with your children?<span style="color:red">*</span></label>
                                    <div class="col-xs-6">
                                      <input value="<?php echo $questionnaire['helpWithChildren']; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                              <?php } ?>      

                                <hr>

                                <div class="form-group row">
                                    <label for="graduation_date" class="col-xs-8 col-form-label">What is your expected graduation date? <span style="color:red">*</span></label>
                                    <div class="col-xs-4">
                                        <input type="date" class="form-control" name="graduation_date" id="graduation_date" value="<?php echo $questionnaire['expectedGraduationDate']; ?>" readonly>
                                    </div>
                                </div>                              

                                <div class="form-group row">
                                    <label for="self_motivation" class="col-xs-7 col-form-label">Are you a self-motivated person?<span style="color:red">*</span></label>
                                    <div class="col-xs-5">
                                      <input value="<?php echo $questionnaire['selfMotivated']; ?>" class="form-control" readonly>
                                    </div>
                                </div>                              

                                <div class="form-group row">
                                    <label for="coding_interest" class="col-xs-7 col-form-label">Do you like to code?<span style="color:red">*</span></label>
                                    <div class="col-xs-5">
                                      <input value="<?php echo $questionnaire['code']; ?>" class="form-control" readonly>
                                    </div>
                                </div>                              

                                <div class="form-group row">
                                    <label for="improve_gpa" class="col-xs-7 col-form-label">Do you need to improve your GPA?<span style="color:red">*</span></label>
                                    <div class="col-xs-5">
                                      <input value="<?php echo $questionnaire['needToImproveGPA']; ?>" class="form-control" readonly>
                                    </div>
                                </div>                              

                                <div class="form-group row">
                                    <label for="athlete" class="col-xs-7 col-form-label">Are you an Athlete?<span style="color:red">*</span></label>
                                    <div class="col-xs-5">
                                      <input value="<?php echo $questionnaire['athlete']; ?>" class="form-control" readonly>
                                    </div>
                                </div>                              

                                <div class="form-group row">
                                    <label for="extra_cirricular" class="col-xs-7 col-form-label">Are you involved in an extra-cirricular activity?<span style="color:red">*</span></label>
                                    <div class="col-xs-5">
                                      <input value="<?php echo $questionnaire['extracurricular']; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                     <div class="col-xs-12">
                                          <br>
                                          <button class="btn btn-lg btn-success" onclick="window.location='homepage.php';" id="send" type="submit"><i class="glyphicon glyphicon-home"></i> Home</button>
                                      </div>
                                </div>
                            <hr>
                        </div><!--/tab-pane-->
                    </div><!--/tab-content-->
                </div><!--/col-sm-9-->
            </div><!--/row-->
        </div><!--/container-->
    </body>
</html>