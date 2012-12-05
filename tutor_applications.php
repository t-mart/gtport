<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include('bootstrap_head.html')?>
  <title>Tutor Applcations</title>
  </head>

  <body>

	<?php include('navbar.html') ?>


    <div class="container">
      <div id="avail_tutor">
        <h2>Available Tutor Positions</h2>
        <table class="table table-striped">
        <?php
          $result = mysql_query(sprintf("SELECT c.name as course_name, ss.grade as grade, c.id as course_id
            FROM psmith44.`sections-students` AS ss
            JOIN psmith44.sections as s ON s.id=ss.section_id
            JOIN psmith44.courses as c on c.id=s.course_id
            JOIN psmith44.current_sections AS cs on cs.id=s.id
            LEFT JOIN psmith44.tutors as t on t.student_id=ss.student_id and t.course_id=c.id
            WHERE ss.student_id=%s and ss.grade IN ('A','B') and t.id IS NULL;",
            $_SESSION['user_id']));

          if (mysql_num_rows($result) > 0){
            echo "<tr><th>Course Name</th><th>Grade Recieved</th><th>Apply to tutor?</th></tr>";
            while ($row = mysql_fetch_array($result))
            {
              echo "<tr><td>" . $row['course_name'] . "</td><td>" . $row['grade'] . "</td><td><a href='tutor_apply.php?student_id=" . $_SESSION['user_id'] . "&course_id=" . $row['course_id'] . "'>Apply</a></td><tr>";
            }
          } else {
            echo "<p>There are no courses you can tutor for.</p>";
          }
        ?>
        </table>
      </div>
      <div id="pending_tutor">
        <h2>Tutor Applications</h2>
        <table class="table table-striped">
        <?php
          $result = mysql_query(sprintf( "SELECT c.name as course_name, ru.last_name as authorizer_last_name
            FROM psmith44.tutors as t
            JOIN psmith44.courses as c on t.course_id=c.id
            LEFT JOIN psmith44.faculty as f on f.user_id=t.authorizing_faculty_id
            LEFT JOIN psmith44.regular_users as ru on ru.user_id=f.user_id
            where t.student_id=%s",
            $_SESSION['user_id']));

          if (mysql_num_rows($result) > 0){
            echo "<tr><th>Course Name</th><th>Application Status</th></tr>";
            while ($row = mysql_fetch_array($result))
            {
              if (is_null($row['authorizer_last_name'])){
                $status = "Pending";
              } else {
                $status = "Authorized by Professor " . $row['authorizer_last_name'];
              }
              echo "<tr><td>" . $row['course_name'] . "</td><td>" . $status . "</td><tr>";
            }
          } else {
            echo "<p>You have not applied to be a tutor.</p>";
          }
        ?>
        </table>
      </div>
    </div>

    <!-- Le javascript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#tutoring").addClass("active");
			});
		</script>
  </body>
</html>
