<?php
if(session_id() == ''){
    session_start();
}
if (isset($_SESSION['giris'])){
    echo'<script type="text/javascript">
    document.location.href = "/erlik/";
    </script>'; 
}
if(isset($_POST['giris'])){
  $vtabani = new mysqli("localhost", "root", "", "ozluk");
  $eposta = $vtabani-> real_escape_string($_POST['eposta']);
  $sifre = $vtabani-> real_escape_string($_POST['sifre']);
  $sorgu = $vtabani->query("SELECT * from users WHERE BINARY user_mail = '$eposta' and BINARY user_pass = '$sifre'");
  if ($sorgu->num_rows<=0){
      $error = "hatalı";
      $vtabani->close();
      }
  else{
      $sorgu = $vtabani->query("SELECT user_perm FROM users WHERE BINARY user_mail = '$eposta' AND BINARY user_pass = '$sifre'");
      $kAdi = $vtabani->query("SELECT user_name from users WHERE BINARY user_mail = '$eposta' AND BINARY user_pass = '$sifre'");
      $kAdi = mysqli_fetch_assoc($kAdi);
      $sorgu = mysqli_fetch_assoc($sorgu);
      $_SESSION['giris'] = true;
      $_SESSION["login_time_stamp"] = time();  
      $_SESSION['yetki'] = $sorgu['user_perm'];
      $_SESSION['isim'] = $kAdi['user_name'];
      $vtabani->close();
      echo'<script type="text/javascript">
      document.location.href = "/erlik";
      </script>';
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="/erlik/css/globals.css?v=0.31" />
    <link rel="stylesheet" href="/erlik/css/styleguide.css?v=0.1" />
    <link rel="stylesheet" href="/erlik/css/giris.css?v=0.11" />
    <title> Giriş - Ege Üniversitesi Ders Program Sistemi </title>
  </head>
  <body>
    <div class="giri-yap">
      <img class="bg" src="img/bg.webp"/>
      <div class="panel">
        <div class="logo">
          <div class="img-ege-logo-wrapper"><img class="img-ege-logo" src="img/img-ege-logo.png" /></div>
          <div class="text">Ege<br />Üniversitesi</div>
        </div>
          <div class="divider">
            <svg xmlns="http://www.w3.org/2000/svg" width="2" height="102" viewBox="0 0 2 102" fill="none">
              <path d="M1 101L1 1" stroke="#D8D9DA" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </div>
        <form class="login-panel" method="POST">
          <div class="input-state-layer-wrapper">
            <div class="input-state-layer">
              <div class="input-with-label">
                <div class="title">E-mail Adresi</div>
                <div class="input-layer">
                  <input type="email" class="input text-wrapper" name="eposta">
                </div>
              </div>
            </div>
          </div>
          <div class="input-state-layer-wrapper">
            <div class="input-state-layer">
              <div class="input-with-label">
                <div class="title">Şifre</div>
                <div class="input-layer">
                  <input type="password" class="input text-wrapper" name="sifre" id="sifre">
                  <img class="icons" src="img/eye_open.svg" id="eyeChange" onClick="sifreGoster()"/>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" class="login-btn" name="giris" value="Giriş Yap">
        </form>
      </div>
    </div>
    <?php
    if (!empty($error)){
      echo'
      <div class="alert-bar-divider" id="alertBar" style="display:flex;">
        <div class="alert-bar">
          <img class="img-2" src="img/property-1-wrong.svg" />
          <div class="message">Yanlış e-posta adresi veya şifre girdiniz.</div>
          <a href="#" onClick="bildirimKapat()"><img class="img-2" src="img/alert-rigth-icon-wrong.svg" /></a>
        </div>
      </div>
        '; 
    } ?>
  </body>
  <script src="giris.js?v=0.01"></script>
</html>
