<?php
	include("sess_check.php");
		$id = $_GET['npp'];	
		$sql = "DELETE FROM employee WHERE npp='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: karyawan.php?act=delete&msg=success");
?>