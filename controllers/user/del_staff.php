<?php
session_start();
if($_SESSION['role']==0){
	include('../../models/user/user.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$user = new user();
		$user->set_id($id);
		if($user->selectUser()=="fail"){
			header("location:../../views/user/list_staff_view.php");
		}
		else{
		$user->delUser();
		header("location:../../views/user/list_staff_view.php");
	}
	}
}else{
	header("location:index.php?controller=user&action=login");
}
?>