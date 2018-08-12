<?php

if (isset($_GET['tglm']) && isset($_GET['tgls']) )
{
	
	$tgl_mulai=$_GET['tglm'];
	$tgl_selesai=$_GET['tgls'];

	include("../config/koneksi_db.php");
	$koneksi = koneksi();

	//sql
	$sql = "SELECT * 
				FROM  `pinjam` 
				WHERE  `tgl_pinjam` 
				BETWEEN  '$tgl_mulai'
				AND  '$tgl_selesai'
				ORDER BY  `tgl_pinjam` ASC";


		//query db 
		$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");


?>


<img src="http://localhost/lte/berkas/logo.jpg" >
<h2 align="center">Laporan Barang </h2>
<p align="center"> <?php echo $tgl_mulai; ?> sampai tanggal <?php echo $tgl_selesai; ?></p>
<br>
<table align="center" border="1" class="table table-hover table-striped table-bordered" id="listBerkasTable">
	<thead>
		<tr>
			<th>Kode Pinjam</th>
			<th>Nama Peminjam</th>
			<th>Nama Barang</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Selesai</th>
			<th>Status</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
			<?php 
				while ($row = mysqli_fetch_array ($data)){
			?>
		<tr>
			<td>
			<?php
				echo $row['kode_pinjam'];
			?>
			</td>
			<td>
			<?php
			
			$kode=$row['nip'];
			$sql_jenisbarang = "SELECT  `nama` 
								FROM  `staff` 
								WHERE  `nip` =  '$kode'";
			$data_jenisbarang = mysqli_query ($koneksi, $sql_jenisbarang) or die ("gagal koneksi tabel");
			$tampil_jenisbarang = mysqli_fetch_array($data_jenisbarang);
			echo $tampil_jenisbarang['nama'];
			?>
			</td>
			<td>
			<?php
			
			$kode=$row['kode_barang'];
			$sql_barang = "SELECT  `nama_barang` 
								FROM  `barang` 
								WHERE  `kode_barang` =  '$kode'";
			$data_barang = mysqli_query ($koneksi, $sql_barang) or die ("gagal koneksi tabel");
			$tampil_barang = mysqli_fetch_array($data_barang);
			echo $tampil_barang['nama_barang'];
			?>
			</td>
			<td>
			<?php
				echo $row['tgl_pinjam'];
			?>
			</td>
			<td>
			<?php
				echo $row['tgl_selesai'];
			?>
			</td>
			<td>
			<?php
				echo $row['status'];
			?>
			</td>
			<td>
			<?php
				echo $row['keterangan'];
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