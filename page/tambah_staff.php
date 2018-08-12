<?php
include("config/koneksi_db.php");
?>
<?php
//data akan disimpan jika button simpan di klik
if(isset($_POST['tambah']))
{
	$nama = $_POST['nama'];
	$kode_dept = $_POST['kode_dept'];
	$alamat = $_POST['alamat'];
	$tlp = $_POST['tlp'];
//simpan ke database
	$koneksi = koneksi();
//sql
	$sql = "INSERT INTO `staff` (
		`nip` ,
		`nama` ,
		`kode_dept` ,
		`alamat` ,
		`tlp`
		)
		VALUES (
		NULL ,  '$nama',  '$kode_dept',  '$alamat',  '$tlp'
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
<div class="panel-heading">Tambah Staff</div>
<div class="panel-body">
	<form class="form-horizontal" method="post" action="?p=tambah_staff">
		<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" id="nama">
			</div>
		</div>

		<div class="form-group">
			<label for="kode_dept" class="col-sm-2 control-label">Kode Dept</label>
			<div class="col-sm-10">
				
				<select name="kode_dept" class="form-control">
					<option value="">Pilih Kode Dept</option>
					<?php
					$koneksi = koneksi();

						//sql
						$sql = "SELECT * FROM `dept`";

						//query db 
						$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");
						
					close();

					?>
					<?php 
						while ($row = mysqli_fetch_array ($data))
					{
					?>
					<option value="<?php echo $row['kode_dept'];?>"> <?php echo $row['nama_dept'];?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="alamat" class="col-sm-2 control-label">Alamat</label>
			<div class="col-sm-10">
				<textarea name="alamat" class="form-control" rows="3"></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="tlp" class="col-sm-2 control-label">Telephone</label>
			<div class="col-sm-10">
				<input type="number" name="tlp" class="form-control" id="tlp">
			</div>
		</div>
		
		<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="tambah" class="btn btn-primary" id="tambah" value="Tambah">
		<input type="reset" name="reset" class="btn btn-danger" id="reset" value="Reset">
		</div>
	</form>
</div>
</div>