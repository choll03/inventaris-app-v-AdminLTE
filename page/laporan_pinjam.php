<?php

//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();

//sql
$sql = "SELECT * FROM `staff`";

//query db 
$data = mysqli_query ($koneksi ,$sql) or die ("gagal koneksi tabel");

//menampilkan data
?>
<div class="panel panel-success">
<div class="panel-heading">Laporan Peminjaman</div>
<div class="panel-body">
<div class="table-responsive">

<table class="table table-bordered table-hover table-striped table-responsive" id="listBerkasTable">

	<thead>
		<tr>
			<th>Nama Peminjam</th>
			<th>Total Minjem</th>
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
				echo $row['nama'];
			?>
			</td>
			<td>
			<?php
			
			$kode=$row['nip'];
			$sql_jenisbarang = "SELECT COUNT( `kode_pinjam`) as `Total`
								FROM  `pinjam` 
								WHERE  `nip` =  '$kode'";
			$data_jenisbarang = mysqli_query ($koneksi ,$sql_jenisbarang) or die ("gagal koneksi tabel");
			$tampil_jenisbarang = mysqli_fetch_array($data_jenisbarang);
			echo $tampil_jenisbarang['Total'];
			?>
			</td>
			<td>
			<a href="?p=detail_pinjam&id=<?php echo $row['nip'];?>"><span class="glyphicon glyphicon-check"></span></a>
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