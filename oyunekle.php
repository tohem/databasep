<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<title>Oyun Ekleme</title>

</head>
<body>
<?php

session_start();
ob_start();


include("dbbaglan.php");

$g_ad = $_POST["ad"];
$g_tur = $_POST["tur"];
$g_bilgi = $_POST["bilgi"];

$g_button = $_POST["button"];


if($g_button){

if($g_ad=="" or $g_tur=="" or $g_bilgi=="")
{
echo str_repeat("<br>",8)."<center><img src=hata.gif border=0 /> Alanları boş geçmeyiniz.</center>";

	header("Refresh: 2; url= adminoyun.php");

}
else
{

$ekle = mysql_query("Insert into oyunlar (ad,tur,bilgi) values('".$g_ad."','".$g_tur."' , '".$g_bilgi."')");
	if($ekle)
	{
	
	echo str_repeat("<br>",8)."<center><img src=ok.gif border=0 /> Arşive oyun eklendi.</center>";

	header("Refresh: 2; url= adminoyun.php");
	return;
	}
	else
	{

	echo "<center><img src=hata.gif border=0 /> Oyun Ekleme İşlemi Başarısız!</center>";

	header("Refresh: 2; url= adminoyun.php");

	}
}
}


?>
</body>
</html>