<?php

//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();

//ambil data melalui parameter id
$id=$_GET['id'];
//sql
$sql = "SELECT * FROM `barang` WHERE  `kode_jenis` =  '$id'";

//query db 
$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");

//menampilkan data
?>
<div class="panel panel-success">
<div class="panel-heading">Laporan Data Barang</div>
<div class="panel-body">
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
</div>
</div>