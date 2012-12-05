<?php 
session_start();
include_once('database.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<?php include('bootstrap_head.html');?>
  </head>
  <body>
  <div class="container">
			<?php include('navbar.html');?>
			<table id="courses_table" class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th>CRN</th>
						<th>Title</th>
						<th>Section</th>
						<th>Days</th>
						<th>Time</th>
						<th>Location</th>
						<th>Mode of Grading</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$result = mysql_query("SELECT id FROM terms WHERE is_current=1;");
					$row = mysql_fetch_array($result);
					$term_id = $row['id'];
					$result = mysql_query("SELECT c.name AS course_name, s.*,ss.grade_mode ".
																"FROM `sections-students` ss ".
																"JOIN sections s ON ss.section_id=s.id ".
																"JOIN courses c ON c.id=s.course_id ".
																"WHERE ss.student_id=".$_SESSION['user_id']." AND s.term_id=$term_id;");
					while($row = mysql_fetch_array($result)){
						echo '<tr>';
						echo "<td>".$row['id']."</td>"; //CRN
						echo "<td>".$row['course_name']."</td>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['days']."</td>";
						echo "<td>".$row['time']."</td>";
						echo "<td>".$row['location']."</td>";
						echo "<td>".$row['grade_mode']."</td>";
						echo '</tr>';
					}

				?>
				</tbody>
			</table>
  </div>
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<script>
				$(document).ready(function() {
					$("#registration").addClass("active");
				});
			</script>
  </body>
</html>
<?php mysql_close($con);?>
