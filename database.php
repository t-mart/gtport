<?php
$mysql_server = "127.0.0.1";
$mysql_port = 3306;
$mysql_user = "psmith44";
$mysql_password = "4400password";
$mysql_database = "psmith44";

$con = mysql_connect($mysql_server, $mysql_user, $mysql_password);
if (!$con) {
  die('Could not connect to ' . $mysql_server . ': ' . mysql_error());
}
mysql_select_db("psmith44", $con) or die("Could not use " . $mysql_database . " database");

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
  $str = @trim($str);
  if(get_magic_quotes_gpc()) {
    $str = stripslashes($str);
  }
  return mysql_real_escape_string($str);
}
?>
