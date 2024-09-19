<?php
// Database connection
$connection = new mysqli("localhost", "root", "", "ozluk");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Query to get period data
$query = "SELECT period_no, period_start, period_end FROM period";
$result = $connection->query($query);

// Initialize HTML output
$output = '';

// Loop through the results and build HTML
while ($row = $result->fetch_assoc()) {
    $periodNo = $row['period_no'];
    $periodStart = new DateTime($row['period_start']);
    $periodEnd = new DateTime($row['period_end']);

    $output .= '<div class="time" id="period' . $periodNo . '">
                    <div class="timeTitle">' . $periodStart->format('H:i') . '</div>
                    <div class="timeTitle">' . $periodEnd->format('H:i') . '</div>
                </div>';
}

// Close the connection
$connection->close();

// Output the HTML
echo $output;

?>