<!-- setSession.php -->
<!-- Save the student proposed schedule into the session -->
<!-- VERTT Copyright 2018 -->

<?php
  // start the session
  session_start();

  //save the proposed schedule into the session
  $_SESSION['propClass'] = json_decode($_POST['json_string']);
?>