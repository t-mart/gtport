<?php
//Start session
session_start();

//Unset the variables stored in session
unset($_SESSION['user_id']);
unset($_SESSION['user_type']);

$successmsg_arr[] = 'You have logged out succesfully';
$_SESSION['success_alerts'] = $successmsg_arr;

session_write_close();

header("location: index.php");
?>
