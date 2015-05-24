<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Oyun sil</title>

</head>

<?php

session_start();
ob_start();

$islem = $_GET["islem"];
$id = $_GET["id"];

include("dbbaglan.php");

$sorgula = mysql_query("SELECT * FROM oyunlar WHERE id='".$id."'") or die (mysql_error());
$oyunlar = mysql_fetch_array($sorgula);

if($islem=="sil")
{

$oyun_sil = "DELETE FROM oyunlar WHERE id='$id'";
$sil_sonuc = mysql_query($oyun_sil);	
echo str_repeat("<br>",8)."<center><img src=ok.gif border=0 /> Üye Silindi.</center>";
header("Refresh: 1; url= adminoyun.php");
return;
}


?>

</html>