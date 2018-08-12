<?php

//koneksi
include("config/koneksi_db.php");
koneksi();

//ambil data melalui parameter id
$id=$_GET['id'];
//sql
$sql = "SELECT * FROM `pinjam` WHERE  `nip` =  '$id'";

//query db 
$data = mysql_query ($sql) or die ("gagal koneksi tabel");

//menampilkan data
?>
<div class="panel panel-success">
<div class="panel-heading">Laporan Data Barang</div>
<div class="panel-body">
<div class="table-responsive">

<table class="table table-hover table-striped table-bordered" id="listBerkasTable">
	<thead>
		<tr>
			<th>Kode Pinjam</th>
			<th>Nama Peminjam</th>
			<th>Nama Barang</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Selesai</th>
		</tr>
	</thead>
	<tbody>
			<?php 
				while ($row = mysql_fetch_array ($data)){
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
			$data_jenisbarang = mysql_query ($sql_jenisbarang) or die ("gagal koneksi tabel");
			$tampil_jenisbarang = mysql_fetch_array($data_jenisbarang);
			echo $tampil_jenisbarang['nama'];
			?>
			</td>
			<td>
			<?php
			
			$kode=$row['kode_barang'];
			$sql_jenisbarang = "SELECT  `nama_barang` 
								FROM  `barang` 
								WHERE  `kode_barang` =  '$kode'";
			$data_jenisbarang = mysql_query ($sql_jenisbarang) or die ("gagal koneksi tabel");
			$tampil_jenisbarang = mysql_fetch_array($data_jenisbarang);
			echo $tampil_jenisbarang['nama_barang'];
			?>
			</td>
			<td>
			<?php
				echo $row['tgl_pinjam'];
			?>
			</td>
			<td>
			<?php
				echo $row['tgl_pinjam'];
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