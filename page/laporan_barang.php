<?php

//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();

//sql
$sql = "SELECT * FROM `jenis_barang`";

//query db 
$data = mysqli_query ($koneksi ,$sql) or die ("gagal koneksi tabel");

//menampilkan data
?>
<div class="panel panel-success">
<div class="panel-heading">Laporan Data Barang</div>
<div class="panel-body">
<div class="table-responsive">

<table class="table table-bordered table-hover table-striped table-responsive" id="listBerkasTable">

	<thead>
		<tr>
			<th>Jenis</th>
			<th>Total</th>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
			<?php 
				while ($row = mysqli_fetch_array ($data))
		{
			?>
		<tr>
			
			<td>
			<?php
				echo $row['jenis'];
			?>
			</td>
			<td>
			<?php
			
			$kode=$row['kode_jenis'];
			$sql_jenisbarang = "SELECT COUNT( `kode_barang`) as `Total`
								FROM  `barang` 
								WHERE  `kode_jenis` =  '$kode'";
			$data_jenisbarang = mysqli_query ($koneksi ,$sql_jenisbarang) or die ("gagal koneksi tabel");
			$tampil_jenisbarang = mysqli_fetch_array($data_jenisbarang);
			echo $tampil_jenisbarang['Total'];
			?>
			</td>
			<td>
			<a href="?p=detail_barang&id=<?php echo $row['kode_jenis'];?>"><span class="glyphicon glyphicon-check"></span></a>
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