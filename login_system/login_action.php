<?php
session_start();
include '../db_Setup/db.php';

$system = $_POST['system'];
$email = trim($_POST['email']);
$password = md5(trim($_POST['password']));

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['logged_in'] = true;
    $_SESSION['system'] = $system;
    $_SESSION['role'] = $row['role'];
    header("Location: ../lab_dashboard.php");
    exit();
} else {
    header("Location: index.php?error=1");
    exit();
}
?>