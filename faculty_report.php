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
			<table id="faculty_report" class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>Course Name</th>
						<th>Number of Meetings with Tutors</th>
						<th>Average Grade of Student</th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<td rowspan="3" style="vertical-align:middle">Test Course</td>
					<td>3+</td>
					<td>4.0</td>
				</tr>
				<tr>
					<td>1-3</td>
					<td>3.67</td>
				</tr>
				<tr>
					<td>0</td>
					<td>2.34</td>
				</tr>
				<?php
					$result = mysql_query("SELECT * FROM courses;");
					while($row = mysql_fetch_array($result)){
						echo '<tr>';
							echo '<td rowspan="3" style="vertical-align:middle">'.$row['name'].'</td>';
							echo '<td>3+</td>';
							echo '<td>4.0</td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>1-3</td>';
							echo '<td>3.67</td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>0</td>';
							echo '<td>2.34</td>';
						echo '</tr>';
					}

				?>
				</tbody>
			</table>
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<script>
				$(document).ready(function() {
					$("#view_faculty_report").addClass("active");
				});
			</script>
  </body>
</html>
<?php mysql_close($con);?>
