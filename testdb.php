<?php
include('database.php');

$result = mysql_query("SELECT * FROM regular_users");

echo "<pre>";
while($row = mysql_fetch_array($result))
  {
var_dump($row);
  }

echo "</pre>";

mysql_close($con);
?>
