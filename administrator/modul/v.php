 <?php 
    //Tampil Data Barang Rusak
echo "
<div class='workplace'>
<div class='row-fluid'>
<div class='span6'>                    
<div class='head clearfix'>
<div class='isw-folder'></div>
<h1>Data Barang Rusak</h1>                               
</div>
<div class='block-fluid table-sorting clearfix'>
<table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
<thead>
<tr>
<th width='10%'>No.</th>
<th width='40%'>Nama Barang</th>
<th width='25%'>Identitas</th>
<th width='15%'>Aksi</th>                                   
</tr>
</thead>
<tbody>";
$id=$_GET[id];
$data=mysql_query("SELECT * FROM barang WHERE kondisi='rusak' AND id_lab='$id'");
$no=1;
while($r=mysql_fetch_array($data)){
echo"<tr>
<td>$no</td>
<td>$r[nama_barang]</td>
<td>$r[identitas]</td>
<td><a href=$aksi?module=data&act=editbarang&id=$r[id_barang]>Perbaiki</a></td>
                                    
</tr>";
$no++;
}
echo"</tbody>
</table>
</div>
</div>"; 

//Tampil Dekorasi Rusak
echo"<div class='span6'>                    
<div class='head clearfix'>
<div class='isw-picture'></div>
<h1>Data Dekorasi Rusak</h1>                               
</div>
<div class='block-fluid table-sorting clearfix'>
<table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
<thead>
<tr>
<th width='10%'>No.</th>
<th width='40%'>Nama Dekorasi</th>
<th width='25%'>Identitas</th>
<th width='15%'>Aksi</th>                                   
</tr>
</thead>
<tbody>";
$id=$_GET[id];
$data1=mysql_query("SELECT * FROM dekorasi WHERE kondisi='rusak' AND id_lab='$id'");
$no=1;
while($r1=mysql_fetch_array($data1)){
echo"<tr>
<td>$no</td>
<td>$r1[nama_dekorasi]</td>
<td>$r1[identitas]</td>
<td><a href=$aksi?module=data&act=editdekorasi&id=$r1[id_dekorasi]>Perbaiki</a></td>
                                    
</tr>";
$no++;
}
echo"</tbody>
</table>
</div>
</div>                                
</div> 
</div>             
</div>
</div>";  
    
    
    
    
    //Tampil Data Barang Digudang
echo "<div class='content'>
<div class='workplace'>
<div class='row-fluid'>
<div class='span6'>                    
<div class='head clearfix'>
<div class='isw-folder'></div>
<h1>Data Barang Digudang</h1>                               
</div>
<div class='block-fluid table-sorting clearfix'>
<table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
<thead>
<tr>
<th width='10%'>No.</th>
<th width='40%'>Nama Barang</th>
<th width='25%'>Identitas</th>                                  
</tr>
</thead>
<tbody>";
$id=$_GET[id];
$data=mysql_query("SELECT * FROM barang WHERE posisi='Digudang' AND id_lab='$id'");
$no=1;
while($r=mysql_fetch_array($data)){
echo"<tr>
<td>$no</td>
<td>$r[nama_barang]</td>
<td>$r[identitas]</td>
                                    
</tr>";
$no++;
}
echo"</tbody>
</table>
</div>
</div>"; 

//Tampil Dekorasi Digudang
echo"<div class='span6'>                    
<div class='head clearfix'>
<div class='isw-picture'></div>
<h1>Data Dekorasi Digudang</h1>                               
</div>
<div class='block-fluid table-sorting clearfix'>
<table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
<thead>
<tr>
<th width='10%'>No.</th>
<th width='40%'>Nama Dekorasi</th>
<th width='25%'>Identitas</th>
                                 
</tr>
</thead>
<tbody>";
$id=$_GET[id];
$data1=mysql_query("SELECT * FROM dekorasi WHERE posisi='Digudang' AND id_lab='$id'");
$no=1;
while($r1=mysql_fetch_array($data1)){
echo"<tr>
<td>$no</td>
<td>$r1[nama_dekorasi]</td>
<td>$r1[identitas]</td>
                                    
</tr>";
$no++;
}
echo"</tbody>
</table>
</div>
</div>                                
</div> 
</div> ";    
?>    