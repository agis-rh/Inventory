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

// Hapus Barang
if ($module=='barang' AND $act=='hapus'){
  mysql_query("DELETE FROM barang WHERE id_barang='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input Barang
elseif ($module=='barang' AND $act=='input'){
    // ambil code
$ar=mysql_query("SELECT id_barang FROM barang ORDER BY id_barang DESC LIMIT 1");
while ($r=mysql_fetch_array($ar)){
    $code=$r[id_barang]+1;
    mysql_query("INSERT INTO barang(nama_barang,
                                    id_lab,
                                    jenis_barang,
                                    posisi,
                                    kondisi,
                                    identitas,
                                    tgl_pembelian) 
                            VALUES('$_POST[nama]',
                                   '$_POST[lab]',
                                   '$_POST[jenis]',
                                   '$_POST[posisi]',
                                   '$_POST[kondisi]',
                                   'BR-$code',
                                    '$_POST[tgl]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update Barang
elseif ($module=='barang' AND $act=='update'){
    mysql_query("UPDATE barang SET nama_barang     = '$_POST[nama]',
                                    id_lab           = '$_POST[lab]',
                                    jenis_barang     = '$_POST[jenis]',
                                    posisi           = '$_POST[posisi]',
                                    kondisi          = '$_POST[kondisi]',
                                    tgl_pembelian    = '$_POST[tgl]'    
                              WHERE id_barang      = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
