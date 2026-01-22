<?php
$servername = "localhost";
$username = "root";
$password = "root"; // তোমার root পাসওয়ার্ড লিখো (যদি খালি হয়, তাহলে "")
$dbname = "kmc_soft_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>