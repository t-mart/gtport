<?php
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'POST':
		handleForm();
    break;
  case 'GET':
		include('create_account/create_account_form.php');
    break;
}

function handleForm(){
	var_dump($_POST);
}
?>
