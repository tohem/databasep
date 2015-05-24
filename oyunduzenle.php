<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Oyun Düzenle</title>

</head>

<?php

session_start();
ob_start();


$islem = $_GET["islem"];
$id = $_GET["id"];

include("dbbaglan.php");

$sorgula = mysql_query("SELECT * FROM oyunlar WHERE id='".$id."'") or die (mysql_error());
$oyunlar = mysql_fetch_array($sorgula);


if($islem=="guncelle")
{
$g_id = $_GET["id"];
$g_ad = $_POST["ad"];
$g_tur = $_POST["tur"];
$g_bilgi = $_POST["bilgi"];
$g_button = $_POST["button"];


if($g_button){

$guncelle = mysql_query("Update oyunlar Set ad='$g_ad', tur='$g_tur' , bilgi='$g_bilgi' Where id='$g_id'");

	if($guncelle)
	{	
	echo str_repeat("<br>",8)."<center><img src=ok.gif border=0 /> Oyun Bilgileri Güncellendi.</center>";

	header("Refresh: 2; url= adminoyun.php");
	return;
	}
	else
	{
	echo "<center><img src=hata.gif border=0 /> Oyun Bilgileri Güncellenmedi!</center>";

	header("Refresh: 2; url= adminoyun.php");
	}
}
}
?>
</html>