<?php
  //Start session
  session_start();
  
  //Include database connection details
  include('database.php');
  
  //Array to store validation errors
  $errmsg_arr = array();
  
  //Validation error flag
  $errflag = false;
  
  //Sanitize the POST values
var_dump($_POST);
  $username = clean($_POST['username']);
  $password = clean($_POST['password']);
  
  //Input Validations
  if($username == '') {
    $errmsg_arr[] = 'Username missing';
    $errflag = true;
  }
  if($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
  }
  
  //If there are input validations, redirect back to the login form
  if($errflag) {
    $_SESSION['error_alerts'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
  }
  
  //Create query
  $query= sprintf("SELECT id, type FROM users WHERE username='%s' and password='%s'", $username, $password);
  $result=mysql_query($query);
  
  //Check whether the query was successful or not
  if($result) {
    if(mysql_num_rows($result) == 1) {
      //Login Successful
      session_regenerate_id();
      $user = mysql_fetch_assoc($result);
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_type'] = $user['type'];

      $successmsg_arr[] = 'Username or password is invalid';
      $_SESSION['success_alerts'] = $successmsg_arr;
      session_write_close();

      header("location: index.php");
      exit();
    }else {
      //Login failed
      $errmsg_arr[] = 'You have logged in succesfully';
      $_SESSION['error_alerts'] = $errmsg_arr;
      session_write_close();

      header("location: index.php");
      exit();
    }
  }else {
    die("Query failed");
  }
?>
