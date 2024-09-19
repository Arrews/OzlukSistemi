//------------------------------------Uyarı Mesajı ALanı ----------------------------------------
function uyari_box(kategori, msg) {
	if (kategori == "olumsuz") {
		document.getElementById('olumsuz-alert').style.display = "flex";
		document.getElementById('olumsuz-alert-mesaj').innerHTML = msg;
		document.getElementById('olumsuz-alert').style.borderColor = "var(--uyar-renklerikrmz)";
		document.getElementById('olumsuz-alert').style.boxShadow = "var(--alert-box-shadows-wrong)";
        document.getElementById('olumsuz-alert-progress').style.backgroundColor = "var(--uyar-renklerikrmz)";
        document.getElementById('olumsuz-alert-progress').style.width = "100%";
        document.getElementById('olumsuz-alert-progress').style.transition = "none";

        setTimeout(() => {
            document.getElementById('olumsuz-alert-progress').style.transition = "width 5s linear";
            document.getElementById('olumsuz-alert-progress').style.width = "0";
        }, 10)

        setTimeout(() => {
            bildirimKapat("olumsuz");
        }, 5000);

	} else if (kategori == "olumlu") {
		document.getElementById('olumlu-alert').style.display = "flex";
		document.getElementById('olumlu-alert-mesaj').innerHTML = msg;
		document.getElementById('olumlu-alert').style.borderColor = "var(--uyar-renkleriyeil)";
		document.getElementById('olumlu-alert').style.boxShadow = "var(--alert-box-shadows-succes)";
        document.getElementById('olumlu-alert-progress').style.backgroundColor = "var(--uyar-renkleriyeil)";
        document.getElementById('olumlu-alert-progress').style.width = "100%";
        document.getElementById('olumlu-alert-progress').style.transition = "none";

        setTimeout(() => {
            document.getElementById('olumlu-alert-progress').style.transition = "width 5s linear";
            document.getElementById('olumlu-alert-progress').style.width = "0";
        }, 10)
        
        setTimeout(() => {
            bildirimKapat("olumlu");
        }, 5000);
    }
}

function bildirimKapat(s) {
	if (s == "olumlu") {
		document.getElementById("olumlu-alert").style.display = "none";
	} else {
		document.getElementById("olumsuz-alert").style.display = "none";
	}
}
//------------------------------------Uyarı Mesajı ALanı ----------------------------------------

window.addEventListener("DOMContentLoaded", function() {
	//ogretim gorevlisi ekle
	if (document.getElementById("ogretimGorevlisiEkle")) {
		var ogretimGorevlisiEkle = document.getElementById("ogretimGorevlisiEkle");
		var ad = document.getElementById("ad");
		var email = document.getElementById("email");
		var devam = document.getElementById("devam");
		var eski = document.getElementById("eski");

		function temizle() {
			ad.value = null;
			email.value = null;
			devam.checked = false;
			eski.checked = false;
		}
		ogretimGorevlisiEkle.addEventListener("click", function(event) {
			if (document.getElementById("ogretimGorevlisiEkle")){
			event.preventDefault();
			if (ad.value != "" && email.value != "" && (devam.checked != false || eski.checked != false)) {
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "Sekle.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				var status = devam.checked ? 1 : 0; //Öğretim görevlisi devam ediyorsa 1 etmiyorsa 0
				//getElementByID ile gelen verileri data değişkeni içine yerleştiriyor. "" içindekiler POST adları, sekle.php'ye gönderiliyor
				var data = "ad=" + encodeURIComponent(ad.value) + "&email=" + encodeURIComponent(email.value) + "&status=" + encodeURIComponent(status) + "&sayfa=ogretimgorevlisi"; //else if kontrolündeki else in sebebi.
				xhr.send(data);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) { //4 = ajax dönütü hazır, 200 = site olumlu yanıt verdi
						if (xhr.responseText == "Zaten bu maile sahip bir öğretim görevlisi var.") {
							uyari_box("olumsuz", "Zaten bu e-mail adresine sahip bir öğretim görevlisi var");
						} else if (xhr.responseText == "Ekleme işlemi tamamlandı.") {
							uyari_box("olumlu", "Başarıyla öğretim görevlisi tablolara eklendi.");
							temizle();
						} else {
							uyari_box("olumsuz", "HATALI İŞLEM LÜTFEN SAYFAYI YENİLEYİNİZ, EĞER SORUN DEVAM EDERSE YETKİLİYE BİLDİRİNİZ");
						}
					}
				}
			} else {
				uyari_box("olumsuz", "Öğretim görevlisinin, adını, e-mail adresini ve devam durumunu eksiksiz olarak seçmeniz gerekmektedir.");
			}
		}
		})
	}

	//dersekle
	if (document.getElementById("dersEkle")) {
		var dersEkle = document.getElementById("dersEkle");
		var dersadi = document.getElementById("dersadi");
		var time = document.getElementById("time");
		var zorunlu = document.getElementById("zorunlu");
		var secmeli = document.getElementById("secmeli");

		function temizle() {
			dersadi.value = null;
			time.value = null;
			zorunlu.checked = false;
			secmeli.checked = false;
		}
		dersEkle.addEventListener("click", function(event) {
			if (document.getElementById("dersEkle")){
			event.preventDefault();
			if (dersadi.value != "" && time.value != "" && (zorunlu.checked != false || secmeli.checked != false)) {
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "Sekle.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				var zorunluluk = zorunlu.checked ? 1 : 0; //zorunlu ders ise 1, değil ise 0
				//getElementByID ile gelen verileri data değişkeni içine yerleştiriyor. "" içindekiler POST adları, sekle.php'ye gönderiliyor
				var data = "dersadi=" + encodeURIComponent(dersadi.value) + "&time=" + encodeURIComponent(time.value) + "&zorunluluk=" + encodeURIComponent(zorunluluk) + "&sayfa=dersler"; //else if kontrolündeki else in sebebi.
				xhr.send(data);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) { //4 = ajax dönütü hazır, 200 = site olumlu yanıt verdi
						if (xhr.responseText == "Zaten bu ders adına sahip bir ders var.") {
							uyari_box("olumsuz", "Zaten bu ders adına sahip bir ders var");
						} else if (xhr.responseText == "Ekleme işlemi tamamlandı.") {
							uyari_box("olumlu", "Başarıyla ders tablolara eklendi.");
							temizle();
						} else {
							uyari_box("olumsuz", "HATALI İŞLEM LÜTFEN SAYFAYI YENİLEYİNİZ, EĞER SORUN DEVAM EDERSE YETKİLİYE BİLDİRİNİZ");
						}
					}
				}
			} else {
				uyari_box("olumsuz", "Deresin, adını, ders süresini ve seçmeli durumunu eksiksiz olarak seçmeniz gerekmektedir.");
			}
		}
	})
		
	}

	//derslik ekle
	if (document.getElementById("derslikEkle")) {
		var derslikEkle = document.getElementById("derslikEkle");
		var derslikadi = document.getElementById("derslikadi");
		var kapasite = document.getElementById("kapasite");
		var tur = document.getElementById("tur");

		function temizle() {
			derslikadi.value = null;
			kapasite.value = null;
			tur.value = null;
		}
		derslikEkle.addEventListener("click", function(event) {
			if (document.getElementById("derslikEkle")){
			event.preventDefault();
			if (derslikadi.value != "" && kapasite.value != "" && tur.value != "") {
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "Sekle.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				//getElementByID ile gelen verileri data değişkeni içine yerleştiriyor. "" içindekiler POST adları, sekle.php'ye gönderiliyor
				var data = "derslikadi=" + encodeURIComponent(derslikadi.value) + "&kapasite=" + encodeURIComponent(kapasite.value) + "&tur=" + encodeURIComponent(tur.value) + "&sayfa=derslikler"; //else if kontrolündeki else in sebebi.
				xhr.send(data);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) { //4 = ajax dönütü hazır, 200 = site olumlu yanıt verdi
						if (xhr.responseText == "Zaten bu derslik adına sahip bir derslik var.") {
							uyari_box("olumsuz", "Zaten bu derslik adına sahip bir derslik var.");
						} else if (xhr.responseText == "Ekleme işlemi tamamlandı.") {
							uyari_box("olumlu", "Başarıyla derslik tablolara eklendi.");
							temizle();
						} else {
							uyari_box("olumsuz", "HATALI İŞLEM LÜTFEN SAYFAYI YENİLEYİNİZ, EĞER SORUN DEVAM EDERSE YETKİLİYE BİLDİRİNİZ");
						}
					}
				}
			} else {
				uyari_box("olumsuz", "Dereslik'in, adını, kapasitesini ve türünü eksiksiz olarak seçmeniz gerekmektedir.");
			}
		}
		})
	}
	if (document.getElementById("programEkle")) {
		var programEkle = document.getElementById("programEkle")
		var programAdi = document.getElementById("programAdi");
		var sinifSenesi = document.getElementById("sinifSenesi");
		var ogrenciSayisi = document.getElementById("ogrenciSayisi");

		function temizle() {
			programAdi.value = null;
			sinifSenesi.value = null;
			ogrenciSayisi.value = null;
		}
		programEkle.addEventListener("click", function(event) {
			if (document.getElementById("programEkle")){
			event.preventDefault();
			if (programAdi.value != "" && sinifSenesi.value != "" && ogrenciSayisi.value != ""){
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "Sekle.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				var data = "programAdi=" + encodeURIComponent(programAdi.value) + "&sinifSenesi=" + encodeURIComponent(sinifSenesi.value) + "&ogrenciSayisi=" + encodeURIComponent(ogrenciSayisi.value) + "&sayfa=programlar";
				xhr.send(data);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
						if (xhr.responseText == "Zaten bu isimde bir program bulunuyor.") {
							uyari_box("olumsuz", "Zaten bu isimde ve dönemde bir program bulunuyor.");
						} else if (xhr.responseText == "Ekleme işlemi tamamlandı.") {
							uyari_box("olumlu", "Başarıyla program tabloya eklendi.");
							temizle();
						} else {
							uyari_box("olumsuz", "HATALI İŞLEM LÜTFEN SAYFAYI YENİLEYİNİZ, EĞER SORUN DEVAM EDERSE YETKİLİYE BİLDİRİNİZ");
						}
					}
				}
				}
			} 
		})
	}



})