<!-- advisor Homepage.php -->
<!-- VERTT Copyright 2018 -->


<?php
// start the session
 session_start();
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
        .jumbotron2 {
          background-color: #2ba70a;
          padding-top: 20px;
          padding-bottom: 35%;
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
    <div class="container">
      <div class="clear"></div>
      <div class="well jumbotron1"></div>
<!--       <div class="jumbotron jumbotron1">
      </div> -->
      <div class="jumbotron jumbotron2">
        <div style="color:red">
          <img src="../asset/image/main/FAMU_Logo_10.gif" alt="FAMU" class="mx-auto d-block" style="width:25%">
          <div class="clear"></div>
          <div style="padding-top: 15%;">
            <button type="button" class="btn btn-lg btn-success btn-edited" name="Build_Schedule" onclick="window.location='studentRecords.php';">Student Records</button>
            <button type="button" class="btn btn-lg btn-success btn-edited" name="Build_Schedule" onclick="window.location='studentRecords1.php';" style="margin-left: 11%;">View Students Schedule</button>
            <button type="button" class="btn btn-lg btn-success btn-edited" name="Build_Schedule" onclick="window.location='advisorUpdate.php';" style="margin-left: 6%;">Update Advisor Contact</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
