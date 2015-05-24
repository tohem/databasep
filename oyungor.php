<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yorum&&Puan</title>
<link href="css/stil.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

session_start();
ob_start();

include("dbbaglan.php");
$islem = $_GET["islem"];
$id = $_GET["id"];


$sql = "select * from oyunlar where id ='".$id."' ";

$sorgula = mysql_query($sql);

?>

<p>&nbsp;</p>
<p>&nbsp;</p>

  <img src="uye.png" width="32" height="32" /><b> Üye:</b> <a href="cikis.php">Çıkış</a></br>
   
<?php  $oyunlar = mysql_fetch_array($sorgula); ?>
<?php echo "Oyun Bilgileri:" ?></br></br> 
    <b>ID: </b><?php echo $oyunlar['id']; ?></br>
    <b>Oyun Adı: </b><?php echo $oyunlar['ad']; ?></br>
    <b>Oyun Türü: </b> <?php echo $oyunlar['tur']; ?></br>
    <b>Oyun Bilgisi: </b><?php echo $oyunlar['bilgi']; ?></br>
	<b>Oyun Puanı: </b>
	
	<?php 
		$puan="select (Sum(puan)/Count(uyeid_fk)) as ort from yorum where oyunid_fk='".$oyunlar['id']."'";
		
		$hesapla=mysql_query($puan);
		$ort=mysql_fetch_array($hesapla);
		echo "".$ort['ort']."";
	?></br>
	
	</br>
     
	<p>Yorum Yaz</p> 
	<form name="yorumyaz" method="post" action="yorum.php?id=<?php echo $oyunlar['id']; ?>">
	<textarea name="yorum" style="resize:none;" rows="6" cols="30" maxlength="1000"></textarea>
	</br>
	Puan: 
	<select name="puan">
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option selected value=5>5</option>
				<option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
            </select>
	
	<input type="submit" name="button" value="Gönder" />
	</form>
	
	</br>
<?php 

$sorgu1="select * from yorum where oyunid_fk='".$id."' ";
$query1=mysql_query($sorgu1);

while($yorumlar=mysql_fetch_array($query1))
{
	$sorgu2="select * from uyeler,yorum where uyeler.id='".$yorumlar['uyeid_fk']."'";
	$query2=mysql_query($sorgu2);
	$uye=mysql_fetch_array($query2);
?>
<tr>
    <td><?php echo $uye['nick']."&nbsp".":"; ?></td>
    <td><?php echo $yorumlar['yorum'];?></td></br>
</tr>

<?php
}
mysql_close();
ob_end_flush();	
?>
</body>
</html>