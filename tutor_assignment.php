<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include('bootstrap_head.html')?>
  <title>Tutor Assignment</title>
  </head>

  <body>

	<?php include('navbar.html') ?>


    <div class="container">
      <div id="apply_tutor">
        <h2>Students Applying to Tutor</h2>
        <table class="table table-striped">
        <?php
          $result = mysql_query(sprintf("SELECT c.name as course_name, CONCAT(ru.first_name, ' ', ru.last_name) as student_name, ss.grade as student_grade, t.id as tutor_id
            FROM tutors as t
            JOIN courses as c on c.id=t.course_id
            JOIN sections as s on s.course_id=c.id
            JOIN `faculty-sections` as fs on fs.section_id=s.id
            JOIN regular_users as ru on ru.user_id=t.student_id
            JOIN `sections-students` as ss on ss.student_id=t.student_id and ss.section_id=s.id
            WHERE fs.faculty_id=%d and t.authorizing_faculty_id IS NULL",
            $_SESSION['user_id']));

          if (mysql_num_rows($result) > 0){
            echo "<tr><th>Course Name</th><th>Student Name</th><th>Grade Recieved</th><th>Authorize</th></tr>";
            while ($row = mysql_fetch_array($result))
            {
              echo "<tr><td>" . $row['course_name'] . "</td><td>" . $row['student_name'] . "</td><td>" . $row['student_grade'] . "</td><td><a href='tutor_authorize.php?tutor_id=" . $row['tutor_id'] . "&authorizing_faculty_id=" . $_SESSION['user_id']. "'>Authorize</a></td><tr>";
            }
          } else {
            echo "<p>There are no students applying to tutor courses you teach.</p>";
          }
        ?>
        </table>
      </div>
    </div>

    <!-- Le javascript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
