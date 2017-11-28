<?php
session_start();
if($_SESSION['role']==0){
	include('../../models/user/user.php');
	if(isset($_POST['submit'])){
		$fullname = $_POST['fullname'];
		$sex = $_POST['rdo'];
		$birthday = $_POST['birthday'];
		$email = $_POST['email'];
		$position = $_POST['position'];
		$department = $_POST['department'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$role = $_POST['role'];
		if($fullname && $username && $password){
			$staff = new user();
			$staff->set_fullname($fullname);
			$staff->set_sex($sex);
			$staff->set_birthday($birthday);
			$staff->set_email($email);
			$staff->set_position($position);
			$staff->set_department($department);
			$staff->set_name($username);
			$staff->set_pass($password);
			$staff->set_role($role);

			if($staff->addStaff()=="fail"){
				$err = "Tên tài khoản đã tồn tại";

			}else{
				$_SESSION['thongbao'] = 'Them thanh cong';
				header("location:../../views/user/list_staff_view.php" . "?id=" . $department);
				
			}
		}
	}
		include('../../views/user/add_staff_view.php');
	}else{
		header("location:../../views/user/login_view.php");
}
?>