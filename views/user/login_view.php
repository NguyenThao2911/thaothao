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
<form method ="post" action="../../controllers/user/login.php">

 <!-- <form method ="post" action="../../index.php?controller=user&action=login"> -->

    <h3 style = "color:red;"><?php 
           if(isset($err)){
           echo $err;
           }
        ?>
    </h3>
	<h3>ĐĂNG NHẬP</h3>
	<p>UserName : </p>
	<input type="text" name="username" placeholder="Nhập tên đăng nhập">
	<p>Password</p>
	<input type="password" name="password" placeholder="Nhập mật khẩu"><br><br>
	<input type="submit" name="submit" value="Đăng nhập">
</form>
</div>