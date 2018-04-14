<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM users ORDER BY username");
    }
    else{
      $tampil=mysql_query("SELECT * FROM users 
                           WHERE username='$_SESSION[namauser]'");
      echo "<h2>User</h2>";
    }
    
    echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><input type=button value='Tambah User' role='button' class='btn' onclick=\"window.location.href='?module=user&act=tambahuser';\"></a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-users'></div>
                        <h1>Data User</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='5%'><input type='checkbox' name='checkbox'/></th>
                                    <th width='15%'>Username</th>
                                    <th width='20%'>Nama Lengkap</th>
                                    <th width='15%'>Email</th>
                                    <th width='15%'>No.Telp</th>
                                     <th width='10%'>Level</th>
                                      <th width='5%'>Blokir</th> 
                                       <th width='8%'>Aksi</th>                                  
                                </tr>
                            </thead>
                            <tbody>";
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'><a href=?module=detail&id=$r[id_session]>$r[username]</a></td>
             <td class='left'>$r[nama_lengkap]</td>
		         <td class='left'><a href=mailto:$r[email]>$r[email]</a></td>
		         <td class='left'>$r[no_telp]</td>
		         <td class='center'>$r[level]</td>
		         <td class='center'>$r[blokir]</td>
             <td class='center' width='50'><a href=?module=user&act=edituser&id=$r[id_session]><img src='img/users/edit.png' border='0' title='edit' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahuser":
    if ($_SESSION[leveluser]=='admin'){
    echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-plus'></div>
    <h1>Tambah User</h1>
    </div>
    <form method=POST action='$aksi?module=user&act=input'>
           <table class='list'>
            <div class='row-form clearfix'>
          <div class='span3'>Username</div>     <div class='span7'><input type=text name='username'></div></div>
           <div class='row-form clearfix'>
          <div class='span3'>Password</div>     <div class='span7'><input type=password name='password'></div></div>
           <div class='row-form clearfix'>
          <div class='span3'>Nama Lengkap</div> <div class='span7'><input type=text name='nama_lengkap' size=30></div></div>
          <div class='row-form clearfix'> 
          <div class='span3'>Alamat</div>  <div class='span7'> 
          <textarea name='alamat'></textarea></div></div>
          
          <div class='row-form clearfix'>
          <div class='span3'>Status</div>  <div class='span7'>
          <select name='status' id='s2_1' style='width: 100%;'>
            <option value=0 selected>- Pilih Status -</option>";
            $tampil=mysql_query("SELECT * FROM status WHERE aktif='Y' ORDER BY nama_status");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_status]>$r[nama_status]</option>";
            }
    echo "</select></div></div>
          
           <div class='row-form clearfix'>  
          <div class='span3'>E-mail</div>      <div class='span7'><input type=email name='email' size=30></div></div>
           <div class='row-form clearfix'>
          <div class='span3'>No.Telp/HP</div>   <div class='span7'><input type=text name='no_telp' size=20></div></div>
          <td colspan=2><input type=submit role='button' class='btn' value=Simpan>
                            <input type=button value=Batal role='button' class='btn' onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM users WHERE id_session='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-edit'></div>
    <h1>Edit User</h1>
    </div>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          <table class='list'>
          <div class='row-form clearfix'>
         <div class='span3'>Username</div>      
         <div class='span7'><input type=text name='username' value='$r[username]' disabled></div></div>
         
         <div class='row-form clearfix'>
          <div class='span3'>Password</div>      
          <div class='span7'><input type=password name='password'> </div></div>
          
          <div class='row-form clearfix'>
          <div class='span3'>Nama Lengkap</div> 
           <div class='span7'><input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></div></div>
           
          <div class='row-form clearfix'> 
          <div class='span3'>Alamat</div>  <div class='span7'> 
          <textarea name='alamat'>$r[alamat]</textarea></div></div>
           
            <div class='row-form clearfix'>
          <div class='span3'>Status</div> <div class='span7'><select name='status' id='s2_1' style='width: 100%;'>";
 
          $tampil=mysql_query("SELECT * FROM status ORDER BY nama_status");
          if ($r[id_status]==0){
            echo "<option value=0 selected>- Pilih Status -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_status]==$w[id_status]){
              echo "<option value=$w[id_status] selected>$w[nama_status]</option>";
            }
            else{
              echo "<option value=$w[id_status]>$w[nama_status]</option>";
            }
          }
    echo "</select></div></div>
           
          <div class='row-form clearfix'>
         <div class='span3'>Email</div>          
         <div class='span7'><input type=email name='email' size=30 value='$r[email]'></div></div>
         
         <div class='row-form clearfix'>
          <div class='span3'>No.Telp</div>       
          <div class='span7'><input type=text name='no_telp' size=30 value='$r[no_telp]'></div></div>";

   if ($r[aktif]=='Y'){
      echo "<div class='row-form clearfix'> 
     <div class='span3'>Blokir</div> <div class='span7'><input type=radio name='blokir' value='Y' checked>Y  
                                      <input type=radio name='blokir' value='N'> N</div></div>";
    }
    else{
      echo "<div class='row-form clearfix'> 
      <div class='span3'>Blokir</div><div class='span7'><input type=radio name='blokir' value='Y'>Y  
                                      <input type=radio name='blokir' value='N' checked>N</div></div>";
    }
    echo "<div class='row-form clearfix'>
     *) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</div>
          <tr><td class='left' colspan=2><input type=submit rol='button' class='btn' value=Update>
                            <input type=button value=Batal rol='button' class='btn' onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    else{
    echo "<h2>Edit User</h2>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=id value='$r[id_session]'>
          <input type=hidden name=blokir value='$r[blokir]'>
          <table>
          <tr><td class='left'>Username</td>     <td> : <input type=text name='username' value='$r[username]' disabled> **)</td></tr>
          <tr><td class='left'>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td class='left'>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30  value='$r[nama_lengkap]'></td></tr>
          <tr><td class='left'>E-mail</td>       <td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td class='left'>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>";    
    echo "<tr><td class='left' colspan=2>*) Apabila password tidak diubah, dikosongkan saja.<br />
                            **) Username tidak bisa diubah.</td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    break;  
}
}
?>
