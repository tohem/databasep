<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body background="ap4.png" background-size=100%>
<?php

include("dbbaglan.php");


$idsay="select * from oyunlar";
$idbul=mysql_query($idsay);
$idsayi=mysql_num_rows($idbul);
$index=0;

while($sayi = mysql_fetch_array($idbul))
{
	$dizi[$index]=$sayi["id"];
	$index++;
}

for($i=1;$i<=5;$i++)
{

	$top=rand(0,($idsayi-1));
	if($dizi[$top]==-1)
	{
		$i--;
	}

	else
	{
		$sql = "select * from oyunlar where id='".$dizi[$top]."' ";

		$sorgula = mysql_query($sql);

		$oyunlar = mysql_fetch_array($sorgula); ?>
		</br></br>
		<center><img src="<?php echo $oyunlar['id']; ?>.jpg" width="150" height="150"></center></br></br>
		<center><b>Oyun Adı: </b><?php echo $oyunlar['ad']; ?></center></br>
		<center><b>Oyun Türü: </b> <?php echo $oyunlar['tur']; ?></center></br>
		<center><b>Oyun Bilgisi: </b></br> 
		<table width="100"><tr><td><?php echo $oyunlar['bilgi']; ?></td></tr></table></center></br>
		<center><b>Oyun Puanı: </b> 
	
		<?php 
		$puan="select (Sum(puan)/Count(uyeid_fk)) as ort from yorum where oyunid_fk='".$oyunlar['id']."'";
		
		$hesapla=mysql_query($puan);
		$ort=mysql_fetch_array($hesapla);
		echo "".$ort['ort']."";	
		$dizi[$top]=-1;
	}
?></center>
</br> </br> 
<?php	
}
?>
	
</body>
</html> 