<?php
include("sess_check.php");

$no=$_POST['no'];
$aksi=$_POST['aksi'];
$spv=$_POST['spv'];
$reject=$_POST['reject'];
$stt = "";

if($aksi=="2"){
	$stt="Rejected";
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt ."',
			ket_reject='". $reject ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_cuti.php?act=update&msg=success");
	
}else{
	$stt="Menunggu Approval Supervisor";
	$num	=1;
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt ."',
			spv='". $spv ."',
			lead_app='". $num ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_cuti.php?act=update&msg=success");
	
}
?>