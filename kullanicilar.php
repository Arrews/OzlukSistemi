<?php
include 'permission.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="/erlik/css/globals.css?v=0.32" />
    <link rel="stylesheet" href="/erlik/css/styleguide.css?v=0.12" />
    <link rel="stylesheet" href="/erlik/css/kullanicilar.css?v=0.11" />
    <link rel="stylesheet" href="/erlik/css/sidebar.css?v=0.141" />
    <link rel="stylesheet" href="/erlik/css/header.css?v=0.121" />
    <title>Kullanıcılar</title>
  </head>
  <body>
    <div class="kullanclar" id="mainPageAll">
      <?php include "header.php"; ?>
      <div class="main-container">
        <div class="div">
          <div class="main-title">Kullanıcılar Tablosu</div>
          <a href="#" onclick="dersEklemeSayfasiAc('ekle')">
            <div class="add-btn">
              <img class="plus" src="img/plus-2.svg" />
              <div class="text-wrapper">Ekle</div>
            </div>
          </a>
        </div>
        <div class="table">
          <div class="search-bar">
            <div class="div-2" style="width: fit-content;">
            <input type="text" class="text" placeholder="Arama">
              <a href="#">
                <img class="img-2" src="img/search-1.svg" />
              </a>
            </div>
            <div class="div-2">
            <select class="text">
                <option></option>
                <option value="GERÇEK DEĞER">GÖZÜKEN ADI</option>
                <option value="GERÇEK DEĞER">GÖZÜKEN ADI</option>
                <option value="GERÇEK DEĞER">GÖZÜKEN ADI</option>
                <option value="GERÇEK DEĞER">GÖZÜKEN ADI</option>
              </select>
            </div>
          </div>
          <div class="course-table">
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content">
                  <div class="title">İsim</div>
                  <img class="img-3" src="img/filter-1.svg" />
                </div>
              </div>
              <div class="content-wrapper">
                <div class="content">
                  <div class="title">Soyisim</div>
                  <img class="img-3" src="img/filter-1.svg" />
                </div>
              </div>
              <div class="content-wrapper">
                <div class="content">
                  <div class="title">E-mail</div>
                  <img class="img-3" src="img/filter-1.svg" />
                </div>
              </div>
              <div class="div-wrapper">
                <div class="content-2">
                  <div class="title">Şifre</div>
                  <img class="img-3" src="img/filter-1.svg" />
                </div>
              </div>
              <div class="cell"><div class="content"></div></div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
            <div class="row">
              <div class="cell"><div class="content"></div></div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="content-wrapper">
                <div class="content-3"><div class="text-wrapper-3">Cell Text</div></div>
              </div>
              <div class="cell-2">
                <div class="hortizonal-menu-wrapper"><img class="img-3" src="img/hortizonal-menu-13.svg" /></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hamburger-menu" style="display:none;">
        <div class="menu">
          <div class="menu-iteams">
            <img class="img-4" src="img/edit-4.svg" />
            <div class="text-wrapper-4">Düzenle</div>
          </div>
          <div class="menu-iteams-2">
            <img class="img-4" src="img/trashcan-2.svg" />
            <div class="text-wrapper-5">Sil</div>
          </div>
        </div>
      </div>
      <div class="alert-bar" style="display:none;">
        <img class="img-2" src="img/property-1-successful.svg" />
        <div class="message">Yeni ders başarıyla oluşturuldu.</div>
        <img class="img-2" src="img/alert-rigth-icon.svg" />
      </div>
      <div class="input-area-users" id="dersEklemeSayfasi" style="display:none;">
        <div class="input-area-program">
        <div class="div">
          <div class="main-label">Kullanıcı Ekleme</div>
          <div class="buttons">
            <a href="#" onclick="dersEklemeSayfasiAc('programlarSayfasiIptalEt')">
								<div class="cancel-button">
									<div class="state-layer">
										<img class="img-2" src="img/button-icon-2.svg" />
										<div class="text-wrapper-6">İptal Et</div>
									</div>
								</div>
						</a>
            <a href="#" id="programEkle">
								<div class="save-button">
									<div class="state-layer-2">
										<img class="img-2" src="img/button-icon-1.svg" />
										<div class="text-wrapper-7">Kaydet</div>
									</div>
								</div>
							</a>
          </div>
        </div>
        <div class="inputs">
          <div class="column">
            <div class="input">
              <div class="input-state-layer">
                <div class="input-with-label">
                  <div class="title-2">İsim</div>
                  <div class="input-layer">
                    <div class="input-2"><input type="text" class="text" id="isim"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="input">
              <div class="input-state-layer">
                <div class="input-with-label">
                  <div class="title-2">E-mail</div>
                  <div class="input-layer">
                    <div class="input-2"><input type="email" class="text" id="mail"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="input">
              <div class="input-state-layer">
                <div class="input-with-label">
                  <div class="title-2">Soyisim</div>
                  <div class="input-layer">
                    <div class="input-2"><input type="number" class="text" id="soyisim"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="input">
              <div class="input-state-layer">
                <div class="input-with-label">
                  <div class="title-2">Şifre</div>
                  <div class="input-layer">
                    <div class="input-2"><input type="password" class="text" id="sifre"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="message-box" style="display:none;">
        <div class="main-text">Yapılan değişiklikleri onaylıyor musun?</div>
        <div class="buttons-2">
          <div class="cancel"><div class="button-text">Hayır</div></div>
          <div class="ok"><div class="button-text-2">Evet</div></div>
        </div>
      </div>
    </div>
    <?php include "sidebar.php"; ?>
  </body>
  <script src="index.js?v=0.01"></script>
  <script src="sidebar.js?v=0.03"></script>
  <script src="dersler.js?v=0.02"></script>
</html>
