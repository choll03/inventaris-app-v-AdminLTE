<?php
include("config/koneksi_db.php");
?>
<?php
//data akan disimpan jika button simpan di klik
if(isset($_POST['tambah']))
{
	$kd_barang = $_POST['kd_barang'];
	$nm_barang = $_POST['nm_barang'];
	$kd_jenis = $_POST['kd_jenis'];
	$keterangan = $_POST['keterangan'];
	$tanggal = $_POST['tanggal'];
//simpan ke database
	koneksi();
//sql
	$sql = "INSERT INTO `barang` (
		`kode_barang` ,
		`nama_barang` ,
		`kode_jenis` ,
		`keterangan` ,
		`tgl_inventaris`
		)
		VALUES (
		'$kd_barang' ,  '$nm_barang',  '$kd_jenis',  '$keterangan',  '$tanggal'
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
<div class="panel-heading">Tambah Barang</div>
<div class="panel-body">
	<form class="form-horizontal" method="post" action="?p=tambah_barang">
		
		<div class="form-group">
			<label for="kd_barang" class="col-sm-2 control-label">Kode Barang</label>
			<div class="col-sm-10">
				<input type="text" name="kd_barang" class="form-control" id="kd_barang">
			</div>
		</div>
		
		<div class="form-group">
			<label for="nm_barang" class="col-sm-2 control-label">Nama Barang</label>
			<div class="col-sm-10">
				<input type="text" name="nm_barang" class="form-control" id="nm_barang">
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
						
					close();

					?>
					<?php 
						while ($row = mysqli_fetch_array ($data))
					{
					?>
					<option value="<?php echo $row['kode_jenis'];?>"> <?php echo $row['jenis'];?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
			<div class="col-sm-10">
				<textarea name="keterangan" class="form-control" rows="3"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
			<div class="col-sm-10">
				<input type="date" name="tanggal" class="form-control" id="tanggal">
			</div>
		</div>
		
		<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="tambah" class="btn btn-primary" id="tambah" value="Tambah">
		<input type="reset" name="reset" class="btn btn-danger" id="reset" value="Reset">
		</div>
	
	</form>
</div>
</div>