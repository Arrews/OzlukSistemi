var kullanicilar = document.getElementById("kullanicilar");
var raporlar = document.getElementById("raporlar");
var raporlarText = document.getElementById("raporlarText");
var kullanicilarText = document.getElementById("kullanicilarText");



kullanicilar.addEventListener("mouseover", function() {
    kullanicilar.style.backgroundColor   = "var(--erlik-sistemimavi-tonlarvista-blue)";
    kullanicilarText.style.color = "var(--erlik-sistemibeyaz-tonlarseasalt)";
    kullanicilar.style.cursor = "pointer";
});

kullanicilar.addEventListener("mouseout", function() {
    kullanicilar.style.backgroundColor = "";
    kullanicilarText.style.color = "";
    dersProgramGorunum(gecerliDurum); 
});

raporlar.addEventListener("mouseover", function() {
    raporlar.style.backgroundColor = "var(--erlik-sistemimavi-tonlarvista-blue)";
    raporlarText.style.color = "var(--erlik-sistemibeyaz-tonlarseasalt)";
    raporlar.style.cursor = "pointer";
});

raporlar.addEventListener("mouseout", function() {
    raporlar.style.backgroundColor = "";
    raporlarText.style.color = "";
    dersProgramGorunum(gecerliDurum);
});

//üsteki over-out olayları değişti ve altaki ders programı görünümdeki css değerleri değişti

var gecerliDurum = "list"; 

function dersProgramGorunum(durum){
    gecerliDurum = durum; 
    if (durum == "list"){
        document.getElementById("raporlarText").style.color="var(--erlik-sistemimavi-tonlarroyal-blue)";
        document.getElementById("kullanicilar").style.backgroundColor="var(--erlik-sistemibeyaz-tonlarseasalt)";
        document.getElementById("kullanicilarText").style.color="var(--erlik-sistemimavi-tonlarfederal-blue)";
        const inputsCreate = document.getElementById("inputs-create");
        if (inputsCreate) {
            inputsCreate.style.display = "none";
        }
        document.getElementById("inputs-list").style.display="flex";
    } else if (durum == "create"){
        document.getElementById("raporlar").style.backgroundColor="var(--erlik-sistemibeyaz-tonlarseasalt)";
        document.getElementById("raporlarText").style.color="var(--erlik-sistemimavi-tonlarfederal-blue)";
        document.getElementById("kullanicilarText").style.color="var(--erlik-sistemimavi-tonlarroyal-blue)";
        document.getElementById("inputs-list").style.display="none";
        document.getElementById("inputs-create").style.display="flex";
        document.getElementById("cizelgeEdit").style.display="none";
        document.getElementById("cizelgeEkle").style.display="flex";
        $programListele=true;
    } else if (durum == "edit"){
        document.getElementById("raporlar").style.backgroundColor="var(--erlik-sistemibeyaz-tonlarseasalt)";
        document.getElementById("raporlarText").style.color="var(--erlik-sistemimavi-tonlarfederal-blue)";
        document.getElementById("kullanicilarText").style.color="var(--erlik-sistemimavi-tonlarroyal-blue)";
        document.getElementById("inputs-list").style.display="none";
        document.getElementById("inputs-create").style.display="flex";
        document.getElementById("cizelgeEdit").style.display="flex";
        document.getElementById("cizelgeEkle").style.display="none";
        $programListele=false;
    }
}


//------------------------------------Uyarı Mesajı------------------------------------
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

//------------------------------------Periyot Pop-up Menüsü ------------------------------------

function periodMenu(s){
    if (s == true) {
		document.getElementById("periodmenu").style.display = "flex";
	} else {
		document.getElementById("periodmenu").style.display = "none";
	}
}

//--------------------------------Period Kaydet---------------------------------------
function periodEdit() {
    // Array to store period data
    var periods = [];

    // Loop through each period menu input
    var periodInputs = document.querySelectorAll('.periodmenu-input-with-label');
    periodInputs.forEach(function(periodInput) {
        var periodId = periodInput.id.replace('periodE', ''); // Extract period number

        // Select start and end inputs by ID
        var startInput = document.getElementById(periodId + 'Start');
        var endInput = document.getElementById(periodId + 'End');

        if (startInput && endInput) { // Ensure inputs exist
            // Get values
            var startTime = startInput.value;
            var endTime = endInput.value;

            // Create object with period data
            var periodData = {
                periodId: periodId,
                startTime: startTime,
                endTime: endTime
            };

            // Push period data object to periods array
            periods.push(periodData);
        }
    });

    // Prepare data to send via AJAX (form URL encoding)
    var data = 'sayfa=dersprogrami';
    data += '&' + periods.map(function(period) {
        return 'periodId[]=' + encodeURIComponent(period.periodId) +
               '&startTime[]=' + encodeURIComponent(period.startTime) +
               '&endTime[]=' + encodeURIComponent(period.endTime);
    }).join('&');

    // AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'period_edit.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Handle response
    xhr.onload = function() {
        if (xhr.readyState == 4 && xhr.status == 200) { 
            // Request was successful
            let responseText = xhr.responseText.trim();
            console.log(responseText);

            if (responseText === "Period times updated successfully.") {
                uyari_box("olumlu", "Periyot saatleri kaydedildi.");
                refreshTimeArea();
            } else {
                uyari_box("olumsuz", "Periyot saatleri kaydedilirken bir hata oluştu.")
            }
        } else {
            uyari_box("olumsuz","XHR request alamadı, yetkiliye bildirin.")
        }
    };

    // Send request with data
    xhr.send(data);

    periodMenu(false);
}


//----------------------Tablonun solundaki saatleri güncelle
function clearTimeArea() {
    var timeArea = document.querySelector('.timeArea');
    
    // Keep the 'space' div and remove other children
    var spaceDiv = timeArea.querySelector('.space');
    if (spaceDiv) {
        // Move the space div out of timeArea
        timeArea.removeChild(spaceDiv);
        
        // Clear the rest of timeArea
        timeArea.innerHTML = '';
        
        // Reinsert the space div back into timeArea
        timeArea.appendChild(spaceDiv);
    }
}


function refreshTimeArea() {
    // Clear the existing content except for the 'space' div
    clearTimeArea();

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure it: GET-request for the URL /get_periods.php
    xhr.open('GET', 'get_periods.php', true);

    // Set up the callback function to handle the response
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Success: Insert the response HTML into timeArea
            var timeArea = document.querySelector('.timeArea');
            timeArea.innerHTML += xhr.responseText; // Append the new HTML content
        } else {
            console.error('Error fetching period data: ' + xhr.status);
        }
    };

    // Send the request
    xhr.send();
}




//-----------------------------Program seçilene kadar diğer optionları disable yap---------------------

if(document.getElementById('cProgram')){
function updateElementsState() {
    const cProgram = document.getElementById('cProgram');
    const cDerslik = document.getElementById('cDerslik');
    const cDers = document.getElementById('cDers');
    const cOgr = document.getElementById('cOgr');
    const cDay = document.getElementById('cDay');
    const periodStart = document.getElementById('periodStart');
    const periodEnd = document.getElementById('periodEnd');

    const isProgramSelected = cProgram.value !== 'EKLEME';


    // Update elements based on the program selection
    cDerslik.disabled = !isProgramSelected;
    cDers.disabled = !isProgramSelected;
    cOgr.disabled = !isProgramSelected;
    cDay.disabled = !isProgramSelected;
    periodStart.disabled = !isProgramSelected;
    periodEnd.disabled = !isProgramSelected;
}

document.addEventListener('DOMContentLoaded', () => {
    updateElementsState();
    // Add event listener for changes in cProgram
    cProgram.addEventListener('change', () => {
        updateElementsState();
    });
});
}

//------------------------------Bitiş Saati, Başlangıçtan büyük olsun--------------------------------
const periodStart = document.getElementById('periodStart');
const periodEnd = document.getElementById('periodEnd');
const error = document.getElementById('error');

if (periodEnd) {
    periodEnd.addEventListener('change', () => {
        const startValue = parseInt(periodStart.value);
        const endValue = parseInt(periodEnd.value);

        if (startValue && endValue && endValue < startValue) {
            uyari_box("olumsuz", "Bitiş saati, başlangıç saatinden büyük olmalıdır.");
            periodEnd.value = 'EKLEME';
        }
    });
}
if (periodStart){
periodStart.addEventListener('change', () => {
    const startValue = parseInt(periodStart.value);
    const endValue = parseInt(periodEnd.value);

    if (startValue && endValue && endValue < startValue) {
        uyari_box("olumsuz","Bitiş saati, başlangıç saatinden büyük olmalıdır.");
        periodStart.value = 'EKLEME';
    }
});
}


//------------------------------Cizelge Listele Kodları--------------------------------

//listType seçilmemiste listName disabled yap
window.addEventListener("DOMContentLoaded", function() {
    var listTypeSelect = document.getElementById("listType");
    var listNameSelect = document.getElementById("listName");
    
    // Check if the listTypeSelect and listNameSelect elements exist
    if (listTypeSelect && listNameSelect) {
        // Disable the listNameSelect element if listType is "ARAMA"
        if (listTypeSelect.value === "ARAMA") {
            listNameSelect.disabled = true;
            listNameSelect.style.opacity = "0.5";
            listNameSelect.style.pointerEvents = "none";
        }
        
        // Add an event listener to monitor changes in the listTypeSelect element
        listTypeSelect.addEventListener("change", function() {
            // If the value changes to "ARAMA", disable the listNameSelect element
            if (listTypeSelect.value === "ARAMA") {
                listNameSelect.disabled = true;
                listNameSelect.style.opacity = "0.5";
                listNameSelect.style.pointerEvents = "none";
            } else {
                // If the value changes to anything else, enable the listNameSelect element
                listNameSelect.disabled = false;
                listNameSelect.style.opacity = "1";
                listNameSelect.style.pointerEvents = "auto";
            }
        });
    }
});

//type ve name comboboxları şeysi
document.getElementById('listType').addEventListener('change', function() {
    var listType = this.value;

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define a callback function
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the listName dropdown with the response from the server
            document.getElementById('listName').innerHTML = xhr.responseText;
        }
    };

    // Open a GET request
    xhr.open('GET', 'fetch_options.php?listType=' + encodeURIComponent(listType), true);

    // Send the request
    xhr.send();
    
});


//Cizelge Listele kodu
function fetchSchedule(listType, listName) {
    if (listType && listName) {
        var days = ['Pazartesi', 'Sali', 'Carsamba', 'Persembe', 'Cuma'];
        days.forEach(function(day) {
            for (let i = 1; i <= 9; i++) {
                (function(day, i) {
                    var period = day + i;
                    
                    // Create an AJAX request
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'fetch_schedule.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                    // Handle the response
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Update the dayContent div with the response data
                            var dayCell = document.getElementById(period);
                            if (dayCell) {
                                dayCell.innerHTML = xhr.responseText;
                            }
                        }
                    };

                    // Send the request with the selected values
                    var data = 'listType=' + encodeURIComponent(listType) + 
                    '&listName=' + encodeURIComponent(listName) + 
                    '&day=' + encodeURIComponent(day) + 
                    '&period=' + encodeURIComponent(i);
                    xhr.send(data);
                })(day, i); // Immediately Invoked Function Expression (IIFE)
            }
        });
    } else {
        alert('Lütfen görüntüleme türü ve tablo adı seçiniz.');
    }
}

if(document.getElementById('cProgram')){
document.getElementById('cProgram').addEventListener('change', function() {
    var programValue = this.value;
    var listType = 'program'; // Assuming listType is always 'program' for this case
    if($programListele != false){
    if (programValue !== 'EKLEME') {
        fetchSchedule(listType, programValue);
    } else {
        // Clear schedule if 'EKLEME' is selected
        var days = ['Pazartesi', 'Sali', 'Carsamba', 'Persembe', 'Cuma'];
        days.forEach(function(day) {
            for (let i = 1; i <= 9; i++) {
                var period = day + i;
                var dayCell = document.getElementById(period);
                if (dayCell) {
                    dayCell.innerHTML = ''; // Clear the content
                }
            }
        });
    }
}
});
}

// Event listener for the 'Listele' button
document.getElementById('cizelgeListele').addEventListener('click', function() {
    var listType = document.getElementById('listType').value;
    var listName = document.getElementById('listName').value;
    fetchSchedule(listType, listName);
});


//-------------------------Ekle ve Edit kodları-------------------------------
//ortak kısım
window.addEventListener("DOMContentLoaded", function() {
	if (document.getElementById("cizelgeEkle")) {
		var cizelgeEkle = document.getElementById("cizelgeEkle");
		var programAdi = document.getElementById("cProgram");
		var derslikAdi = document.getElementById("cDerslik");
		var dersAdi = document.getElementById("cDers");
		var ogrAdi = document.getElementById("cOgr");
        var gunAdi = document.getElementById("cDay");
        var baslangicSaati = document.getElementById("periodStart");
        var bitisSaati = document.getElementById("periodEnd");

        //-------------------------Combobox Temizle-------------------------------
function temizle() {
    programAdi.value = "EKLEME";
    derslikAdi.value = "EKLEME";
    dersAdi.value = "EKLEME";
    ogrAdi.value = "EKLEME";
    gunAdi.value = "EKLEME";
    baslangicSaati.value = "EKLEME";
    bitisSaati.value = "EKLEME";
}
        
//Ekleme kodldarı
		cizelgeEkle.addEventListener("click", function(event) {
            
			event.preventDefault();
            if (!(programAdi.value === "" || programAdi.value === "EKLEME" ||
            derslikAdi.value === "" || derslikAdi.value === "EKLEME" ||
               dersAdi.value === "" || dersAdi.value === "EKLEME" ||
            ogrAdi.value === "" || ogrAdi.value === "EKLEME" ||
            gunAdi.value === "" || gunAdi.value === "EKLEME" ||
            baslangicSaati.value === ""|| bitisSaati.value === ""
            || baslangicSaati.value === "EKLEME" || bitisSaati.value === "EKLEME")) {

                
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "cizelgeEkle.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


				// Use encodeURIComponent to handle special characters
				var data = "programAdi=" + encodeURIComponent(programAdi.value) + 
                "&derslikAdi=" + encodeURIComponent(derslikAdi.value) +
                "&ogrAdi=" + encodeURIComponent(ogrAdi.value) + 
                "&dersAdi=" + encodeURIComponent(dersAdi.value) +
                "&gunAdi=" + encodeURIComponent(gunAdi.value) + 
                "&baslangicSaati=" + encodeURIComponent(baslangicSaati.value) + 
                "&bitisSaati=" + encodeURIComponent(bitisSaati.value) + 
                "&dersZorunlu=" + encodeURIComponent(dersAdi.class) +
                "&sayfa=dersprogrami";
				
                xhr.send(data);
				
                xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) { 
                        console.log(xhr.responseText);
                        let responseText = xhr.responseText.trim();
                        //zaten bu ders var
						if (responseText === "Bu ders zaten mevcut.") {
							uyari_box("olumsuz", "Zaten böyle bir ders var.") 
						}//sınıf saatleriyle çakışıyor
                        else if (responseText === "Derslik hata") {
							uyari_box("olumsuz", "Bu ders, bu sınıf ile çakışıyor.");
						}//program zorunlu ders saatiyle çakışıyor
                        else if (responseText === "Program hata") {
							uyari_box("olumsuz", "Bu ders, bu programa eklenemez. Program için zorunlu derslerle çakışıyor.");
						}//öğretim görevlisi saatleriyle çakışıyor
                        else if (responseText === "Ogr hata") {
							uyari_box("olumsuz", "Bu ders, bu öğretim görevlisi ile çakışıyor.");
						}//başarıyla eklendi  
                        else if (responseText === "Ekleme işlemi tamamlandı.") {
							uyari_box("olumlu", "Başarıyla ders programı tabloya eklendi.") //eklendi afferim
							temizle();
						}//bi sorun var...
                        else {
							uyari_box("olumsuz", "HATALI İŞLEM LÜTFEN SAYFAYI YENİLEYİNİZ, EĞER SORUN DEVAM EDERSE YETKİLİYE BİLDİRİNİZ");
						}
					}
				}
            } else {
				uyari_box("olumsuz", "Tüm bilgileri eksiksiz girmeniz gerekmektedir."); //eksik bilgi girdin 
			}
         
		})
        cizelgeEdit.addEventListener("click", function(event) {            
			event.preventDefault();
            if (!(programAdi.value === "" || programAdi.value === "EKLEME" ||
            derslikAdi.value === "" || derslikAdi.value === "EKLEME" ||
               dersAdi.value === "" || dersAdi.value === "EKLEME" ||
            ogrAdi.value === "" || ogrAdi.value === "EKLEME" ||
            gunAdi.value === "" || gunAdi.value === "EKLEME" ||
            baslangicSaati.value === ""|| bitisSaati.value === ""
            || baslangicSaati.value === "EKLEME" || bitisSaati.value === "EKLEME")) {

                
                    
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "edit_item.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                var cs_cards = document.getElementsByClassName('card');
                var cs_id = cs_cards[0].id;
                


				// Use encodeURIComponent to handle special characters
				var data = "programAdi=" + encodeURIComponent(programAdi.value) + 
                "&derslikAdi=" + encodeURIComponent(derslikAdi.value) +
                "&ogrAdi=" + encodeURIComponent(ogrAdi.value) + 
                "&dersAdi=" + encodeURIComponent(dersAdi.value) +
                "&gunAdi=" + encodeURIComponent(gunAdi.value) + 
                "&baslangicSaati=" + encodeURIComponent(baslangicSaati.value) + 
                "&bitisSaati=" + encodeURIComponent(bitisSaati.value) + 
                "&dersZorunlu=" + encodeURIComponent(dersAdi.class) +
                "&cs_id=" + encodeURIComponent(cs_id) +
                "&sayfa=dersprogrami";
				
                xhr.send(data);
				
                xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) { 
                        console.log(xhr.responseText);
                        let responseText = xhr.responseText.trim();
                        //zaten bu ders var
						if (responseText === "Bu ders zaten mevcut.") {
							uyari_box("olumsuz", "Zaten böyle bir ders var.") 
						}//sınıf saatleriyle çakışıyor
                        else if (responseText === "Derslik hata") {
							uyari_box("olumsuz", "Bu ders, bu sınıf ile çakışıyor.");
						}//program zorunlu ders saatiyle çakışıyor
                        else if (responseText === "Program hata") {
							uyari_box("olumsuz", "Bu ders, bu programa eklenemez. Program için zorunlu derslerle çakışıyor.");
						}//öğretim görevlisi saatleriyle çakışıyor
                        else if (responseText === "Ogr hata") {
							uyari_box("olumsuz", "Bu ders, bu öğretim görevlisi ile çakışıyor.");
						}//başarıyla editlendi
                        else if (responseText === "Editleme işlemi tamamlandı.") {
							uyari_box("olumlu", "Başarıyla ders programı güncellendi.") //eklendi afferim
							temizle();
						}//bi sorun var...
                        else {
							uyari_box("olumsuz", "HATALI İŞLEM LÜTFEN SAYFAYI YENİLEYİNİZ, EĞER SORUN DEVAM EDERSE YETKİLİYE BİLDİRİNİZ");
						}
					}
				}
            } else {
				uyari_box("olumsuz", "Tüm bilgileri eksiksiz girmeniz gerekmektedir."); //eksik bilgi girdin 
			}
         
		})
	}
});
//-------------------------Sil kodları-------------------------------

function deleteItem(cs_id) {
    if (confirm("Ders kaydını silmek istediğinize emin misiniz?")) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_item.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response
                if (xhr.responseText === 'success') {
                    // Remove all cards with the same data-cs-id from the DOM
                    var cards = document.querySelectorAll('[data-cs-id="' + cs_id + '"]');
                    cards.forEach(function(card) {
                        card.parentNode.removeChild(card);
                    });
                    alert("Ders kaydı başarıyla silindi.");
                } else {
                    alert("Ders kaydı silerken hata oluştu: " + xhr.responseText);
                }
            }
        };

        xhr.send('cs_id=' + encodeURIComponent(cs_id));
    }
}




function fetchCourses(programId, selectedCourseId) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_courses.php?program_id=' + programId, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Populate courses select
            const cDers = document.getElementById('cDers');
            cDers.innerHTML = '<option value="EKLEME">Ders Seçiniz</option>' + xhr.responseText;
            
            // Set the selected course if provided
            if (selectedCourseId) {
                cDers.value = selectedCourseId;
            }
        } else {
            console.error('Request failed with status:', xhr.status);
        }
    };
    
    xhr.onerror = function() {
        console.error('Request error');
    };
    
    xhr.send();
}


//-------------------------Düzenle kodları-------------------------------

function editItem(button, cs_id, program_id, derslik_id, ders_id, ogr_id, gun, baslangic, bitis) {
    if (confirm("Ders kaydını düzenlemek istediğinize emin misiniz?")) {
        dersProgramGorunum('edit');
        clearEdit(button);

        var programAdi = document.getElementById("cProgram");
		var derslikAdi = document.getElementById("cDerslik");
		var dersAdi = document.getElementById("cDers");
		var ogrAdi = document.getElementById("cOgr");
        var gunAdi = document.getElementById("cDay");
        var baslangicSaati = document.getElementById("periodStart");
        var bitisSaati = document.getElementById("periodEnd");

        programAdi.value = program_id;
        derslikAdi.value = derslik_id;
        dersAdi.value = ders_id;
        ogrAdi.value = ogr_id;
        gunAdi.value = gun;
        baslangicSaati.value = baslangic;
        bitisSaati.value = bitis;

        // Fetch courses for the selected program
        fetchCourses(program_id, ders_id);

        

        setTimeout(() => {
            updateElementsState();
        }, 0); // Use setTimeout to ensure the state update occurs after the value assignment
        //-------------------------Editlenmiş Kartı göster-------------------------------

        document.getElementById('cizelgeEdit').addEventListener('click', fetchEditCard);
        
        function fetchEditCard() {
            clearDayContents();
            
                var days = ['Pazartesi', 'Sali', 'Carsamba', 'Persembe', 'Cuma'];
                days.forEach(function(day) {
                    for (let i = 1; i <= 9; i++) {
                        (function(day, i) {
                            var period = day + i;
                            
                            // Create an AJAX request
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'fetch_edit.php', true);
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                            // Handle the response
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    // Update the dayContent div with the response data
                                    var dayCell = document.getElementById(period);
                                    if (dayCell) {
                                        dayCell.innerHTML = xhr.responseText;
                                    }
                                }
                            };

                            // Send the request with the selected values
                            var data = 'cs_id=' + encodeURIComponent(cs_id) +
                            '&day=' + encodeURIComponent(day) + 
                            '&period=' + encodeURIComponent(i);
                            xhr.send(data);
                        })(day, i); // Immediately Invoked Function Expression (IIFE)
                    }
                });
        }
        //-------------------------Editlenmiş Kartı göster-------------------------------
    }
}

//---------------------------Seçilen programa göre dersleri getir-----------------------
document.addEventListener('DOMContentLoaded', (event) => {
    const cProgram = document.getElementById('cProgram');
    const cDers = document.getElementById('cDers');

    if(cProgram){
    cProgram.addEventListener('change', () => {
        const programId = cProgram.value;
        if (programId !== 'EKLEME') {
            fetchCourses(programId);
        } else {
            // Clear and disable the courses select input if no program is selected
            cDers.innerHTML = '<option value="EKLEME">Ders Seçiniz</option>';
        }
    });
}
});







//!!!!!!!! şimdilik commente alıp iptal ettim, sekmelerarası geçiş yaparken değil, temizle butonu fln ata onla temizle, ya da temizleme
//-------------------------Tabloyu temizle sekmeler arası geçerken-------------------------------

// Add event listeners to the buttons
document.querySelector('.raporlar').addEventListener('click', function() {
    // Call a function to clear the content inside dayContent divs
    //clearDayContents();
});

document.querySelector('.kullanclar').addEventListener('click', function() {
    // Call a function to clear the content inside dayContent divs
    //clearDayContents();
});

// Function to clear the content inside dayContent divs
function clearDayContents() {
    // Get all dayContent divs
    var dayContents = document.querySelectorAll('.dayCell');

    // Iterate over each dayContent div and clear its content
    dayContents.forEach(function(dayContent) {
        // Remove all child elements (course cards) from the dayContent div
        while (dayContent.firstChild) {
            dayContent.removeChild(dayContent.firstChild);
        }
    });
}


//edit için temizleme kodları
function clearEdit(button) {
    // Get the card element that was clicked
    var card = button.closest('.card');
    // Get the data-cs-id of the clicked card
    var csId = card.getAttribute('data-cs-id');

    // Get all dayContent divs
    var dayContents = document.querySelectorAll('.dayCell');

    // Iterate over each dayContent div
    dayContents.forEach(function(dayContent) {
        // Iterate over each child (course card) of the dayContent div
        Array.from(dayContent.children).forEach(function(child) {
            // Remove the child if its data-cs-id is not equal to the clicked card's data-cs-id
            if (child.getAttribute('data-cs-id') !== csId) {
                dayContent.removeChild(child);
            }
        });
    });
}


