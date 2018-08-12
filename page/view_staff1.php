<?php


//koneksi
include("config/koneksi_db.php");
koneksi();
//sql
$sql = "SELECT * FROM `staff`";
//query db 
$data = mysql_query ($sql) or die ("gagal koneksi tabel");
//menampilkan data

?>
<h1> Data Staff <small></small>
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
			<th>NIP</th>
			<th>Nama</th>
			<th>Nama Dept</th>
			<th>Alamat</th>
			<th>Telephone</th>
			
		</tr>
	</thead>
	<tbody>
			<?php 
				while ($row = mysql_fetch_array ($data)){
			?>
		<tr>
			<td>
			<?php
				echo $row['nip'];
			?>
			</td>
			<td>
			<?php
				echo $row['nama'];
			?>
			</td>
			<td>
			<?php
			
			$kode=$row['kode_dept'];
			$sql_staff = "SELECT  `nama_dept` 
								FROM  `dept` 
								WHERE  `kode_dept` =  '$kode'";
			$data_staff = mysql_query ($sql_staff) or die ("gagal koneksi tabel");
			$tampil_staff = mysql_fetch_array($data_staff);
			echo $tampil_staff['nama_dept'];
			?>
			</td>
			<td>
			<?php
				echo $row['alamat'];
			?>
			</td>
			<td>
			<?php
				echo $row['tlp'];
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