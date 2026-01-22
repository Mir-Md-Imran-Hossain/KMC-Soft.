<?php
$servername = "localhost";
$username   = "root";
$password   = "root";           // তোমার পাসওয়ার্ড (যদি খালি হয় তাহলে "")
$dbname     = "kmc_soft_database"; // তোমার ডাটাবেস নাম

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>