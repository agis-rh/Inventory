<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Input Status
if ($module=='status' AND $act=='input'){
  mysql_query("INSERT INTO status(nama_status,hak_akses) VALUES('$_POST[nama]','$_POST[hak]')");
  header('location:../../media.php?module='.$module);
}

// Update Status
elseif ($module=='status' AND $act=='update'){
  mysql_query("UPDATE status SET nama_status='$_POST[nama]', hak_akses='$_POST[hak]', aktif='$_POST[aktif]' 
               WHERE id_status = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
