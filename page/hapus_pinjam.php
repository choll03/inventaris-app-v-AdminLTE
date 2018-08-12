<?php
$id= $_GET['id'];
//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();
//sql
$sql = "DELETE FROM `pinjam` WHERE `kode_pinjam`='$id'";

//query db 
$data = mysqli_query ($koneksi ,$sql) or die ("gagal koneksi tabel");
if($data) {
	echo "data berhasil dihapus";
}
?>