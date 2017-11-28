<?php
session_start();
if($_SESSION['role']==0){
	include('../../models/department/department.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$department = new department();
		$department->set_id($id);
		if($department->select_department()=="fail"){
			header("location:../../views/user/list_department_view.php");
		}
		else{
		$department->delDepartment();
		header("location:../../views/user/list_department_view.php");
	}
	}
}else{
	header("location:index.php?controller=user&action=login");
}
?>