
<?php
include("config/koneksi_db.php");
?>

<?php
//ambil data melalui parameter id
$id=$_GET['id'];
//buat SQL
$sql_dept = "SELECT * FROM `dept` WHERE `kode_dept`='$id'";
//koneksi DB
$koneksi = koneksi();
$data = mysqli_query($koneksi, $sql_dept);
$hasil = mysqli_fetch_array($data);
close();
?>

<div class="panel panel-info">
<div class="panel-heading">Edit Departement</div>
<div class="panel-body">

<?php
//data disimpan jika button klik
if(isset($_POST['edit']))
{
	$kd_dept = $_POST['kd_dept'];
	$nm_dept = $_POST['nm_dept'];
//simpan ke databse
	$koneksi = koneksi();
//sql
	$sql = "UPDATE `dept` SET
	`nama_dept` = '$nm_dept'
	WHERE `kode_dept`= '$kd_dept'";
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

	else {
		
	
?>
	<form class="form-horizontal" method="post" action="?p=edit_dept">
		
		<div class="form-group">
			<label for="kd_dept" class="col-sm-2 control-label">Kode Dept</label>
			<div class="col-sm-10">
				<input type="text" name="kd_dept" class="form-control" id="kd_dept" value="<?php echo $hasil['kode_dept'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="nm_dept" class="col-sm-2 control-label">Nama Dept</label>
			<div class="col-sm-10">
				<input type="text" name="nm_dept" class="form-control" id="jenis" value="<?php echo $hasil['nama_dept'];?>">
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