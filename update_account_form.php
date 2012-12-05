<?php 
    session_start();
    include_once('database.php');
    
    $user_id = $_SESSION['user_id'];
    
    $reg_users_query = "SELECT * FROM regular_users ru JOIN students s ON s.user_id=ru.user_id JOIN departments d ON d.id = s.department_id".
        " WHERE ru.user_id =".$user_id.";";
        
    $result = mysql_query($reg_users_query);
    $reg_user_row = mysql_fetch_array($result); 
    
    
    
    $school_hist_query = "SELECT * FROM school_histories WHERE student_id=".$user_id.";";
    $result_school = mysql_query($school_hist_query);
    $school_hist_row = mysql_fetch_array($result_school);

?>

<html>
  <head>
		<?php include('bootstrap_head.html');?>
	<script>
		var loadSectionsDropdown = function(){
			$.get('create_account/sections_dropdown.php',{course_id : $('select[name="faculty_course"] option:selected').val()}, function(data){
				$('#faculty_course_section').html(data);
			});
		}
		var addSchool = function(inNum){
			$.get('create_account/previous_education_form.php',{index : inNum}, function(data){
				$('#add_school_button').remove();
				$('#previous_education').append(data);
				$('#previous_education').append('<button type="button" class="btn" id="add_school_button" onclick="addSchool('+(inNum+1)+');">Add Another School</button>');
			});
		}
	</script>
  </head>
  <body>
		<?php include('navbar.html')?>
		<form class="form-horizontal" action="update_account.php" method="post">
			<div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="email" name="email" value="<?php echo $reg_user_row['email']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="first_name">Name</label>
				<div class="controls">
					<input type="text" name="first_name" value="<?php echo $reg_user_row['first_name']; ?>">
					<input type="text" name="last_name" value="<?php echo $reg_user_row['last_name']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="dob">Date of Birth</label>
				<div class="controls">
					<input type="text" name="dob" value="<?php echo $reg_user_row['dob']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="gender">Gender</label>
                <div class="controls">
                    <input type="text" name="gender" value="<?php echo $reg_user_row['gender']; ?>">
                </div>
			</div>
			<div class="control-group">
				<label class="control-label" for="permanent_address">Permanent Address</label>
				<div class="controls">
					<input type="text" name="permanent_address_line1" value="<?php echo $reg_user_row['permanent_address']; ?>"><br/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="current_address">Current Address</label>
				<div class="controls">
					<input type="text" name="current_address_line1" value="<?php echo $reg_user_row['current_address']; ?>"><br/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="phone_number">Contact Number</label>
				<div class="controls">
					<input type="tel" name="phone_number" value="<?php echo $reg_user_row['phone_number']; ?>">
				</div>
			</div>
			<div id="student_options">
				<div class="control-group">
					<label class="control-label" for="student_degree">Degree</label>
					<div class="controls">
						<select name="student_degree">
							<?php $result = mysql_query("SELECT * FROM departments");
								while($row = mysql_fetch_array($result)){
								    if($reg_user_row['department_id'] == $row['id'] ){
                                        echo "<option value=".$row['id']." selected='selected'>".$row['name']."</option>";
                                    }
                                    else {
                                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                                    }
								}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="student_degree_type">Degree Type</label>
					<div class="controls">
					   <select name="student_degree_type">
                        <?php $result = mysql_query("SELECT DISTINCT degree from students;");
                            $i=1;
                            while($row = mysql_fetch_array($result)){
                                if($reg_user_row['degree'] == $row['degree'] ){
                                    echo "<option value=".$i." selected='selected'>".$row['degree']."</option>";
                                }
                                else {
                                    echo "<option value=".$i.">".$row['degree']."</option>";
                                }
                                $i = $i + 1;
                            }
                        ?>
                       </select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="previous_education"><b>Previous Education</b></label>
				</div>

                <div id="previous_education1" style="border-width:1px;border-style:solid;border-color:#DDD">
                    <div class="control-group">
                        <label class="control-label" for="previous_education1">Name of Institution Attended</label>
                        <div class="controls">
                            <input type="text" name="previous_education1_name" value="<?php echo $school_hist_row['name']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="previous_education1">Major</label>
                        <div class="controls">
                            <input type="text" name="previous_education1_major" value="<?php echo $school_hist_row['major']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="previous_education1">Degree</label>
                        <div class="controls">
                            <select name="previous_education1_degree">
                                <option>BS</option>
                                <option>MS</option>
                                <option>PhD</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="previous_education1">Year of Graduation</label>
                        <div class="controls">
                            <input type="text" name="previous_education1_year" value="<?php echo $school_hist_row['grad_year']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="previous_education1">GPA</label>
                        <div class="controls">
                            <input type="text" name="previous_education1_gpa" value="<?php echo $school_hist_row['gpa']; ?>">
                        </div>
                    </div>
                </div>';
                
			</div>
			<div id="faculty_options">
				<div class="control-group">
					<label class="control-label" for="faculty_department">Department</label>
					<div class="controls">
						<select name="faculty_department">
							<?php $result = mysql_query("SELECT * FROM departments");
								while($row = mysql_fetch_array($result)){
									echo "<option value=".$row['id'].">".$row['name']."</option>";
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
					<button type="submit" class="btn btn-primary" name="submit-settings">Update</button>
					<a href="index.php"><button type="button" class="btn">Cancel</button></a>
				</div>
		</form>
	<script>
		$(document).ready(function() {
			$("#faculty_options").hide();
			loadSectionsDropdown();
			addSchool(1);
			$("#update_personal_information").addClass("active");
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
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php mysql_close($con);?>
