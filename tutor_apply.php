<?php

session_start();

include_once('database.php');

$student_id = $_GET['student_id'];
$course_id = $_GET['course_id'];

$query = "INSERT INTO tutors (student_id, course_id) VALUES (" . $student_id . "," . $course_id . ")";

mysql_query($query);

header("location: tutor_applications.php");

?>
