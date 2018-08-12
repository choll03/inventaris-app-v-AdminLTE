<?php
function koneksi () {	
	//koneksi server
		$localhost = "localhost";
		$username = "root";
		$password = "";
		$database = "inventaris";
		
	//cek server
	
	$koneksi = mysqli_connect($localhost,$username,$password,$database);
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}

	return $koneksi;
}
function close () {
	$koneksi = koneksi();
	mysqli_close ($koneksi);
}
?>