<?php
include('database.php');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'POST':
		handleForm();
    break;
  case 'GET':
		include('create_account/create_account_form.php');
    break;
}
//mysql_close($con);


function handleForm(){
	echo '<pre>';
	var_dump($_POST);

	$userType = strtolower($_POST['user_type']);

	$users_query = "INSERT INTO users (username,password,type) VALUES ('".$_POST['username']."','".$_POST['password']."','".$userType."');";
	echo "users_query: ".$users_query."\n";
	if(!mysql_query($users_query))
		die('Error: '.mysql_error());

	$user_id = mysql_insert_id();

	$reg_users_query = "INSERT INTO regular_users (user_id,first_name,last_name,email,dob,permanent_address,current_address,gender,phone_number)".
		"VALUES (".$user_id.",'".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['email']."','".$_POST['dob']."','".
			$_POST['permanent_address_line1']." ".$_POST['permanent_address_line2']." ".$_POST['permanent_address_line3']."','".
			$_POST['current_address_line1']." ".$_POST['current_address_line2']." ".$_POST['current_address_line3']."','".
			$_POST['gender']."','".$_POST['phone_number']."');";
	echo "reg_users_query: ".$reg_users_query."\n";
	if(!mysql_query($reg_users_query))
		die('Error: '.mysql_error());

	$student_query = "";
	$faculty_query = "";
	if($userType == "student"){
		$student_query = "INSERT INTO students (user_id,department_id,degree) VALUES (".$user_id.",".$_POST['student_degree'].",'".$_POST['student_degree_type']."');";

		echo "student_query: ".$student_query."\n";
		if(!mysql_query($student_query))
			die('Error: '.mysql_error());

		//school history
		//tutoring

	}else{ //FACULTY QUERY
		$faculty_query = "INSERT INTO faculty (user_id,department_id,position) VALUES (".$user_id.",".$_POST['faculty_department'].",'".$_POST['faculty_position']."');";
		echo "faculty_query: ".$faculty_query."\n";
		if(!mysql_query($faculty_query))
			die('Error: '.mysql_error());

		$faculty_query = "INSERT INTO `faculty-sections` (faculty_id,section_id) VALUES (".$user_id.",".$_POST['faculty_course_section'].");";
		echo "faculty_sections_query: ".$faculty_query."\n";
		if(!mysql_query($faculty_query))
			die('Error: '.mysql_error());

		//research interests
		if($_POST['research_interests'] != ""){
			$research_interests = explode(",",$_POST['research_interests']);
			foreach($research_interests as $interest){
				$interest = trim($interest);
				$interest_query = "INSERT INTO research_interests (faculty_id,name) VALUES (".$user_id.",'".$interest."');";
				echo "interest_query: ".$interest_query."\n";
/*DB error, id not auto-incrementing
				if(!mysql_query($interest_query))
					die('Error: '.mysql_error());
*/
			}
		}
	}

	echo '</pre>';
}
?>
