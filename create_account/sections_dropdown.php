<?php
include('../database.php');

$result = mysql_query("SELECT * FROM sections WHERE course_id='".$_GET['course_id']."';");
if(mysql_num_rows($result) > 0){
	while($row = mysql_fetch_array($result)){
		echo "<option>".$row['id']."</option>";
	}
}else{
	echo "<option>No Sections Avaliable</option>";
}
?>
