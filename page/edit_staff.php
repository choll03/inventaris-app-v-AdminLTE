<?php
include("config/koneksi_db.php");
?>

<?php
//ambil data melalui parameter id
$id=$_GET['id'];
//Buat SQL
$sql_staff = "SELECT * FROM `staff` WHERE `nip`='$id'";
//koneksi DB
$koneksi = koneksi();
$data = mysqli_query($koneksi, $sql_staff);
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
<div class="panel-heading">Edit Staff</div>
<div class="panel-body">
<?php
//data akan diupdate jika button simpan di klik
if(isset($_POST['edit']))
{
	$nip = $_POST['nip'];
	$nm = $_POST['nm'];
	$kd_dept = $_POST['kd_dept'];
	$alm = $_POST['alm'];
	$tlp = $_POST['tlp'];
//simpan ke database
	$koneksi = koneksi();
//sql
	$sql = "UPDATE `staff` SET
	`nama` =  '$nm',
	`kode_dept` =  '$kd_dept',
	`alamat` =  '$alm',
	`tlp` =  '$tlp'
	 WHERE `nip` ='$nip'";
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
	<form class="form-horizontal" method="post" action="?p=edit_staff">
		
		<div class="form-group">
			<label for="nip" class="col-sm-2 control-label">NIP</label>
			<div class="col-sm-10">
				<input type="text" name="nip" class="form-control" id="nip" value="<?php echo $hasil['nip'];?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="nm" class="col-sm-2 control-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nm" class="form-control" id="nm" value="<?php echo $hasil['nama'];?>">
			</div>
		</div>

		<div class="form-group">
			<label for="kd_dept" class="col-sm-2 control-label">Departement</label>
			<div class="col-sm-10">
				
				<select name="kd_dept" class="form-control">
					<option value="">Pilih Departement</option>
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
							$pilih = '';
							$nama_dept = $row['kode_dept'];
							$dept = $hasil['kode_dept'];
								if($nama_dept == $dept)
								{
									$pilih = 'selected="selected"';
								}
					?>
					<option value="<?php echo $row['kode_dept'];?>" 
					<?php echo $pilih;
					?>> 
					<?php echo $row['nama_dept'];?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="alm" class="col-sm-2 control-label">Alamat</label>
			<div class="col-sm-10">
				<textarea name="alm" class="form-control" rows="3"><?php echo $hasil['alamat'];?></textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="tlp" class="col-sm-2 control-label">Telephone</label>
			<div class="col-sm-10">
				<input type="number" name="tlp" class="form-control" id="tlp" value="<?php echo $hasil['tlp'];?>">
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