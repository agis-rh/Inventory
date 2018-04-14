<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_data/aksi_data.php";
switch($_GET[act]){
  default:
 
 // Tampil Profil 
  echo"<div class='content'>
  <div class='workplace'>
  <div class='dr'><span></span></div> 
  <div class='row-fluid'> 
 <div class='span8'>
 <div class='head clearfix'>
 <div class='isw-graph'></div>
 <h1>Profil Laboratory</h1>
 <ul class='buttons'>        
 <li class='toggle'><a href='#'></a></li>
 </ul> 
 </div>
 <div class='block messaging'>";
                       
                    $id=$_GET[id];
				   $detail=mysql_query("SELECT A.nama_lab, B.nama_fakultas, A.deskripsi, A.alamat FROM lab A, fakultas B WHERE A.id_fakultas=B.id_fakultas AND A.id_lab='$id'");
				   while ($user=mysql_fetch_array($detail))
				   {	    
                   echo"<div class='itemIn'>
                            <a href='#' class='image'><img src='img/users/labs.png' class='img-polaroid'/></a>
                            <div class='text'>
                                <div class='info clearfix'>
                                    <span class='name'>$user[nama_lab]</span>
                                    <span class='date'>$user[nama_fakultas]</span>
                                </div>
                                
 <table>
  <tr>
    <td>Deskripsi</td>
    <td>:</td>
    <td>$user[deskripsi]</td>
  </tr>
  <tr>
    <td>Alamat</td>
     <td>:</td>
    <td>$user[alamat]</td>
  </tr>";
}   
 
echo"</table>
</div>";

//Tampil Keadaan
                       
                    $id=$_GET[id];
				   $detail=mysql_num_rows(mysql_query("SELECT * FROM barang WHERE posisi='Digudang' AND id_lab='$id'"));
                   $detail1=mysql_num_rows(mysql_query("SELECT * FROM dekorasi WHERE posisi='Digudang' AND id_lab='$id'"));
                   $sum=$detail+$detail1;
				  	    
                   echo"<div class='itemIn'>
                            <a href='#' class='image'><img src='img/users/Qu.png' class='img-polaroid'/></a>
                            <div class='text'>
                                <div class='info clearfix'>
                                </div>
                                
 <table>";
 
  $id=$_GET[id];
  $a=mysql_num_rows(mysql_query("SELECT * FROM barang WHERE id_lab='$id'"));
  $b=mysql_num_rows(mysql_query("SELECT * FROM dekorasi WHERE id_lab='$id'"));
  $ab=$a+$b;
  
  echo"<tr>
    <td>Jumlah Barang & Dekorasi</td>
    <td>:</td>
    <td>$ab</td>
  </tr>
  <tr>
    <td>Barang & Dekorasi digudang</td>
    <td>:</td>
    <td>$sum</td>
  </tr>";
  
   $id=$_GET[id];
  $d=mysql_num_rows(mysql_query("SELECT * FROM barang WHERE kondisi='Rusak' AND id_lab='$id'"));
  
  echo"<tr>
    <td>Total Barang Rusak</td>
     <td>:</td>
    <td>$d</td>
  </tr>"; 
  
  $id=$_GET[id];
  $data=mysql_num_rows(mysql_query("SELECT * FROM dekorasi WHERE kondisi='Rusak' AND id_lab='$id'"));
  $t=$d+$data;
  echo"<tr>
    <td>Total Dekorasi Rusak</td>
     <td>:</td>
    <td>$data</td>
  </tr>
  <tr>
    <td>Barang & Dekorasi Rusak</td>
     <td>:</td>
    <td>$t</td>
  </tr>"; 

  $prsn=($t*100)/$ab;
  $a=round($prsn, 2);
  if($prsn<='20')
  {
    echo"<tr>
  <td>Status</td>
  <td>:</td>
  <td><span style=\"color:blue;\"><b>Sangat Baik</b></span></td>
  </tr>";
  }else
   if($prsn<='40')
  {
    echo"<tr>
  <td>Status</td>
  <td>:</td>
  <td><span style=\"color:#09F;\"><b>Baik</b></span></td>
  </tr>";
  }else
   if($prsn<='60')
  {
    echo"<tr>
  <td>Status</td>
  <td>:</td>
  <td><span style=\"color:red;\"><b>Buruk</b></span></td>
  </tr>";
   }else
   if($prsn<='80')
  {
    echo"<tr>
  <td>Status</td>
  <td>:</td>
  <td><span style=\"color:red;\"><b>Sangat Buruk</b></span></td>
  </tr>";
  }else
   if($prsn<='100')
  {
    echo"<tr>
  <td>Status</td>
  <td>:</td>
  <td><span style=\"color:red;\"><b>Harus diperbaiki !</b></span></td>
  </tr>";
  }
  
  
 
echo"</table>
</div>";

  if($prsn<='25')
  {                  
  echo"<div class='itemIn'>
  <div class='text'>
  <div class='info clearfix'>
  <div class='meter blue'>
<span style='width: $prsn%'><div align='center' style=\"color:#000;\"><b>$a % Rusak</b></div></span>
</div>
  </div>";
  }else
    if($prsn<='50')
  {                  
  echo"<div class='itemIn'>
  <div class='text'>
  <div class='info clearfix'>
  <div class='meter'>
<span style='width: $prsn%'><div align='center' style=\"color:#fff;\"><b>$a % Rusak</b></div></span>
</div>
  </div>";
  }else
   if($prsn<='75')
  {                  
  echo"<div class='itemIn'>
  <div class='text'>
  <div class='info clearfix'>
  <div class='meter orange'>
<span style='width: $prsn%'><div align='center' style=\"color:#fff;\"><b>$a % Rusak</b></div></span>
</div>
  </div>";
  }else
   if($prsn<='100')
  {                  
  echo"<div class='itemIn'>
  <div class='text'>
  <div class='info clearfix'>
  <div class='meter red'>
<span style='width: $prsn%'><div align='center' style=\"color:#fff;\"><b>$a % Rusak</b></div></span>
</div>
  </div>";
  }else                    
                                            
						
echo"</div>
</div>                
</div>
</div>
  
  
  
    
</div>
</div>";  
    
break;   
}
}
?>