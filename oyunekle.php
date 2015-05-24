<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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



$ekle = mysql_query("Insert into oyunlar (ad,tur,bilgi) values('".$g_ad."','".$g_tur."' , '".$g_bilgi."')");
	if($ekle)
	{
	
	echo str_repeat("<br>",8)."<center><img src=ok.gif border=0 /> Arþive oyun eklendi.</center>";

	header("Refresh: 2; url= adminoyun.php");
	return;
	}
	else
	{

	echo "<center><img src=hata.gif border=0 /> Oyun Ekleme Ýþlemi Baþarýsýz!</center>";

	header("Refresh: 2; url= adminoyun.php");

	}

}


?>
</body>
</html>