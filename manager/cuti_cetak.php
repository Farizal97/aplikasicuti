<?php
	include("sess_check.php");
	include("dist/function/format_rupiah.php");
	include("dist/function/format_tanggal.php");
	$id = $_GET['id'];
	$th = $_GET['th'];

	$Sql = "SELECT nilai.*, siswa.*, ampuan.*, tahun.*,mapel.*, kelas.* FROM nilai, siswa, ampuan, tahun, mapel, kelas
			WHERE nilai.id_siswa=siswa.id_siswa AND nilai.id_ampuan=ampuan.id_ampuan 
			AND ampuan.id_mapel=mapel.id_mapel AND ampuan.id_kls=kelas.id_kls 
			AND ampuan.id_thn=tahun.id_thn AND siswa.id_siswa='$id' AND tahun.id_thn='$th' ORDER BY ampuan.id_mapel ASC";
	$Qry = mysqli_query($conn, $Sql);
	$datacek = mysqli_fetch_array($Qry);
	// deskripsi halaman
	$pagedesc = "Laporan Nilai Siswa SMK Plus Pertiwi Sukamulya";
	$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="universitas pamulang">

	<title><?php echo $pagetitle ?></title>

	<link href="../libs/images/mini-smk.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td rowspan="3" width="16%" class="text-center">
							<img src="../libs/images/smk.png" alt="logo-dkm" width="80" />
						</td>
						<td class="text-center"><h3>SMK Plus Pertiwi Sukamulya</h3></td>
						<td rowspan="3" width="16%">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-center"><h2></h2></td>
					</tr>
					<tr>
						<td class="text-center">Kuningan, Jawa Barat</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">Laporan Nilai Siswa</h4>
			<br/>
			<b>
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td width="20%">
							<p>NIS</p>
						</td>
						<td>
							<p>: <?php echo $datacek['nis']?></p>
						</td>
					</tr>
					<tr>
						<td width="20%">
							<p>Nama Siswa</p>
						</td>
						<td>
							<p>: <?php echo $datacek['nama_siswa']?></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Kelas</p>
						</td>
						<td>
							<p>: <?php echo $datacek['nama_kls']?></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Tahun Akademik</p>
						</td>
						<td>
							<p>: <?php echo $datacek['nama_thn']?></p>
						</td>
					</tr>
				</tbody>
			</table>
			</b>
			<table class="table table-bordered table-keuangan">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th width="15%">Mata Pelajaran</th>
						<th width="5%">Kognitif</th>
						<th width="5%">Praktek</th>
						<th width="5%">Rata-Rata</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					$sql1 = "SELECT nilai.*, siswa.*, ampuan.*, tahun.*,mapel.*, kelas.* FROM nilai, siswa, ampuan, tahun, mapel, kelas
							WHERE nilai.id_siswa=siswa.id_siswa AND nilai.id_ampuan=ampuan.id_ampuan 
							AND ampuan.id_mapel=mapel.id_mapel AND ampuan.id_kls=kelas.id_kls 
							AND ampuan.id_thn=tahun.id_thn AND siswa.id_siswa='$id' AND tahun.id_thn='$th' ORDER BY ampuan.id_mapel ASC";
					$ress = mysqli_query($conn, $sql1);		
					while($data = mysqli_fetch_array($ress)) {
						$k = $data['kognitif'];
						$p = $data['praktek'];
						$rata = ($k+$p)/2;
						echo '<tr>';
						echo '<td class="text-center">'. $i .'</td>';
						echo '<td>'. $data['nama_mapel'] .'</td>';
						echo '<td class="text-center">'. $data['kognitif'] .'</td>';
						echo '<td class="text-center">'. $data['praktek'] .'</td>';
						echo '<td class="text-center">'. $rata .'</td>';
						echo '</tr>';												
						$i++;
					}
				?>
				</tbody>
			</table>
			<br />
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>