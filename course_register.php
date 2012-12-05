<?php
session_start();
include_once('database.php');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'POST':
		handleForm();
    break;
  case 'GET':
		include('course_register/course_register_form.php');
    break;
}

function handleForm(){
	$debug = 0;

	if($debug){
		echo '<pre>';
		var_dump($_POST);
	}
	
	$result = mysql_query("SELECT id FROM sections;");
  while($row = mysql_fetch_array($result)){
		if(isset($_POST[$row['id']])){
			$query = "INSERT INTO `sections-students` (student_id,section_id,grade_mode) VALUES (".$_SESSION['user_id'].",".$row['id'].",'".$_POST[$row['id']."_grade_type"]."');";
			if($debug)
				echo $query."\n";
			if(!mysql_query($query))
				die('Error: '.mysql_error());
		}
	}

	if($debug)
		echo '</pre>';
	//GOTO index.php
	if(!$debug)
		header("Location: index.php");
	exit;
}
?>
