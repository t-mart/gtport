<ul class="nav">
  <li id="registration" class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registration <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="course_register.php">Register for Courses</a></li>
    <li><a href="view_courses.php">View Enrolled Courses</a></li>
  </ul>
  </li>
  <li id="update_personal_information"><a href="update_account.php">Update Personal Information</a></li>
  <li id="tutoring" class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutoring <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="tutor_search.php">Find a tutor</a></li>
    <li><a href="tutor_applications.php">Apply to be a tutor</a></li>
		<?php
		$result = mysql_query(sprintf("SELECT * FROM tutors t where t.student_id=%d and t.authorizing_faculty_id IS NOT NULL;", $_SESSION['user_id']));
		
		if(mysql_num_rows($result)>0)
			echo '<li><a href="record_tutor_session.php">Tutor Logbook</a></li>';
		?>
  </ul>
  </li>
  <li id="grade_report"><a href="student_report.php">View Grading Pattern</a></li>
</ul>
