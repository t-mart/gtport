<?php  
require_once 'user.php';  
require_once 'user_tools.php';  
require_once 'database.php';  
  
//connect to the database  
$db = new DB();  
$db->connect();  
  
$userTools = new UserTools();  
  
//start the session  
session_start();  
  
//refresh session variables if logged in  
if(isset($_SESSION['logged_in'])) {  
    $user = unserialize($_SESSION['user']);  
    $_SESSION['user'] = serialize($userTools->get($user->id));  
}  
?>  