<?php 

// cek session
 function cekLogin() {
 	if(! isset($_SESSION['login'])){
 	 echo ("<script language='JavaScript'>
          window.alert('Maaf Anda belum Login...')
          window.location.href='login.php';
          </script>");
 	}
 }


// keluar admin
 function Logout(){
 	if(isset($_SESSION['login'])){
 	unset ($_SESSION);
     session_destroy();
 	 echo ("<script language='JavaScript'>
          window.alert('Anda sudah Keluar...')
          window.location.href='login.php';
          </script>");
 	}	

 }

 // level akses



?>