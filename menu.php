
<?php
if ($_SESSION['level']==1)
{
  //Jika admin 
  include('menu_admin.php');
} else {
  include('menu_operator.php');
}
?>