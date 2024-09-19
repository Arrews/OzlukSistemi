var customClick = new Event('customClickEvent');
function sifreGoster(){
    if (document.getElementById("sifre").type === "password"){
        document.getElementById("sifre").type = "text";
        document.getElementById("eyeChange").src = "img/eye_closed.svg";
    }else{
        document.getElementById("sifre").type = "password";
        document.getElementById("eyeChange").src = "img/eye_open.svg";
    }
}
function bildirimKapat(){
    document.getElementById("alertBar").style.display = "none";
}