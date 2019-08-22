<?php
include("sess_check.php");

$id = $sess_admid;
$npp=$_POST['npp'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$telp=$_POST['telp'];
$divisi=$_POST['divisi'];
$jabatan=$_POST['jabatan'];
$akses=$_POST['akses'];
$jml=$_POST['jml'];
$alamat=$_POST['alamat'];
$foto=substr($_FILES["foto"]["name"],-5);
$newfoto = "foto".$npp.$foto;
$tgl = date('Y-m-d');
$aktif = "Aktif";

$sqlcek = "SELECT * FROM employee WHERE npp='$npp'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if($rowscek<1){
	$sql="INSERT INTO employee(npp,nama_emp,jk_emp,telp_emp,divisi,jabatan,alamat,hak_akses,jml_cuti,password,foto_emp,active,id_adm)
		  VALUES('$npp','$nama','$jk','$telp','$divisi','$jabatan','$alamat','$akses','$jml','$npp','$newfoto','$aktif','$id')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		move_uploaded_file($_FILES["foto"]["tmp_name"],"foto/".$newfoto);
		echo "<script>alert('Tambah Karyawan Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'karyawan.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'karyawan_tambah.php'; </script>";
	}
}else{
	header("location: karyawan_tambah.php?act=add&msg=double");	
}
?>