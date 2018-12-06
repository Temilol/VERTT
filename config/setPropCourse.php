<!-- setPropCourse.php -->
<!-- Save the proposed schedule into the session -->
<!-- VERTT Copyright 2018 -->

<?php
  // start the session
  session_start();

  //save the proposed schedule into the session
  $_SESSION['propClassSch'] = json_decode($_POST['json_string']);
?>