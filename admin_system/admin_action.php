<?php
session_start();
include '../../db_Setup/db.php';

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if ($email === 'admin@mir.enterprise' && $password === 'admin@mir.enterprise') {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin_panel.php");
    exit();
} else {
    header("Location: admin_login.php?error=1");
    exit();
}
?>