<?php
session_start();
if(isset($_SESSION['name'])){
?>

<style text = "text/css">
	.login{
		width: 300px;
		height: 300px;
		border: 1px solid #818181;
		margin: 0 auto;
		padding: 20px;
		background-color: #5fa27f;
	}
	.login form h3{
		color: blue;
		text-align: center;

	}
</style>
<div class="login">
<form method ="post" action="../../controllers/user/change_pass.php">

 <!-- <form method ="post" action="../../index.php?controller=user&action=login"> -->

	<h3>ĐỔI MẬT KHẨU</h3>
	<p>Mật khẩu mới : </p>
	<input type="password" name="newpass" placeholder="Nhập mật khẩu mới">
    <br><br>
	<input type="submit" name="submit" value="Lưu">
</form>
</div>
<?php
}else{
	header("location:login_view.php");
}
?>