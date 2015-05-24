<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Yorum&&Puan</title>

</head>

<?php

session_start();
ob_start();
$yorum = $_POST["yorum"];
$puan = $_POST["puan"];
$oyunid = $_GET["id"];
$button = $_POST["button"];

include("dbbaglan.php");

if($button)
{
if($yorum=="" or $puan=="")
{
	echo str_repeat("<br>", 8)."<center><img src=hata.gif border=0 /> Yorum veya puan boş olamaz.Yönlendiriliyorsunuz...</center>";
	header("Refresh: 2; url= uyeoyun.php");
}

else
{
	$kontrol=mysql_query("select * from yorum where uyeid_fk='".$_SESSION["id"]."'");
	$varmi=mysql_num_rows($kontrol);
	
	if($varmi>0)
	{
		echo str_repeat("<br>", 8)."<center><img src=hata.gif border=0 /> Daha önce yorum yazmışsınız.Yönlendiriliyorsunuz...</center>";
		header("Refresh: 2; url= uyeoyun.php");
	}

   else
   {
		$sorgu = sprintf("INSERT INTO yorum (yorum,puan,uyeid_fk,oyunid_fk) VALUES('%s','%s','%s','%s')", 
		mysql_real_escape_string($yorum), 
		mysql_real_escape_string($puan),
		mysql_real_escape_string($_SESSION["id"]),
		mysql_real_escape_string($oyunid))
		
		or die(mysql_error());
					
        $sql = mysql_query($sorgu);
	    echo "<center><img src=ok.gif border=0 /> Yorum yapıldı.Bekleyiniz.";
        header("Refresh: 2; url= uyeoyun.php");
        exit;
   }
}
}
?>
</html>

