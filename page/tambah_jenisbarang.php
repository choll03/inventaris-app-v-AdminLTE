<?php
include("config/koneksi_db.php");
?>
<?php
//data disimpan jika button klik
if(isset($_POST['tambah']))
{
	$jenis = $_POST['jenis'];
//simpan ke databse
	$koneksi = koneksi();
//sql
	$sql = "INSERT INTO `jenis_barang` (
	`kode_jenis` ,
	`jenis`
	)
	VALUES (
NULL ,  '$jenis'
);";
//query db 
		$data = mysqli_query ($koneksi, $sql);
		if($data)
		{?>
			<div class="alert alert-success" role="alert">
			<strong>Sukses ! </strong> Data berhasil disimpan.
			</div>
		<?php } else { ?>
			<div class="alert alert-danger">
			<strong>Gagal ! </strong> Data gagal disimpan.
			</div>
		<?php }
		close();
	
}
?>
<div class="panel panel-info">
<div class="panel-heading">Tambah Jenis Barang</div>
<div class="panel-body">
	<form class="form-horizontal" method="post" action="?p=tambah_jenisbarang">
		<div class="form-group">
			<label for="jenis" class="col-sm-2 control-label">Jenis Barang</label>
			<div class="col-sm-10">
				<input type="text" name="jenis" class="form-control" id="jenis">
			</div>
		</div>
		<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="tambah" class="btn btn-primary" id="tambah" value="Tambah">
		<input type="reset" name="reset" class="btn btn-danger" id="reset" value="Reset">
		</div>
	</form>
</div>
</div>
</div>