<?php
  // start the session
  session_start();

  //save the proposed schedule into the session
  $_SESSION['propClassSch'] = json_decode($_POST['json_string']);
print_r($_SESSION);
?>