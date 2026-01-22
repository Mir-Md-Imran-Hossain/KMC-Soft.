<?php
session_start();
include '../../db_Setup/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $system = $_POST['system'];
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($system === 'lab' && $email === 'kmc@lab' && $password === 'kmc@lab') {
        $_SESSION['logged_in'] = true;
        $_SESSION['system'] = 'lab';
        header("Location: lab_staff_login.php");
        exit();
    } elseif ($system === 'pharma' && $email === 'kmc@pharma' && $password === 'kmc@pharma') {
        $_SESSION['logged_in'] = true;
        $_SESSION['system'] = 'pharma';
        header("Location: pharma_staff_login.php");
        exit();
    } else {
        header("Location: ../../login_common.php?error=1");
        exit();
    }
}
?>