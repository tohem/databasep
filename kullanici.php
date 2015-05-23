<html>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
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
<a href="cikis.php">ÇIKIŞ</a>|
<a href="profil.php">PROFİL</a>
<?php
}

else{
?>
<br/><br/>
<a href="cikis.php">ÇIKIŞ</a>|
<a href="admin.php">ADMIN PANELİ</a>
<?php
}
?>

</body>

</html>