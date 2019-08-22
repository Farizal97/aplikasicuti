<?php
include("sess_check.php");

$no=$_POST['no'];
$aksi=$_POST['aksi'];
$reject=$_POST['reject'];
$stt = "";
$null = 0;

if($aksi=="2"){
	$stt="Rejected";
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt ."',
			lead_app='". $null ."',
			spv_app='". $null ."',
			mng_app='". $null ."',
			ket_reject='". $reject ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: app_wait.php?act=update&msg=success");
	
}else{
	$stt="Approved";
	$num	=1;
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt ."',
			hrd_app='". $num ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: app_wait.php?act=update&msg=success");
	
}
?>