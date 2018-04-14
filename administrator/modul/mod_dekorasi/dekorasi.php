<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_dekorasi/aksi_dekorasi.php";
switch($_GET[act]){
  // Tampil Dekorasi
  default:
    echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'> <input type=button value='Tambah Dekorasi' rol='button' class='btn' 
          onclick=\"window.location.href='?module=dekorasi&act=tambahdekorasi';\"></a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-picture'></div>
                        <h1>Data Dekorasi</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='5%'>No</th>
                                    <th width='25%'>Nama Dekorasi</th>
                                    <th width='15%'>Identitas</th>
                                    <th width='10%'>Posisi</th>
                                    <th width='10%'>Kondisi</th>
                                    <th width='25%'>Laboratory</th>
                                    <th width='10%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
    
    $tampil = mysql_query("SELECT A.id_dekorasi, B.nama_lab, A.nama_dekorasi,A.identitas, A.posisi, A.kondisi FROM dekorasi A, lab B WHERE A.id_lab=B.id_lab ORDER BY A.nama_dekorasi");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left'>$r[nama_dekorasi]</td>
                <td class='left'>$r[identitas]</td>
                <td class='left'>$r[posisi]</td>
                <td class='left'>$r[kondisi]</td>
               <td class='left'>$r[nama_lab]</td>
		            <td class='center' width='85'><a href=?module=dekorasi&act=editdekorasi&id=$r[id_dekorasi]><img src='img/users/edit.png' border='0' title='edit' /></a>
		                <a href=$aksi?module=dekorasi&act=hapus&id=$r[id_dekorasi]><img src='img/users/del.png' border='0' title='hapus' /></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahdekorasi":
    echo "<form method=POST action='$aksi?module=dekorasi&act=input'>
          <div class='content'>
		<div class='workplace'>
        <div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-plus'></div>
                        <h1>Tambah Dekorasi</h1>
                    </div>  
          <table class='list'><tbody>
          <div class='row-form clearfix'>
          <div class='span3'>Nama Dekorasi</div>    <div class='span7'><input type=text name='nama'></div></div>";
          
        //Ambil Identitas        
  $data=mysql_query("SELECT id_dekorasi FROM dekorasi ORDER BY id_dekorasi DESC LIMIT 1");
  while($a=mysql_fetch_array($data)){
        $code=$a[id_dekorasi]+1;  
          
        echo"<div class='row-form clearfix'>
          <div class='span3'>Identitas</div>    <div class='span7'><input type=text name='identitas' value='DK-$code' disabled></div></div>";
          }
          
        echo"<div class='row-form clearfix'>
          <div class='span3'>Laboratory</div>  <div class='span7'>
          <select name='lab' id='s2_1' style='width: 100%;'>
            <option value=0 selected> Pilih Laboratory </option>";
            $tampil=mysql_query("SELECT * FROM lab ORDER BY nama_lab");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_lab]>$r[nama_lab]</option>";
            }
    echo "</select></div></div>
    <div class='row-form clearfix'> 
          <div class='span2'>Posisi</div>   
          <div class='span9'><input type=radio name='posisi' value='Dipakai' checked>Dipakai  
                                         <input type=radio name='posisi' value='Digudang'> Digudang
                                         </div></div> 
          
          
          <div class='row-form clearfix'> 
          <div class='span2'>Kondisi</div>   
          <div class='span9'><input type=radio name='kondisi' value='Baik' checked>Baik  
                                         <input type=radio name='kondisi' value='Rusak'> Rusak
                                         </div></div> 
          
          <tr><td class='left' colspan=2><input type=submit rol='button' class='btn' value=Simpan>
                            <input type=button value=Batal rol='button' class='btn' onclick=self.history.back()></td></tr>
          </tbody></table></div></div></div></form>";
     break;
    
  case "editdekorasi":
    $edit = mysql_query("SELECT * FROM dekorasi WHERE id_dekorasi='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<form method=POST action=$aksi?module=dekorasi&act=update>
    <div class='content'>
		<div class='workplace'>
        <div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-edit'></div>
                        <h1>Edit Dekorasi</h1>
                    </div>   
          <input type=hidden name=id value=$r[id_dekorasi]>
          <table class='list'><tbody>
          <div class='row-form clearfix'>
          <div class='span3'>Nama Dekorasi</div>   <div class='span7'><input type=text name='nama' value='$r[nama_dekorasi]'></div></div>
          <div class='row-form clearfix'>
          <div class='span3'>Identitas</div>   <div class='span7'><input type=text name='identitas' value='$r[identitas]' disabled></div></div>
          <div class='row-form clearfix'>
          <div class='span3'>Laboratory</div> <div class='span7'><select name='lab' id='s2_1' style='width: 100%;'>";
 
          $tampil=mysql_query("SELECT * FROM lab ORDER BY nama_lab");
          if ($r[id_lab]==0){
            echo "<option value=0 selected>Pilih Laboratory</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_lab]==$w[id_lab]){
              echo "<option value=$w[id_lab] selected>$w[nama_lab]</option>";
            }
            else{
              echo "<option value=$w[id_lab]>$w[nama_lab]</option>";
            }
          }
    echo "</select></div></div>";
   
 if ($r[posisi]=='Dipakai'){
      echo "<div class='row-form clearfix'> 
     <div class='span3'>Posisi</div> <div class='span7'><input type=radio name='posisi' value='Dipakai' checked>Dipakai  
                                      <input type=radio name='posisi' value='Digudang'> Digudang</div></div>";
    }
    else{
      echo "<div class='row-form clearfix'> 
      <div class='span3'>Posisi</div><div class='span7'><input type=radio name='posisi' value='Dipakai'>Dipakai  
                                      <input type=radio name='posisi' value='Digudang' checked>Digudang</div></div>";
    }

 if ($r[kondisi]=='Baik'){
      echo "<div class='row-form clearfix'> 
     <div class='span3'>Kondisi</div> <div class='span7'><input type=radio name='kondisi' value='Baik' checked>Baik 
                                      <input type=radio name='kondisi' value='Rusak'> Rusak</div></div>";
    }
    else{
      echo "<div class='row-form clearfix'> 
      <div class='span3'>Kondisi</div><div class='span7'><input type=radio name='kondisi' value='Baik'>Baik  
                                      <input type=radio name='kondisi' value='Rusak' checked>Rusak</div></div>";
    }
   
          
    echo "<tr><td class='left' colspan=2><input type=submit rol='button' class='btn' value=Update>
                            <input type=button value=Batal rol='button' class='btn' onclick=self.history.back()></td></tr>
         </tbody></table></form>";
    break;  
}
}
?>
