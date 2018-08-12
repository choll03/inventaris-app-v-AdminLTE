<?php
$id= $_GET['id'];
//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();
//sql
$sql = "DELETE FROM `jenis_barang` WHERE `kode_jenis`='$id'";

//query db 
$data = mysqli_query ($koneksi, $sql);
if($data) {
	echo "data berhasil dihapus";
}
?>