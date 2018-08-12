<?php
//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();
//sql
$sql = "SELECT * FROM `barang`";
//query db 
$data = mysqli_query ($koneksi, $sql);
//menampilkan data
?>
<div class="panel panel-info">
<div class="panel-heading"><a href="?p=tambah_barang"><button type="button" class="btn btn-default btn-xs">Tambah Barang</button></a></div>
<div class="panel-body">

	<script type="text/javascript">
			 $(document).ready(function(){              

				  $('#listBerkasTable').DataTable(
			{"lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]} ); }); 


	</script>
<div class="table-responsive">

<table class="table table-hover table-striped table-bordered" id="listBerkasTable">
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Jenis Barang</th>
			<th>Keterangan</th>
			<th>Tanggal</th>
			<th>Edit</th>
			<th>Delete</th>
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
			<td align="center">
			<a href="?p=edit_barang&id=<?php echo $row['kode_barang'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
			</td>
			<td align="center">
			<a href="?p=hapus_barang&id=<?php echo $row['kode_barang'];?>"><span class="glyphicon glyphicon-trash"></span></a>
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
<script src="datatables/jquery.dataTables.js"></script>
<script src="datatables/dataTables.bootstrap.js"></script>