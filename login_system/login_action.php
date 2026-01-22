<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $system  = $_POST['system'] ?? '';
    $email   = trim($_POST['email'] ?? '');
    $pass    = trim($_POST['password'] ?? '');

    $correct = [
        'lab'    => ['email' => 'kmc@lab',     'pass' => 'kmc@lab'],
        'pharma' => ['email' => 'kmc@pharma',  'pass' => 'kmc@pharma']
    ];

    if (isset($correct[$system]) && $email === $correct[$system]['email'] && $pass === $correct[$system]['pass']) {
        $_SESSION['logged_in'] = true;
        $_SESSION['system']    = $system;

        // সফল হলে স্টাফ লগইন পেজে যাও
        if ($system === 'lab') {
            header("Location: lab_staff_login.php");
        } else {
            header("Location: pharma_staff_login.php");
        }
        exit();
    } else {
        header("Location: ../login_common.php?error=1");
        exit();
    }
}
?>