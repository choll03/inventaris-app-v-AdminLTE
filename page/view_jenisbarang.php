<?php

//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();

//sql
$sql = "SELECT * FROM `jenis_barang`";

//query db 
$data = mysqli_query ($koneksi, $sql);

//menampilkan data
?>
<div class="panel panel-info">
<div class="panel-heading"><a href="?p=tambah_jenisbarang"><button type="button" class="btn btn-default btn-xs">Tambah Jenis Barang</button></a></div>
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
			<th>Kode Jenis</th>
			<th>Jenis</th>
			<th>Edit</th>
			<th>Delete</th>
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
				echo $row['kode_jenis'];
			?>
			</td>
			<td>
			<?php
				echo $row['jenis'];
			?>
			</td>
			<td>
			<a href="?p=edit_jenisbarang&id=<?php echo $row['kode_jenis'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
			</td>
			<td>
			<a href="?p=hapus_jenisbarang&id=<?php echo $row['kode_jenis'];?>"><span class="glyphicon glyphicon-trash"></span></a>
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