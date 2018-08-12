<?php
$id= $_GET['id'];
//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();
//sql
$sql = "DELETE FROM `barang` WHERE `kode_barang`='$id'";

//query db 
$data = mysqli_query ($koneksi,$sql);
if($data) {
	echo "data berhasil dihapus";
}
?>