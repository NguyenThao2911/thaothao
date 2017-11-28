<?php
session_start();
	
	// if (isset($_SESSION['name'])) {
	// 	header('Location: ../../index.php');
	// }
include('../../models/user/user.php');
	if (isset($_POST['submit'])) {
		$u = $_POST['username'];
		$p = md5($_POST['password']);
        if($u && $p){
        	$user = new user();
        	$user->set_name($u);
        	$user->set_pass($p);
        	if($user->login()=="ok"){
                        if($_SESSION['first_login']==0){
                                header('Location: ../../views/user/change_pass_view.php');
                        }
        		if($_SESSION['first_login']==1){
        			header('Location: ../../index.php');
        		
        	        }
        	        }else{
                        $err = "Tên đăng nhập không tồn tại";
                }	
        }
}
include('../../views/user/login_view.php');
?>