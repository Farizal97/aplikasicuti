<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$npplama=$_POST['npplama'];
		$npp=$_POST['npp'];
		$nama=$_POST['nama'];
		$jml=$_POST['jml'];
		$jk=$_POST['jk'];
		$telp=$_POST['telp'];
		$divisi=$_POST['divisi'];
		$jabatan=$_POST['jabatan'];
		$alamat=$_POST['alamat'];
		$akses=$_POST['akses'];
		$cekfoto=$_FILES["foto"]["name"];
		$pass=$_POST['password'];
		$aktif=$_POST['aktif'];
		
	if($npp!=""){
		$sqlcek = "SELECT * FROM employee WHERE npp='$npp'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if($rows<1){
			if($cekfoto!=""){
				$foto=substr($_FILES["foto"]["name"],-5);
				$newfoto = "foto".$npp.$foto;				
				move_uploaded_file($_FILES["foto"]["tmp_name"],"foto/".$newfoto);
				$sql = "UPDATE employee SET
					npp='". $npp ."',
					nama_emp='". $nama ."',
					jk_emp='". $jk ."',
					telp_emp='". $telp ."',
					divisi='". $divisi ."',
					jabatan='". $jabatan ."',
					alamat='". $alamat ."',
					hak_akses='". $akses ."',
					jml_cuti='". $jml ."',
					password='". $pass ."',
					active='". $aktif ."',
					foto_emp='". $newfoto ."'
					WHERE npp='". $npplama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: karyawan.php?act=update&msg=success");
			}else{
				$sql = "UPDATE employee SET
					npp='". $npp ."',
					nama_emp='". $nama ."',
					jk_emp='". $jk ."',
					telp_emp='". $telp ."',
					divisi='". $divisi ."',
					jabatan='". $jabatan ."',
					alamat='". $alamat ."',
					hak_akses='". $akses ."',
					jml_cuti='". $jml ."',
					password='". $pass ."',
					active='". $aktif ."'
					WHERE npp='". $npplama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: karyawan.php?act=update&msg=success");
			}
		}else{
			header("location: karyawan_edit.php?npp=$npplama&act=add&msg=double");			
		}
	}else{
		if($cekfoto!=""){
			$foto=substr($_FILES["foto"]["name"],-5);
			$newfoto = "foto".$npplama.$foto;				
			move_uploaded_file($_FILES["foto"]["tmp_name"],"foto/".$newfoto);
				$sql = "UPDATE employee SET
					nama_emp='". $nama ."',
					jk_emp='". $jk ."',
					telp_emp='". $telp ."',
					divisi='". $divisi ."',
					jabatan='". $jabatan ."',
					alamat='". $alamat ."',
					hak_akses='". $akses ."',
					jml_cuti='". $jml ."',
					password='". $pass ."',
					active='". $aktif ."',
					foto_emp='". $newfoto ."'
					WHERE npp='". $npplama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: karyawan.php?act=update&msg=success");
		}else{
				$sql = "UPDATE employee SET
					nama_emp='". $nama ."',
					jk_emp='". $jk ."',
					telp_emp='". $telp ."',
					divisi='". $divisi ."',
					jabatan='". $jabatan ."',
					alamat='". $alamat ."',
					hak_akses='". $akses ."',
					jml_cuti='". $jml ."',
					password='". $pass ."',
					active='". $aktif ."'
					WHERE npp='". $npplama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: karyawan.php?act=update&msg=success");
		}
	}
}
?>