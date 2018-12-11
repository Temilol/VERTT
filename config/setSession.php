<?php
  // start the session
  session_start();

  //save the proposed schedule into the session
  $_SESSION['propClass'] = json_decode($_POST['json_string']);
?>