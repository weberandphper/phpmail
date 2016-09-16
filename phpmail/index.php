<html>
<head>
<meta charset="utf-8">
<title>email</title>
</head>
<body>
<?php

	set_time_limit(0); 				

	ignore_user_abort();

	
	require_once './libs/class.phpmailer.php';
	require_once './libs/function.php';
	
	
	//QQ邮件发送	
	function QQmail($address,$toname,$new){
		sendQQmail($address,$toname,$new);
	}
	
	//Gmail邮件发送
	function gmail($address,$toname,$new){
		sendGmail($address,$toname,$new);
	}


	function sendMail(){
		$new = "hello world......";
		QQmail('14287*****@qq.com', 'user', $new);																		//发送邮件
	}

	
	for($i = 0;$i<=500;$i++){
		/*循环发送数据*/
		sendMail();

		echo "hello";

	}


?>
</body>
</html>