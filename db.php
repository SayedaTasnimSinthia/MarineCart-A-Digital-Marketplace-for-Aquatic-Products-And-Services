<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';$db   = 'marinecart_db';

mysqli_report(MYSQLI_REPORT_OFF);

$conn = new mysqli($host,$user, $pass,$db);

if ($conn->connect_error) {
    header('Content-Type: application/json; charset=utf-8');
    die(json_encode([
        'status' => 'error',
        'message' => 'Database connection failed: ' . $conn->connect_error
    ]));
}

$conn->set_charset("utf8mb4");
?>