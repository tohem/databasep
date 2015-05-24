<?php

session_start();
ob_start();

include("dbbaglan.php");


$sql = "select * from oyunlar Order By id";

$sorgula = mysql_query($sql) or die(mysql_error());
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Oyun görüntüleme işlemleri</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="goruntuleme" method="post" action="">
<table align="center" width="800" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="62" colspan="2"><img src="uye.png" width="32" height="32" /><b> Üye:</b> <a href="cikis.php">Çıkış</a></td>
    </tr>
 <tr>
    <td><b><u>Oyun ID</u></b></td>
    <td><b><u>Oyun Adı</u></b></td>
	
  </tr>
  <?php while ($oyunlar = mysql_fetch_array($sorgula)){ ?>
 <tr>
	<td><?php echo $oyunlar['id']; ?></td>
    <td><?php echo $oyunlar['ad']; ?></td>
    <td><a href="oyungor.php?islem=goruntule&id=<?php echo $oyunlar['id']; ?>">Görüntüle</a></td>
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