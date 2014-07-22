<?php 
	$name = $_GET['name'];
	$sql = "DELETE FROM alumni WHERE alumni_username = '$name'";
	mysql_query($sql);
	
	$sql2 = "DELETE FROM users WHERE username = '$name'";
	mysql_query($sql2);
	
	echo "<script>window.location = 'index.php?modules=admin&file=manage_alumni';</script>";
?>