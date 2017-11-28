<?php

include('../../models/user/user.php');
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];	    
	    $staff = new user();
	    $staff->set_id($id);
	    $result = $staff->selectUser();
	}
	
	
	if (isset($_POST['submit'])) {
		$fullname = $_POST['fullname'];
		$position = $_POST['position'];
		$department = $_POST['department'];
		
			$staff->set_fullname($fullname);
			$staff->set_position($position);
			$staff->set_department($department);
			
			if ($staff->editStaff()=="fail") {
				$err = "Tên phòng ban đã tồn tại";
			}else{
				$_SESSION['thongbao'] = 'Sửa thành công!';
				header("location:../../views/user/list_staff_view.php");
			}
		}
include('../../views/user/edit_staff_view.php');

?>