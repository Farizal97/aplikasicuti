<?php
// memulai session
session_start();
// memanggil file koneksi
include("dist/config/koneksi.php");

// mengecek apakah tombol login sudah di tekan atau belum
if(isset($_POST['login'])) {
	// mengecek apakah username dan password sudah di isi atau belum
	if(empty($_POST['username']) || empty($_POST['password'])) {
		// mengarahkan ke halaman login.php
		header("location: login.php?err=empty");
	}
	else {
		// membaca nilai variabel username dan password
		$username = $_POST['username'];
		$password = $_POST['password'];
		$akses = $_POST['akses'];
		// mencegah sql injection
		$username = htmlentities(trim(strip_tags($username)));
		$password = htmlentities(trim(strip_tags($password)));
			// memeriksa username di tabel admin

			if($akses=="Admin"){			
				$sql = "SELECT * FROM admin WHERE user_adm='". $username ."' AND pass_adm='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['admin'] = strtolower($dataku['id_adm']);
					// mengarahkan ke halaman indeks.php
					header("location: index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else if($akses=="Lead"){
				$aks = "Leader";
				$sql = "SELECT * FROM employee WHERE hak_akses='".$aks."' AND npp='". $username ."' AND password='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['leader'] = strtolower($dataku['npp']);
					// mengarahkan ke halaman indeks.php
					header("location: leader/index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else if($akses=="Mng"){			
				$aks = "Manager";
				$sql = "SELECT * FROM employee WHERE hak_akses='".$aks."' AND npp='". $username ."' AND password='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['manager'] = strtolower($dataku['npp']);
					// mengarahkan ke halaman indeks.php
					header("location: manager/index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else if($akses=="Pgw"){		
				$aks = "Pegawai";
				$sql = "SELECT * FROM employee WHERE hak_akses='".$aks."' AND npp='". $username ."' AND password='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['pegawai'] = strtolower($dataku['npp']);
					// mengarahkan ke halaman indeks.php
					header("location: pegawai/index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else{			
				$aks = "Supervisor";
				$sql = "SELECT * FROM employee WHERE hak_akses='".$aks."' AND npp='". $username ."' AND password='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['supervisor'] = strtolower($dataku['npp']);
					// mengarahkan ke halaman indeks.php
					header("location: supervisor/index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}
	}
}
?>