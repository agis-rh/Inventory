<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_lab/aksi_lab.php";
switch($_GET[act]){
  // Tampil lab
  default:
    echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'> <input type=button value='Tambah Laboratory' rol='button' class='btn' 
          onclick=\"window.location.href='?module=lab&act=tambahlab';\"></a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-graph'></div>
                        <h1>Data Laboratory</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='5%'>No</th>
                                    <th width='35%'>Nama</th>
                                    <th width='35%'>Fakultas</th>
                                    <th width='10%'>Alamat</th>
                                    <th width='5%'>Aktif</th>
                                    <th width='5%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
    $tampil=mysql_query("SELECT A.id_lab, B.nama_fakultas, A.nama_lab, A.alamat, A.aktif FROM lab A, fakultas B WHERE A.id_fakultas=B.id_fakultas ORDER BY A.nama_lab");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='center' width='25'>$no</td>
             <td class='left'>$r[nama_lab]</td>
             <td class='left'>$r[nama_fakultas]</td>
              <td class='left'>$r[alamat]</td>
             <td class='center'>$r[aktif]</td>
             <td class='center' width='50'><a href=?module=lab&act=editlab&id=$r[id_lab]><img src='img/users/edit.png' border='0' title='edit' /></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    echo "<div id=paging> <div class='row-form clearfix'>*) Data pada Laboratory tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Laboratory.<br>
                         </div>
          </div><br>";
    break;
  
  // Form Tambah Laboratory
  case "tambahlab":
    echo "<form method=POST action='$aksi?module=lab&act=input'>
    <div class='content'>
		<div class='workplace'>
        	<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span8'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-plus'></div>
                        <h1>Tambah Laboratory</h1>
                    </div>
          <table class='list'><tbody>
            
             <div class='row-form clearfix'>            
          <div class='span3'>Nama Laboratory</div>
          <div class='span8'><input type=text name='nama'></div>
          </div>
          
           <div class='row-form clearfix'>
          <div class='span3'>Fakultas</div>  <div class='span8'>
          <select name='fakultas' id='s2_1' style='width: 100%;'>
            <option value=0 selected> Pilih Fakultas </option>";
            $tampil=mysql_query("SELECT * FROM fakultas ORDER BY nama_fakultas");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_fakultas]>$r[nama_fakultas]</option>";
            }
    echo "</select></div></div>
          
           <div class='row-form clearfix'> 
          <div class='span3'>Deskripsi</div><div class='span8'>
          <input type=text name='deskripsi'></div>
          </div>
          
          <div class='row-form clearfix'> 
          <div class='span3'>Alamat</div><div class='span8'>
          <input type=text name='alamat'></div>
          </div>
          
          <tr><td class='left' colspan=2><input type=submit rol='button' class='btn' name=submit value=Simpan>
                            <input type=button value=Batal rol='button' class='btn' onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
  
  // Form Edit Lab
  case "editlab":
    $edit=mysql_query("SELECT * FROM lab WHERE id_lab='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<form method=POST action=$aksi?module=lab&act=update>
    <div class='content'>
		<div class='workplace'>
        	<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span8'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-edit'></div>
                        <h1>Edit Laboratory</h1>
                    </div>   
          <input type=hidden name=id value='$r[id_lab]'>
          <table class='list'><tbody>
          <div class='row-form clearfix'> 
          <div class='span3'>Nama Laboratory</div><div class='span8'><input type=text name='nama' value='$r[nama_lab]'></div></div>
          
          <div class='row-form clearfix'>
          <div class='span3'>Fakultas</div> <div class='span8'><select name='fakultas' id='s2_1' style='width: 100%;'>";
 
          $tampil=mysql_query("SELECT * FROM fakultas ORDER BY nama_fakultas");
          if ($r[id_fakultas]==0){
            echo "<option value=0 selected>Pilih Fakultas</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_fakultas]==$w[id_fakultas]){
              echo "<option value=$w[id_fakultas] selected>$w[nama_fakultas]</option>";
            }
            else{
              echo "<option value=$w[id_fakultas]>$w[nama_fakultas]</option>";
            }
          }
    echo "</select></div></div>
          
          <div class='row-form clearfix'> 
          <div class='span3'>Deskripsi</div><div class='span8'><input type=text name='deskripsi' value='$r[deskripsi]'></div></div>
          <div class='row-form clearfix'> 
          <div class='span3'>Alamat</div><div class='span8'><input type=text name='alamat' value='$r[alamat]'></div></div>";
    if ($r[aktif]=='Y'){
      echo "<div class='row-form clearfix'> 
     <div class='span3'>Aktif</div> <div class='span8'><input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</div></div>";
    }
    else{
      echo "<div class='row-form clearfix'> 
      <div class='span3'>Aktif</div><div class='span8'><input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</div></div>";
    }

    echo "<tr><td class='left'colspan=2><input rol='button' class='btn' type=submit value=Update>
                            <input type=button rol='button' class='btn' value=Batal onclick=self.history.back()></td></tr>
          <tbody></table></form>";
    break;  
}
}
?>
