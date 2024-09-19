const btn = document.getElementById('toggleSidebar');
var sidebarCollapsed = false;
const pathD = document.getElementById('pathD');
const sidebar = document.getElementById('sidebar');
const iconText = document.getElementsByClassName('icon-text');
const divider = document.getElementById('divider');

btn.addEventListener('mouseenter', function(){
    if(sidebarCollapsed) {
        pathD.classList.add('path-animation');
        pathD.setAttribute('d', 'M6 30L2.43027 18.4748C1.85658 16.84 1.85658 15.3 2.43027 13.5253L6 2');
    }
})

btn.addEventListener('mouseleave', function(){
    if(sidebarCollapsed) {
        pathD.classList.remove('path-animation');
        pathD.setAttribute('d', 'M2 30C2 18.8298 2 13.9149 2 2');
    }
});

function sidebarCollapse() {
    if (!sidebarCollapsed) {
        sidebarCollapsed = true;
        pathD.setAttribute('d','M2 30C2 18.8298 2 13.9149 2 2');
        sidebar.style.width = "265px";
        for (var i = 0; i < iconText.length; i++) {
            iconText[i].style.display = "block";
        }
        divider.style.width = "205px";

    } else {
        sidebarCollapsed = false;
        pathD.setAttribute('d','M2.21277 30L5.40274 18.4748C5.9154 16.84 5.9154 15.3 5.40274 13.5253L2.21277 2');
        sidebar.style.width = "60px";
        for (var i = 0; i < iconText.length; i++) {
            iconText[i].style.display = "none";
        }
        divider.style.width = "42px";
    }
}

btn.addEventListener('click', sidebarCollapse);