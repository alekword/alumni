<?php 
	session_start();
	include("include/connect.php");
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string(md5($_POST['password']));
	
	$sql = "SELECT count(*) FROM users WHERE(username = '$username' AND password = '$password')";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	if($row[0] > 0){
		
		$sql2 = "SELECT username,usertype FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysql_query($sql2);
		list($user,$type) = mysql_fetch_row($result);		
		$_SESSION['name'] = $user;
		$_SESSION['type'] = $type;
		$_SESSION['valid_checked'] = "valid_checked";
		
		/*** Name And Picture ***/
		$sql3 = "SELECT  fname,lname,pic FROM alumni WHERE alumni_username = '$username'";
		$result = mysql_query($sql3);
		list($alumni_name,$alumni_lname,$alumni_pic) = mysql_fetch_row($result);
		$_SESSION['pic'] = $alumni_pic;
		$_SESSION['fullname'] = $alumni_name." ".$alumni_lname;
		echo "<script>window.location = 'index.php';</script>";
	}else{
		echo "*ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
	}
?>