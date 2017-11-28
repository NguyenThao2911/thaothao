<?php
if(isset($_GET['action'])){
	switch ($_GET['action']) {
		case "login": include('controllers/user/login.php');
		break;	
		case "logout": include('controllers/user/logout.php');
		break;
		case "edit_department": include('controllers/user/edit_department.php');
		break;
	}
}
?>