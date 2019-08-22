<!-- Printing -->
	<link rel="stylesheet" href="css/printing.css">
		
<?php
include("sess_check.php");
include("dist/function/format_tanggal.php");
if($_GET) {
	$kode = $_GET['code'];
	$sql = "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.npp=employee.npp AND cuti.no_cuti='". $_GET['code'] ."'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);
}
else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
}
?>
<html>
<head>
</head>
<body>
<div id="section-to-print">
<div id="only-on-print">
</div>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
	<h4 class="modal-title" id="myModalLabel">Detail Pengajuan Cuti</h4>
</div>
<div><br/>
<table width="100%">
	<tr>
		<td width="20%"><b>No. Cuti</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['no_cuti'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>NPP</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['npp'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Nama Pemohon</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['nama_emp'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Tangal Pengajuan</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo IndonesiaTgl($result['tgl_pengajuan']);?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Tanggal Mulai</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo IndonesiaTgl($result['tgl_awal']);?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Tanggal Akhir</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo IndonesiaTgl($result['tgl_akhir']);?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Durasi</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['durasi'];?> Hari</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Keterangan</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['keterangan'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Status</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['stt_cuti'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<?php
		if($result['ket_reject']!=""){
		?>
	<tr>
		<td width="20%"><b>Keterangan Reject</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><b><?php echo $result['ket_reject'];?></b></td>
	</tr>
	<?php
		}else{
		}
		?>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
</table>
</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
</div>

</body>
</html>