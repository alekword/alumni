<?php 
	$name = $_POST['name'];

	$alumni_id = $_POST['alumni_id'];
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
		$update_pic = ",alumni_pic = '$pic'";
	}
	
	$sql = "UPDATE alumni SET student_id = '$student_id',
	education = '$alumni_education',
	name_title = '$name_title',
	fname = '$fname',
	lname = '$lname',
	birthdate = '$birthdate',
	website = '$alumni_website',
	facebook = '$alumni_facebook',
	email = '$alumni_email',
	address = '$alumni_address',
	province = '$alumni_province',
	post = '$alumni_post',
	tel = '$alumni_tel',
	fax = '$alumni_fax',
	work_type = '$work_type',
	work_name = '$work_name',
	work_position = '$work_position',
	work_department = '$work_department',
	work_address = '$work_address',
	work_province = '$work_province',
	work_post = '$work_post',
	work_tel = '$work_tel',
	work_fax = '$work_fax' $update_pic WHERE alumni_id = '$alumni_id'";
	$result = mysql_query($sql);
	echo "<script>window.location = 'index.php?modules=user&file=edit_form_user&name=$name';</script>";
?>