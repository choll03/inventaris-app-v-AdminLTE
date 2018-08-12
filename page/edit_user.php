<?php
include("config/koneksi_db.php");
?>

<?php
//ambil data melalui parameter id
$id=$_GET['id'];
//buat SQL
$sql_user = "SELECT * FROM `user` WHERE `kode_user`='$id'";
//koneksi DB
$koneksi = koneksi();
$data = mysqli_query($koneksi, $sql_user);
$hasil = mysqli_fetch_array ($data);
close();
/*
echo "<pre>";
print_r($hasil);
echo "</pre>"
echo $hasil['jenis'];
*/
?>

<div class="panel panel-info">
<div class="panel-heading">Edit User</div>
<div class="panel-body">

<?php
//data disimpan jika button klik
if(isset($_POST['edit']))
{
	$kd_user = $_POST['kd_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
//simpan ke databse
	$koneksi = koneksi();
//sql
	$sql= "UPDATE `user` SET
	`username` =  '$username',
	`password` = '$password',
	`level` = '$level'
	 WHERE `kode_user` ='$kd_user'";
//query db 
		$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");
		if($data)
		{?>
			<div class="alert alert-success" role="alert">
			<strong>Sukses ! </strong> Data berhasil diedit.
			</div>
		<?php } else { ?>
			<div class="alert alert-danger">
			<strong>Gagal ! </strong> Data gagal diedit.
			</div>
		<?php }
		close();
	
}

	else {
		
	
?>
	<form class="form-horizontal" method="post" action="?p=edit_user">
		
		<div class="form-group">
			<label for="kd_user" class="col-sm-2 control-label">Kode User</label>
			<div class="col-sm-10">
				<input type="text" name="kd_user" class="form-control" id="kd_user" value="<?php echo $hasil['kode_user'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" id="username" value="<?php echo $hasil['username'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="text" name="password" class="form-control" id="password" value="<?php echo $hasil['password'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="level" class="col-sm-2 control-label">Level</label>
			<div class="col-sm-10">
				<input type="text" name="level" class="form-control" id="password" value="<?php echo $hasil['level'];?>">
			</div>
		</div>
		
		<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="edit" class="btn btn-primary" id="edit" value="edit">
		</div>
	
	</form>
	<?php
	}
	?>
</div>
</div>
</div>