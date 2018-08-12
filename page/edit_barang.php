<?php
include("config/koneksi_db.php");
?>

<?php
//ambil data melalui parameter id
$id=$_GET['id'];
//Buat SQL
$sql_barang = "SELECT * FROM `barang` WHERE `kode_barang`='$id'";
//koneksi DB
$koneksi = koneksi();
$data = mysqli_query($koneksi, $sql_barang);
$hasil = mysqli_fetch_array ($data);
close();
/*
echo "<pre>"; 
print_r($hasil);
echo "</pre>";
echo $hasil['nama_barang'];
*/
?>

<div class="panel panel-info">
<div class="panel-heading">Edit Barang</div>
<div class="panel-body">
<?php
//data akan diupdate jika button simpan di klik
if(isset($_POST['edit']))
{
	$kode_barang = $_POST['kode_barang'];
	$nm_barang = $_POST['nm_barang'];
	$kd_jenis = $_POST['kd_jenis'];
	$keterangan = $_POST['keterangan'];
	$tanggal = $_POST['tanggal'];
//simpan ke database
	$koneksi = koneksi();
//sql
	$sql = "UPDATE `barang` SET
	`nama_barang` =  '$nm_barang',
	`kode_jenis` =  '$kd_jenis',
	`keterangan` =  '$keterangan',
	`tgl_inventaris` =  '$tanggal'
	 WHERE `kode_barang` ='$kode_barang'";
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
	<form class="form-horizontal" method="post" action="?p=edit_barang">
		
		<div class="form-group">
			<label for="kode_barang" class="col-sm-2 control-label">Kode Barang</label>
			<div class="col-sm-10">
				<input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?php echo $hasil['kode_barang'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="nm_barang" class="col-sm-2 control-label">Nama Barang</label>
			<div class="col-sm-10">
				<input type="text" name="nm_barang" class="form-control" id="nm_barang" value="<?php echo $hasil['nama_barang'];?>">
			</div>
		</div>

		<div class="form-group">
			<label for="kd_jenis" class="col-sm-2 control-label">Jenis Barang</label>
			<div class="col-sm-10">
				
				<select name="kd_jenis" class="form-control">
					<option value="">Pilih Jenis Barang</option>
					<?php
					$koneksi = koneksi();

						//sql
						$sql = "SELECT * FROM `jenis_barang`";

						//query db 
						$data = mysqli_query ($koneksi, $sql);
						
					mysqli_close($koneksi);

					?>
					<?php 
						while ($row = mysqli_fetch_array ($data))
							
					{
							$pilih = '';
							$jenis_barang = $row['kode_jenis'];
							$barang = $hasil['kode_jenis'];
								if($jenis_barang == $barang)
								{
									$pilih = 'selected="selected"';
								}
					?>
					<option value="<?php echo $row['kode_jenis'];?>" 
					<?php echo $pilih;
					?>> 
					<?php echo $row['jenis'];?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
			<div class="col-sm-10">
				<textarea name="keterangan" class="form-control" rows="3"><?php echo $hasil['keterangan'];?></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
			<div class="col-sm-10">
				<input type="date" name="tanggal" class="form-control" id="tanggal" value="<?php echo $hasil['tgl_inventaris'];?>">
			</div>
		</div>
		
		<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="edit" class="btn btn-primary" id="edit" value="Edit">
		</div>
	</form>
	<?php
	}
	?>
</div>
</div>