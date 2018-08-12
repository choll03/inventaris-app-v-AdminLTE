<?php
$id= $_GET['id'];
//koneksi
include("config/koneksi_db.php");
$koneksi = koneksi();
//sql
$sql = "DELETE FROM `user` WHERE `kode_user`='$id'";

//query db 
$data = mysqli_query ($koneksi, $sql) or die ("gagal koneksi tabel");
if($data) {
	echo "data berhasil dihapus";
}
?>