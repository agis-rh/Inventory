 <body>
<div class="content">
<div class="workplace">
 <div class="dr"><span></span></div>  
 <div class="span6">
 <div class="head clearfix">
 <div class="isw-user"></div>
 <h1>Profil User</h1>
 <ul class="buttons">        
 <li class="toggle"><a href="#"></a></li>
 </ul> 
 </div>
 <div class="block messaging">
                       
                      <?php
                    $id=$_GET[id];
				   $detail=mysql_query("SELECT A.username, B.nama_status, A.nama_lengkap, A.email, A.level, A.alamat, A.no_telp, A.id_session FROM users A, status B WHERE A.id_status=B.id_status AND A.id_session='$id'");
				   while ($user=mysql_fetch_array($detail))
				   {	    
                   echo"<div class='itemIn'>
                            <a href='#' class='image'><img src='img/users/us.png' class='img-polaroid'/></a>
                            <div class='text'>
                                <div class='info clearfix'>
                                    <span class='name'>$user[username]</span>
                                    <span class='date'>$user[email]</span>
                                </div>
                                
 <table>
  <tr>
    <td>Nama Lengkap</td>
    <td>:</td>
    <td>$user[nama_lengkap]</td>
  </tr>
  <tr>
    <td>Status</td>
     <td>:</td>
    <td>$user[nama_status]</td>
  </tr>
   <tr>
    <td>Level</td>
     <td>:</td>
    <td>$user[level]</td>
  </tr>
  <tr>
    <td>Alamat</td>
     <td>:</td>
    <td>$user[alamat]</td>
  </tr>
  <tr>
    <td>No.Telpon</td>
     <td>:</td>
    <td>$user[no_telp]</td>
  </tr>
  <tr>
    <td>ID Session</td>
     <td>:</td>
    <td>$user[id_session]</td>
  </tr>
 
</table>
                                  
                             
                            </div>
                        </div>";
				    }
                        ?>
						
                    </div>
                </div>
                
                </div>
                 
                 
                 </div>
                 </div>
                 </body>  