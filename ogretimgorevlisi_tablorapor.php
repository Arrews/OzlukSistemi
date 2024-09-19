<?php
include_once 'permission.php';
// Establish database connection
$vtabani = new mysqli("localhost", "root", "", "ozluk");
if ($vtabani->connect_error) {
    die("Connection failed: " . $vtabani->connect_error);
}

if (isset($_POST['searchCol'], $_POST['aranan'])) {
    $searchCol = $_POST['searchCol'];
    $aranan = $_POST['aranan'];

    // Check if searchCol is not equal to 'ARAMA' and aranan is not empty
    if ($searchCol != 'ARAMA' && $aranan != '') {
        $query = "SELECT lecturer_id, lecturer_name, lecturer_status, lecturer_mail FROM lecturer WHERE $searchCol LIKE '%$aranan%'";
    } else {
        // Backup query when searchCol is not selected or aranan is empty
        $query = "SELECT lecturer_id, lecturer_name, lecturer_status, lecturer_mail FROM lecturer";
    }       
} else {
    // Default query when searchCol and aranan are not set
    $query = "SELECT lecturer_id, lecturer_name, lecturer_status, lecturer_mail FROM lecturer";
}
// Execute the query
$sorgu = $vtabani->query($query);

// Check if the query executed successfully
if ($sorgu) {
  $sayac=0;
    foreach ($sorgu as $veri) {
        $sayac=$sayac+1;
        // Output the result as needed
        $lecturer_name = $veri['lecturer_name'];
        $lecturer_mail = $veri['lecturer_mail'];
        $lecturer_id = $veri['lecturer_id'];
        $lecturer_status = $veri['lecturer_status'] == 1 ? "Devam eden eğitmen" : "Eski eğitmen";
        echo '<div class="row">
                <div class="cell"><div class="content"></div></div>
                <div class="content-wrapper">
                  <div class="content-2"><div class="text-wrapper-3">' . $lecturer_name . '</div></div>
                </div>
                <div class="content-wrapper">
                  <div class="content-2"><div class="text-wrapper-3">' . $lecturer_mail . '</div></div>
                </div>
                <div class="content-wrapper">
                  <div class="content-2"><div class="text-wrapper-3">' . $lecturer_status . '</div></div>
                </div>
                <div class="table_id" style="display:none">'.$lecturer_id.'</div>
                <div class="cell-2" id="kayit-'.$sayac;echo'">
                ';
                  echo'
                </div>
              </div>';
    }
} else {
    // Handle the case where the query fails
    echo "Error: " . $vtabani->error;
}

// Close the database connection
$vtabani->close();
?>
