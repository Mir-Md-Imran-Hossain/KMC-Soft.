<?php
session_start();
include '../db_Setup/db.php';  // তোমার db.php পাথ

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $system   = $_POST['system'] ?? '';
    $password = trim($_POST['password'] ?? '');

    // সিম্পল চেক (ডাটাবেস বাদ দিয়ে)
    $correct_lab    = 'kmc@lab';
    $correct_pharma = 'kmc@pharma';

    $is_valid = false;
    $redirect = '';

    if ($system === 'lab' && $password === $correct_lab) {
        $is_valid = true;
        $_SESSION['logged_in'] = true;
        $_SESSION['system'] = 'lab';
        $redirect = 'lab_staff_login.php';  // ← এখানে ফোল্ডারের ভিতরে
    } elseif ($system === 'pharma' && $password === $correct_pharma) {
        $is_valid = true;
        $_SESSION['logged_in'] = true;
        $_SESSION['system'] = 'pharma';
        $redirect = 'pharma_staff_login.php';  // পরে করবো
    }

    if ($is_valid) {
        header("Location: $redirect");
        exit();
    } else {
        header("Location: ../login_common.php?error=1");
        exit();
    }
}
?>