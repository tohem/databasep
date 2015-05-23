<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php


session_start();
ob_start();

if(!isset($_SESSION["logged"]))
{
echo str_repeat("<br>", 8)."<center><img src=hata.gif border=0 />Bu sayfayı görüntülemek için giriş yapmalısınız.</center>";
header("Refresh: 2; url= girisform.php");
return;
}
include("dbbaglan.php");

$sorgula = mysql_query("SELECT * FROM uyeler WHERE nick='".$_SESSION["nick"]."' and sifre='".$_SESSION["sifre"]."'") or die (mysql_error());

$uyeler = mysql_fetch_array($sorgula);
?>
<head>
<title>Kontrol Paneli</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="guncelle" method="post" action="profil.php?id=<?php echo $uyeler['id']; ?>">
<table align="center" width="300" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="62"><img src="uye.png" width="32" height="32" /> <a href="cikis.php">Çıkış</a></td>
    <td height="62" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="114">Kullanıcı adı:</td>
    <td width="179"><?php echo $uyeler['nick']; ?></td>
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
<?php 

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	
$g_id = $_GET["id"];
$g_parola = md5(md5($_POST["parola"]));
$g_eposta = $_POST["eposta"];	
	

if(!$_POST["parola"]=="")
{
$guncelle = mysql_query("Update uyeler Set sifre='$g_parola', email='$g_eposta' Where id='$g_id'");


}
else
{
$guncelle = mysql_query("Update uyeler Set email='$g_eposta' Where id='$g_id'");
}
	if($guncelle)
	{
	
	echo "<center><img src=ok.gif border=0 /> Bilgileriniz Güncellendi.</center>";

	header("Refresh: 2; url=girisform.php");

	}
	else
	{

	echo "<center><img src=hata.gif border=0 /> Bilgileriniz güncellenmedi.</center>";

	header("Refresh: 2; url= profil.php");

	}

}
mysql_close();
ob_end_flush();	
?>
</html>