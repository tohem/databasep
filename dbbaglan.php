<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<?php

$db = "localhost";
$db_user = "root";
$db_sifre = "";
$db_adi = "proje";

$db_baglan = mysql_connect($db, $db_user, $db_sifre);
mysql_query("SET NAMES 'UTF8'");

if (!$db_baglan) 
{
    die("SERVER BA�LANTISI BA�ARISIZ. TEKRAR DENEY�N !!!" . mysqli_error());
} 
else 
{
	mysql_select_db($db_adi,$db_baglan) or die ("Veritaban� ba�lant�s� ba�ar�s�z! TEKRAR DENEY�N !!!");
}
?>