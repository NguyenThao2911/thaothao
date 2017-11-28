<?php
session_start();
    include('../../models/user/user.php'); 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];  
        $staff = new user();
        $staff->set_id($id);
        $result = $staff->selectUser();
        print_r($result);
    }
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        
        $staff->set_fullname($name);
        $staff->set_name($username);
            
            if ($staff->editInfoUser()=="fail") {
                $err = "Tên tài khoản đã tồn tại";
            }else{
                header("location:../../views/user/edit_info_user_view.php");
            }
        
    }
    include('../../views/user/edit_info_user_view.php');

?>