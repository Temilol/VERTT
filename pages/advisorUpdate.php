<?php
  // Start Session
  session_start();

  $advisorID = $_SESSION["advisorID"];
  // call the database config file
  require_once('../config/mysqli_connect.php');

   // Check if the advisor has any students
   // create SQL Query
   $query = "SELECT * FROM advisor WHERE advisorID = '$advisorID'";
   $result = mysqli_query($conn, $query);

   if(mysqli_num_rows($result) < 1){//No Advisor in the record
     echo '<script type="text/javascript">alert("No record found in our database.");</script>';
     header("refresh:0;  url=../login.html");
     die();
   }

   $advisor = mysqli_fetch_assoc($result);
?>

<html lang="en">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <head>
      <title>VERTT - Advisor Update</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="../asset/js/advisor/submitUpdate.js"></script>
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
                <div class="col-sm-10"><h2>Advisor Updates</h2></div>
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
                             <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']?></li>
                             <li class="list-group-item text-right"><span class="pull-left"><strong>Number</strong></span><?php echo $_SESSION['advisorNumber']?></li>
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
                              <form class="form" method="POST" action="updateAdvisor.php" id="form">
                                  <div class="form-group row">
                                      <label for="firstName" class="col-xs-6 col-form-label">First Name<span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                        <input name="firstName" class="form-control" type="text" id="firstName" value="<?php echo $advisor['firstName']; ?>">
                                        <label class="error" for="firstName" id="firstName_error">This field is required.</label>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="middleName" class="col-xs-6 col-form-label">Middle Name<span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                        <input name="middleName" class="form-control" type="text" id="middleName" value="<?php echo $advisor['middleName']; ?>">
                                        <label class="error" for="middleName" id="middleName_error">This field is required.</label>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="lastName" class="col-xs-6 col-form-label">Last Name<span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                        <input name="lastName" class="form-control" type="text" id="lastName" value="<?php echo $advisor['lastName']; ?>">
                                        <label class="error" for="lastName" id="lastName_error">This field is required.</label>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="phoneNumber" class="col-xs-6 col-form-label">Phone Number<span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                        <input name="phoneNumber" class="form-control" type="text" id="phoneNumber" maxlength="11" value="<?php echo $advisor['advisorNumber']; ?>">
                                        <label class="error" for="phoneNumber" id="phoneNumber_error">This field is required.</label>
                                        <label class="error" for="phoneNumber" id="phoneNumberDigit_error">This field should contain digits only.</label>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="officeLocation" class="col-xs-6 col-form-label">Office Location<span style="color:red">*</span></label>
                                      <div class="col-xs-6">
                                        <textarea name="officeLocation" class="form-control" id="officeLocation"><?php echo $advisor['advisorLocation']; ?></textarea>
                                        <label class="error" for="officeLocation" id="officeLocation_error">This field is required.</label>
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