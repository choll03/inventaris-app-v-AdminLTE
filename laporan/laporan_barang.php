<?php

if (isset($_GET['tglm']) && isset($_GET['tgls']) )
{
	
	$tgl_mulai=$_GET['tglm'];
	$tgl_selesai=$_GET['tgls'];

	include("../config/koneksi_db.php");
	$koneksi = koneksi();

	//sql
	$sql = "SELECT * 
FROM  `barang` 
WHERE  `tgl_inventaris` 
BETWEEN  '$tgl_mulai'
AND  '$tgl_selesai'
ORDER BY  `tgl_inventaris` ASC";


		//query db 
		$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");


?>

<img src="http://localhost/lte/berkas/logo.jpg" 
<h2 align="center">Laporan Barang </h2>
<p align="center"> <?php echo $tgl_mulai; ?> sampai tanggal <?php echo $tgl_selesai; ?></p>
<br>
<table align="center" border="1" class="table table-hover table-striped table-bordered" id="listBerkasTable">
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
			$data_jenisbarang = mysqli_query ($koneksi, $sql_jenisbarang) or die ("gagal koneksi tabel");
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
	




<?php

} else
{

	echo "tidak ada  data laporan!";

}



?>



