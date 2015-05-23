<html>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<body>
<?php
      session_start();     
	  session_destroy();
	  echo str_repeat("<br>",10)."<center><img src=yukleniyor.gif border=0 /> Çıkış yapılıyor,bekleyiniz...</center>"; 
      header("Refresh: 2; url=giris.php");  

?>
</body>
</html>