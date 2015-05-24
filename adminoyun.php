<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Oyun Yönetim Paneli</title>
</head>
<body>
<?php

session_start();
ob_start();
// sayfaya erişim yapan kişinin admin yetkisini kontrol ediyoruz
if(!isset($_SESSION["yetki"]))
{
echo str_repeat("<br>", 8)."<center><img src=hata.gif border=0 /> Yönetim Paneli sadece yetkili kullanıcılara açıktır!</center>";
header("Refresh: 2; url= girisform.php");
return;
}
include("dbbaglan.php");


$sql = "select * from oyunlar Order By id";

$sorgula = mysql_query($sql) or die(mysql_error());

?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="guncelle" method="post" action="">
<table align="center" width="800" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="62" colspan="2"><img src="uye.png" width="32" height="32" /><b> Yönetici:</b> <a href="cikis.php">Çıkış</a></td>
    </tr>
 <tr>
    <td><b><u>ID</u></b></td>
    <td><b><u>Oyun Adı</u></b></td>
    <td><b><u>Türü</u></b></td>
    <td><b><u>Oyun Açıklaması</u></b></td>
  </tr>
<?php while ($oyunlar = mysql_fetch_array($sorgula)){ ?>
 <tr>
    <td><?php echo $oyunlar['id']; ?></td>
    <td><?php echo $oyunlar['ad']; ?></td>
    <td><?php echo $oyunlar['tur']; ?></td>
    <td><?php echo $oyunlar['bilgi']; ?></td>

	</td>
    <td><a href="oyunduzenleform.php?islem=duzenle&id=<?php echo $oyunlar['id']; ?>">Düzenle</a></td>
    <td><a href="oyunsil.php?islem=sil&id=<?php echo $oyunlar['id']; ?>">Sil</a></td>
  </tr>
<?php } ?>

</table>
</form>
</body>
</html>

<?php 
mysql_close();
ob_end_flush();	
?>