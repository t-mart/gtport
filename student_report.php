<?php 
session_start();
include_once('database.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<?php include('bootstrap_head.html');?>
  </head>
  <body>
			<?php include('navbar.html');?>
  <div class="container">
			<table id="student_report" class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th>Instructor</th>
						<th>Course Code</th>
						<th>Course Name</th>
						<th>Average Grade</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$result = mysql_query("SELECT CONCAT( ru.first_name, ' ', ru.last_name ) AS instructor, d.abbreviation, cd.code, c.name, AVG( gw.weight )AS avg_grade ".
						"FROM regular_users ru ".
						"JOIN faculty f ON ru.user_id = f.user_id ".
						"JOIN `faculty-sections` fs ON f.user_id = fs.faculty_id ".
						"JOIN sections s ON fs.faculty_id = s.id ".
						"JOIN `sections-students` ss ON s.id = ss.section_id ".
						"JOIN grade_weights gw ON gw.letter = ss.grade ".
						"JOIN courses c ON s.course_id = c.id ".
						"JOIN `courses-departments` cd ON c.id = cd.course_id ".
						"JOIN departments d ON cd.department_id = d.id ".
						"WHERE ss.grade_mode = 'Registered' ".
						"AND ss.grade IS NOT NULL  ".
						"GROUP BY cd.id ".
						"ORDER BY instructor;");
					while($row = mysql_fetch_array($result)){
						echo '<tr>';
						echo "<td>".$row['instructor']."</td>"; //CRN
						echo "<td>".$row['abbreviation']." ".$row['code']."</td>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['avg_grade']."</td>";
						echo '</tr>';
					}

				?>
				</tbody>
			</table>
	</div>
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<script>
				$(document).ready(function() {
					$("#grade_report").addClass("active");
				});
			</script>
  </body>
</html>
<?php mysql_close($con);?>
