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

// Perbaiki Barang
if ($module=='data' AND $act=='editbarang'){
  mysql_query("UPDATE barang SET kondisi='Baik' WHERE id_barang='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Perbaiki Dekorasi
elseif ($module=='data' AND $act=='editdekorasi'){
   mysql_query("UPDATE dekorasi SET kondisi='Baik' WHERE id_dekorasi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
