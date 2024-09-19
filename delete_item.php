<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vtabani = new mysqli("localhost", "root", "", "ozluk");

    if ($vtabani->connect_error) {
        die("Connection failed: " . $vtabani->connect_error);
    }

    $cs_id = $vtabani->real_escape_string($_POST['cs_id']);

    // SQL query to delete the item
    $query = "DELETE FROM courseschedule WHERE CS_id='$cs_id'";

    if ($vtabani->query($query) === TRUE) {
        echo 'success';
    } else {
        echo 'Error: ' . $vtabani->error;
    }

    $vtabani->close();
}
?>
