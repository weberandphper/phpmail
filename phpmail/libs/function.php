<?php

/*经过测试，要是收件人不存在，若不出现错误依然返回true 也就是说在发送之前 自己需要些方法实现检测该邮箱是否真实有效*/


//PS：采用QQ邮件服务器的发送函数
function sendQQmail($address,$toname,$new){
	
	// echo $address.$toname.$new;
	// exit();
	error_reporting(E_STRICT);
	date_default_timezone_set('Asia/Shanghai');		//设置发送时区
	
	
	$mail = new PHPMailer();			
	$mail->SMTPDebug = 1;														//是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
	$mail->isSMTP();															//使用smtp鉴权方式发送邮件，当然你可以选择pop方式 sendmail方式等 本文不做详解
	$mail->SMTPAuth=true;														//smtp需要鉴权 这个必须是true
	$mail->Host = 'smtp.qq.com';												//链接qq域名邮箱的服务器地址
	$mail->SMTPSecure = 'ssl';													//设置使用ssl加密方式登录鉴权
	$mail->Port = 465;															//设置ssl连接smtp服务器的远程服务器端口号 可选465或587
	$mail->Helo = '诈骗分子';													//设置smtp的helo消息头 这个可有可无 内容任意
	$mail->Hostname = '诈骗分子';												//设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
	$mail->CharSet = 'UTF-8';												//设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
	$mail->FromName = '下次骚扰10000封,刷爆你为止';								//设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
	$mail->Username ='142******@qq.com';										//smtp登录的账号 这里填入字符串格式的qq号即可
	$mail->Password = 'siguauribapfhjdg';										//smtp登录的密码 这里填入“独立密码” 若为设置“独立密码”则填入登录qq的密码 建议设置“独立密码”
	$mail->From = '14*****@qq.com';											//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
	$mail->isHTML(true); 														//邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
	$mail->addAddress($address,$toname);									//设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
	$mail->Subject = 'hello world';								//添加该邮件的主题
	$mail->Body = "$new";		  												//添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
																				// $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');同样该方法可以多次调用 上传多个附件
	$status = $mail->send();
	if($status) {
	 echo 'Email sending';														//简单的判断与提示信息
	}else{
	 echo 'Email sending failure：'.$mail->ErrorInfo;
	}	
}



//发送gmail的邮件函数
function sendGmail($address,$toname,$new){
	error_reporting(E_STRICT);
	date_default_timezone_set('Asia/Shanghai');		//设置发送时区
	header("Content-Type :text/html; charset=utf-8");  //必须设置邮件编码，不然无法保证主题，标题乱码
	
	$mail				= new PHPMailer();
	$mail->Charset		= "UTF-8";
	$mail->IsSMTP();								  // telling the class to use SMTP
	$mail->Host			= "html5";				  // SMTP server
	$mail->SMTPDebug	= 2;						  // enables SMTP debug information (for testing)
													  // 1 = errors and messages
													  // 2 = messages only
	$mail->SMTPAuth     = true;						  // enable SMTP authentication
	$mail->SMTPSecure   = "ssl";					  // sets the prefix to the servier
	$mail->Host         = "smtp.gmail.com";			  // sets GMAIL as the SMTP server
	$mail->Port         = 465;						  // set the SMTP port for the GMAIL server
	$mail->Username     = "***1034****40@gmail.com";  // GMAIL username
	$mail->Password     = "cfw142*******";            // GMAIL password
	$mail->SetFrom('cfw10*******@gmail.com', '....');
	$mail->AddReplyTo("cfw1******@gmail.com","...");
	$mail->Subject		= "rubbish";
	$mail->AltBody		= "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->MsgHTML($new);							  //要发送的信息内容
	// $address			= $toname;
	$mail->AddAddress($address, $toname);
	// $mail->AddAttachment("images/phpmailer.gif");      // attachment
	// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
	if(!$mail->Send()) {
	  echo "邮件发送失败: " . $mail->ErrorInfo;
	} else {
	  echo "邮件发送成功!";
	}
}
?>