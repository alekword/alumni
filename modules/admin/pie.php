<html>
	<head>
		<title>Radar Chart</title>
		<script src="Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<style>
			canvas{
			}
		</style>
	</head>
	<body>
		
	<div class="panel panel-primary">
				<div class="panel-heading">
					<b>pie chart แสดงจำนวนศิษย์เก่า</b>
				</div>
				<div class="panel-body">
					<form role="form" style="padding: 10px;" action="" method="POST" enctype="multipart/form-data">
							<b>แสดงข้อมูลศิษย์เก่า : </b><select name="show_alumni" onchange="this.form.submit()">
								<option value="เทียบโอน" <?php if($_POST['show_alumni'] == "เทียบโอน"){ echo "selected='selected'"; }?>>ปริญญาตรี เทียบโอน</option>
								<option value="4 ปี" <?php if($_POST['show_alumni'] == "4 ปี"){ echo "selected='selected'"; }?>>ปริญญาตรี 4 ปี</option>
							</select>
					</form>
					<center><canvas id="canvas" height="300" width="300"></canvas></center>
					
					<?php
						$color = array("#F38630","#E0E4CC","#69D2E7","#00CC00","#0066FF","#007700","#000011","#696969","#FFFF66","#00FFFF","#00CCFF","#FFCCCC");
							if($_POST['show_alumni']){
								if($_POST['show_alumni'] == "เทียบโอน"){
									$sql = "SELECT student_id FROM alumni WHERE education ='ปริญญาตรี (เทียบโอน)'";
								}else{
									$sql = "SELECT student_id FROM alumni WHERE education ='ปริญญาตรี (4 ปี) '";
								}
							}else{
								$sql = "SELECT student_id FROM alumni WHERE education ='ปริญญาตรี (เทียบโอน)'";
							}
							
							$result = mysql_query($sql);
							
							/*** ตัดค่า ID 2 ตัว แล้วเก็บในตัวแปร array ***/
							$id = array();
							while(list($student_id) = mysql_fetch_row($result)){
								$sub_id = substr($student_id,0,2);
								if(!in_array($sub_id,$id)){
									$id[] = $sub_id;
								}
							}
							
							/*** นับจำนวนศิษย์เก่าจากการตัดค่า ID 2 ตัว แล้วเก็บในตัวแปร***/
							$count_id = array();
							for($i = 0; $i < count($id); $i++){
								$studentid_count = "SELECT COUNT(student_id) FROM alumni WHERE student_id LIKE '$id[$i]%'";
								$result = mysql_query($studentid_count);
								list($student_id) = mysql_fetch_row($result);
								$count_id[] = $student_id;
							}
							
							echo "<br><br>";
							for($i = 0; $i < count($count_id); $i++){	
								if($i == count($count_id)-1){
									echo "<div align='left' style='display:inline-block; background-color: #CCC; width: 18px; height: 12px;'> </div> <b>รหัส $id[$i] จำนวนศิษย์เก่า $count_id[$i] คน  </b><br>";
								}else{
										echo "<div align='left' style='display:inline-block; background-color: $color[$i]; width: 18px; height: 12px;'> </div> <b>รหัส $id[$i] จำนวนศิษย์เก่า $count_id[$i] คน  </b><br>";
								}
							
							}
					?>
				
				
				</div>
	</div>
	<script>
		var pieData = [
				<?php 
					for($i = 0; $i < count($count_id)-1; $i++){
						echo "{
								value: $count_id[$i],
								color:'$color[$i]'
							},";
						}
				?>
				
				{
					/*** pie แสดงจำนวนศิษย์เก่าตำแหน่งสุดท้าย $count_id -1 ***/
					value : <?php echo $count_id[count($count_id)-1]; ?>,
					color : "#CCC"
				}
			
			];

	var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData);
	
	</script>
	</body>
</html>
