<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Üye sil</title>

</head>

<?php

session_start();
ob_start();

$islem = $_GET["islem"];
$id = $_GET["id"];

include("dbbaglan.php");

$sorgula = mysql_query("SELECT * FROM uyeler WHERE id='".$id."'") or die (mysql_error());
$uyeler = mysql_fetch_array($sorgula);

//Üye Sil
if($islem=="sil")
{

$uye_sil = "DELETE FROM uyeler WHERE id='$id'";
$sil_sonuc = mysql_query($uye_sil);	
echo str_repeat("<br>",8)."<center><img src=ok.gif border=0 /> Üye Silindi.</center>";
header("Refresh: 1; url= admin.php");
return;
}


?>

</html>