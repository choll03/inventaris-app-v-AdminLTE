
<div class="panel panel-info">
<div class="panel-heading">Cari Laporan Barang Bulanan</div>
<div class="panel-body">

<form class="form-horizontal" method="post" action="?p=laporan_barang_bulanan">
		<div class="form-group">
			<label for="tgl_mulai" class="col-sm-2 control-label">Tanggal Mulai</label>
			<div class="col-sm-10">
				<input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai">
			</div>
		</div>
		<div class="form-group">
			<label for="tgl_selesai" class="col-sm-2 control-label">Tanggal Selesai</label>
			<div class="col-sm-10">
				<input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai">
			</div>
		</div>
				<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="search" class="btn btn-primary" id="search" value="Search">
		</div>
	</form>

</div>
</div>
<?php
if (isset($_POST['search'])){
$tgl_mulai=$_POST['tgl_mulai'];
$tgl_selesai=$_POST['tgl_selesai'];

//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();

//sql
$sql = "SELECT * 
FROM  `barang` 
WHERE  `tgl_inventaris` 
BETWEEN  '$tgl_mulai'
AND  '$tgl_selesai'
ORDER BY  `tgl_inventaris` ASC";

//query db 
$data = mysqli_query ($koneksi , $sql) or die ("gagal koneksi tabel");


?>

<script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  </script>
<div class="panel panel-info">
<div class="panel-heading">Data Laporan Barang Bulanan</div>
<div class="panel-body">
<div class="panel-heading"><a href="laporan/laporan_barang.php?tglm=<?php echo $tgl_mulai; ?> & tgls=<?php echo $tgl_selesai; ?> " class="btnPrint"><button type="button" class="btn btn-default btn-xs" id=>Print Laporan</button></a></div>
<div class="table-responsive">

<table class="table table-hover table-striped table-bordered" id="listBerkasTable">
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Jenis Barang</th>
			<th>Keterangan</th>
			<th>Tanggal</th>
		</tr>
	</thead>
	<tbody>
			<?php 
				while ($row = mysqli_fetch_array ($data)){
			?>
		<tr>
			<td>
			<?php
				echo $row['kode_barang'];
			?>
			</td>
			<td>
			<?php
				echo $row['nama_barang'];
			?>
			</td>
			<td>
			<?php
			
			$kode=$row['kode_jenis'];
			$sql_jenisbarang = "SELECT  `jenis` 
								FROM  `jenis_barang` 
								WHERE  `kode_jenis` =  '$kode'";
			$data_jenisbarang = mysqli_query ($koneksi , $sql_jenisbarang) or die ("gagal koneksi tabel");
			$tampil_jenisbarang = mysqli_fetch_array($data_jenisbarang);
			echo $tampil_jenisbarang['jenis'];
			?>
			</td>
			<td>
			<?php 
				echo $row['keterangan'];
			?>
			</td>
			<td>
			<?php
				echo $row['tgl_inventaris'];
			?>
			</td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
</div>


</div>
</div>

<?php 
}
?>