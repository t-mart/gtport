<?php
$con = mysql_connect("localhost","psmith44","4400password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("psmith44", $con);
?>
