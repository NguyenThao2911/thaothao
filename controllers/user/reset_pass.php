<?php
include('../../models/user/user.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
   $newpass = uniqid();
	$user = new user();
	$user->set_id($id);
   $user->set_pass($newpass);
   $user->resetPass();
	$result = $user->selectUser();
 
}


      //goi thu vien
   include('../../mail/class.smtp.php');
   include('../../mail/class.phpmailer.php'); 
   include('../../mail/functions.php'); 
   $title = 'Reset password'; // tiêu đề mail
   $content = "Chào bạn".$result['fullname']."!<br>Mật khẩu của bạn đã được thay đổi thành:".$newpass."<br>Mời bạn truy cập lại. Xin Cảm ơn!";
   //content là nội dung mail
   $nTo = $result['fullname']; //tên người nhận mail
   $mTo = $result['email']; // gmail của người nhận mail
   //test gui mail
   $mail = sendMail($title, $content, $nTo, $mTo);
   if($mail==1)
   echo 'Mail đã được gửi đi';
   else echo 'Lỗi!';

?>