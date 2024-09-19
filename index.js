window.addEventListener("DOMContentLoaded", function() {
    var cikis = document.getElementById("cikisYap");
    cikis.addEventListener('click', function(event){
        event.preventDefault();
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "Scikis.php", true);
        xhr.send();
        document.location.href = "/erlik/giris.php";
    });
})
function setBodyHeight() {
    document.body.style.height = window.innerHeight + 'px';
    document.body.style.width = window.innerWidth + 'px';
}

window.addEventListener('resize', setBodyHeight);
window.addEventListener('load', setBodyHeight);

setBodyHeight();