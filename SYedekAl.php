<?php
$backupFile = 'yedek-' . date('Y-m-d-H-i-s') . '.sql';
$mysqli = new mysqli("localhost", "root", "", "ozluk");
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$mysqli->set_charset('utf8');
$tables = array();
$result = $mysqli->query('SHOW TABLES');
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

$backupContent = '';

foreach ($tables as $table) {
    $result = $mysqli->query('SHOW CREATE TABLE ' . $table);
    $row = $result->fetch_row();
    $backupContent .= $row[1] . ";\n\n";

    $result = $mysqli->query('SELECT * FROM ' . $table);
    while ($row = $result->fetch_assoc()) {
        $backupContent .= 'INSERT INTO ' . $table . ' VALUES (';
        $backupContent .= implode(', ', array_map(function($value) use ($mysqli) {
            return "'" . $mysqli->real_escape_string($value) . "'";
        }, array_values($row)));
        $backupContent .= ");\n";
    }
    $backupContent .= "\n\n";
}

file_put_contents('yedekler/'.$backupFile, $backupContent);
$mysqli->close();
echo 'Yedek Alındı';
?>