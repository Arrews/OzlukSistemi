<?php
// Database connection
$vtabani = new mysqli("localhost", "root", "", "ozluk");

// Check for connection error
if ($vtabani->connect_error) {
    die("Connection failed: " . $vtabani->connect_error);
}

// Check if the 'sayfa' POST parameter is set and equals 'dersprogrami'
if ($vtabani->real_escape_string($_POST['sayfa']) == "dersprogrami") {
    // Initialize arrays to hold the period data
    $periodIds = isset($_POST['periodId']) ? $_POST['periodId'] : [];
    $startTimes = isset($_POST['startTime']) ? $_POST['startTime'] : [];
    $endTimes = isset($_POST['endTime']) ? $_POST['endTime'] : [];

    // Check if all arrays have the same length
    if (count($periodIds) === count($startTimes) && count($startTimes) === count($endTimes)) {
        // Prepare the SQL statement
        $stmt = $vtabani->prepare("UPDATE period SET period_start = ?, period_end = ? WHERE period_no = ?");

        if ($stmt) {
            // Loop through each period and execute the prepared statement
            for ($i = 0; $i < count($periodIds); $i++) {
                $periodId = $periodIds[$i];
                $startTime = $startTimes[$i];
                $endTime = $endTimes[$i];

                // Bind parameters and execute statement
                $stmt->bind_param('ssi', $startTime, $endTime, $periodId);
                $stmt->execute();
            }

            // Close the statement
            $stmt->close();

            echo "Period times updated successfully.";
        } else {
            echo "Error preparing statement: " . $vtabani->error;
        }
    } else {
        // Error: Mismatched array lengths
        echo "Error: Mismatched array lengths.";
    }
} else {
    // Error: Invalid 'sayfa' value
    echo "Error: Invalid request.";
}

// Close the database connection
$vtabani->close();
?>
