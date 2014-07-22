<?php
	include("include/connect.php");
	$username = mysql_real_escape_string($_POST['username']);
	
	$check = mysql_query("SELECT username FROM users WHERE username ='$username'");
	$check_num_rows = mysql_num_rows($check);
	
	if($username == null){
		
	}else if(mb_strlen($username,"UTF-8") < 5){
		echo "<font color='orange'>ชื่อควรมีอย่างน้อย 5 ตัวอักษร</font>";
	}else{
		if($check_num_rows == 0){
			echo "<font color='green'>ชื่อนี้สามารถใช้งานได้</font>";
		}else if($check_num_rows == 1){
			echo "<font color='red'>ชื่อนี้ไม่สามารถใช้งานได้ </font>";
		}
	}
	
	
?>