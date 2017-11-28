<?php

include('../../models/department/department.php');
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];	    
	    $department = new department();
	    $department->set_id($id);
	    $result = $department->select_department();
	}
	
	
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$disc = $_POST['disc'];
		
		if($name){
			$department->set_name_department($name);
			$department->set_disc($disc);
			
			if ($department->editDepartment()=="fail") {
				$err = "Tên phòng ban đã tồn tại";
			}else{
				
				header("location:../../views/user/list_department_view.php");
			}
		}
	}
include('../../views/user/edit_department_view.php');

?>