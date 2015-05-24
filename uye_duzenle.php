<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Üye Düzenle</title>

</head>

<?php

session_start();
ob_start();


$islem = $_GET["islem"];
$id = $_GET["id"];

include("dbbaglan.php");

$sorgula = mysql_query("SELECT * FROM uyeler WHERE id='".$id."'") or die (mysql_error());
$uyeler = mysql_fetch_array($sorgula);


if($islem=="guncelle")
{



$g_id = $_GET["id"];
$g_kullanici_adi = $_POST["kullanici_adi"];
$g_parola = md5(md5($_POST["parola"]));
$g_eposta = $_POST["eposta"];
$g_yetki = $_POST["yetki"];
$g_button = $_POST["button"];


if($g_button){

if(!$_POST["parola"]=="")
{
$guncelle = mysql_query("Update uyeler Set nick='$g_kullanici_adi', sifre='$g_parola', email='$g_eposta', yetki='$g_yetki' Where id='$g_id'");
$_SESSION["sifre"] = $g_parola;

}
else
{
$guncelle = mysql_query("Update uyeler Set nick='$g_kullanici_adi', email='$g_eposta' , yetki='$g_yetki' Where id='$g_id'");
}
	if($guncelle)
	{
	
	echo str_repeat("<br>",8)."<center><img src=ok.gif border=0 /> Üye Bilgileri Güncellendi.</center>";

	header("Refresh: 2; url= admin.php");
	return;
	}
	else
	{

	echo "<center><img src=hata.gif border=0 /> Üye Bilgileri Güncellenmedi!</center>";

	header("Refresh: 2; url= admin.php");

	}

}
	
}

?>

</html>