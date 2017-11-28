<?php
session_start();
include('../../models/user/user.php');

if (isset($_POST['submit'])) {
	$p = md5($_POST['newpass']);

	$user = new user();

	$user->set_pass($p);
	$user->setfirstlogin();

	if($_SESSION['role'] == 0){
        header('Location: ../../index.php');
    }else{
        $err= "Bạn không phải admin";
        header('Location: ../../views/user/login_view.php');
    }

}
include('../../views/user/change_pass_view.php'); 
?>