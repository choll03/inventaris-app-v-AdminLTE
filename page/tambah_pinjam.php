<?php
include("config/koneksi_db.php");
?>
<?php
//data akan disimpan jika button simpan di klik
if(isset($_POST['tambah']))
{
	$nip = $_POST['nip'];
	$kd_barang = $_POST['kd_barang'];
	$tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$status = $_POST['status'];
	$keterangan = $_POST['keterangan'];
	
//simpan ke database
	$koneksi = koneksi();
//sql
	$sql = "INSERT INTO `pinjam` (
		`kode_pinjam` ,
		`nip` ,
		`kode_barang` ,
		`tgl_pinjam` ,
		`tgl_selesai` ,
		`status` ,
		`keterangan`
		)
		VALUES (
		NULL ,  '$nip',  '$kd_barang',  '$tgl_pinjam',
		'$tgl_selesai', '$status', '$keterangan'
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
<div class="panel-heading">Tambah Pinjam</div>
<div class="panel-body">
	<form class="form-horizontal" method="post" action="?p=tambah_pinjam">

		<div class="form-group">
			<label for="nip" class="col-sm-2 control-label">Peminjam</label>
			<div class="col-sm-10">
				<select name="nip" class="form-control">
					<option value="">Pilih Peminjam</option>
					<?php
					$koneksi = koneksi();

						//sql
						$sql = "SELECT * FROM `staff`";

						//query db 
						$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");
						
					close();

					?>
					<?php 
						while ($row = mysqli_fetch_array ($data))
					{
					?>
					<option value="<?php echo $row['nip'];?>"> <?php echo $row['nama'];?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="kd_barang" class="col-sm-2 control-label">Barang</label>
			<div class="col-sm-10">
				<select name="kd_barang" class="form-control">
					<option value="">Pilih Barang</option>
					<?php
					$koneksi = koneksi();

						//sql
						$sql = "SELECT * FROM `barang`";

						//query db 
						$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");
						
					close();

					?>
					<?php 
						while ($row = mysqli_fetch_array ($data))
					{
					?>
					<option value="<?php echo $row['kode_barang'];?>"> <?php echo $row['nama_barang'];?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>


			<div class="form-group">
			<label for="tgl_pinjam" class="col-sm-2 control-label">Tanggal Pinjam</label>
				<div class="col-sm-10">
				<input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam">
				</div>
			</div>
			
			<div class="form-group">
			<label for="tgl_selesai" class="col-sm-2 control-label">Tanggal Selesai</label>
				<div class="col-sm-10">
				<input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai">
				</div>
			</div>
			
		<div class="form-group">
			<label for="status" class="col-sm-2 control-label">Status</label>
			<div class="col-sm-10">
				<select name="status" class="form-control">
					<option value="">Pilih Status</option>
					<option value="pinjam">Pinjam</option>
					<option value="selesai">Selesai</option>					
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
			<div class="col-sm-10">
				<textarea name="keterangan" class="form-control" rows="3"></textarea>
			</div>
		</div>
		
		<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="tambah" class="btn btn-primary" id="tambah" value="Tambah">
		<input type="reset" name="reset" class="btn btn-danger" id="reset" value="Reset">
		</div>
	
	</form>
</div>
</div>