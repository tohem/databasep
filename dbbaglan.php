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
    die("SERVER BAÐLANTISI BAÞARISIZ. TEKRAR DENEYÝN !!!" . mysqli_error());
} 
else 
{
	mysql_select_db($db_adi,$db_baglan) or die ("Veritabaný baðlantýsý baþarýsýz! TEKRAR DENEYÝN !!!");
}
?>