<ul class="nav">
  <li id="registration" class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registration <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="course_register.php">Register for Courses</a></li>
    <li><a href="view_courses.php">View Enrolled Courses</a></li>
  </ul>
  </li>
  <li id="update_personal_information"><a href="update_account.php">Update Personal Information</a></li>
  <li id="find_tutors"><a href="#about">Find Tutor</a></li>
  <li id="tutoring" class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutoring <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="#">Find a tutor</a></li>
    <li><a href="tutor_applications.php">Apply to be a tutor</a></li>
    <li><a href="#">Tutor Logbook</a></li>
  </ul>
  </li>
  <?php
	//$result = mysql_query("SELECT * FROM tutors WHERE student_id=".$_SESSION['user_id'].";");
	
	//if(mysql_num_rows($result)>0)
		//echo '    <li id="tutor_logbook"><a href="#contact">Tutor Logbook</a></li>';
  ?>
  <li id="grade_report"><a href="student_report.php">View Grading Pattern</a></li>
</ul>
