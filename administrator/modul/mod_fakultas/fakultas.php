<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_fakultas/aksi_fakultas.php";
switch($_GET[act]){
  // Tampil lab
  default:
    echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'> <input type=button value='Tambah Fakultas' rol='button' class='btn' 
          onclick=\"window.location.href='?module=fakultas&act=tambahfakultas';\"></a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-power'></div>
                        <h1>Data Fakultas</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='5%'>No</th>
                                    <th width='85%'>Nama Fakultas</th>
                                    <th width='5%'>Aktif</th>
                                    <th width='5%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
    $tampil=mysql_query("SELECT * FROM fakultas");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='center' width='25'>$no</td>
             <td class='left'>$r[nama_fakultas]</td>
             <td class='center'>$r[aktif]</td>
             <td class='center' width='50'><a href=?module=fakultas&act=editfakultas&id=$r[id_fakultas]><img src='img/users/edit.png' border='0' title='edit' /></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    echo "<div id=paging> <div class='row-form clearfix'>*) Data pada Fakultas tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Fakultas.<br>
                         </div>
          </div><br>";
    break;
  
  // Form Tambah Fakultas
  case "tambahfakultas":
    echo "<form method=POST action='$aksi?module=fakultas&act=input'>
    <div class='content'>
		<div class='workplace'>
        	<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span8'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-plus'></div>
                        <h1>Tambah Fakultas</h1>
                    </div>
          <table class='list'><tbody>
            
             <div class='row-form clearfix'>            
          <div class='span3'>Nama Fakultas</div>
          <div class='span9'><input type=text name='nama'></div>
          </div>
          
          
          <tr><td class='left' colspan=2><input type=submit rol='button' class='btn' name=submit value=Simpan>
                            <input type=button value=Batal rol='button' class='btn' onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
  
  // Form Edit Fakultas
  case "editfakultas":
    $edit=mysql_query("SELECT * FROM fakultas WHERE id_fakultas='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<form method=POST action=$aksi?module=fakultas&act=update>
    <div class='content'>
		<div class='workplace'>
        	<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span8'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-edit'></div>
                        <h1>Edit Fakultas</h1>
                    </div>   
          <input type=hidden name=id value='$r[id_fakultas]'>
          <table class='list'><tbody>
          <div class='row-form clearfix'> 
          <div class='span3'>Nama Fakultas</div><div class='span9'><input type=text name='nama' value='$r[nama_fakultas]'></div></div>";
    if ($r[aktif]=='Y'){
      echo "<div class='row-form clearfix'> 
     <div class='span3'>Aktif</div> <div class='span7'><input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</div></div>";
    }
    else{
      echo "<div class='row-form clearfix'> 
      <div class='span3'>Aktif</div><div class='span7'><input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</div></div>";
    }

    echo "<tr><td class='left'colspan=2><input rol='button' class='btn' type=submit value=Update>
                            <input type=button rol='button' class='btn' value=Batal onclick=self.history.back()></td></tr>
          <tbody></table></form>";
    break;  
}
}
?>
