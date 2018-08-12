<?php 
session_start();
if(isset($_POST['submit']))
{
  //jk submit di klik
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $pass = md5($pass);
  //periksa user ada atau tidak
  $sql = "SELECT `username`,`password`,`level` FROM `user` WHERE `username` ='$user' AND `password` = '$pass'";
  // ambil koneksi
  include('config/koneksi_db.php');
  koneksi();
  $cek_data = mysql_query($sql);
  $data = mysql_fetch_array($cek_data);

   if($user == $data['username'] && $pass == $data['password'])
   {

      $_SESSION['login'] = $user;
       $_SESSION['level'] = $data['level'];
      //kirim ke halaman index 
       echo ("<script language='JavaScript'>
          window.alert('Login Berhasil...')
          window.location.href='index.php';
          </script>");
   } else {

      $error ="<div class='alert  alert-danger' role='alert' >Maaf!, Username & password salah </div>";
   }

  close();



} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
<!--
.style1 {color:#0000FF}
-->

body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
</head>

<body>
    <div class="container">
      

      <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Login</h2>
        <?php 
             if(isset($error)) { echo $error;}
        ?>
        <label for="username" class="sr-only">User Name</label>
        <input name ="user" type="text" id="username" class="form-control" placeholder="User Name" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="sign in" name="submit">
      </form>

    </div> <!-- /container -->
	
</body>
</html>