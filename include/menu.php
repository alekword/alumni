
<?php
	if($_SESSION['type'] == "member"){		

	echo"<div class='panel panel-primary'>
				<div class='panel-heading'>
					<b>เมนูสำหรับสมาชิก</b>					
				</div>
				<div class='panel-body'>
						<p><img src='images/profile/$_SESSION[pic]' width='40' height='40'> $_SESSION[fullname]</p>
						<p><a href='index.php?modules=user&file=edit_form_user&name=$_SESSION[name]'><span class='glyphicon glyphicon-user'></span> แก้ไขข้อมูลส่วนตัว</a></p>
						<p><a href='index.php?modules=report&file=alumni_print&name=$_SESSION[name]'><span class='glyphicon glyphicon-print'></span> พิมพ์ประวัติ</a></p>
						<p align='right'><a href='logout.php'><button class='btn btn-danger'><span class='glyphicon glyphicon-open'></span> ออกจากระบบ</button></a></p>
				</div>
		</div>";

}else if($_SESSION['type'] == "admin"){		
	echo "<div class='panel panel-primary'>
				<div class='panel-heading'>
					<b>เมนูสำหรับผู้ดูแลระบบ</b>					
				</div>
				<div class='panel-body'>
						<p><a href='index.php?modules=admin&file=manage_alumni'> <span class='glyphicon glyphicon-user'></span> จัดการข้อมูลศิษย์เก่า</a></p>
						<p><a href='index.php?modules=admin&file=pie2'> <span class='glyphicon glyphicon-th'></span> pie chart แสดงจำนวนศิษย์เก่า</a></p>
						<p align='right'><a href='logout.php'><button class='btn btn-danger'><span class='glyphicon glyphicon-open'></span> ออกจากระบบ</button></a></p>

				</div>
		</div>";
}

?>