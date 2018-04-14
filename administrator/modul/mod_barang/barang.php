<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_barang/aksi_barang.php";
switch($_GET[act]){
  // Tampil Barang
  default:
    echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'> <input type=button value='Tambah Barang' rol='button' class='btn' 
          onclick=\"window.location.href='?module=barang&act=tambahbarang';\"></a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-folder'></div>
                        <h1>Data Barang</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='5%'>No</th>
                                    <th width='20%'>Nama Barang</th>
                                    <th width='10%'>Identitas</th>
                                    <th width='10%'>Posisi</th>
                                    <th width='10%'>Kondisi</th>
                                    <th width='10%'>Tgl.Beli</th>
                                    <th width='25%'>Laboratory</th>
                                    <th width='10%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";
    
    $tampil = mysql_query("SELECT A.id_barang, B.nama_lab, A.nama_barang, A.identitas, A.tgl_pembelian, A.posisi, A.kondisi FROM barang A, lab B WHERE A.id_lab=B.id_lab ORDER BY A.nama_barang");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left'>$r[nama_barang]</td>
                <td class='left'>$r[identitas]</td>
                <td class='left'>$r[posisi]</td>
                <td class='left'>$r[kondisi]</td>
                <td class='left'>$r[tgl_pembelian]</td>
               <td class='left'>$r[nama_lab]</td>
		            <td class='center' width='85'><a href=?module=barang&act=editbarang&id=$r[id_barang]><img src='img/users/edit.png' border='0' title='edit' /></a>
		                <a href=$aksi?module=barang&act=hapus&id=$r[id_barang]><img src='img/users/del.png' border='0' title='hapus' /></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahbarang":
    echo "<form method=POST action='$aksi?module=barang&act=input'>
          <div class='content'>
		<div class='workplace'>
        <div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-plus'></div>
                        <h1>Tambah Barang</h1>
                    </div>  
          <table class='list'><tbody>
          <div class='row-form clearfix'>
          <div class='span3'>Nama Barang</div>    <div class='span7'><input type=text name='nama'></div></div>
          <div class='row-form clearfix'>
          <div class='span3'>Laboratory</div>  <div class='span7'>
          <select name='lab' id='s2_1' style='width: 100%;'>
            <option value=0 selected>Pilih Laboratory</option>";
            $tampil=mysql_query("SELECT * FROM lab ORDER BY nama_lab");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_lab]>$r[nama_lab]</option>";
            }
    echo "</select></div></div>
    <div class='row-form clearfix'>
          <div class='span3'>Jenis Barang</div><div class='span7'><input type=text name='jenis'></div></div>
          
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
          <div class='row-form clearfix'>
          <div class='span3'>Tgl.Pembelian</div><div class='span7'><input type=text name='tgl'></div></div>
          <div class='row-form clearfix'>";
  
  //Ambil Identitas        
  $data=mysql_query("SELECT id_barang FROM barang ORDER BY id_barang DESC LIMIT 1");
  while($a=mysql_fetch_array($data)){
        $code=$a[id_barang]+1;
          
          echo"<div class='span3'>Identitas</div><div class='span7'><input type=text name='identitas' value='BR-$code' disabled></div></div>
          <tr><td class='left' colspan=2><input type=submit rol='button' class='btn' value=Simpan>
                            <input type=button value=Batal rol='button' class='btn' onclick=self.history.back()></td></tr>
          </tbody></table></div></div></div></form>";
          }
     break;
    
  case "editbarang":
    $edit = mysql_query("SELECT * FROM barang WHERE id_barang='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<form method=POST action=$aksi?module=barang&act=update>
    <div class='content'>
		<div class='workplace'>
        <div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-edit'></div>
                        <h1>Edit Barang</h1>
                    </div>   
          <input type=hidden name=id value=$r[id_barang]>
          <table class='list'><tbody>
          <div class='row-form clearfix'>
          <div class='span3'>Nama Dekorasi</div>   <div class='span7'><input type=text name='nama' value='$r[nama_barang]'></div></div>
          <div class='row-form clearfix'>
          <div class='span3'>Laboratory</div> <div class='span7'><select name='lab' id='s2_1' style='width: 100%;'>";
 
          $tampil=mysql_query("SELECT * FROM lab ORDER BY nama_lab");
          if ($r[id_lab]==0){
            echo "<option value=0 selected>- Pilih Laboratory -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_lab]==$w[id_lab]){
              echo "<option value=$w[id_lab] selected>$w[nama_lab]</option>";
            }
            else{
              echo "<option value=$w[id_lab]>$w[nama_lab]</option>";
            }
          }
    echo "</select></div></div>
    <div class='row-form clearfix'>
          <div class='span3'>Jenis Barang</div><div class='span7'><input type=text name='jenis' value='$r[jenis_barang]'></div></div>";
          
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
echo "</select></div></div>";

    echo" <div class='row-form clearfix'>
          <div class='span3'>Tgl.Pembelian</div><div class='span7'><input type=text name='tgl' value='$r[tgl_pembelian]'></div></div>
          
          <div class='row-form clearfix'>
          <div class='span3'>Identitas</div><div class='span7'><input type=text name='identitas' value='$r[identitas]' disabled></div></div>";

   
          
    echo "<tr><td class='left' colspan=2><input type=submit rol='button' class='btn' value=Update>
                            <input type=button value=Batal rol='button' class='btn' onclick=self.history.back()></td></tr>
         </tbody></table></form>";
    break;  
}
}
?>
