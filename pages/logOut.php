<?php
  // start the session
  session_start();

  // remove all session variables
  session_unset();

  // destroy the session
  session_destroy();
  
  // redirect to the login page
  echo '<script type="text/javascript">alert("You are now logged out");</script>';
  header("refresh:0; url=../login.html");
?>