
<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
 <script src="js/jquery.printPage.js" type="text/javascript"></script>

<div class="panel panel-info">
<div class="panel-heading"><a href="?p=tambah_barang"> Cari Laporan Barang Bulanan </a></div>
<div class="panel-body">

<form class="form-horizontal" method="post" action="?p=laporan_transaksi_bulanan" >
		<div class="form-group">
			<label for="tgl_mulai" class="col-sm-2 control-label">Tanggal Mulai</label>
			<div class="col-sm-10">
				<input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai">
			</div>
		</div>
		<div class="form-group">
			<label for="tgl_selesai" class="col-sm-2 control-label">Tanggal Selesai</label>
			<div class="col-sm-10">
				<input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai">
			</div>
		</div>
				<div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="search" class="btn btn-primary" id="search" value="Search">
		</div>
	</form>

</div>
</div>

<?php 

//untuk cek submit
if (isset($_POST['search']))
{  
		// ntuk cek inputa tanggal
		$tgl_mulai=$_POST['tgl_mulai'];
		$tgl_selesai=$_POST['tgl_selesai'];


	if (  $tgl_mulai !== '' && $tgl_selesai !==''  ) {
		//print 

	?>	

	
		

		 
		
	

       <?php 
       			//koneksi
				include("config/koneksi_db.php");
				koneksi();

				//sql DATA PINJAM 
				$sql = "SELECT * 
				FROM  `pinjam` 
				WHERE  `tgl_pinjam` 
				BETWEEN  '$tgl_mulai'
				AND  '$tgl_selesai'
				ORDER BY  `tgl_pinjam` ASC";



				//query db 
				$data = mysql_query ($sql) or die ("gagal koneksi tabel");


       ?>

		<div class="panel panel-info">
			<div class="panel-heading">Data Laporan Barang Bulanan </div>
		<div class="panel-body">
    

     <script>  
		  $(document).ready(function() {
		    $(".btnPrint").printPage();
		  });
		  </script>

		  <a href="laporan/laporan_transaksi.php?tglm=<?php echo $tgl_mulai;?>&tgls=<?php echo $tgl_selesai;?> "
		   class="btnPrint">
		   <button type="button" class="btn btn-default btn-xs"> Print Laporan </button>
		</a> 
		<br /><br />




		<div class="table-responsive">

			<table class="table table-hover table-striped table-bordered" id="listBerkasTable">
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
					$sql_barang = "SELECT  `nama_barang` 
										FROM  `barang` 
										WHERE  `kode_barang` =  '$kode'";
					$data_barang = mysql_query ($sql_barang) or die ("gagal koneksi tabel");
					$tampil_barang = mysql_fetch_array($data_barang);
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
		</div>
		</div>










<?php

	} else {

			echo "maaf tanggal laporan tidak ada!";
	}

	

} 





?>