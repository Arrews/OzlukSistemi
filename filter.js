window.addEventListener("DOMContentLoaded", function() {
if (document.getElementById('derslerArama')){
//dersler arama butonu js
document.getElementById('derslerArama').addEventListener('click', function() {
    // Comboboxtan sütun adı çek
    var searchCol = document.getElementById('aramaSutun').value;
    var aranan = document.getElementById('derslerAranan').value;

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure it: POST-request for the URL /dersler_tablo.php
    xhr.open('POST', 'dersler_tablo.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Define the callback function
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Success! Replace the content of the .table-rows element
            document.querySelector('.table-rows').innerHTML = xhr.responseText;
            document.dispatchEvent(aramaEvent);
        } else {
            // We reached our target server, but it returned an error
            console.error('Error fetching data:', xhr.status, xhr.statusText);
        }
    };

    // Define the error callback function
    xhr.onerror = function() {
        // There was a connection error of some sort
        console.error('Connection error');
    };

    // Construct the POST data
    var postData = 'searchCol=' + encodeURIComponent(searchCol) + '&aranan=' + encodeURIComponent(aranan);
    
    // Send the request with the POST data
    xhr.send(postData);
});
}
else if (document.getElementById('ogrArama')){
//ogr gorevlisi arama butonu js
document.getElementById('ogrArama').addEventListener('click', function() {
    // Comboboxtan sütun adı çek
    var searchCol = document.getElementById('aramaSutun').value;
    var aranan = document.getElementById('ogrAranan').value;

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure it: POST-request for the URL /dersler_tablo.php
    xhr.open('POST', 'ogretimgorevlisi_tablo.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Define the callback function
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Success! Replace the content of the .table-rows element
            document.querySelector('.table-rows').innerHTML = xhr.responseText;
            document.dispatchEvent(aramaEvent);
        } else {
            // We reached our target server, but it returned an error
            console.error('Error fetching data:', xhr.status, xhr.statusText);
        }
    };

    // Define the error callback function
    xhr.onerror = function() {
        // There was a connection error of some sort
        console.error('Connection error');
    };

    // Construct the POST data
    var postData = 'searchCol=' + encodeURIComponent(searchCol) + '&aranan=' + encodeURIComponent(aranan);
    
    // Send the request with the POST data
    xhr.send(postData);
});
}
else if (document.getElementById('derslikArama')){
    document.getElementById('derslikArama').addEventListener('click', function() {
        var searchCol = document.getElementById('aramaSutun').value;
        var aranan = document.getElementById('dersliklerAranan').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'derslikler_tablo.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                document.querySelector('.table-rows').innerHTML = xhr.responseText;
                document.dispatchEvent(aramaEvent);
            } else {
                console.error('Error fetching data:', xhr.status, xhr.statusText);
            }
        };
        xhr.onerror = function() {
            console.error('Connection error');
        };
        var postData = 'searchCol=' + encodeURIComponent(searchCol) + '&aranan=' + encodeURIComponent(aranan);
        xhr.send(postData);
    });
    }
    else if (document.getElementById('programlarArama')){
        document.getElementById('programlarArama').addEventListener('click', function() {
            var searchCol = document.getElementById('aramaSutun').value;
            var aranan = document.getElementById('programlarAranan').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'programlar_tablo.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    document.querySelector('.table-rows').innerHTML = xhr.responseText;
                    document.dispatchEvent(aramaEvent);
                } else {
                    console.error('Error fetching data:', xhr.status, xhr.statusText);
                }
            };
            xhr.onerror = function() {
                console.error('Connection error');
            };
            var postData = 'searchCol=' + encodeURIComponent(searchCol) + '&aranan=' + encodeURIComponent(aranan);
            xhr.send(postData);
        });
        }
})