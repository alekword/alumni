<?php 
	$name = $_GET['name'];
	$sql = "SELECT * FROM alumni WHERE alumni_username = '$name'";
	$result = mysql_query($sql);
	list($alumni_id,$username,$student_id,$alumni_education,$name_title,$fname,$lname,$birthdate,$alumni_website,$alumni_facebook,$alumni_email,
	$alumni_address,$alumni_province,$alumni_post,$alumni_tel,$alumni_fax,$work_type,$work_name,$work_position,
	$work_department,$work_address,$work_province,$work_post,$work_tel,$work_fax,$pic) = mysql_fetch_row($result);

	$bd = explode("-",$birthdate);
?>

<div class="panel panel-primary">
				<div class="panel-heading">
					<b>แก้ไขข้อมูลส่วนตัว</b>
				</div>
				<div class="panel-body">
				
					<form role="form" style="padding: 10px;" action="index.php?modules=admin&file=edit_user" id="regis_alumni" name="form" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="alumni_id" value="<?php echo $alumni_id; ?>"/>
						<input type="hidden" name="name" value="<?php echo $name; ?>"/>
						<p align="center"><b>รูปภาพโปรไฟล์ : </b><input type="file" name="alumni_pic" style="display:inline;" onchange="readURL(this);"></p>
						<?php
							if($pic){
								echo "<p align='center'><img id='blah' src='images/profile/$pic' width='200' height='200'></p>";
							}else{
								echo "<p align='center'><img id='blah'/></p>";
							}
						?>
						
						
						<table style="font-size: 15px;" align="left">						
							
							<tr><td><b>ข้อมูลประวัติ</b></td></tr>
							<tr><td>รหัสนักศึกษา :</td><td><input type="text" id="student_id" name="student_id" style="width:250px; display:inline;" value="<?php echo $student_id;?>"></td></tr>
							<tr><td>หลักสูตรที่จบ : </td><td><input type="radio" id="alumni_education" name="alumni_education" value="ปริญญาตรี (4 ปี)" <?php if($alumni_education == "ปริญญาตรี (4 ปี)"){ echo "checked='checked'"; }?>> ปริญญาตรี (4 ปี) 
							<input type="radio"  id="alumni_education" name="alumni_education" value="ปริญญาตรี (เทียบโอน)" <?php if($alumni_education == "ปริญญาตรี (เทียบโอน)"){ echo "checked='checked'"; }?>> ปริญญาตรี (เทียบโอน) </td></tr>	
							<tr><td>ชื่อ-นามสกุล : </td><td>
							<select name="name_title">
								<option value="นาย" <?php if($name_title == "นาย"){ echo "selected=selected";}?>>นาย</option>
								<option value="นางสาว" <?php if($name_title == "นางสาว"){ echo "selected=selected";}?>>นางสาว</option>
								<option value="นาง" <?php if($name_title == "นาง"){ echo "selected=selected";}?>>นาง</option>
							</select>
							ชื่อ <input type="text" id="fname" name="fname" style="width:120px; display:inline;" value="<?php echo $fname;?>"> นามสกุล <input type="text" id="lname" name="lname" style="width:120px; display:inline;" value="<?php echo $lname;?>"></td></tr>
							<tr><td>วันเดือนปีเกิด :</td><td>
								<select name="day" id="day"><option value="">วันที่</option>
								<?php  for($i = 1; $i <= 31; $i++){
									if($bd[0] == $i){
										echo "<option value='$i' selected='selected'>$i</option>"; 
									}else{
										echo "<option value='$i'>$i</option>"; 
									}

								}
								?></select>
								<select name="month" id="month">
									<option value="">เดือน</option>
									<?php
										$month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
										for($i = 0; $i < count($month); $i++){
											if($bd[1] == $month[$i]){
												echo "<option value='$month[$i]' selected='selected'>$month[$i]</option>";
											}else{
												echo "<option value='$month[$i]'>$month[$i]</option>";
											}
											
										}
									?>
								</select>
								<select name="year" id="year">
									<option value="">ปีเกิด</option>
									<?php 
										$year = date("Y");
										$year += 543;
										for($i = 2500; $i <= ($year-10); $i++){
											if($bd[2] == $i){
												echo "<option value='$i' selected='selected'>$i</option>";
											}else{
												echo "<option value='$i'>$i</option>";
											}											
										}
									?>
								</select>
								
								
							</td></tr>
							
							<tr><td>เว็บไซต์ :</td><td><input type="text" id="alumni_website" name="alumni_website" style="width:250px; display:inline;"  value="<?php echo $alumni_website;?>"></td></tr>
							<tr><td>เฟสบุ๊ค :</td><td><input type="text" id="alumni_facebook" name="alumni_facebook" style="width:250px; display:inline;"  value="<?php echo $alumni_facebook;?>"></td></tr>
							<tr><td>อีเมล์ :</td><td><input type="text" id="alumni_email" name="alumni_email" style="width:250px; display:inline;"  value="<?php echo $alumni_email;?>"></td></tr>
							<tr><td>ที่อยู่ปัจจุบัน :</td><td>
								<textarea name="alumni_address" cols="50" rows="5"><?php echo $alumni_address; ?></textarea>
							</td></tr>
							<tr><td>จังหวัด :</td><td>
								<select name="alumni_province">
								<?php
									$province_type=array("จังหวัด","กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา","ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา","นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี","พระนครศรีอยุธยา","พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน","ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา","สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี","สุรินทร์","หนองคาย","หนองบัวลำภู","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี","บึงกาฬ");
									foreach($province_type as $jung){
										if($alumni_province == $jung){
											echo "<option value='$jung' selected='selected'>$jung</option>";
										}else{
											echo "<option value='$jung'>$jung</option>";
										}
										
									}
								?>
								</select>
							</td></tr>
							<tr><td>รหัสไปรษณีย์ :</td><td><input type="text" id="alumni_post" name="alumni_post" style="width:250px; display:inline;" value="<?php echo $alumni_post;?>"></td></tr>
							<tr><td>โทรศัพท์ :</td><td><input type="text" id="alumni_tel" name="alumni_tel" style="width:250px; display:inline;" value="<?php echo $alumni_tel;?>"></td></tr>
							<tr><td>แฟกซ์ :</td><td><input type="text" id="alumni_fax" name="alumni_fax" style="width:250px; display:inline;" value="<?php echo $alumni_fax;?>"></td></tr>
							
							<tr><td><b>ข้อมูลการทำงานปัจจุบัน</b></td></tr>
							<tr><td>ลักษณะงาน :</td><td><input type="radio" name="work_type" value="งานประจำ" <?php if($work_type == "งานประจำ"){echo "checked='checked'";}?>> งานประจำ 
								<input type="radio" name="work_type" value="ธุรกิจส่วนตัว" <?php if($work_type == "ธุรกิจส่วนตัว"){echo "checked='checked'";}?>> ธุรกิจส่วนตัว
							</td>
							<tr><td>ชื่อองค์กร หรือ บริษัท :</td><td><input type="text" id="work_name" name="work_name" style="width:250px; display:inline;" value="<?php echo $work_name;?>"></td></tr>
							<tr><td>ตำแหน่ง :</td><td><input type="text" id="work_position" name="work_position" style="width:250px; display:inline;" value="<?php echo $work_position;?>"></td></tr>
							<tr><td>แผนก :</td><td><input type="text" id="work_department" name="work_department" style="width:250px; display:inline;" value="<?php echo $work_department;?>"></td></tr>
							<tr><td>ที่อยู่ :</td><td>
								<textarea name="work_address" cols="50" rows="5"><?php echo $work_address; ?></textarea>
							</td></tr>
							<tr><td>จังหวัด :</td><td>
								<select name="work_province">
								<?php
									$province_type=array("จังหวัด","กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา","ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา","นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี","พระนครศรีอยุธยา","พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน","ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา","สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี","สุรินทร์","หนองคาย","หนองบัวลำภู","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี","บึงกาฬ");
									foreach($province_type as $jung){
										if($work_province == $jung){
											echo "<option value='$jung' selected='selected'>$jung</option>";
										}else{
											echo "<option value='$jung'>$jung</option>";
										}
										
									}
								?>
								</select>
							</td></tr>
							<tr><td>รหัสไปรษณีย์ :</td><td><input type="text" id="work_post" name="work_post" style="width:250px; display:inline;" value="<?php echo $work_post;?>"></td></tr>
							<tr><td>โทรศัพท์ :</td><td><input type="text" id="work_tel" name="work_tel" style="width:250px; display:inline;" value="<?php echo $work_tel;?>"></td></tr>
							<tr><td>แฟกซ์ :</td><td><input type="text" id="work_fax" name="work_fax" style="width:250px; display:inline;" value="<?php echo $work_fax;?>"></td></tr>
							
							
							
							<tr><td><input type="submit" value="แก้ไขข้อมูล" class="btn btn-info">
							</td></tr>
							
						</table>
					</form>
					
				</div>
</div>		