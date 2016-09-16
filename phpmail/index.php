<?php
	
	
	/** 分别封装了利用QQ和Gmai来发送邮件的方法
	 * 
	 * 		  
	 * 	时间：2016/9/16														
	 *  作者：anspray
	 */
	

	set_time_limit(0); 									//无时间限制，实际测试在apache上运行到后面会断					
	ignore_user_abort();								//关闭浏览器后程序依然运行

	
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
		$new = "hello world......";						//邮件信息
		QQmail('14*******@qq.com', 'user', $new);		//发送人邮箱和信息																//发送邮件
	}

	
	for($i = 0;$i<=500;$i++){
		sendMail();
		//sendGmail();
	}


?>
</body>
</html>