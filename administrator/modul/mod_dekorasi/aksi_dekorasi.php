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

// Hapus Dekorasi
if ($module=='dekorasi' AND $act=='hapus'){
  mysql_query("DELETE FROM dekorasi WHERE id_dekorasi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input Dekorasi
elseif ($module=='dekorasi' AND $act=='input'){
       // ambil code
$ar=mysql_query("SELECT id_dekorasi FROM dekorasi ORDER BY id_dekorasi DESC LIMIT 1");
while ($r=mysql_fetch_array($ar)){
    $code=$r[id_dekorasi]+1;
    
    mysql_query("INSERT INTO dekorasi(nama_dekorasi,
                                    identitas,
                                    id_lab,
                                    posisi,
                                    kondisi) 
                            VALUES('$_POST[nama]',
                                    'DK-$code',
                                   '$_POST[lab]',
                                   '$_POST[posisi]',
                                   '$_POST[kondisi]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update Dekorasi
elseif ($module=='dekorasi' AND $act=='update'){
    mysql_query("UPDATE dekorasi SET nama_dekorasi = '$_POST[nama]',
                                    id_lab   = '$_POST[lab]',
                                    posisi     = '$_POST[posisi]',
                                    kondisi  = '$_POST[kondisi]'    
                              WHERE id_dekorasi    = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
