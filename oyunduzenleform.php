<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Oyun Düzenleme Formu </title>

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

$islem = $_GET["islem"];
$id = $_GET["id"];

include("dbbaglan.php");

$sorgula = mysql_query("SELECT * FROM oyunlar WHERE id='".$id."'") or die (mysql_error());
$oyunlar = mysql_fetch_array($sorgula);


if($islem=="duzenle")
{

?>


<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="guncelle" method="post" action="oyunduzenle.php?islem=guncelle&id=<?php echo $oyunlar['id']; ?>">
<table align="center" width="300" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="62"><img src="uye.png" width="32" height="32" /> <a href="cikis.php">Çıkış</a></td>
    <td height="62" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="114">Oyun Adı:</td>
    <td width="179"><input type="text" name="ad" value="<?php echo $oyunlar['ad']; ?>" /></td>
  </tr>
  <tr>
    <td width="114">Tür:</td>
    <td width="179"><input type="text" name="tur" value="<?php echo $oyunlar['tur']; ?>"  /></td>
  </tr>
  <tr>
    <td width="114">Bilgi:</td>
    <td width="179"><input type="text" name="bilgi" value="<?php echo $oyunlar['bilgi']?>"  /></td>
  </tr>
    
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" value="Güncelle" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
</table>
</form>
<?php
}
?>
</body>
</html>