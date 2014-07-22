<?php
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string(md5($_POST['password_regis']));
	
	$sql = "INSERT INTO users VALUES ('$username','$password','member')";
	mysql_query($sql);
	
	$student_id = $_POST['student_id'];
	$alumni_education = $_POST['alumni_education'];
	$name_title = $_POST['name_title'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$birthdate = $_POST['day']."-".$_POST['month']."-".$_POST['year'];		
	$alumni_website = $_POST['alumni_website'];
	$alumni_facebook = $_POST['alumni_facebook'];
	$alumni_email = $_POST['alumni_email'];
	$alumni_address = $_POST['alumni_address'];
	$alumni_province = $_POST['alumni_province'];
	$alumni_post = $_POST['alumni_post'];
	$alumni_tel = $_POST['alumni_tel'];
	$alumni_fax = $_POST['alumni_fax'];
	
	$work_type = $_POST['work_type'];
	$work_name = $_POST['work_name'];
	$work_position = $_POST['work_position'];
	$work_department = $_POST['work_department'];
	$work_address = $_POST['work_address'];
	$work_province = $_POST['work_province'];
	$work_post = $_POST['work_post'];
	$work_tel = $_POST['work_tel'];
	$work_fax = $_POST['work_fax'];
	
	$pic = $_FILES['alumni_pic']['name'];
	$alumni_work = $_POST['alumni_work'];
	$pic_tmp = $_FILES['alumni_pic']['tmp_name'];
	
	if($pic){
		copy($pic_tmp,"images/profile/$pic");
	}
	
	$sql2 = "INSERT INTO alumni VALUES ('','$username','$student_id','$alumni_education','$name_title','$fname','$lname','$birthdate','$alumni_website','$alumni_facebook','$alumni_email',
	'$alumni_address','$alumni_province','$alumni_post','$alumni_tel','$alumni_fax','$work_type','$work_name','$work_position',
	'$work_department','$work_address','$work_province','$work_post','$work_tel','$work_fax','$pic')";
	mysql_query($sql2);
	
	echo "<script>alert('ลงทะเบียนเรียบร้อยแล้ว'); window.location = 'index.php';</script>";
?>