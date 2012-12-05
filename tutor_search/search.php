<table class="table table-bordered table-hover table-condensed">
<thead>
	<tr>
		<th>Course Code</th>
		<th>Course Name</th>
		<th>Tutor Name</th>
		<th>Tutor Email Address</th>
	</tr>
</thead>
<tbody>
<?php
	include_once('../database.php');
	$course_code = explode(" ",$_GET['course_code']);
	$query = "SELECT c.name, d.abbreviation,cd.code,ru.first_name,ru.last_name,ru.email ".
						"FROM tutors t ".
						"JOIN regular_users ru ON t.student_id=ru.user_id ".
						"JOIN courses c ON c.id=t.course_id ".
						"JOIN `courses-departments` cd ON c.id=cd.course_id ".
						"JOIN departments d ON d.id=cd.department_id ".
						"WHERE ";
	if(isset($_GET['course_code']) && $_GET['course_code']!="")
		$query .= "concat_ws(' ',d.abbreviation,cd.code) LIKE '%".$_GET['course_code']."%' ";
	else if(isset($_GET['keyword']) && $_GET['keyword']!="")
		$query .= "c.name LIKE '%".$_GET['keyword']."%' ";
	else
		$query = "";
	
	//echo $query;

	if($query!=""){
		$result = mysql_query($query);
		while($row = mysql_fetch_array($result)){
			echo '<tr>';
			echo "<td>".$row['abbreviation']." ".$row['code']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['first_name'].", ".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			echo '</tr>';
		}
	}
?>
</tbody>
</table>
