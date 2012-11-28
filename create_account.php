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
				<label class="control-label" for="user_type">Type of User</label>
				<div class="controls">
					<select>
						<option>Student</option>
						<option>Faculty</option>
					</select>
				</div>
			</div>
			<div id="student_options">
			</div>
			<div id="faculty_options">
			</div>
			<div class="form-options controls">
				<button type="submit" class="btn btn-primary">Register</button>
				<button type="button" class="btn">Cancel</button>
			</div>

		</form>
  </body>
</html>
