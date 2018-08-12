<?php
include("config/koneksi_db.php");
?>
<?php
//data disimpan jika button klik
if(isset($_POST['tambah']))
{
	$nm_dept = $_POST['nm_dept'];
//simpan ke databse
	$koneksi = koneksi();
//sql
	$sql = "INSERT INTO `dept` (
	`kode_dept` ,
	`nama_dept`
	)
	VALUES (
NULL ,  '$nm_dept'
);";
//query db 
		$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");
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
<div class="panel-heading">Tambah Departement</div>
<div class="panel-body">
	<form class="form-horizontal" method="post" action="?p=tambah_dept">
		<div class="form-group">
			<label for="nm_dept" class="col-sm-2 control-label">Tambah Dept</label>
			<div class="col-sm-10">
				<input type="text" name="nm_dept" class="form-control" id="nm_dept">
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