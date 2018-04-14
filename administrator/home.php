<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="content">
        
        
        <div class="breadLine">
            
             <ul class="breadcrumb">
                <li><a href="http://smkn1lms.16mb.com"><i> &copy; 2014 SMKN 1 LEMAHSUGIH</i></a> <span class="divider">></span></li>                
                <li class="active">Dashboard</li>
            </ul>
        </div>
 <!---------------------------------------welcome---------------------------------------------------->       
 <div class="workplace">
 <div class="container">
		<p class="wadah-mengetik"><i>Welcome to Inventaris Of Laboratory Telkom University</i></p>
</div>
<!---------------------------------------------------notification------------------------------------->             
<div class="row-fluid">      
<div class='widgetButtons'>
      
                       <?php
					   $br=mysql_num_rows(mysql_query("select * from barang where kondisi='Rusak'"));
					   ?> 
                        <div class='bb red'>
                            <a href='?module=hubungi' class='tipb' title='Total Barang Rusak <?php echo "$br"; ?>'><span class='ibw-archive'></span></a>                            
                            <div class='caption red'><?php echo "$br"; ?></div>
                        </div>
                        
                            
                       <?php
					   $bg=mysql_num_rows(mysql_query("select * from barang where posisi='Digudang'"));
					   ?> 
                        <div class='bb green'>
                            <a href='?module=komentar' class='tipb' title='Total Barang digudang <?php echo "$bg"; ?>'><span class='ibw-lock'></span></a>
                            <div class='caption red'><?php echo "$bg"; ?></div>
                        </div>
                        
                       <?php
					    $dr=mysql_num_rows(mysql_query("select * from dekorasi where kondisi='Rusak'"));
					   ?> 
                        <div class='bb blue'>
                            <a href='#' class='tipb' title='Total Dekorasi Rusak <?php echo "$dr"; ?>'><span class='ibw-cancel'></span></a>
                            <div class='caption red'><?php echo "$dr"; ?></div>
                        </div>
                        
                          <?php
					   $dg=mysql_num_rows(mysql_query("select * from dekorasi where posisi='Digudang'"));
					   ?> 
                        <div class='bb yellow'>
                            <a href='?module=shoutbox' class='tipb' title='Total Dekorasi digudang <?php echo "$dg"; ?>'><span class='ibw-settings'></span></a>
                            <div class='caption red'><?php echo "$dg"; ?></div>
                        </div>
                        
                    </div>
                </div>
 <!--------------------------------end pemberitahuan------------------------------------>
                
                 <div class="row-fluid">            
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-power"></div>
                        <h1>Shortcut Menu Fakultas</h1>
                        <ul class="buttons">        
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block news scrollBox">
                     <div class="scroll" >

 <?php
                $col = 3;
              $g = mysql_query("SELECT * FROM fakultas WHERE aktif='Y' ORDER BY nama_fakultas");
              
              echo "<table><tr>";              
              $cnt = 0;
              while ($w = mysql_fetch_array($g)) {
                if ($cnt >= $col) {
                echo "</tr><tr>";
                $cnt = 0;
                }
                $cnt++;
                echo "<td width=20% align=center><a href=media.php?module=labs&id=$w[id_fakultas] class='image'>
                <img src=img/users/btn.png border=none><br />$w[nama_fakultas]</a></td>";
              }
              echo "</tr></table>";
            ?>

                        </div>
                        
                    </div>
                </div>                               
            </div>
           
  <!---------------------------------------end tool----------------------------------->
 
            
        </div>
    </div>
</body>
</html>