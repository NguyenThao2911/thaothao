<?php
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
	$nFrom = 'AdminCompany'; // Tên người gửi
	$mFrom = 'codecodeandcode@gmail.com';	//gmail để gửi Mail. chỉ những gmail vô hiệu hóa chức năng bảo vệ 2 bước mới gửi được
	$mPass = 'codecodecode';		//mật khẩu của gmail
	$mail             = new PHPMailer();
	$body             = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  	// enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      	
	$mail->Port       = '465';
	$mail->Username   = $mFrom;
	$mail->Password   = $mPass;
	$mail->SetFrom($mFrom, $nFrom);
	//chuyen chuoi thanh mang
	$ccmail = explode(',', $diachicc);
	$ccmail = array_filter($ccmail);
	if(!empty($ccmail)){
		foreach ($ccmail as $k => $v) {
			$mail->AddCC($v);
		}
	}
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $mTo;
	$mail->AddAddress($address, $nTo);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

?>