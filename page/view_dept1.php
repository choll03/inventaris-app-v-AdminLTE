<?php

//koneksi
include("config/koneksi_db.php");
koneksi();

//sql
$sql = "SELECT * FROM `jenis_barang`";

//query db 
$data = mysql_query ($sql) or die ("gagal koneksi tabel");

//menampilkan data
?>
<h1> Data Jenis Barang <small></small>
  </h1>

<div class="panel panel-info">
<div class="panel-heading"></a></div>
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
			
		</tr>
	</thead>
	<tbody>
			<?php 
				while ($row = mysql_fetch_array ($data))
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