function dersEklemeSayfasiAc(durum){
    if (durum=="ekle"){
        if (document.getElementById("dersEklemeSayfasi")){
            if (document.getElementById("dersEklemeSayfasi").style.display=="none"){
                if (document.getElementById("mainTitle")){
                    if (document.getElementById("mainTitle").innerHTML == "Düzenleme"){
                        document.getElementById("mainTitle").innerHTML = "Ders Ekleme";
                        document.getElementById("duzenlemeYap").id="dersEkle";
                    }
                }
            }
            document.getElementById("dersEklemeSayfasi").style.display="flex";
        }
    }
    else if(durum=="dersEklemeSayfasiIptal"){
        document.getElementById("dersEklemeSayfasi").style.display="none";
        document.getElementById("dersadi").value = null;
        document.getElementById("time").value = null;
        document.getElementById("zorunlu").checked = false;
        document.getElementById("secmeli").checked = false;
    }
}

var aramaEvent = new Event('aramaYapildi');
document.addEventListener("DOMContentLoaded", () =>{
    var activeFor = "";
    var dersEklemeSayfasi = document.getElementById("dersEklemeSayfasi");
    dersEklemeSayfasi.addEventListener('click', function(event){
        if(event.target.closest(".input-area") && !event.target.closest(".input-area-course") && !event.target.closest(".input-area-lecturer") && !event.target.closest(".input-area-classroom") && !event.target.closest(".input-area-program")){
            document.getElementById("dersEklemeSayfasi").style.display="none";
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
        var postData = 'table_id=' + encodeURIComponent(table_id) + '&silsayfa=dersler';
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
        document.getElementById("dersEklemeSayfasi").style.display="flex";
        if (document.getElementById("dersEkle")){
            document.getElementById("dersEkle").id="duzenlemeYap";
            document.getElementById("mainTitle").innerHTML= "Düzenleme";
            //table_id = document.getElementsByClassName("table_id")[activeFor.substring(6)-1].innerHTML;
        }
        if (document.getElementById("duzenlemeYap")){
            var duzenlemeYap = document.getElementById("duzenlemeYap");
        }
        duzenlemeYap.addEventListener('click', function(){
            table_id = document.getElementsByClassName("table_id")[activeFor.substring(6)-1].innerHTML;
            ders_adi = document.getElementById("dersadi").value;
            ders_saati = document.getElementById("time").value;
            var ders_durumu = document.getElementById("zorunlu").checked ? 1 : 0;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'SEdit.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            var postData = 'table_id=' + encodeURIComponent(table_id) + '&ders_adi=' + encodeURIComponent(ders_adi) + '&ders_saati=' + encodeURIComponent(ders_saati) + '&ders_durumu=' + encodeURIComponent(ders_durumu) +'&editsayfa=dersler';
            xhr.send(postData);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText === 'Düzenleme Başarılı') {
                        location.reload();
                    }
                }
            }
        })
        document.getElementById("dersadi").value = document.getElementsByClassName("row")[activeFor.substring(6)-1].getElementsByClassName("text-wrapper-3")[0].innerHTML;
        document.getElementById("time").value = document.getElementsByClassName("row")[activeFor.substring(6)-1].getElementsByClassName("text-wrapper-3")[1].innerHTML;
        var d = document.getElementsByClassName("row")[activeFor.substring(6)-1].getElementsByClassName("text-wrapper-3")[2].innerHTML;
        if (d == "Zorunlu"){
            document.getElementById("zorunlu").checked = true;
            document.getElementById("secmeli").checked = false;
        }
        else{
            document.getElementById("zorunlu").checked = false;
            document.getElementById("secmeli").checked = true; 
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