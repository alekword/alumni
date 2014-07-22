<div class="panel panel-primary">
				<div class="panel-heading">
					<b>ลงทะเบียนศิษย์เก่า</b>
				</div>
				<div class="panel-body">
				
					<form role="form" style="padding: 10px;" action="index.php?modules=user&file=regis" id="regis_alumni" name="form" method="POST" enctype="multipart/form-data">
						<p align="center"><b>รูปภาพโปรไฟล์ : </b><input type="file" name="alumni_pic" style="display:inline;" onchange="readURL(this);"></p>
						<p align="center"><img id="blah"/></p>
						
						<table style="font-size: 15px;" align="left">
							<tr><td><b>ข้อมูลการเข้าใช้ระบบ</b></td></tr>
							<tr><td>ชื่อผู้ใช้ : </td><td><input type="text" id="username_input" name="username" style="width:250px; display:inline;"> <span id="feedback"></span></td></tr>
							<tr><td>รหัสผ่าน : </td><td><input type="password" id="password_regis" name="password_regis"  style="width: 250px; display:inline;"> </td></tr>							
							<tr><td>ยืนยันระหัสผ่าน : </td><td><input type="password" name="confirm_password" id="confirm_password"  style="width: 250px; display:inline;"> <span id='message'></span></td> </tr>							
							
							<tr><td><b>ข้อมูลประวัติ</b></td></tr>
							<tr><td>รหัสนักศึกษา :</td><td><input type="text" id="student_id" name="student_id" style="width:250px; display:inline;"></td></tr>
														<tr><td>หลักสูตรที่จบ : </td><td><input type="radio" id="alumni_education" name="alumni_education" value="ปริญญาตรี (4 ปี)"> ปริญญาตรี (4 ปี) <input type="radio"  id="alumni_education" name="alumni_education" value="ปริญญาตรี (เทียบโอน)"> ปริญญาตรี (เทียบโอน) </td></tr>	
							<tr><td>ชื่อ-นามสกุล : </td><td>
							<select name="name_title">
								<option value="นาย">นาย</option>
								<option value="นางสาว">นางสาว</option>
								<option value="นาง">นาง</option>
							</select>
							ชื่อ <input type="text" id="fname" name="fname" style="width:120px; display:inline;"> นามสกุล <input type="text" id="lname" name="lname" style="width:120px; display:inline;"></td></tr>
							<tr><td>วันเดือนปีเกิด :</td><td>
								<select name="day" id="day"><option value="">วันที่</option><?php  for($i = 1; $i <= 31; $i++){ echo "<option value='$i'>$i</option>"; }?></select>
								<select name="month" id="month">
									<option value="">เดือน</option>
									<?php
										$month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
										for($i = 0; $i < count($month); $i++){
											echo "<option value='$month[$i]'>$month[$i]</option>";
										}
									?>
								</select>
								<select name="year" id="year">
									<option value="">ปีเกิด</option>
									<?php 
										$year = date("Y");
										$year += 543;
										for($i = 2500; $i <= ($year-10); $i++){
											echo "<option>$i</option>";
										}
									?>
								</select>
								
								
							</td></tr>
							
							<tr><td>เว็บไซต์ :</td><td><input type="text" id="alumni_website" name="alumni_website" style="width:250px; display:inline;"></td></tr>
							<tr><td>เฟสบุ๊ค :</td><td><input type="text" id="alumni_facebook" name="alumni_facebook" style="width:250px; display:inline;"></td></tr>
							<tr><td>อีเมล์ :</td><td><input type="text" id="alumni_email" name="alumni_email" style="width:250px; display:inline;"></td></tr>
							<tr><td>ที่อยู่ปัจจุบัน :</td><td>
								<textarea name="alumni_address" cols="50" rows="5"></textarea>
							</td></tr>
							<tr><td>จังหวัด :</td><td>
								<select name="alumni_province">
								<?php
									$province_type=array("จังหวัด","กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา","ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา","นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี","พระนครศรีอยุธยา","พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน","ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา","สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี","สุรินทร์","หนองคาย","หนองบัวลำภู","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี","บึงกาฬ");
									foreach($province_type as $jung){
										echo "<option value='$jung'>$jung</option>";
									}
								?>
								</select>
							</td></tr>
							<tr><td>รหัสไปรษณีย์ :</td><td><input type="text" id="alumni_post" name="alumni_post" style="width:250px; display:inline;"></td></tr>
							<tr><td>โทรศัพท์ :</td><td><input type="text" id="alumni_tel" name="alumni_tel" style="width:250px; display:inline;"></td></tr>
							<tr><td>แฟกซ์ :</td><td><input type="text" id="alumni_fax" name="alumni_fax" style="width:250px; display:inline;"></td></tr>
							
							<tr><td><b>ข้อมูลการทำงานปัจจุบัน</b></td></tr>
							<tr><td>ลักษณะงาน :</td><td><input type="radio" name="work_type" value="งานประจำ"> งานประจำ 
								<input type="radio" name="work_type" value="ธุรกิจส่วนตัว"> ธุรกิจส่วนตัว
							</td>
							<tr><td>ชื่อองค์กร หรือ บริษัท :</td><td><input type="text" id="work_name" name="work_name" style="width:250px; display:inline;"></td></tr>
							<tr><td>ตำแหน่ง :</td><td><input type="text" id="work_position" name="work_position" style="width:250px; display:inline;"></td></tr>
							<tr><td>แผนก :</td><td><input type="text" id="work_department" name="work_department" style="width:250px; display:inline;"></td></tr>
							<tr><td>ที่อยู่ :</td><td>
								<textarea name="work_address" cols="50" rows="5"></textarea>
							</td></tr>
							<tr><td>จังหวัด :</td><td>
								<select name="work_province">
								<?php
									$province_type=array("จังหวัด","กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา","ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา","นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี","พระนครศรีอยุธยา","พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน","ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา","สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี","สุรินทร์","หนองคาย","หนองบัวลำภู","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี","บึงกาฬ");
									foreach($province_type as $jung){
										echo "<option value='$jung'>$jung</option>";
									}
								?>
								</select>
							</td></tr>
							<tr><td>รหัสไปรษณีย์ :</td><td><input type="text" id="work_post" name="work_post" style="width:250px; display:inline;"></td></tr>
							<tr><td>โทรศัพท์ :</td><td><input type="text" id="work_tel" name="work_tel" style="width:250px; display:inline;"></td></tr>
							<tr><td>แฟกซ์ :</td><td><input type="text" id="work_fax" name="work_fax" style="width:250px; display:inline;"></td></tr>
							
							<tr><td><input type="submit" value="ลงทะเบียน" class="btn btn-info">
							<input type="reset" value="รีเซต" class="btn btn-info">
							</td></tr>
							
						</table>
					</form>
					
				</div>
</div>		