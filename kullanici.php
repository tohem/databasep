<html>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<link href="menu.css" type="text/css" rel="stylesheet"/>
<body>

<?php

session_start();
if (!$_SESSION['logged']) 
{
	echo str_repeat("<br>",10)."<center><img src=hata.gif border=0 /> Lütfen giriş yapınız...</center>";
    header("Refresh: 2; Location: girisform.php");
    exit;
}
else
{
echo 'HOŞGELDİNİZ  SAYIN '. $_SESSION['ad']." " .$_SESSION['soyad'] ;
}
?>

<?php
if($_SESSION['yetki']=='0'){
?>
<br/><br/>

<a  href = "profil.php" target="icerik"> Profil işlemleri için tıklayınız </a></br>
  <a href = "uyeoyun.php" target="icerik" > Oyunları görüntülemek için tıklayınız </a></br>
 <a href="cikis.php">ÇIKIŞ</a>
  
<?php
}

else{
?>
<br/><br/>

<a href="admin.php" target="icerik">Üye işlemleri</a>
<a href="adminoyun.php" target="icerik">Oyun düzenleme işlemleri</a>
<a href="oyunekleform.php" target="icerik">Oyun ekleme</a>
<a href="cikis.php">ÇIKIŞ</a>
<?php
}
?>

</body>

</html>