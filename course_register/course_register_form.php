<?php include_once('database.php');?>
<html>
  <head>
		<?php include('bootstrap_head.html');?>
	<script>
		var loadCoursesTable = function(){
			$.get('course_register/populate_table.php',{department_id : $('#department option:selected').val()}, function(data){
				$('#courses_table').html(data);
			});
		}
	</script>
  </head>
  <body>
		<?php include('navbar.html')?>
		<form class="form-horizontal" action="course_register.php" method="post">
			<select id="department">
				<?php
					$result = mysql_query("SELECT * FROM departments");
					while($row = mysql_fetch_array($result)){
						echo "<option value=".$row['id'].">".$row['name']."</option>";
					}
				?>
			</select>
			<table id="courses_table" class="table table-bordered table-hover table-condensed">
			</table>
			<div class="form-options controls">
				<button type="submit" class="btn btn-primary">Register</button>
				<a href="index.php"><button type="button" class="btn">Cancel</button></a>
			</div>
		</form>
	<script>
		$(document).ready(function() {
			loadCoursesTable();
			$("#registration").addClass("active");
		});

		$("#department").change(function(){
			loadCoursesTable();
		});
	</script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php mysql_close($con);?>
