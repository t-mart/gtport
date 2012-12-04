<div class="nav-collapse collapse">
	<ul class="nav">
		<li id="registration" class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Registration <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="#">Register for Courses</a></li>
				<li><a href="#">View Enrolled Courses</a></li>
			</ul>
		</li>
		<li id="update_personal_information"><a href="#">Update Personal Information</a></li>
		<li id="find_tutors"><a href="#about">Find Tutor</a></li>
		<?php
		if(isset($_SESSION['user_type'])){
			$result = mysql_query("SELECT * FROM tutors WHERE student_id=".$_SESSION['user_type'].";");
			if($row = mysql_fetch_array($result))
				echo '    <li id="tutor_logbook"><a href="#contact">Tutor Logbook</a></li>';
		}
		?>
		<li id="grade_report"><a href="#contact">View Grading Pattern</a></li>
	</ul>
</div><!--/.nav-collapse -->
