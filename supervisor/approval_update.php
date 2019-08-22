<?php
include("sess_check.php");

$no=$_POST['no'];
$aksi=$_POST['aksi'];
$mng=$_POST['mng'];
$reject=$_POST['reject'];
$stt = "";
$null = 0;

if($aksi=="2"){
	$stt="Rejected";
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt ."',
			lead_app='". $null ."',
			ket_reject='". $reject ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_cuti.php?act=update&msg=success");
	
}else{
	$stt="Menunggu Approval Manager";
	$num	=1;
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt ."',
			manager='". $mng ."',
			spv_app='". $num ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_cuti.php?act=update&msg=success");
	
}
?>