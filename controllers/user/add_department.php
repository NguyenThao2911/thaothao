<?php
session_start();
if($_SESSION['role']==0){
	include('../../models/department/department.php');
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$disc = $_POST['disc'];
		if($name){
			$department = new department();
			$department->set_name_department($name);
			$department->set_disc($disc);
			
			if($department->addDepartment()=="fail"){
				$err = "Tên phòng ban đã tồn tại";

			}else{
				header("location:../../views/user/list_department_view.php");
			}
		}
	}
		include('../../views/user/add_department_view.php');
	}else{
		header("location:../../views/user/login_view.php");
}
?>