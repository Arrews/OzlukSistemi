function ogretimgorevlisiEklemeSayfasiAc(durum){
    if (durum=="ekle"){
        if (document.getElementById("ogretimgorevlisiEklemeSayfasi")){
            if (document.getElementById("ogretimgorevlisiEklemeSayfasi").style.display=="none"){
                if (document.getElementById("mainTitle")){
                    if (document.getElementById("mainTitle").innerHTML == "Düzenleme"){
                        document.getElementById("mainTitle").innerHTML = "Öğretim Görevlisi Ekleme";
                        document.getElementById("duzenlemeYap").id="ogretimGorevlisiEkle";
                    }
                }
            }
            document.getElementById("ogretimgorevlisiEklemeSayfasi").style.display="flex";
        }
    }
    else if(durum=="ogretimGorevlisiSayfasiIptal"){
        document.getElementById("ogretimgorevlisiEklemeSayfasi").style.display="none";
        document.getElementById("ad").value = null;
        document.getElementById("email").value = null;
        document.getElementById("devam").checked = false;
        document.getElementById("eski").checked = false;
    }
}
var aramaEvent = new Event('aramaYapildi');
document.addEventListener("DOMContentLoaded", () =>{
    var activeFor = "";
    var ogretimgorevlisiEklemeSayfasi = document.getElementById("ogretimgorevlisiEklemeSayfasi");
    ogretimgorevlisiEklemeSayfasi.addEventListener('click', function(event){
        if(event.target.closest(".input-area") && !event.target.closest(".input-area-course") && !event.target.closest(".input-area-lecturer") && !event.target.closest(".input-area-classroom") && !event.target.closest(".input-area-program")){
            document.getElementById("ogretimgorevlisiEklemeSayfasi").style.display="none";
        }
    })
    function hamburgerMenuAyarlar(){
        var dropdownBtns = document.querySelectorAll('.dropdown-menu-button');
        var dropdown = document.getElementById('dropdown');
        dropdownBtns.forEach(dropdownBtn => {
            dropdownBtn.addEventListener('click', function(event){
                var s = document.getElementById(event.target.closest('.cell-2').id).getBoundingClientRect().top;
                dropdown.style.top = s-document.getElementById(event.target.closest('.cell-2').id).clientHeight-dropdown.clientHeight+42+"px";
                var d = document.getElementById(event.target.closest('.cell-2').id).getBoundingClientRect().left;
                dropdown.style.left = d-document.getElementById(event.target.closest('.cell-2').id).clientWidth-dropdown.clientWidth+18+"px";
                dropdown.style.display = "flex";
                if (activeFor == ""){
                    activeFor = event.target.closest('.cell-2').id;
                    document.querySelector('.table-rows').style.overflowY="hidden";
                    setLocation();
                }
                else
                {
                    activeFor = event.target.closest('.cell-2').id;
                    document.querySelector('.table-rows').style.overflowY="hidden";
                }
            });
        });
        deleteBtn = document.getElementById('dropdown-delete');
    deleteBtn.addEventListener('click', function(event){
        table_id = document.getElementsByClassName("table_id")[activeFor.substring(6)-1].innerHTML;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'SDelete.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var postData = 'table_id=' + encodeURIComponent(table_id) + '&silsayfa=ogretimgorevlisi';
        xhr.send(postData);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === 'Silme İşlemi Başarılı') {
                    location.reload();
                }
            }
        }
    })
    editBtn = document.getElementById('dropdown-edit');
    editBtn.addEventListener('click', function(){
        document.getElementById("ogretimgorevlisiEklemeSayfasi").style.display="flex";
        if (document.getElementById("ogretimGorevlisiEkle")){
            document.getElementById("ogretimGorevlisiEkle").id="duzenlemeYap";
            document.getElementById("mainTitle").innerHTML= "Düzenleme";
            //table_id = document.getElementsByClassName("table_id")[activeFor.substring(6)-1].innerHTML;
        }
        if (document.getElementById("duzenlemeYap")){
            var duzenlemeYap = document.getElementById("duzenlemeYap");
        }
        duzenlemeYap.addEventListener('click', function(){
            table_id = document.getElementsByClassName("table_id")[activeFor.substring(6)-1].innerHTML;
            ad = document.getElementById("ad").value;
            email = document.getElementById("email").value;
            var egitmen_durumu = document.getElementById("devam").checked ? 1 : 0;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'SEdit.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            var postData = 'table_id=' + encodeURIComponent(table_id) + '&ad=' + encodeURIComponent(ad) + '&email=' + encodeURIComponent(email) + '&durum=' + encodeURIComponent(egitmen_durumu) +'&editsayfa=ogretimgorevlisi';
            xhr.send(postData);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText === 'Düzenleme Başarılı') {
                        location.reload();
                    }
                }
            }
        })
        document.getElementById("ad").value = document.getElementsByClassName("row")[activeFor.substring(6)-1].getElementsByClassName("text-wrapper-3")[0].innerHTML;
        document.getElementById("email").value = document.getElementsByClassName("row")[activeFor.substring(6)-1].getElementsByClassName("text-wrapper-3")[1].innerHTML;
        var d = document.getElementsByClassName("row")[activeFor.substring(6)-1].getElementsByClassName("text-wrapper-3")[2].innerHTML;
        if (d == "Devam eden eğitmen"){
            document.getElementById("devam").checked = true;
            document.getElementById("eski").checked = false;
        }
        else{
            document.getElementById("devam").checked = false;
            document.getElementById("eski").checked = true; 
        }        
    })
        function setLocation() {
            if (activeFor != "")
            {
                var dropdown = document.getElementById('dropdown');
                var s = document.getElementById(activeFor).getBoundingClientRect().top;
                dropdown.style.top = s-document.getElementById(activeFor).clientHeight-dropdown.clientHeight+42+"px";
                var d = document.getElementById(activeFor).getBoundingClientRect().left;
                dropdown.style.left = d-document.getElementById(activeFor).clientWidth-dropdown.clientWidth+18+"px";
                dropdown.style.display = "flex";
                document.querySelector('.table-rows').style.overflowY="hidden";
            }
        }
        window.addEventListener('resize', setLocation);
        window.addEventListener('load', setLocation);
    }
    hamburgerMenuAyarlar();

    document.getElementById("mainPageAll").addEventListener('click', function(event){
        if (activeFor != ""){

            if (!event.target.closest(".dropdown-menu-placement")){
                if (!event.target.closest(".dropdown-menu")){
                var dropdown = document.getElementById('dropdown');
                dropdown.style.display = "none";
                document.querySelector('.table-rows').style.overflowY="auto";
                activeFor = ""
            }
        }
        }
    })
    
    document.addEventListener("aramaYapildi", () =>{
        hamburgerMenuAyarlar();
    })


})