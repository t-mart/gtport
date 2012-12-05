<?php
session_start();
include_once('database.php');
include_once('auth.php');

$debug = 0;

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'POST':
        handleForm();
    break;
  case 'GET':
        include('update_account_form.php');
    break;
}
//mysql_close($con);


function handleForm(){
    if($debug){
        echo '<pre>';
        var_dump($_POST);
    }

    $user_id = $_SESSION['user_id'];
    $user_type_query = "select type from users where id=".$user_id.";";
    $result = mysql_query($user_type_query);
    $user_type_row = mysql_fetch_array($result); 
    $user_type = $user_type_row['type'];    
    
    //if(isset($_POST['submit-settings'])) {
        
        //IF FORM HAS BEEN SUBMITTED -- UPDATE  
        
        //REG_USER INFO UPDATE
        $reg_users_update= "UPDATE regular_users SET first_name='".$_POST['first_name']."', last_name='".$_POST['last_name']."', email='".$_POST['email']."',dob='".$_POST['dob']."', permanent_address='".
        $_POST['permanent_address_line1']." ".$_POST['permanent_address_line2']." ".$_POST['permanent_address_line3']."', current_address='".
        $_POST['current_address_line1']." ".$_POST['current_address_line2']." ".$_POST['current_address_line3']."', gender='".
        $_POST['gender']."', phone_number='".$_POST['phone_number']."' WHERE user_id=".$user_id.";";
        if($debug)
            echo "reg_users_update: ".$reg_users_update."\n";
        if(!mysql_query($reg_users_update))
            die('Error: '.mysql_error());
        
        //DEGREE UPDATE
        $student_query = "";
        $faculty_query = "";
        if($user_type == "students"){
            $student_query = "UPDATE students SET department_id='".$_POST['student_degree']."',degree='".$_POST['student_degree_type']."' WHERE user_id=".$user_id.";";
                
            echo "student_query: ".$student_query."\n";
            
            if(!mysql_query($student_query))
                die('Error: '.mysql_error());
                
        //SCHOOL_HIST UPDATE
        for($i=1;$i<2;$i++){
            //changed this just to 1 for now.
            $prefix = 'previous_education'.$i;
            if(isset($_POST[$prefix.'_name']) && $_POST[$prefix.'_name'] != ""){
                $history_query = "UPDATE school_histories SET student_id=".$user_id.",grad_year='".$_POST[$prefix.'_year']."', name='".$_POST[$prefix.'_name']."', gpa='".
                $_POST[$prefix.'_gpa']."', major='".$_POST[$prefix.'_major']."', degree='".$_POST[$prefix.'_degree']."';";
                
                
                
                if($debug)
                    echo "history_query: ".$history_query."\n";
                if(!mysql_query($history_query))
                    die('Error: '.mysql_error());
            }
        }
    } 
    else{ //FACULTY QUERY
        $faculty_query = "INSERT INTO faculty (user_id,department_id,position) VALUES (".$user_id.",".$_POST['faculty_department'].",'".$_POST['faculty_position']."');";
        if($debug)
            echo "faculty_query: ".$faculty_query."\n";
        if(!mysql_query($faculty_query))
            die('Error: '.mysql_error());

        $faculty_query = "INSERT INTO `faculty-sections` (faculty_id,section_id) VALUES (".$user_id.",".$_POST['faculty_course_section'].");";
        if($debug)
            echo "faculty_sections_query: ".$faculty_query."\n";
        if(!mysql_query($faculty_query))
            die('Error: '.mysql_error());

        //research interests
        if($_POST['research_interests'] != ""){
            $research_interests = explode(",",$_POST['research_interests']);
            foreach($research_interests as $interest){
                $interest = trim($interest);
                $interest_query = "INSERT INTO research_interests (faculty_id,name) VALUES (".$user_id.",'".$interest."');";
                if($debug)
                    echo "interest_query: ".$interest_query."\n";
                if(!mysql_query($interest_query))
                    die('Error: '.mysql_error());
            }
        }
    }

    if($debug)
        echo '</pre>';
    //GOTO index.php
    if(!$debug)
        header("Location: update_account.php");
    exit;
}
?>
