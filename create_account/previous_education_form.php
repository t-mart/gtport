<?php $num = $_GET['index'];
$html = '<div id="previous_education1" style="border-width:1px;border-style:solid;border-color:#DDD">
	<div class="control-group">
		<label class="control-label" for="previous_education1">Name of Institution Attended</label>
		<div class="controls">
			<input type="text" name="previous_education1_name" placeholder="Institution Attended">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="previous_education1">Major</label>
		<div class="controls">
			<input type="text" name="previous_education1_major" placeholder="Major">
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
			<input type="text" name="previous_education1_year" placeholder="yyyy">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="previous_education1">GPA</label>
		<div class="controls">
			<input type="text" name="previous_education1_gpa" placeholder="GPA">
		</div>
	</div>
</div>';
echo str_replace("education1","education".$num, $html);
?>
