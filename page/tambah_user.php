<?php
include("config/koneksi_db.php");
?>
<?php
//data disimpan jika button klik
if(isset($_POST['tambah']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
//simpan ke databse
	$koneksi = koneksi();
//sql
	$sql = "INSERT INTO `user` (
	`kode_user` ,
	`username` ,
	`password` ,
	`level`
	)
	VALUES (
NULL ,  '$username', '$password', '$level'
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
<div class="panel-heading">Tambah User</div>
<div class="panel-body">
	<form class="form-horizontal" method="post" action="?p=tambah_user">
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" id="username">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">password</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" id="password">
			</div>
		</div>
		<div class="form-group">
			<label for="level" class="col-sm-2 control-label">level</label>
			<div class="col-sm-10">
				<input type="text" name="level" class="form-control" id="username">
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