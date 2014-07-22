<?php 
	$month = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$m = date("m");
	
	$sql = "SELECT fname,lname,birthdate FROM alumni WHERE birthdate LIKE '%$month[$m]%'";
	$result = mysql_query($sql);
	while(list($fname,$lname,$birthdate) = mysql_fetch_row($result)){
		$bd = explode("-",$birthdate);
		echo "<p class='birthdate'> <span class='glyphicon glyphicon-gift'></span> $bd[0] $bd[1] $fname $lname</p>";
	}

?>