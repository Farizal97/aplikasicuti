<?php
include("sess_check.php");

$npp	= $_POST['npp'];
$ajuan = date('Y-m-d');
$mulai	= $_POST['mulai'];
$akhir	= $_POST['akhir'];
$ket	= $_POST['keterangan'];

$start = new DateTime($mulai);
$finish = new DateTime($akhir);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur+1;

$stt = "Menunggu Approval HRD";

$id = date('dmYHis');

$pgw = "SELECT * FROM employee WHERE npp='$npp'";
$qpgw = mysqli_query($conn,$pgw);
$ress = mysqli_fetch_array($qpgw);

$jml = $ress['jml_cuti'];


if($durasi>$jml){
	echo "<script type='text/javascript'>
			alert('Durasi cuti lebih banyak dari jumlah cuti tersedia!.'); 
			document.location = 'cuti_create.php'; 
		</script>";	
}else{
	$sql 	= "INSERT INTO cuti (no_cuti, npp, tgl_pengajuan, tgl_awal, tgl_akhir, durasi, keterangan, stt_cuti) 
				VALUES ('$id','$npp','$ajuan','$mulai','$akhir','$durasi','$ket','$stt')";
	$query 	= mysqli_query($conn,$sql);
	if($query){
		echo "<script type='text/javascript'>
				alert('Pengajuan cuti berhasil!'); 
				document.location = 'cuti_waitapp.php'; 
			</script>";

	}else {
		echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.'); 
				document.location = 'cuti_create.php'; 
			</script>";
	}
}
?>