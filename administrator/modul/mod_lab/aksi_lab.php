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

// Input Laboratory
if ($module=='lab' AND $act=='input'){
  mysql_query("INSERT INTO lab(nama_lab,id_fakultas,deskripsi,alamat) VALUES('$_POST[nama]','$_POST[fakultas]','$_POST[deskripsi]','$_POST[alamat]')");
  header('location:../../media.php?module='.$module);
}

// Update Laboratory
elseif ($module=='lab' AND $act=='update'){
  mysql_query("UPDATE lab SET nama_lab='$_POST[nama]',id_fakultas='$_POST[fakultas]', deskripsi='$_POST[deskripsi]', alamat='$_POST[alamat]', aktif='$_POST[aktif]' 
               WHERE id_lab = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
