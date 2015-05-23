<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Üye Düzenleme Formu </title>

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

$sorgula = mysql_query("SELECT * FROM uyeler WHERE id='".$id."'") or die (mysql_error());
$uyeler = mysql_fetch_array($sorgula);


if($islem=="guncelle")
{

?>


<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="guncelle" method="post" action="uye_duzenle.php?islem=guncelle&id=<?php echo $uyeler['id']; ?>">
<table align="center" width="300" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="62"><img src="images/uye.png" width="32" height="32" /> <a href="cikis.php">Çıkış</a></td>
    <td height="62" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="114">Kullanıcı adı:</td>
    <td width="179"><input type="text" name="kullanici_adi" value="<?php echo $uyeler['nick']; ?>" /></td>
  </tr>
  <tr>
    <td>Şifre Değiştir:</td>
    <td><input type="password" name="parola" value=""  /></td>
  </tr>
  <tr>
    <td>E-Posta:</td>
    <td><input type="text" name="eposta" value="<?php echo $uyeler['email']; ?>"  /></td>
  </tr>
    <tr>
    <td>Yetki:</td>
    <td><select name="yetki">
	<?php
	}	
    if($uyeler['yetki'] =="0")
	echo "<option value=\"0\" selected=\"selected\" style=\"background-color:#FF9;\">Üye</option>
	<option value=\"1\">Admin</option>";
	elseif($uyeler['yetki'] =="1") 
	echo "<option value=\"1\" selected=\"selected\" style=\"background-color:lightyellow;\">Admin</option>
	<option value=\"0\">Üye</option>";
	?>

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
</body>
</html>