<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($_GET['module']=='home')
{ 
include "home.php";
}
else
if ($_GET['module']=='lab')
{ 
include "modul/mod_lab/lab.php";
}
else
if ($_GET['module']=='labs')
{ 
include "modul/mod_lab/labs.php";
}
else
if ($_GET['module']=='data')
{ 
include "modul/mod_data/data.php";
}
else
if ($_GET['module']=='fakultas')
{ 
include "modul/mod_fakultas/fakultas.php";
}
else
if ($_GET['module']=='dekorasi')
{ 
include "modul/mod_dekorasi/dekorasi.php";
}
else
if ($_GET['module']=='user')
{ 
include "modul/mod_users/users.php";
}
else
if ($_GET['module']=='detail')
{ 
include "modul/mod_users/detail.php";
}
else
if ($_GET['module']=='barang')
{ 
include "modul/mod_barang/barang.php";
}
else
if ($_GET['module']=='status')
{ 
include "modul/mod_status/status.php";
}
else
{
include "not_found.php";	
}
?>
</body>
</html>