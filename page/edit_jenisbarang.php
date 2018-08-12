<?php
include("config/koneksi_db.php");
?>

<?php
//ambil data melalui parameter id
$id=$_GET['id'];
//buat SQL
$sql_jenisbarang = "SELECT * FROM `jenis_barang` WHERE `kode_jenis`='$id'";
//koneksi DB
$koneksi = koneksi();
$data = mysqli_query($koneksi, $sql_jenisbarang);
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
<div class="panel-heading">Edit Jenis Barang</div>
<div class="panel-body">

<?php
//data disimpan jika button klik
if(isset($_POST['edit']))
{
	$kode_jenis = $_POST['kode_jenis'];
	$jenis = $_POST['jenis'];
//simpan ke databse
	$koneksi = koneksi();
//sql
	$sql= "UPDATE `jenis_barang` SET
	`jenis` =  '$jenis'
	 WHERE `kode_jenis` ='$kode_jenis'";
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

	else {
		
	
?>
	<form class="form-horizontal" method="post" action="?p=edit_jenisbarang">
		
		<div class="form-group">
			<label for="kode_jenis" class="col-sm-2 control-label">Kode Jenis</label>
			<div class="col-sm-10">
				<input type="text" name="kode_jenis" class="form-control" id="kode_jenis" value="<?php echo $hasil['kode_jenis'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="jenis" class="col-sm-2 control-label">Jenis Barang</label>
			<div class="col-sm-10">
				<input type="text" name="jenis" class="form-control" id="jenis" value="<?php echo $hasil['jenis'];?>">
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