<?php include('database.php');?>
<html>
  <head>
		<?php include('bootstrap_head.html');?>
	<script>
	var loadSectionsDropdown = function(){
				$.get('create_account/sections_dropdown.php',{course_id : $('select[name="faculty_course"] option:selected').val()}, function(data){
					$('#faculty_course_section').html(data);
				});
			}
	</script>
  </head>
  <body>
		<?php //include('navbar.html')?>
		<form class="form-horizontal" action="create_account.php" method="post">
			<div class="control-group">
				<label class="control-label" for="username">Username</label>
				<div class="controls">
					<input type="text" name="username" placeholder="Username"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" name="password" placeholder="Password">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="confirm_password">Confirm Password</label>
				<div class="controls">
					<input type="password" name="confirm_password" placeholder="Confirm Password">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="email" name="email" placeholder="user@host.com">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="first_name">Name</label>
				<div class="controls">
					<input type="text" name="first_name" placeholder="First Name">
					<input type="text" name="last_name" placeholder="Last Name">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="dob">Date of Birth</label>
				<div class="controls">
					<input type="text" name="dob" placeholder="yyyy/mm/dd">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="gender">Gender</label>
				<div class="controls">
					<select name="gender">
						<option>Male</option>
						<option>Female</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="permanent_address">Permanent Address</label>
				<div class="controls">
					<input type="text" name="permanent_address_line1" placeholder="Street Line 1"><br/>
					<input type="text" name="permanent_address_line2" placeholder="Street Line 2"><br/>
					<input type="text" name="permanent_address_line3" placeholder="City,State Zip">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="current_address">Current Address</label>
				<div class="controls">
					<input type="text" name="current_address_line1" placeholder="Street Line 1"><br/>
					<input type="text" name="current_address_line2" placeholder="Street Line 2"><br/>
					<input type="text" name="current_address_line3" placeholder="City,State Zip">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="phone_number">Contact Number</label>
				<div class="controls">
					<input type="tel" name="phone_number" placeholder="(555)555-5555">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="user_type">Type of User</label>
				<div class="controls">
					<select name="user_type" id="user_type">
						<option>Student</option>
						<option>Faculty</option>
					</select>
				</div>
			</div>
			<div id="student_options">
				<div class="control-group">
					<label class="control-label" for="student_degree">Degree</label>
					<div class="controls">
						<select name="student_degree">
							<?php $result = mysql_query("SELECT * FROM departments");
								while($row = mysql_fetch_array($result)){
									echo "<option>".$row['name']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="student_degree_type">Degree Type</label>
					<div class="controls">
						<select name="student_degree_type">
							<option>BS</option>
							<option>MS</option>
							<option>PhD</option>
						</select>
					</div>
				</div>
				<div>Tutoring Options</div>
				<div>Previous Education</div>
			</div>
			<div id="faculty_options">
				<div class="control-group">
					<label class="control-label" for="faculty_department">Department</label>
					<div class="controls">
						<select name="faculty_department">
							<?php $result = mysql_query("SELECT * FROM departments");
								while($row = mysql_fetch_array($result)){
									echo "<option>".$row['name']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="faculty_position">Position</label>
					<div class="controls">
						<select name="faculty_position">
						<!-- TODO Populate options from DB-->
							<option>Professor</option>
							<option>Associate Professor</option>
							<option>Assistant Professor</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="faculty_course">Course</label>
					<div class="controls">
						<select name="faculty_course" id="faculty_course">
							<?php $result = mysql_query("SELECT * FROM courses");
								while($row = mysql_fetch_array($result)){
									echo "<option value=".$row['id'].">".$row['name']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="faculty_course_section">Section</label>
					<div class="controls">
						<select name="faculty_course_section" id="faculty_course_section">
						<!-- TODO Populate options from DB-->
							<option>A</option>
							<option>B</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="research_interests">Research Interests</label>
					<div class="controls">
						<input type="text" name="research_interests" placeholder="Comma-Seperated Research Interests">
					</div>
				</div>
				</div>
				<div class="form-options controls">
					<button type="submit" class="btn btn-primary">Register</button>
					<button type="button" class="btn">Cancel</button>
				</div>
		</form>
	<script>
		$(document).ready(function() {
			$("#faculty_options").hide();
			loadSectionsDropdown();
		});

		$("#user_type").change(function(){
			if($("#user_type option:selected").text() == "Student"){
				$("#faculty_options").hide();
				$("#student_options").show();
			}else if($("#user_type option:selected").text() == "Faculty"){
				$("#faculty_options").show();
				$("#student_options").hide();
			}
		});

		$("#faculty_course").change(function(){loadSectionsDropdown();});
	</script>
  </body>
</html>
<?php mysql_close($con);?>
