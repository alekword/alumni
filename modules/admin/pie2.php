<html>
  <head>
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
					
					<div id="piechart" style="width: 650px; height: 500px;"></div>
					
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
							
							
					?>
				</div>
</div>

	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
		  <?php 
				for($i = 0; $i < count($count_id)-1; $i++){
					echo "['รหัส $id[$i] จำนวน $count_id[$i] คน',	$count_id[$i]],";
				}
		  ?>
          ['รหัส <?php echo $id[count($id)-1]."  จำนวน ".$count_id[count($count_id)-1]." คน";?>',    <?php echo $count_id[count($count_id)-1]; ?>]
        ]);

        var options = {
          title: 'แสดงจำนวนศิษย์เก่า'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </body>
</html>
