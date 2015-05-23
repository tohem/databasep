<html>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
    <body>
        <?php
        if (isset($_POST['submit'])) 
		{
            include("dbbaglan.php");

            $nick = mysql_real_escape_string($_POST['nick']);
			
            $sif = md5(md5(mysql_real_escape_string($_POST['sifre'])));
			
            $sorgu = mysql_query("SELECT id,nick,ad,soyad,sifre,yetki FROM uyeler WHERE nick='$nick' AND sifre='$sif' LIMIT 1");


            if (mysql_num_rows($sorgu) == 1) 
			{
                $sira = mysql_fetch_array($sorgu);
                ob_start();
                session_start();
                $_SESSION['id'] = $sira['id'];
                $_SESSION['nick'] = $sira['nick'];
                $_SESSION['ad'] = $sira['ad'];
                $_SESSION['soyad'] = $sira['soyad'];
				$_SESSION['sifre'] = $sira['sifre'];
				$_SESSION['yetki'] = $sira['yetki'];
                $_SESSION['logged'] = TRUE;
				
                echo str_repeat("<br>",10)."<center><img src=yukleniyor.gif border=0 /> Giriş yapıldı,bekleyin...</center>";
                header("Refresh: 2; url=kullanici.php"); 
                exit;
            } 
            else 
			{   
				echo str_repeat("<br>",10)."<center><img src=hata.gif border=0 /> HATALI GİRİŞ YAPTINIZ.GİRİŞ SAYFASINA YÖNLENDİRİLİYORSUNUZ.</center>";
                header("Refresh: 2; url=girisform.php");
         
                exit;
            }
        } 

        else 
		{    
            header("Location: girisform.php");
            exit;
        }
        ?> 

    </body>
</html>