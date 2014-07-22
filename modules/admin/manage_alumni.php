
<div class="panel panel-primary">
				<div class="panel-heading">
					<b>จัดการข้อมูลศิษย์เก่า</b>
				</div>
				
				<div class="panel-body">
						<form role="form" style="padding: 10px;" action="" method="POST" enctype="multipart/form-data">
							<b>แสดงข้อมูลศิษย์เก่า : </b><select name="show_alumni" onchange="this.form.submit()">
								<option value="เทียบโฮน" <?php if($_POST['show_alumni'] == "เทียบโอน"){ echo "selected='selected'"; }?>>ปริญญาตรี เทียบโอน</option>
								<option value="4 ปี" <?php if($_POST['show_alumni'] == "4 ปี"){ echo "selected='selected'"; }?>>ปริญญาตรี 4 ปี</option>
							</select>
							<br><br>
							<table align="right" width="100%" border="1" id="manage_alumni" class="table table-striped table-bordered">
								<tr><th>รหัสนักศึกษา</th><th>ชื่อ-นามสกุล</th><th>แก้ไข</th><th>ลบ</th><th>พิมพ์ประวัติ</th></tr>
							<?php
								if($_POST['show_alumni']){
									if($_POST['show_alumni'] == "เทียบโฮน"){
										$sql = "SELECT alumni_username,student_id,name_title,fname,lname FROM alumni WHERE education ='ปริญญาตรี (เทียบโอน)'";
									}else{
										$sql = "SELECT alumni_username,student_id,name_title,fname,lname FROM alumni WHERE education ='ปริญญาตรี (4 ปี) '";
									}
								}else{
									$sql = "SELECT alumni_username,student_id,name_title,fname,lname FROM alumni WHERE education ='ปริญญาตรี (เทียบโอน)'";
								}
								
								$result = mysql_query($sql);								
								$allrows = mysql_num_rows($result); // mysql_num_row ฟังกชั่นในการนับจำนวนแถวที่ SELECT ออกมาได้ ค่าที่ได้เป็น Integer
								$rowperpage = 10;
								$allpages = ceil($allrows/$rowperpage);
	
								if($_GET['page_id']){
									$startrow = ($_GET['page_id'] - 1) * $rowperpage;
								}else{
									$startrow = 0;
								}
								
								$sql2 = $sql2.$sql. "LIMIT $startrow, $rowperpage ";
								$result = mysql_query($sql2);								
								while(list($username,$student_id,$name_title,$fname,$lname) = mysql_fetch_row($result)){
									echo "<tr><td>$student_id</td><td>$name_title$fname  $lname</td>									
									<td align='center'><a href='index.php?modules=admin&file=edit_form_user&name=$username'><span class='glyphicon glyphicon-pencil'></span></a></td>
									<td align='center'><a href='index.php?modules=admin&file=delete_alumni&name=$username' onclick=\"return confirm('ยืนยันการลบ')\"><span class='glyphicon glyphicon-remove'></span></a></td>
									<td align='center'><a href='index.php?modules=report&file=alumni_print&name=$username'><span class='glyphicon glyphicon-print'></span></a></td>
									</tr>";
								}
					
								
							?>
							</table>
						</form>
						<center>
							<ul class="pagination" style="text-align:center">
							
						<?php
							if($_GET['page_id'] != 1){
								echo "<li><a href='index.php?modules=admin&file=manage_alumni&page_id=",$i+1,"'>&laquo;</a></li>";
							}else{
								echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
							}
							
							for($i = 1; $i<= $allpages; $i++){
									if($i == $_GET['page_id']){
										echo " <li  class='active'><a href='#'>$i</a></li>";
									}else{
										echo "<li><a href='index.php?modules=admin&file=manage_alumni&page_id=$i'>$i</a></li>";
									}				
							}
							
							if($_GET['page_id'] != $allpages){
								echo "<li ><a href='index.php?modules=admin&file=manage_alumni&page_id=",$i-1,"''>&raquo;</a></li>";
							}else{
								echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
							}
							
						?>
							
							</ul>
						</center>
				</div>
</div>