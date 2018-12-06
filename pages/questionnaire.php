<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

<!--     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->

    <head>
      <title>Profile Questionnaire</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="../asset/js/questionnaire/submit.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
        .error{
          color: red;
          text-transform: uppercase;
        }
      </style>
      <script type="text/javascript">
          function show_working_hours_field(){
            var name = document.getElementById('working').value;
            if (name=='Yes') {
              document.getElementById('working1').style.display="block";
            }else{
              document.getElementById('working1').style.display="none";
                      document.getElementById('working_hour').value=" ";
                  }
                }

                function show_children_field(){
            var name = document.getElementById('children').value;
            if (name=='Yes') {
              document.getElementById('children1').style.display="block";
              document.getElementById('children2').style.display="block";
              document.getElementById('children3').style.display="block";
            }else{
              document.getElementById('children1').style.display="none";
              document.getElementById('children2').style.display="none";
              document.getElementById('children3').style.display="none";

                      document.getElementById('children1').value=" ";
                      document.getElementById('children2').value=" ";
                      document.getElementById('children3').value=" ";
              }
          }
      </script>
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
                              <form class="form" method="POST" action="submitQuestionnaire.php" id="form">
                                  <div class="form-group row">
                                      <label for="full_time" class="col-xs-6 col-form-label">Are you currently enrolled as full time or part time? <span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                          <select id="full_time" name="full_time" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                          </select>
                                          <label class="error" for="full_time" id="full_time_error">This field is required.</label>
                                      </div>
                                  </div>                              
  
                                  <div class="form-group row">
                                      <label for="working" class="col-xs-6 col-form-label"><h5></h5>Are you currently working? <span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                          <select id="working" name="working" class="custom-select" onchange="show_working_hours_field()" >
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="working" id="working_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row" id="working1" style="display: none">
                                      <label for="working_hour" class="col-xs-6 col-form-label">Do you work less than 20 hours a week? <span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                          <select id="working_hour" name="working_hour" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="working" id="working_hour_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row">
                                      <label for="children" class="col-xs-6 col-form-label">Do you have any children or planning? <span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                          <select id="children" name="children" class="custom-select" onchange="show_children_field()" >
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="children" id="children_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row" id="children1" style="display: none">
                                      <label for="children_number" class="col-xs-6 col-form-label">How many children do you have? <span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                          <select id="children_number" name="children_number" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Less than 5">Less than 5</option>
                                            <option value="5 and Above">5 and Above</option>
                                          </select>
                                          <label class="error" for="children_number" id="children_number_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row" id="children2" style="display: none">
                                      <label for="children_age" class="col-xs-6 col-form-label">How old is your youngest child? <span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                          <select id="children_age" name="children_age" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="0 - 12">0 - 12</option>
                                            <option value="13 and Above">13 and Above</option>
                                          </select>
                                          <label class="error" for="children_age" id="children_age_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row" id="children3" style="display: none">
                                      <label for="children_help" class="col-xs-6 col-form-label">Do you have help with your children?<span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                          <select id="children_help" name="children_help" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="children_help" id="children_help_error">This field is required.</label>
                                      </div>
                                  </div>

                                  <hr>
                            
                                  
                                  <div class="form-group row">
                                      <label for="graduation_date" class="col-xs-8 col-form-label">What is your expected graduation date? <span style="color:red">*</span></label>
                                      <div class="col-xs-4">
                                          <input type="date" class="form-control" name="graduation_date" id="graduation_date" placeholder="MM/DD/YYYY">
                                          <label class="error" for="graduation_date" id="graduation_date_error">This field is required.</label>
                                          <label class="error" for="graduation_date" id="invalid_graduation_date_error">Invalid date range.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row">
                                      <label for="self_motivation" class="col-xs-7 col-form-label">Are you a self-motivated person?<span style="color:red">*</span></label>
                                      <div class="col-xs-5">
                                          <select id="self_motivation" name="self_motivation" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="self_motivation" id="self_motivation_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row">
                                      <label for="coding_interest" class="col-xs-7 col-form-label">Do you like to code?<span style="color:red">*</span></label>
                                      <div class="col-xs-5">
                                          <select id="coding_interest" name="coding_interest" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="coding_interest" id="coding_interest_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row">
                                      <label for="improve_gpa" class="col-xs-7 col-form-label">Do you need to improve your GPA?<span style="color:red">*</span></label>
                                      <div class="col-xs-5">
                                          <select id="improve_gpa" name="improve_gpa" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="improve_gpa" id="improve_gpa_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row">
                                      <label for="athlete" class="col-xs-7 col-form-label">Are you an Athlete?<span style="color:red">*</span></label>
                                      <div class="col-xs-5">
                                          <select id="athlete" name="athlete" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="athlete" id="athlete_error">This field is required.</label>
                                      </div>
                                  </div>                              

                                  <div class="form-group row">
                                      <label for="extra_cirricular" class="col-xs-7 col-form-label">Are you involved in an extra-cirricular activity?<span style="color:red">*</span></label>
                                      <div class="col-xs-5">
                                          <select id="extra_cirricular" name="extra_cirricular" class="custom-select">
                                            <option value=" ">Select...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                          </select>
                                          <label class="error" for="extra_cirricular" id="extra_cirricular_error">This field is required.</label>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                       <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" id="send" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
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