 <body>
<div class="content">
<div class="workplace">
 <div class="dr"><span></span></div>  
 <div class="span6">
 
  <?php 
  $id=$_GET[id];
  $f=mysql_query("SELECT nama_fakultas FROM fakultas WHERE id_fakultas='$id'");
  while ($g=mysql_fetch_array($f))
				   {
 		   	
 echo"<div class='head clearfix'>
 <div class='isw-graph'></div>
 <h1>$g[nama_fakultas]</h1>
 <ul class='buttons'>        
 <li class='toggle'><a href='#'></a></li>
 </ul> 
 </div>
 <div class='block users scrollBox'>
 <div class='scroll'>";                   
 }
 ?>
 
 

                    
<?php 
$id=$_GET[id];
$detail=mysql_query("SELECT A.nama_lab, A.id_lab, B.nama_fakultas FROM lab A, fakultas B WHERE A.id_fakultas=B.id_fakultas AND A.id_fakultas='$id'");
while ($user=mysql_fetch_array($detail))
{
 		   	
echo"<div class='item clearfix'>
<div class='image'><a href='#'><img src='img/users/lab.png' width='32'/></a></div>
<div class='info'>
<a href=media.php?module=data&id=$user[id_lab] class='name'>$user[nama_lab]</a>                                                                    
<div class='controls'> <a href='#' class='icon-ok'></a>"; 
echo"</div>                                                                    
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