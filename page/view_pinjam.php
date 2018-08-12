<?php


//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();
//sql
$sql = "SELECT * FROM `pinjam`";
//query db 
$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");

//menampilkan data
?>
<div class="panel panel-info">
<div class="panel-heading"><a href="?p=tambah_pinjam"><button type="button" class="btn btn-default btn-xs">Tambah Pinjaman</button></a></div>
<div class="panel-body">
	<script type="text/javascript">
			 $(document).ready(function(){              

				  $('#listBerkasTable').DataTable(
			{"lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]} ); }); 


	</script>
<div class="table-responsive">

<table class="table table-bordered table-hover table-striped table-responsive" id="listBerkasTable">

	<thead>
		<tr>
			<th>Kode Pinjam</th>
			<th>NIP</th>
			<th>Nama</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Tgl Pinjam</th>
			<th>Tgl Selesai</th>
			<th>Status</th>
			<th>Keterangan</th>
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
				echo $row['kode_pinjam'];
			?>
			</td>
			<td>
			<?php
				echo $row['nip'];
			?>
			</td>
			<td>
			<?php
			
			$kode=$row['nip'];
			$sql_staff = "SELECT  `nama` 
								FROM  `staff` 
								WHERE  `nip` =  '$kode'";
			$data_staff = mysqli_query ($koneksi, $sql_staff) or die ("gagal koneksi tabel");
			$tampil_staff = mysqli_fetch_array($data_staff);
			echo $tampil_staff['nama'];
			?>
			</td>
			<td>
			<?php
				echo $row['kode_barang'];
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
			<td>
			<a href="?p=edit_pinjam&id=<?php echo $row['kode_pinjam'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
			</td>
			<td>
			<a href="?p=hapus_pinjam&id=<?php echo $row['kode_pinjam'];?>"><span class="glyphicon glyphicon-trash"></span></a>
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
