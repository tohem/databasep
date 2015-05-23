<html>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
    <body>

        <?php

        if (isset($_POST['submit'])) {
           
            include("dbbaglan.php");

            $sorgu = sprintf("SELECT nick FROM uyeler WHERE nick='%s' LIMIT 1", mysql_real_escape_string($_POST['nick']));
            $sql = mysql_query($sorgu);
            $satir = mysql_fetch_array($sql);
			
           if ($satir || empty($_POST['nick']) || empty($_POST['ad']) || empty($_POST['soyad']) || empty($_POST['email']) || empty($_POST['sifre']) || empty($_POST['sifre_yeniden']) || $_POST['sifre'] != $_POST['sifre_yeniden']) 
		   {
               $error = '<p>';
                if (empty($_POST['nick'])) {
                    $error .= 'Kullanıcı Adını Giriniz !!! <br>';
                }
                if (empty($_POST['ad'])) {
                    $error .= 'İsim Giriniz !!! <br>';
                }
                if (empty($_POST['soyad'])) {
                    $error .= 'Soyad Giriniz !!! <br>';
                }
                if (empty($_POST['email'])) {
                    $error .= 'Eposta Giriniz !!! <br>';
                }
                if (empty($_POST['sifre'])) {
                    $error .= 'Parola Giriniz !!! <br>';
                }
                if (empty($_POST['sifre_yeniden'])) {
                    $error .= 'Şifreniz Yeniden Yazınız !!! <br>';
                }
                if ($_POST['sifre'] != $_POST['sifre_yeniden']) {
                    $error .= 'UYARI!! Şifreler Eşleşmedi.Yeniden Yazınız !!! <br>';
                }
                if ($satir) {
                    $error .= 'Kullanıcı Adı Kullanılıyor.Başka Kullanıcı Adı Giriniz !!! <br>';
                }
                $error .= '</p>';
            } 
			
			else 
			{
                $sorgu = sprintf("INSERT INTO uyeler (nick,ad,soyad,email,sifre,tel,dogum) 
				    VALUES('%s','%s','%s','%s',MD5(MD5('%s')),'%s','%s')", 
					mysql_real_escape_string($_POST['nick']), 
					mysql_real_escape_string($_POST['ad']), 
					mysql_real_escape_string($_POST['soyad']), 
					mysql_real_escape_string($_POST['email']), 
					mysql_real_escape_string($_POST['sifre']), 
					mysql_real_escape_string($_POST['tel']),
					mysql_real_escape_string($_POST['dogum'])) 
					
					or die(mysql_error());
					
                $sql = mysql_query($sorgu);
				echo "<center><img src=ok.gif border=0 /> Kaydedildi.Bekleyiniz.";
                header("Refresh: 2; url= girisform.php");
                exit;
            }
        }

		
        if (isset($error)) 
		{
            echo $error;    //değişken tanımlı mı kontrol et
            unset($error);  //değişkeni hafızadan sil
        }
		
       header("Location: kayitform.php");
        ?>
    </body>
</html>