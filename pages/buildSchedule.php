<!-- buildSchedule.php -->
<!-- VERTT Copyright 2018 -->

<?php
  // start the session
  session_start();
  
  // redirect back to the login screen if the session is empty
  if(empty($_SESSION)){
     echo '<script type="text/javascript">alert("You need to be logged in");</script>'; 
     header("refresh:0; url=../login.html");
     die();
  }

  if(isset($_SESSION["studentID"])){
    $studentID = $_SESSION["studentID"];
  }

  if(isset($_SESSION["propClassSch"])){
    $propClassSchs = $_SESSION["propClassSch"];
  }else{
    $propClassSch = [];
  }

 
  // call the database config file
  require_once('../config/mysqli_connect.php');

  // Get all the courses in the curriculum
  $query = "SELECT * FROM courses WHERE {$_SESSION['semester']} = 1";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) < 1){//No course in the record
    echo '<script type="text/javascript">alert("No curriculum found in our database.");</script>';
    header("refresh:0; url={$_SERVER["HTTP_REFERER"]}");
    die();
  }
  // Get the curriculum
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
   }
   if(mysqli_num_rows($result) < 1){
     $courseCodesRemaining = $curriculumCode;
   }else{
     $courseCodesRemaining = array_diff($curriculumCode, $transcriptCode);
   }

    if(!empty($propClassSchs)){
      $x = 0;
      foreach($propClassSchs as $propClassSch):
        $query = "SELECT * FROM courses WHERE courseCode = '$propClassSch'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) < 1){ //If no course is found, omit the course
          continue;
        }
        $pSchCourses[] = mysqli_fetch_assoc($result);
        $pSchCoursesCode[] = $pSchCourses[$x]['courseCode'];
        $x = $x + 1;
      endforeach;
      $courseCodeRemaining = array_diff($courseCodesRemaining, $pSchCoursesCode);
    }else{
      $courseCodeRemaining = $courseCodesRemaining;
    }
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
    
    <title>VERTT - Build Schedule</title>
    
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

        .list-left li, .list-right li {
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
          height: 400px;
        }
			
			
        .list-group{
          max-height: 300px;
          min-height: 300px;
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
              <li class="active"><a href="homepage.php">Home<span class="sr-only">(current)</span></a></li>
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
            <div class="dual-list list-left col-md-6">
              <h3 style="text-align: center;">Catalog</h3>
              <div class="well ">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="input-group">
                             <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                             <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                          </div>
                      </div>
                  </div>
                  <div class="list-group-el" id="newList">
                      <ul class="list-group">
                          <?php
                            foreach($courseCodeRemaining as $courseCodeRem):
                              foreach($curriculums as $curriculum):
                                if($curriculum["courseCode"] == $courseCodeRem){
                                    echo "<li class='list-group-item'>
                                              {$curriculum["courseCode"]} - {$curriculum["courseName"]}
                                          </li>";
                                  break;
                                }
                              endforeach;
                            endforeach;
                          ?>
                      </ul>
                  </div>
              </div>
            </div>

            <div id="tempProposedCourses" class="dual-list list-right col-md-6">
              <h3 style="text-align: center;">Proposed Courses</h3>
                <div class="well">
                  <br/>
                  <ul class="list-group">
                      <?php
                        for($i = 0; $i < count($pSchCourses); $i++){
                          echo "<li class='list-group-item'>
                                    {$pSchCourses[$i]["courseCode"]} - {$pSchCourses[$i]["courseName"]}
                                </li>";
                        }
                      ?>
                  </ul>
                </div>
            </div>

          </div>
        </div>
        
        <div class="list-arrows" style="margin-left: 34%;">
        <div class="clear"></div>

          <button type="button" class="btn btn-lg btn-success move-right btn-edited" name="Add">Add</button>
          <button type="button" id="btn-confirm" class="btn btn-lg btn-success move-middle btn-edited" name="Finish" >Finish</button>
          <button type="button" class="btn btn-lg btn-success move-left btn-edited" name="Remove" >Remove</button>

       </div> 

      </div>
    </div>
	  <script src="jquery.json-2.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
      
       $(function () {

            $('body').on('click', '.list-group .list-group-item', function () {
                $(this).toggleClass('active');
              
            });
            $('.list-arrows button').click(function () {
                var $button = $(this), actives = '';
                if ($button.hasClass('move-left')) {
                    actives = $('.list-right ul li.active');
                    actives.clone().appendTo('.list-left ul');
                    actives.remove();
                  $('.active').not($(this)).removeClass('active');
                    
                } else if ($button.hasClass('move-right')) {
                    actives = $('.list-left ul li.active');
                    actives.clone().appendTo('.list-right ul');
                    actives.remove();
                  $('.active').not($(this)).removeClass('active');
					
                }
            });

            $('[name="SearchDualList"]').keyup(function (e) {
                var code = e.keyCode || e.which;
                if (code == '9') return;
                if (code == '27') $(this).val(null);
                var $rows = $(this).closest('.dual-list').find('.list-group li');
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });

        });
      
        $("#btn-confirm").click(function(){
            var tempPropScheduleArray = []; // Array that will temporary hold the proposed schedule classes
            var propScheduleArray = []; // Array that will hold the finalised proposed schedule classes
          
            $("#tempProposedCourses li").each(function() { tempPropScheduleArray.push($(this).text()) }); // Add every class to the array
            if(tempPropScheduleArray.length < 1){
              alert("Pick some classes");
              return;
            }
            for ( var x = 0; x < tempPropScheduleArray.length; x++){	
              tempPropScheduleArray[x] = tempPropScheduleArray[x].replace(/[\n\t\r]/g,"").trim(); // Remove all special characters and spaces from the list to array conversion
              var i = 0;
              propScheduleArray[x] = "";
              while(tempPropScheduleArray[x][i] != " "){ //Extract the course code from the string
                propScheduleArray[x] = propScheduleArray[x] + tempPropScheduleArray[x][i];
                i++;
              }
             }
            console.log(propScheduleArray);
            sessionStorage.removeItem('propScheduleArray'); //remove the propScheduleArray in the session
            sessionStorage.setItem('propScheduleArray', JSON.stringify(propScheduleArray)); //set a new propScheduleArray in the session
            window.location.href = "reviewSchedule1.php";
        });
        
		
     </script>

  </body>
</html>