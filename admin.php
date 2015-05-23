<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yönetim Paneli</title>
</head>
<body>
<?php

session_start();
ob_start();
// sayfaya erişim yapan kişinin admin yetkisini kontrol ediyoruz
if(!isset($_SESSION["yetki"]))
{
echo str_repeat("<br>", 8)."<center><img src=hata.gif border=0 /> Yönetim Paneli sadece yetkili kullanıcılara açıktır!</center>";
header("Refresh: 2; url= anasayfa.php");
return;
}
include("dbbaglan.php");


$sql = "select * from uyeler Order By id";

$sorgula = mysql_query($sql) or die(mysql_error());

?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="guncelle" method="post" action="admin_islem.php">
<table align="center" width="800" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="62" colspan="2"><img src="uye.png" width="32" height="32" /><b> Yönetici:</b> <a href="cikis.php">Çıkış</a></td>
    </tr>
 <tr>
    <td><b><u>ID</u></b></td>
    <td><b><u>Kullanıcı Adı</u></b></td>
    <td><b><u>Parola (Md5)</u></b></td>
    <td><b><u>E-Posta</u></b></td>
    <td><b><u>Yetki</u></b></td>
  </tr>
<?php while ($uyeler = mysql_fetch_array($sorgula)){ ?>
 <tr>
    <td><?php echo $uyeler['id']; ?></td>
    <td><?php echo $uyeler['nick']; ?></td>
    <td><?php echo $uyeler['sifre']; ?></td>
    <td><?php echo $uyeler['email']; ?></td>
    <td><?php if($uyeler['yetki'] =='0')
	echo "Üye";
	elseif($uyeler['yetki'] =='1')
	echo "Admin";
	?></td>
    <td><a href="uye_duzenle_form.php?islem=duzenle&id=<?php echo $uyeler['id']; ?>">Düzenle</a></td>
    <td><a href="uye_sil.php?islem=sil&id=<?php echo $uyeler['id']; ?>">Sil</a></td>
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