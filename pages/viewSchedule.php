
<?php
  //start the session
  session_start();
 
  // call the database config file
  require_once('../config/mysqli_connect.php');
  
  $studentID = $_SESSION['studentID'];

  // Get all the courses in the curriculum
  $query = "SELECT * FROM schedule WHERE studentID = '$studentID'";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) < 1){
    echo '<script type="text/javascript">alert("You have no schedule");</script>'; 
     header("refresh:0; url=homepage.php");
     die();
   }

  $schedule = mysqli_fetch_assoc($result);
  $scheduleCourCode = $schedule['courseCode'];
  $scheduleCourCodes = explode("," , $scheduleCourCode);

  foreach($scheduleCourCodes as $scheduleCourCode):
    $query = "SELECT * FROM courses WHERE courseCode = '$scheduleCourCode'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) < 1){ //If no course is found, omit the course
      continue;
    }
    $schCourses[] = mysqli_fetch_assoc($result);
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
        padding-left: 15%;
        padding-right: 15%;
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
		
	.row-striped:nth-of-type(odd){
  background-color: #efefef;
  border-left: 4px #000000 solid;
}

.row-striped:nth-of-type(even){
  background-color: #ffffff;
  border-left: 4px #efefef solid;
}

.row-striped {
    padding: 15px 0;
	
}
.badge-secondary {
    color: #fff;
    background-color: #6c757d;
    min-width: 120px;
}
.col-10 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 83.333333%;
    flex: 0 0 83.333333%;
    max-width: 83.333333%;
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
ul, menu, dir {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}


.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
}
.badge-secondary {
    color: #fff;
    background-color: #6c757d;
    min-width: 120px;
}
.display-4 {
    font-size: 3.5rem;
    font-weight: 300;
    line-height: 1.2;
}
    *, ::after, ::before {
    box-sizing: border-box;
}
.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
    </style>
  </head>
  <body>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

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
      <!--       <div class="jumbotron jumbotron1">
      </div> -->
      <div class="jumbotron jumbotron2">
     <h2>Class Schedule</h2>
	 <h4>Name: <?php echo " ".$_SESSION["firstName"]." ".$_SESSION["lastName"]; ?></h4>
	 <h4>Term: FALL 2018</h4>
	
	<div class="container">
    <?php
      foreach($schCourses as $schCourse):
    ?>
    <div class="row row-striped">
			<div class="col-2 text-right">
				<h1 class="display-4"><span class="badge badge-secondary">MW</span></h1>
			</div>
			<div class="col-10">
				<h3 class="text-uppercase"><strong><?php echo $schCourse['courseCode'];?></strong></h3>
				<ul class="list-inline">
				    <li class="list-inline-item"><i class="fa fa-book" aria-hidden="true"></i><?php echo $schCourse['courseName'];?></li>
					<li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 10:30 PM - 12:00 PM </li>
					<li class="list-inline-item"><i class="fa fa-thumb-tack" aria-hidden="true"></i> <?php echo $schCourse['courseUnit'];?> Credit Hours</li>
					<li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> 418 Tucker Hall </li>
				</ul>
			</div>
		</div>
    <?php
      endforeach;
    ?>
    <hr>
    <div class="list-arrows" style="margin-left: 40%;">
          <div class="clear"></div>
          <button type="button" id="btn-accept" class="btn btn-lg btn-success move-right btn-edited" name="Print" onclick="window.print();return false;"><i class="glyphicon glyphicon-print"></i> Print</button>
    </div>
	</div>

      
</div>
	
	  <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </div>
  </body>
</html>
