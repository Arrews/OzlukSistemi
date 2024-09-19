<?php
$vtabani = new mysqli("localhost", "root", "", "ozluk");

if ($vtabani->connect_error) {
    die("Connection failed: " . $vtabani->connect_error);
}

$listType = isset($_GET['listType']) ? $vtabani->real_escape_string($_GET['listType']) : '';

$options = '';

if ($listType == 'program') {
    $query = "SELECT program_id, program_name FROM program ORDER BY program_name";
} elseif ($listType == 'course') {
    $query = "SELECT course_id, course_name FROM course ORDER BY course_name";
} elseif ($listType == 'lecturer') {
    $query = "SELECT lecturer_id, lecturer_name FROM lecturer ORDER BY lecturer_name";
} elseif ($listType == 'classroom') {
    $query = "SELECT classroom_id, classroom_name FROM classroom ORDER BY classroom_name";
} else {
    $query = '';
}

if ($query != '') {
    $result = $vtabani->query($query);
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row[array_keys($row)[0]] . '">' . $row[array_keys($row)[1]] . '</option>';
    }
}

echo $options;

$vtabani->close();
?>
