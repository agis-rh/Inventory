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

// Input Fakultas
if ($module=='fakultas' AND $act=='input'){
  mysql_query("INSERT INTO fakultas(nama_fakultas) VALUES('$_POST[nama]')");
  header('location:../../media.php?module='.$module);
}

// Update Fakultas
elseif ($module=='fakultas' AND $act=='update'){
  mysql_query("UPDATE fakultas SET nama_fakultas='$_POST[nama]', aktif='$_POST[aktif]' 
               WHERE id_fakultas = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
