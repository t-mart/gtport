<thead>
	<tr>
		<th>Select</th>
		<th>CRN</th>
		<th>Title</th>
		<th>Course Code</th>
		<th>Section</th>
		<th>Instructor</th>
		<th>Days</th>
		<th>Time</th>
		<th>Location</th>
		<th>Mode of Grading</th>
	</tr>
</thead>
<tbody>
<?php
	include_once('../database.php');
	$department_id = $_GET['department_id'];
	$result = mysql_query("SELECT id FROM terms WHERE is_current=1;");
	$row = mysql_fetch_array($result);
	$term_id = $row['id'];
	if($department_id==-1){
		$result = mysql_query("SELECT ru.first_name,ru.last_name,c.name AS course_name,d.abbreviation, dc.code,s.* FROM sections s ".
														"JOIN courses c ON s.course_id=c.id ".
														"JOIN `courses-departments` dc ON dc.course_id=c.id ".
														"JOIN departments d ON d.id=dc.department_id ".
														"JOIN `faculty-sections` fs ON fs.section_id=s.id ".
														"JOIN regular_users ru ON ru.user_id=fs.faculty_id ".
														"WHERE s.term_id=$term_id;");
	}else{
		$result = mysql_query("SELECT ru.first_name,ru.last_name,c.name AS course_name,d.abbreviation, dc.code,s.* FROM sections s ".
														"JOIN courses c ON s.course_id=c.id ".
														"JOIN `courses-departments` dc ON dc.course_id=c.id ".
														"JOIN departments d ON d.id=dc.department_id ".
														"JOIN `faculty-sections` fs ON fs.section_id=s.id ".
														"JOIN regular_users ru ON ru.user_id=fs.faculty_id ".
														"WHERE s.term_id=$term_id AND d.id=$department_id;");
	}
	while($row = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td></td>'; //checkbox
		echo "<td>".$row['id']."</td>"; //CRN
		echo "<td>".$row['course_name']."</td>";
		echo "<td>".$row['abbreviation']." ".$row['code']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['last_name'].", ".$row['first_name']."</td>";
		echo "<td>".$row['days']."</td>";
		echo "<td>".$row['time']."</td>";
		echo "<td>".$row['location']."</td>";
		echo "<td>";
		echo '<select>
			<option>Register</option>
			<option>P/F</option>
			<option>Audit</option></select>';
		echo '</tr>';
	}

?>
</tbody>
