<?php
// fetch_courses.php
$vtabani = new mysqli("localhost", "root", "", "ozluk");

if ($vtabani->connect_error) {
    die("Connection failed: " . $vtabani->connect_error);
}

$program_id = isset($_GET['program_id']) ? intval($_GET['program_id']) : 0;

if ($program_id > 0) {
    $query = "SELECT course_id, course_name, course_mandatory FROM course WHERE program_id = ?";
    $stmt = $vtabani->prepare($query);
    $stmt->bind_param('i', $program_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = '';
    while ($row = $result->fetch_assoc()) {
        $courseId = $row['course_id'];
        $courseName = $row['course_name'];
        $courseMandatory = $row['course_mandatory'] == 1 ? 'Z' : 'S';
        $options .= '<option value="' . $courseId . '">(' . $courseMandatory . ') ' . $courseName . '</option>';
    }

    echo $options;
}
$vtabani->close();
?>
