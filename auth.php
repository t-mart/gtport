<?php
  //Include this file in any "authorized page" i.e. pages you must be signed in 
  //to see.
  //It checks for a set user_id in SESSION, and will kick you out to index if 
  //it's not.
  //Heads up: this functionality is not required by the project.

  //Start session
  session_start();
  
  //Check whether the session variable SESS_MEMBER_ID is present or not
  if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("location: index.php");
    exit();
  }
?>
