<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>
</head>

<body>
 <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
            
             <?php echo " <SCRIPT language=JavaScript>var d = new Date();
            var h = d.getHours();
            if (h < 11) { document.write('Selamat Pagi,  $_SESSION[namalengkap]...'); }
            else { if (h < 15) { document.write('Selamat Siang, $_SESSION[namalengkap]...'); }
            else { if (h < 19) { document.write('Selamat Sore, $_SESSION[namalengkap]...'); }
            else { if (h <= 23) { document.write('Selamat Malam,  $_SESSION[namalengkap]...'); }
            }}}</SCRIPT> "; ?>
             
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="img/users/olga.jpg" class="img-polaroid"/>                
            </div>
 <span class="icon-share-alt"></span> <a href="logout.php">Logout</a>
            <ul class="control"> 
               
            </ul>
        </div>
        
        <ul class="navigation">            
            <li class="active">
                <a href="?module=home">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
<!----------------------------------------------end home----------------------------------------->
 <li>
 <a href="?module=lab">
 <span class="isw-graph"></span><span class="text">Laboratory</span>
 </a>        
 </li>
<!-----------------------------------------------end laboratory----------------------------------->
<li>
 <a href="?module=fakultas">
 <span class="isw-power"></span><span class="text">Fakultas</span>
 </a>        
 </li>
<!-----------------------------------------------end fakultas----------------------------------->
 <li>
 <a href="?module=dekorasi">
 <span class="isw-picture"></span><span class="text">Dekorasi</span>
 </a>              
 </li>
<!-----------------------------------------------end decoration----------------------------------------> 
<li>
<a href="?module=barang">
<span class="isw-folder"></span><span class="text">Barang</span>
</a>
</li>
<!------------------------------------------------end barang-------------------------------------->
<li class="openable">
<a href="#">
<span class="isw-users"></span><span class="text">Users</span>
</a>
<ul>
<li>
<a href="?module=user">
<span class="icon-user"></span><span class="text">User</span>
</a>                  
</li> 
<li>
<a href="?module=status">
<span class="icon-check"></span><span class="text">Status</span>
</a>                  
</li>                                                 
</ul>                
</li>
<!------------------------------------------------end users-------------------------------------->
            </li>                                    
        </ul>
</body>
</html>