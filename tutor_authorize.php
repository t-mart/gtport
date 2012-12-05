
<?php

session_start();

include_once('database.php');

$tutor_id = $_GET['tutor_id'];
$authorizing_faculty_id = $_GET['authorizing_faculty_id'];

$query = sprintf("UPDATE `psmith44`.`tutors` SET `authorizing_faculty_id`='%d' WHERE `id`='%d'", $authorizing_faculty_id, $tutor_id);

mysql_query($query);

header("location: tutor_assignment.php");

?>
