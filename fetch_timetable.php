<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ozluk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch dayStart and dayEnd
$sql = "SELECT dayStart, dayEnd FROM timetable WHERE timetable_id = 1"; 
//timetable id şimdilik sabit ilerde onu da belli bir koşua göre yapıcaz
//o arşivleme raporlama kısmında
//admin şu anki çizelgeyi arşivleyip yeni çizelge başlattığında aktif timetable_id değişicek fln  yani
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dayStart = $row['dayStart'];
    $dayEnd = $row['dayEnd'];

    // Output the data as JSON
    echo json_encode(array("dayStart" => $dayStart, "dayEnd" => $dayEnd));
} else {
    // Set default values if no rows found
    echo json_encode(array("dayStart" => "08:30", "dayEnd" => "16:30"));
}

$conn->close();
?>
