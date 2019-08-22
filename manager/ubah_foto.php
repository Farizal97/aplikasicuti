<?php
	include("sess_check.php");
	
	// query database mencari data pengguna
	$sql = "SELECT * FROM employee WHERE npp='". $sess_spvid ."'";
	$ress = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($ress);
	
	// deskripsi halaman
	$pagedesc = "Pengaturan";
	include("layout_top.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ubah Foto</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
								<hr/>
								<center><img src="../foto/<?php echo $data['foto_emp']?>" width="120px"></center>
								<br>
								<hr/>
								
							<form class="form-horizontal" action="ubah_foto_update.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-sm-3">Ubah Foto</label>
										<div class="col-sm-4">
											<input type="file" name="foto" class="form-control" accept="image/*" required>
											<input type="hidden" name="npp" value="<?php echo $data['npp'] ?>">
										</div>
										<div class="col-sm-4">
											<button type="submit" name="perbarui" class="btn btn-warning">Update</button>
										</div>
									</div>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>