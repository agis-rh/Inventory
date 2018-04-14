<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 include "403.html";
}
else{
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
?>
<!DOCTYPE html>
<html lang="en">
<head> 

	<style>
		*{
			padding: 0;margin: 0;
		}
		
	
		#loading {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url(img/users/loading.gif) 50% 50% no-repeat #fff;
		}
		
	</style>       
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Ruang Administrator</title>
    <link rel="icon" type="image/ico" href="img/x.png"/>
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />     
    <link href="css/progress.css" rel="stylesheet" type="text/css" />             
   
    
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery-ui.min.js'></script>  
    <script type='text/javascript' src='js/plugins/cookie/jquery.cookies.2.2.0.min.js'></script> 
    <script type='text/javascript' src='js/plugins/bootstrap.min.js'></script>
    <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>
    <script type='text/javascript' src='js/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script type='text/javascript' src='js/plugins/select2/select2.min.js'></script>
    <script type='text/javascript' src='js/plugins/uniform/uniform.js'></script>      
    <script type='text/javascript' src='js/plugins/dataTables/jquery.dataTables.min.js'></script>        
    <script type='text/javascript' src='js/plugins/fancybox/jquery.fancybox.pack.js'></script>    
    <script type='text/javascript' src='js/cookies.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/plugins.js'></script>
    
    	<style>
		.container{
			width: 530px;
			margin: 30px auto;
			padding: 20px 30px;
			background:url(img/w.png);
		}
		.wadah-mengetik
		{
			font-size: 22px;
			width: 740px;
			white-space:nowrap;
			overflow:hidden;
			-webkit-animation: ketik 10s steps(100, end);
			animation: ketik 10s steps(100, end);
		}
 
		@keyframes ketik{
				from { width: 0; }
		}
 
		@-webkit-keyframes ketik{
				from { width: 0; }
		}
	</style>
    <script type="text/javascript">
		$(window).load(function() { $("#loading").fadeIn(700).delay(2000).fadeOut("700"); })
	</script>
    <script>
		$(function() {
			$(".meter > span").each(function() {
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			});
		});
	</script>
</head>
<body>
<div id="loading"></div>


    
    <div class="header">
        <a class="logo" href="media.php?module=home"><img src="img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="menu">                
		<?php include "menu.php"; ?>        
        <div class="dr"><span></span></div>
<!-------------------------------end menu------------------------------------------->        
        
        <div class="widget-fluid">
            
            <div class="wBlock green clearfix">
            <div class="dSpace">
                        <?php
                        $barang=mysql_query("select * from barang");
						$tbarang=mysql_num_rows($barang);
                        
						$rusak=mysql_query("select * from barang where kondisi='Rusak'");
						$trusak=mysql_num_rows($rusak);
						
						$drusak=mysql_query("select * from barang where kondisi='Baik'");
						$tdrusak=mysql_num_rows($drusak);
						
						?>
                            <h3>Statistik Barang</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--130,190,260,230,290,400,340,360,390--></span>
                            <span class="number"><?php echo"$tbarang"; ?></span>                    
                        </div>
                        
                        <div class="rSpace">
                          <span><?php echo"$tdrusak"; ?> <b>Barang Baik</b></span>
                            <span><?php echo"$trusak"; ?> <b>Barang Rusak</b></span>
                            <span><?php echo"$tbarang"; ?> <b>Total Barang</b></span>
                           
                            
                                              
                   
                </div>         
                
            </div>
        </div>
        
        <!-------------------------------end menu------------------------------------------->        
         <div class="dr"><span></span></div>
        <div class="widget-fluid">
            
            <div class="wBlock red clearfix">
            <div class="dSpace">
                        <?php
                        $dekorasi=mysql_query("select * from dekorasi");
						$tdekorasi=mysql_num_rows($dekorasi);
                        
						$srusak=mysql_query("select * from dekorasi where kondisi='Rusak'");
						$dtrusak=mysql_num_rows($srusak);
						
						$hrusak=mysql_query("select * from dekorasi where kondisi='Baik'");
						$thrusak=mysql_num_rows($hrusak);
						
						?>
                            <h3>Statistik Dekorasi</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--130,190,260,230,290,400,340,360,390--></span>
                            <span class="number"><?php echo"$tdekorasi"; ?></span>                    
                        </div>
                        
                        <div class="rSpace">
                          <span><?php echo"$thrusak"; ?> <b>Dekorasi Baik</b></span>
                            <span><?php echo"$dtrusak"; ?> <b>Dekorasi Rusak</b></span>
                            <span><?php echo"$tdekorasi"; ?> <b>Total Dekorasi</b></span>
                           
                            
                                              
                   
                </div>         
                
            </div>
        </div>
<!---------------------------------------end statistik-------------------------------------------->
        <div class="dr"><span></span></div>
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
    
        
        <div class="dr"><span></span></div>
        
        
    </div>
        
    <?php
    include "konten.php";
    ?>   
 
</body>
</html>
<?php
}
?>