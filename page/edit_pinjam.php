<?php
include("config/koneksi_db.php");
?>

<?php
//ambil data melalui parameter id
$id=$_GET['id'];
//Buat SQL
$sql_pinjam = "SELECT * FROM `pinjam` WHERE `kode_pinjam`='$id'";
//koneksi DB
$koneksi = koneksi();
$data = mysqli_query($koneksi, $sql_pinjam);
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
<div class="panel-heading">Edit Pinjam</div>
<div class="panel-body">
<?php
//data akan diupdate jika button simpan di klik
if(isset($_POST['edit']))
{
	$kd_pinjam = $_POST['kd_pinjam'];
	$nip = $_POST['nip'];
	$kd_barang = $_POST['kd_barang'];
	$tglpinjam = $_POST['tglpinjam'];
	$tglselesai = $_POST['tglselesai'];
	$status = $_POST['status'];
	$ket = $_POST['ket'];
//simpan ke database
	$koneksi = koneksi();
//sql
	$sql = "UPDATE `pinjam` SET
	`nip` =  '$nip',
	`kode_barang` =  '$kd_barang',
	`tgl_pinjam` =  '$tglpinjam',
	`tgl_selesai` =  '$tglselesai',
	`status` =  '$status',
	`keterangan` =  '$ket'
	 WHERE `kode_pinjam` ='$kd_pinjam'";
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

	<form class="form-horizontal" method="post" action="?p=edit_pinjam">
	
	<div class="form-group">
			<label for="kd_pinjam" class="col-sm-2 control-label">Kode Pinjam</label>
			<div class="col-sm-10">
				<input type="text" name="kd_pinjam" class="form-control" id="kd_pinjam" value="<?php echo $hasil['kode_pinjam'];?>">
			</div>
	</div>

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
							$pilih = '';
							$nama = $row['nip'];
							$pinjam = $hasil['nip'];
								if($nama == $pinjam)
								{
									$pilih = 'selected="selected"';
								}
					?>
					<option value="<?php echo $row['nip'];?>" 
					<?php echo $pilih;
					?>> 
					<?php echo $row['nama'];?></option>
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
							$pilih = '';
							$nama_barang = $row['kode_barang'];
							$barang = $hasil['kode_barang'];
								if($nama_barang == $barang)
								{
									$pilih = 'selected="selected"';
								}
					?>
					<option value="<?php echo $row['kode_barang'];?>" 
					<?php echo $pilih;
					?>> 
					<?php echo $row['nama_barang'];?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>


			<div class="form-group">
			<label for="tglpinjam" class="col-sm-2 control-label">Tanggal Pinjam</label>
				<div class="col-sm-10">
				<input type="text" name="tglpinjam" class="form-control" id="tglpinjam" value="<?php echo $hasil['tgl_pinjam'];?>">
				</div>
			</div>
			
			<div class="form-group">
			<label for="tglselesai" class="col-sm-2 control-label">Tanggal Selesai</label>
				<div class="col-sm-10">
				<input type="date" name="tglselesai" class="form-control" id="tgl_selesai" value="<?php echo $hasil['tgl_selesai'];?>">
				</div>
			</div>
			
		<div class="form-group">
			<label for="status" class="col-sm-2 control-label">Status</label>
			<div class="col-sm-10">
				<select name="status" class="form-control">
					<option value=""><?php echo $hasil['status'];?></option>
					<option value="pinjam">Pinjam</option>
					<option value="selesai">Selesai</option>					
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label for="ket" class="col-sm-2 control-label">Keterangan</label>
			<div class="col-sm-10">
				<textarea name="ket" class="form-control" rows="3"><?php echo $hasil['keterangan'];?></textarea>
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