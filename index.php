<?php
	session_start();
	include("include/connect.php");
	$modules = $_GET['modules'];
	$file = $_GET['file'];
?>
<html>
<head>
<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<meta charset="utf-8"/>
	<title>ฐานข้อมูลศิษย์เก่า สาขาวิชาระบบสารสนเทศทางคอมพิวเตอร์</title>
	<style>
		 body{
			background-image: url("images/bg.png");
		 }
	</style>
</head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">


<body>
<div id="layout">
	<div id="header">
		<img src="images/header.png">
	</div>
	<div id="menu">
		<p align="left">ฐานข้อมูลศิษย์เก่า สาขาวิชาระบบสารสนเทศทางคอมพิวเตอร์ มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</p>
	</div>
	<div id="main">
		<div id="sidebar">
			<?php
				if(empty($_SESSION['name'])){
					include("login_form.php");
				}else{
					include("include/menu.php");
				}
			?>
		
			<div class="panel panel-primary">
				<div class="panel-heading">
					<b> สุขสันต์วันเกิดศิษย์เก่าที่เกิดในเดือนนี้</b>					
				</div>
				<div class="panel-body">
					<?php include("birthdate.php"); ?>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<b> Facebook</b>
				</div>
				<div class="panel-body">
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fcisrmutlcnx%3Ffref%3Dts&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=321151204640290" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px; width: 265px;" allowTransparency="true"></iframe>
				</div>
			</div>
		</div>
		<div id="content">
					<?php
						if($modules){
							include("modules/$modules/$file.php");
						}else{
							include("modules/user/regis_alumni.php");
						}
					?>
			
		</div>
	</div>
		<hr style="display: block; height: 1px; border: 5; border-top: 4px solid #3b84c3; margin: 1em 0; padding: 0;">
	<div id="footer">
		<p><b>© สงวนลิขสิทธิ์ 2557 สาขาวิชาระบบสารสนเทศทางคอมพิวเตอร์ มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา ภาคพายัพเชียงใหม่</b></p>
		<p><b>มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา (มทร.ล้านนา) 128 ถนนห้วยแก้ว ต.ช้างเผือก อ.เมือง จ.เชียงใหม่ 50300 </b></p>
		<p><b>โทรศัพท์: 0-5392-1444 โทรสาร: 0-5321-3183 E-mail: webmaster@rmutl.ac.th</b></p>
	</div>
</div>
<script  type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/my_script.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#feedback').load('check.php').show();		
		$('#username_input').keyup(function() {
			$.post('check.php',{username: form.username.value} ,
			function(result) {
				$('#feedback').html(result).show();
			});
		});
		
		/** KeyUP Check Password **/
		$('#confirm_password').keyup(function(){
			var pass    =   $('#password_regis').val();
			var cpass   =   $('#confirm_password').val();
			if(pass!=cpass){
				$('#message').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
			}
			else{
				 $('#message').html('รหัสผ่านถูกต้อง').css('color', 'green');
			}
		});
		
		$('#regis_alumni').submit(function (){
			var check_name = $('#feedback').text();
			var username = $('#username_input').val();
			var password_regis = $('#password_regis').val();
			var confirm_password = $('#confirm_password').val();
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			
			/** Check From Register **/
			if(check_name == "ชื่อนี้ไม่สามารถใช้งานได้"){
				alert('ชื่อผู้ใช้นี้ไม่สามารถใช้งานได้');
				$('#username_input').focus();
				return false;
			}else if(username == ""){
				alert('กรุณากรอกชื่อผู้ใช้');
				$('#username_input').focus();
				return false;
			}else if(username.length < 5){
				alert('ชื่อควรมีอย่างน้อย 5 ตัวอักษร');
				$('#username_input').focus();
				return false;
			}else if(password_regis == ""){
				alert('กรุณากรอกรหัสผ่าน');
				$('#password_regis').focus();
				return false;			
			}else if(confirm_password == ""){
				alert('กรุณากรอกรหัสผ่าน');
				$('#confirm_password').focus();
				return false;			
			}else if(confirm_password != password_regis){
				alert('รหัสผ่านไม่ตรงกัน');
				$('#confirm_password').focus();
				return false;			
			}
			if(fname == ""){
				alert('กรุณากรอกชื่อ');
				$('#fname').focus();
				return false;
			}else if(lname == ""){
				alert('กรุณากรอกนามสกุล');
				$('#lname').focus();
				return false;
			}
			
			
			/*** Check Birthdate ***/
			var day = $('#day').val();
			var month = $('#month').val();
			var year = $('#year').val();
			
			if(day == ""){
				alert('กรุณาเลือกวันที่เกิด');
				$('#day').focus();
				return false;
			}else if(month == ""){
				alert('กรุณาเลือกเดือนที่เกิด');
				$('#month').focus();
				return false;
			}else if(year == ""){
				alert('กรุณาเลือกปีที่เกิด');
				$('#year').focus();
				return false;
			}


		});
	});
	
</script>
</body>

</html>