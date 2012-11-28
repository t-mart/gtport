<html>
  <head>
		<?php include('bootstrap_head.html');?>
  </head>
  <body>
		<?php include('navbar.html')?>
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="username">Username</label>
				<div class="controls">
					<input type="text" id="username" placeholder="Username">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" id="password" placeholder="Password">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="confirm_password">Confirm Password</label>
				<div class="controls">
					<input type="password" id="confirm_password" placeholder="Confirm Password">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="email" id="email" placeholder="user@host.com">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="first_name">Name</label>
				<div class="controls">
					<input type="text" id="first_name" placeholder="First Name">
					<input type="text" id="last_name" placeholder="Last Name">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="dob">Date of Birth</label>
				<div class="controls">
					<input type="text" id="dob" placeholder="yyyy/mm/dd">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="gender">Gender</label>
				<div class="controls">
					<select id="gender">
						<option>Male</option>
						<option>Female</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="permanent_address">Permanent Address</label>
				<div class="controls">
					<input type="text" id="permanent_address_line1" placeholder="Street Line 1"><br/>
					<input type="text" id="permanent_address_line2" placeholder="Street Line 2"><br/>
					<input type="text" id="permanent_address_line3" placeholder="City,State Zip">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="current_address">Current Address</label>
				<div class="controls">
					<input type="text" id="current_address_line1" placeholder="Street Line 1"><br/>
					<input type="text" id="current_address_line2" placeholder="Street Line 2"><br/>
					<input type="text" id="current_address_line3" placeholder="City,State Zip">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="phone_number">Contact Number</label>
				<div class="controls">
					<input type="tel" id="phone_number" placeholder="(555)555-5555">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="user_type">Type of User</label>
				<div class="controls">
					<select id="user_type">
						<option>Student</option>
						<option>Faculty</option>
					</select>
				</div>
			</div>
			<div id="student_options">
				<div class="control-group">
					<label class="control-label" for="student_degree">Degree</label>
					<div class="controls">
						<select id="student_degree">
						<!-- TODO Populate options from DB-->
							<option>AE</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="student_degree_type">Degree Type</label>
					<div class="controls">
						<select id="student_degree_type">
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
						<select id="faculty_department">
						<!-- TODO Populate options from DB-->
							<option>AE</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="faculty_position">Position</label>
					<div class="controls">
						<select id="faculty_position">
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
						<select id="faculty_course">
						<!-- TODO Populate options from DB-->
							<option>CS 7689</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="faculty_course_section">Section</label>
					<div class="controls">
						<select id="faculty_course_section">
						<!-- TODO Populate options from DB-->
							<option>A</option>
						</select>
					</div>
				</div>
				<div>Research Interests</div>
			</div>
			<div class="form-options controls">
				<button type="submit" class="btn btn-primary">Register</button>
				<button type="button" class="btn">Cancel</button>
			</div>

		</form>
	<script>
		$(document).ready(function() {
			$("#faculty_options").hide();
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
	</script>
  </body>
</html>
