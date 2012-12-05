<?php
session_start();

include_once('database.php');

switch($_SERVER['REQUEST_METHOD']) {
case 'POST':
  record_session();
  break;
case 'GET':
  include("record_tutor_session_form.php");
  break;
}

function record_session(){
$student_id = $_GET['student_id'];
$section_id = $_GET['section_id'];

$query = "INSERT INTO tutor_sessions (student_id, section_id, tutor_id, datetime) VALUES (" . $student_id . "," . $section_id . ",".$_SESSION['user_id'].", now())";

mysql_query($query);

$successmsg_arr = array();
$successmsg_arr[] = "Session successfully recorded";
$_SESSION['success_alerts'] = $successmsg_arr;

header("location: record_tutor_session.php");
  var_dump($_POST);
}

?>
