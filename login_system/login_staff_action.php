<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $system = $_POST['system'] ?? '';
    $role   = $_POST['role'] ?? '';
    $email  = trim($_POST['email'] ?? '');
    $pass   = md5(trim($_POST['password'] ?? ''));

    // ডাটাবেস থেকে চেক
    $sql = "SELECT * FROM users 
            WHERE email = '$email' 
            AND password = '$pass' 
            AND role = '$role'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['staff_logged_in'] = true;
        $_SESSION['role'] = $role;
        $_SESSION['email'] = $email;

        // রোল অনুসারে ড্যাশবোর্ডে যাও (পরে ফাইল তৈরি করবো)
        header("Location: ../" . strtolower($role) . "_dashboard.php");
        exit();
    } else {
        header("Location: lab_staff_login.php?error=1");
        exit();
    }
}
?>